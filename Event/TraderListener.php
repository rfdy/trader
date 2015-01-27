<?php

namespace rfd\trader\Event;

use rfd\trader\Service\RatingsManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface,
    phpbb\event\data                as phpbbEvent,
    phpbb\user                      as phpbbUser,
    phpbb\auth\auth                 as phpbbAuth,
    phpbb\controller\helper         as phpbbHelper,
    phpbb\request\request_interface as phpbbRequest;

class TraderListener implements EventSubscriberInterface {
    /**
     * @var phpbbUser
     */
    protected $user;

    /**
     * @var phpbbAuth
     */
    protected $auth;

    /**
     * @var phpbbHelper
     */
    protected $helper;

    /**
     * @var phpbbRequest
     */
    protected $request;

    /**
     * @var \rfd\trader\Service\RatingsManager
     */
    protected $manager;

    private $phpbb_root_path, $phpEx;

    /**
     * This flag is set at runtime, where the order of events really matters.
     *
     * @var bool Whether or not thanking is enabled on the current forum.
     */

    /**
     * @param phpbbUser     $user
     * @param phpbbAuth     $auth
     * @param phpbbHelper   $helper
     * @param phpbbRequest  $request
     */
    public function __construct($phpbb_root_path, $phpEx, phpbbUser $user, phpbbHelper $helper, phpbbAuth $auth, phpbbRequest $request, \rfd\trader\Service\RatingsManager $manager) {
        $this->phpbb_root_path = $phpbb_root_path;
        $this->phpEx          = $phpEx;
        $this->user           = $user;
        $this->helper         = $helper;
        $this->auth           = $auth;
        $this->request        = $request;
        $this->manager        = $manager;
    }

    /**
     * @return array
     */
    static public function getSubscribedEvents() {
        return array(
            'core.permissions'						=> 'add_permissions',
            'core.user_setup'						=> 'load_language_on_setup',
            'core.submit_post_end'                  => 'submit_post_end',
            'core.acp_manage_forums_display_form'   => 'acp_manage_forums_display_form',
            'core.acp_manage_forums_validate_data'  => 'acp_manage_forums_validate_data',
            'core.viewtopic_post_rowset_data'       => 'viewtopic_post_rowset_data',
            'core.viewforum_modify_topicrow'        => 'viewforum_modify_topicrow',
            'core.posting_modify_template_vars'     => 'posting_modify_template_vars',
            'core.modify_posting_parameters'        => 'modify_posting_parameters',
            'core.viewtopic_modify_post_row'        => 'viewtopic_modify_post_row',
            'core.memberlist_prepare_profile_data'  => 'memberlist_prepare_profile_data',
            'core.viewtopic_get_post_data'          => 'viewtopic_get_post_data',
            'core.modify_mcp_modules_display_option'    =>  'modify_mcp_modules_display_option',

            // API events
            'rfd.api.get_forum'                     => 'rfd_api_get_forum',
            //'rfd.api.get_user'                      => 'rfd_api_get_user',

            'rfd.api.get_topic'                     => 'rfd_api_get_topic'
        );
    }

    public function add_permissions($event)
    {
        $data = $event->get_data();

        // Add a permission category for infractions
        $categories           = $data['categories'];

        $categories['trader'] = 'ACL_CAT_TRADER';
        $data['categories']      = $categories;

        // Add permissions for infractions
        $permissions = $data['permissions'];
        $permissions[RatingsManager::A_TRADER]        = array('lang' => 'ACL_A_TRADER',         'cat' => 'misc');
        $permissions[RatingsManager::M_TRADER_EDIT] = array('lang' => 'ACL_M_TRADER_EDIT',  'cat' => 'trader');

        // Add permissions for viewing and leaving feedback
        $permissions[RatingsManager::U_TRADER_VIEW] = array('lang' => 'ACL_U_TRADER_VIEW', 'cat' => 'misc');
        $permissions[RatingsManager::U_TRADER_POST] = array('lang' => 'ACL_U_TRADER_POST', 'cat' => 'misc');

        $data['permissions'] = $permissions;

        $event->set_data($data);
    }

    public function load_language_on_setup($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'rfd/trader',
            'lang_set' => 'common',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }

    public function submit_post_end(phpbbEvent $event) {
        $event_data = $event->get_data();
        $data = $event_data['data'];

        $post = $this->request->get_super_global(\phpbb\request\request::POST);

        $type = $post['prefixfield'];

        if ($type || $post['default_type']) {
            $this->manager->setTopicType($data['forum_id'], $data['topic_id'], $post['prefixfield']);
        }
        $event->set_data($event_data);
    }

    public function acp_manage_forums_display_form(phpbbEvent $event) {
        $data = $event->get_data();

        $status = $data['forum_data']['enabled_trader_types'];

        $data['template_data']['S_TRADER_BUY'] = $this->manager->isSetBuy($status);
        $data['template_data']['S_TRADER_SELL'] = $this->manager->isSetSell($status);
        $data['template_data']['S_TRADER_TRADE'] = $this->manager->isSetTrade($status);

        $event->set_data($data);
    }

    public function acp_manage_forums_validate_data(phpbbEvent $event) {
        $data = $event->get_data();

        $post = $this->request->get_super_global(\phpbb\request\request::POST);

        $data['forum_data']['enabled_trader_types'] = $this->manager->getBitField(isset($post['trader_type_buy']),
                                                                                  isset($post['trader_type_sell']),
                                                                                  isset($post['trader_type_trade']));

        $event->set_data($data);
    }

    /**
     * Event: core.viewtopic_post_rowset_data
     *
     * Extract the user trader rating and the id of the user viewing the post
     * from the raw DB 'row' result and inject them into 'rowset_data' to be used
     * later when displaying the post (i.e. when core.viewtopic_modify_post_row
     * is fired)
     *
     * @param phpbbEvent $event
     * @return bool
     */
    public function viewtopic_post_rowset_data(phpbbEvent $event) {
        $data = $event->get_data();
        $positive = $data['row']['user_trader_positive'];
        $neutral = $data['row']['user_trader_neutral'];
        $negative = $data['row']['user_trader_negative'];

        $data['rowset_data']['user_trader_positive'] = $positive;
        $data['rowset_data']['user_trader_neutral'] = $neutral;
        $data['rowset_data']['user_trader_negative'] = $negative;

        $event->set_data($data);
    }

    /**
     * Event: core.viewtopic_modify_post_row
     *
     * Send the BST Feedback rating of a particular user
     * to the template for a user's post. Note that this fires after core.viewtopic_post_rowset_data
     *
     * @param phpbbEvent $event
     * @return bool
     */
    public function viewtopic_modify_post_row(phpbbEvent $event) {
        $data = $event->get_data();

        // if trader is not enabled, don't show the rating
        if (!$data['topic_data']['enabled_trader_types']) {
            return false;
        }
        if (!$this->manager->showTrader($data['row']['post_id'], $data['row']['topic_id'])) {
            return false;
        }

        $feedback_url = $this->helper->route('rfd_trader_feedback', array(
            'topic_id'  =>  $data['row']['topic_id'],
        ));

        // Set U_GIVE_FEEDBACK variable iff user has leave feedback permission
        if($this->manager->hasLeaveFeedbackPermission()) {
            $data['post_row']['U_GIVE_FEEDBACK'] = $feedback_url;
        }

        $view_feedback_url = $this->helper->route('rfd_trader_view', array(
            'u'  =>  $data['row']['user_id'],
        ));
        $data['post_row']['U_VIEW_FEEDBACK'] = $view_feedback_url;

        $positive = $data['row']['user_trader_positive'];
        $neutral = $data['row']['user_trader_neutral'];
        $negative = $data['row']['user_trader_negative'];

        $data['post_row']['user_trader_positive'] = $positive;
        $data['post_row']['user_trader_neutral'] = $neutral;
        $data['post_row']['user_trader_negative'] = $negative;
        $data['post_row']['user_trader_percentage'] = $this->manager->getPositivePercent($positive, $negative);
        $data['post_row']['user_trader_rating'] = $positive - $negative;
        $data['post_row']['title'] = "$positive Positive\n$neutral Neutral\n$negative Negative";
        $event->set_data($data);
    }

    /**
     * Event: core.viewforum_modify_topicrow
     *
     * Send the trader type to the template when viewing a forum's topics if Trader is enabled
     *
     * @param phpbbEvent $event
     */
    public function viewforum_modify_topicrow(phpbbEvent $event) {
        global $forum_data;

        if ($forum_data['enabled_trader_types']) { // only set the trader type if trader is enabled
            $data = $event->get_data();

            $topic_row = $data['topic_row'];
            $row = $data['row'];

            if ($row['topic_trader_type']) {
                $topic_row['TRADER_TYPE'] = $row['topic_trader_type'];
                $data['topic_row'] = $topic_row;
                $event->set_data($data);
            }
        }
    }

    /**
     * Event: core.posting_modify_template_vars
     *
     * Send the Trader type on edits or preview
     *
     * @param phpbbEvent $event
     */
    public function posting_modify_template_vars(phpbbEvent $event) {
        $mode = $enable_trader = $topic_id = $post_id = $topic_first_post_id = false;

        $data = $event->get_data();

        if (empty($data['post_data']['enabled_trader_types'])) {
            return;
        }

        if (!empty($data['mode'])) {
            $mode = $data['mode'];
        }

        if ($mode == 'reply') {
            return;
        }

        if (!empty($data['post_data']['topic_id'])) {
            $topic_id = $data['post_data']['topic_id'];
        }

        if (!empty($data['post_data']['post_id'])) {
            $post_id = $data['post_data']['post_id'];
        }

        if (!empty($data['post_data']['topic_first_post_id'])) {
            $topic_first_post_id = $data['post_data']['topic_first_post_id'];
        }

        $_post = $this->request->get_super_global(phpbbRequest::POST);
        $type_bitfield = $data['post_data']['enabled_trader_types'];

        $data['page_data']['TRADER_BUY'] = $this->manager->isSetBuy($type_bitfield);
        $data['page_data']['TRADER_SELL'] = $this->manager->isSetSell($type_bitfield);
        $data['page_data']['TRADER_TRADE'] = $this->manager->isSetTrade($type_bitfield);

        if ($mode == 'post') {
            $data['page_data']['TRADER_SHOW_FIELD'] = true;
            if (!empty($data['submit']) || !empty($data['preview'])) { // get value from the post
                $data['page_data']['TRADER_TYPE'] = $_post['prefixfield'];
            }
            $event->set_data($data);
        }
        else if ($mode == 'edit') {
            // set the trader type
            if ($topic_id && $post_id && $post_id == $topic_first_post_id) {

                if (!empty($data['submit']) || !empty($data['preview'])) { // get value from the post
                    $data['page_data']['TRADER_TYPE'] = $_post['prefixfield'];
                }
                else { // get value from the db
                    $data['page_data']['TRADER_TYPE'] = $data['post_data']['topic_trader_type'];
                }
                $data['page_data']['TRADER_SHOW_FIELD'] = true;
                $event->set_data($data);

            } else {
                return; // not the first post! do nothing
            }
        }
    }

    /**
     * Event: core.modify_posting_parameters
     *
     * Catch any errors (when posting in a BST forum without a Trader type)
     *
     * @param phpbbEvent $event
     */
    public function modify_posting_parameters(phpbbEvent $event) {
        $post = $this->request->get_super_global(\phpbb\request\request::POST);

        // if this is not the first post, we don't need to catch any errors
        if (empty($post['trader_first_post'])) {
            return;
        }

        $data = $event->get_data();

        if (!empty($data['submit']) && empty($post['prefixfield'])) {
            $data['error'][] = "Please select whether your intention is to Buy, Sell or Trade.";
            $event->set_data($data);
        }
    }

    /**
     * Event: core.memberlist_prepare_profile_data
     *
     * Send the infraction points, a url for the list and a link to issue an infraction for a particular user
     * to the template for the user's profile
     *
     * @param phpbbEvent $event
     * @return bool
     */
    public function memberlist_prepare_profile_data(phpbbEvent $event) {
        global $template;

        $data = $event->get_data();

        $view_feedback_url = $this->helper->route('rfd_trader_view', array(
            'u'  =>  $data['data']['user_id'],
        ));
        $data['template_data']['U_FEEDBACK_VIEW'] = $view_feedback_url;

        $positive = $data['data']['user_trader_positive'];
        $negative = $data['data']['user_trader_negative'];
        $data['template_data']['TRADER_RATING'] = $positive - $negative;
        $data['template_data']['TRADER_PERCENTAGE'] = $this->manager->getPositivePercent($positive, $negative);

        // Set view feedback permission
        $template->assign_var('TRADER_HAS_VIEW_FEEDBACK_PERMISSION', $this->manager->hasViewFeedbackPermission());

        $event->set_data($data);
    }

    public function viewtopic_get_post_data(phpbbEvent $event) {
        global $template;
        $data = $event->get_data();

        $template->assign_var('TOPIC_TRADER_TYPE', $data['topic_data']['topic_trader_type']);

        // Set view feedback permission
        $template->assign_var('TRADER_HAS_VIEW_FEEDBACK_PERMISSION', $this->manager->hasViewFeedbackPermission());
    }

    /**
     * Add trader status to the forum data
     * @param phpbbEvent $event
     */
    public function rfd_api_get_forum(phpbbEvent $event)
    {
        $data = $event->get_data();
        $forum = $data['forum'];
        $raw_forum = $data['raw_forum'];

        $forum['trader_status'] = $this->manager->getTraderStatusString($raw_forum['enabled_trader_types']);

        $data['forum'] = $forum;
        $event->set_data($data);
    }


    /**
     * Hide the trader report details module from the MCP sidebar by default
     *
     * @param phpbbEvent $event
     */
    public function modify_mcp_modules_display_option(phpbbEvent $event) {
        global $module;

        $module->set_display('\rfd\trader\mcp\mcp_trader_module', 'trader_report_details', false);
    }

    public function rfd_api_get_user(phpbbEvent $event){
        $data = $event->get_data();
        $user = $data['user'];
        $raw_user = $data['raw_user'];

        $user['trader_positive'] = (int) $raw_user['user_trader_positive'];
        $user['trader_neutral'] = (int) $raw_user['user_trader_neutral'];
        $user['trader_negative'] = (int) $raw_user['user_trader_negative'];

        $data['user'] = $user;
        $event->set_data($data);
    }

    public function rfd_api_get_topic(phpbbEvent $event){
        $data = $event->get_data();
        $topic = $data['topic'];
        $raw_topic = $data['raw_topic'];

        $topic['trader_type'] = $raw_topic['topic_trader_type'];

        $data['topic'] = $topic;
        $event->set_data($data);

    }


}
