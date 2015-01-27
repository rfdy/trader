<?php

namespace rfd\trader\Controller;

use rfd\trader\Service\RatingsManager;

class Trader
{
    const MIN_SHORT_LENGTH = 10;
    const MAX_SHORT_LENGTH = 255;
    const MAX_LONG_LENGTH = 1000;

    const EDIT_TIME_LIMIT = 20;
    const NUM_PER_PAGE = 10;

    /**
     * Auth object
     * @var \phpbb\auth\auth
     */
    protected $auth;

    /**
     * Request object
     * @var \phpbb\request\request
     */
    protected $request;

    /**
     * User object
     * @var \phpbb\user
     */
    protected $user;

    /**
     * Template object
     * @var \phpbb\template
     */
    protected $template;

    /**
     * Database driver
     * @var \phpbb\db\driver\driver
     */
    protected $db;

    /**
     * @var \phpbb\controller\helper
     */
    protected $helper;

    /**
     * @var \rfd\trader\Service\RatingsManager
     */
    protected $manager;

    /**
     * @var \phpbb\pagination
     */
    protected $pagination;

    protected $phpbb_root_path;

    protected $phpEx;

    public function __construct(
        \phpbb\auth\auth $auth,
        \phpbb\request\request $request,
        \phpbb\user $user,
        \phpbb\db\driver\driver $db,
        \phpbb\template\twig\twig $template,
        \phpbb\controller\helper $helper,
        \rfd\trader\Service\RatingsManager $manager,
        \phpbb\config\db $config,
        \phpbb\pagination $pagination,
        $phpbb_root_path,
        $phpEx)
    {
        $this->auth = $auth;
        $this->request = $request;
        $this->user = $user;
        $this->db = $db;
        $this->template = $template;
        $this->helper = $helper;
        $this->manager = $manager;
        $this->config = $config;
        $this->pagination = $pagination;
        $this->phpbb_root_path = $phpbb_root_path;
        $this->phpEx = $phpEx;
    }

    public function defaultAction()
    {
        if(!($this->manager->hasLeaveFeedbackPermission())) {
            trigger_error($this->user->lang('E_CANNOT_LEAVE_FEEDBACK'));
        }

        $topic_id = $this->request->variable('topic_id', 0);

        $feedback_reply_id = $this->request->variable('reply_id', 0);

        $rating = $this->request->variable('trader_rating', 0);
        $short_comment = trim($this->request->variable('short_comment', ''));
        $long_comment = trim($this->request->variable('long_comment', ''));

        if ($feedback_reply_id) {
            $feedback_row = $this->manager->getAllFeedbackInfo($feedback_reply_id);
        }

        $topic_id = $topic_id ? $topic_id : $feedback_row['topic_id'];

        $topic_row = $this->getTopic($topic_id);
        $user_id = $feedback_reply_id ? $feedback_row['from_user_id'] : $topic_row['topic_poster'];

        $err_comments = array();

        $feedback_route = $this->helper->route('rfd_trader_view', array(
            'u' => $user_id,
        ));

        $back_url = '<a href=' . append_sid(generate_board_url() . "/viewtopic.php?t=" . $topic_id) . '>Back</a>';

        $submit = $this->request->is_set_post('submit');

        $to_user_row = $this->getUser($user_id);

        if ($feedback_reply_id && !$feedback_row) {
            trigger_error($this->user->lang('E_FEEDBACK_NOT_FOUND'));
        }
        if ($feedback_reply_id && $this->user->data['user_id'] != $feedback_row['to_user_id']) {
            trigger_error($this->user->lang('E_CANNOT_RETURN_FEEDBACK'));
        }
        if (!$topic_row) {
            trigger_error($this->user->lang('TOPIC_NOT_FOUND'));
        }
        if (!$to_user_row) {
            trigger_error($this->user->lang('USER_NOT_FOUND'));
        }
        if ($to_user_row['user_id'] == $this->user->data['user_id']) {
            trigger_error($this->user->lang('CANNOT_RATE_SELF') . '</br></br>' . $back_url);
        }
        if ($this->user->data['user_id'] == ANONYMOUS) {
            trigger_error($this->user->lang('LOG_IN'));
        }
        if (!$this->manager->canGiveFeedback($user_id, $this->user->data['user_id'], $topic_id)) {
            trigger_error($this->user->lang('ALREADY_GIVEN_FEEDBACK') . '<br /><br />' . $back_url);
        }
        if ($submit && (strlen($short_comment) < self::MIN_SHORT_LENGTH || strlen($short_comment) > self::MAX_SHORT_LENGTH)) {
            $err_comments['short'] = '* Required 10-200 Characters';
        }
        if ($submit && strlen($long_comment) > self::MAX_LONG_LENGTH) {
            $err_comments['long'] = true;
        }

        if ($submit && !$err_comments['short'] && !$err_comments['long']) {
            if (!check_form_key('give_feedback_form')) {
                trigger_error('FORM_INVALID');
            }

            $feedback_result = $this->manager->giveFeedback($user_id,
                $this->user->data['user_id'],
                $feedback_reply_id,
                $rating,
                $topic_id,
                $topic_row['topic_title'],
                $topic_row['topic_trader_type'],
                $short_comment,
                $long_comment
            );

            $trader_profile_url = '<a href=' . $this->helper->route('rfd_trader_view', array(
                    'u' => $to_user_row['user_id'],
                )) . '>View Profile</a>';
            trigger_error($this->user->lang('FEEDBACK_SUCCESS') . '<br /><br />' . $trader_profile_url);
        }

        add_form_key('give_feedback_form');
        $this->template->assign_vars(array(
            'ERROR' => $err_comments,
            'RATING' => $rating,
            'SHORT' => $short_comment,
            'LONG' => $long_comment,
            'USERNAME' => $to_user_row['username'],
            'TOPIC_TITLE' => $topic_row['topic_title'],
            'TOPIC_TYPE' => $topic_row['topic_trader_type'],
            'TRADER_USERNAME' => $to_user_row['username'],
            'U_TRADER_FEEDBACK' => $feedback_route,
            'U_TRADER_PROFILE' => append_sid("{$this->phpbb_root_path}memberlist.$this->phpEx", 'mode=viewprofile&amp;u=' . $to_user_row['user_id']),
        ));
        return $this->helper->render('TraderFeedback.html', 'Give Feedback');
    }

    public function editFeedbackAction()
    {
        $feedback_id = $this->request->variable('feedback_id', 0);
        $feedback_row = $this->manager->getAllFeedbackInfo($feedback_id);

        if (!$feedback_row) {
            trigger_error($this->user->lang('E_FEEDBACK_NOT_FOUND') . '<br /><br />');
        }

        $return_user_id = $this->request->variable('u', $feedback_row['to_user_id']);
        $return_user = $this->getUser($return_user_id);
        $feedback_route = $this->helper->route('rfd_trader_view', array(
            'u' => $return_user_id,
        ));
        $trader_profile_url = $trader_profile_url = '<a href=' . $feedback_route . '>Back</a>';

        if (!$this->canEditFeedback($feedback_row['date_created'], $feedback_row['from_user_id'])) {
            trigger_error($this->user->lang('E_CANNOT_EDIT') . '<br /><br />' . $trader_profile_url);
        }

        $edit_history = $this->manager->getFeedbackComments($feedback_id);
//        unset($edit_history[0]);

        $submit = $this->request->is_set_post('submit');
        $to_user_row = $this->getUser($feedback_row['to_user_id']);
        $rating = $this->request->variable('trader_rating', $feedback_row['rating']);
        $new_short = trim($this->request->variable('short_comment', $feedback_row['short_comment']));
        $new_long = trim($this->request->variable('long_comment', $feedback_row['long_comment']));
        $delete_feedback = $this->request->variable('delete_feedback', $feedback_row['is_deleted']);

        if ($submit && (strlen($new_short) < self::MIN_SHORT_LENGTH || strlen($new_short) > self::MAX_SHORT_LENGTH)) {
            $err_comments['short'] = '* Required 10-200 Characters';
        }
        if ($submit && strlen($new_long) > self::MAX_LONG_LENGTH) {
            $err_comments['long'] = true;
        }
        if ($this->user->data['user_timezone']) {
            $timezone = new \DateTimeZone($this->user->data['user_timezone']);
        } else {
            $timezone = new \DateTimeZone($this->config['board_timezone']);
        }

        foreach ($edit_history as $key => $revision) {
            $editor_row = $this->getUser($revision['editor_user_id']);
            $revision['username'] = $editor_row['username'];
            $revision['date_created'] = new \DateTime('@' . $revision['date_created']);
            $revision['date_created']->setTimezone($timezone);
            $edit_history[$key] = $revision;
        }

        if ($submit && !$err_comments['short'] && !$err_comments['long']) {
            if ($delete_feedback != $feedback_row['is_deleted']) {
                if ($delete_feedback) {
                    $this->manager->deleteFeedback($feedback_row, $this->isEditMod());
                } else {
                    $this->manager->revertDelete($feedback_row);
                }
            }

            $this->manager->editFeedback($feedback_row,
                $rating,
                $new_short,
                $new_long,
                $delete_feedback,
                $this->user->data['user_id']);
            trigger_error($this->user->lang('E_SUCCESSFUL_EDIT') . '<br /><br />' . $trader_profile_url);
        }

        $this->template->assign_vars(array(
            'EDIT' => true,
            'MODERATOR' => $this->isEditMod(),
            'HISTORY' => $edit_history,
            'DELETED' => $delete_feedback,
            'ERROR' => $err_comments,
            'RATING' => $rating,
            'SHORT' => $new_short,
            'LONG' => $new_long,
            'USERNAME' => $to_user_row['username'],
            'TOPIC_TITLE' => $feedback_row['topic_title'],
            'TOPIC_TYPE' => $feedback_row['topic_type'],
            'TRADER_USERNAME' => $return_user['username'],
            'U_TRADER_PROFILE' => append_sid("{$this->phpbb_root_path}memberlist.$this->phpEx", 'mode=viewprofile&amp;u=' . $return_user_id),
            'U_TRADER_FEEDBACK' => $feedback_route,
            'U_DATE_FORMAT' => $this->user->data['user_dateformat']
        ));

        return $this->helper->render('TraderFeedback.html', 'Edit Feedback');
    }

    public function viewUserFeedbackAction()
    {
        // Trigger an error if user does not have view feedback permissions
        if(!($this->manager->hasViewFeedbackPermission())) {
            trigger_error($this->user->lang('E_CANNOT_VIEW_FEEDBACK'));
        }

        $user_id = $this->request->variable('u', 0);
        $tab = $this->request->variable('tab', 'all');
        $start = $this->request->variable('start', 0);

        $is_edit_mod = $this->isEditMod();

        $action = $this->request->variable('action', 'list');
        if ($action == 'list') {
            $valid_tabs = array(
                'all' => RatingsManager::TAB_TYPE_ALL,
                'buy' => RatingsManager::TOPIC_TYPE_BUY,
                'sell' => RatingsManager::TOPIC_TYPE_SELL,
                'trade' => RatingsManager::TOPIC_TYPE_TRADE,
                'left' => RatingsManager::TAB_TYPE_LEFT,
            );

            if (!isset($valid_tabs[$tab])) {
                $tab = 'all';
            }

            if (!$user_id) {
                trigger_error("No user provided - cannot display Trader Feedback");
            }

            $user_page_row = $this->fetch_user_row($this->db, $user_id);
            if (!$user_page_row) {
                trigger_error("Could not find specified user!");
            }

            $trader_stats = $this->manager->getUserFeedbackStats($user_id, true);
            if (!$trader_stats) {
                trigger_error("Feedback Statistics could not be retrieved");
            }

            if ($tab == 'buy') {
                $filter = $valid_tabs['sell'];
            } else if ($tab == 'sell') {
                $filter = $valid_tabs['buy'];
            } else {
                $filter = $valid_tabs[$tab];
            }

            // stores the number of total feedbacks that are filtered on a given tab - for pagination purposes
            // this number is updated by reference by the call to the manager
            $num_feedbacks = 0;
            $feedbacks = $this->manager->get_users_feedback($start, self::NUM_PER_PAGE, $user_id, $filter, $is_edit_mod, $num_feedbacks);

            if ($this->user->data['user_timezone']) {
                $timezone = new \DateTimeZone($this->user->data['user_timezone']);
            } else {
                $timezone = new \DateTimeZone($this->config['board_timezone']);
            }
            foreach ($feedbacks as $key => $feedback) {
                // fetch the appropriate user's information based on the selected tab
                // if the tab is 'Left for Others' we need to use the to_user_id (the recipient)

                if ($tab == "left") {
                    $user_row = $this->fetch_user_row($this->db, $feedback['to_user_id']);
                    $view_feedback_url = $this->helper->route('rfd_trader_view', array(
                        'u' => $feedback['to_user_id'],
                    ));
                } else {
                    $user_row = $this->fetch_user_row($this->db, $feedback['from_user_id']);
                    $view_feedback_url = $this->helper->route('rfd_trader_view', array(
                        'u' => $feedback['from_user_id'],
                    ));
                }
                $feedback['U_VIEW_FEEDBACK'] = $view_feedback_url;

                $feedback['table_username'] = $user_row['username'];
                $feedback['table_user_trader_rating'] = $user_row['user_trader_positive'] - $user_row['user_trader_negative'];

                $feedback['show_left_for_others'] = $tab == "left";

                $comments = $this->manager->getLatestFeedbackComment($feedback['feedback_id']);
                if ($comments) {
                    $feedback['short_comment'] = $comments['short_comment'];

                    if ($is_edit_mod
                        || ($feedback['from_user_id'] == $this->user->data['user_id'])
                        || ($feedback['to_user_id'] == $this->user->data['user_id'])
                    ) {
                        $feedback['long_comment'] = $comments['long_comment'];
                    }
                }

                if ($is_edit_mod || $this->canEditFeedback($feedback['date_created'], $feedback['from_user_id'])) {
                    $edit_feedback_url = $this->helper->route('rfd_trader_edit_feedback', array(
                        'feedback_id' => $feedback['feedback_id'],
                        'u' => $user_id,
                    ));
                    $feedback['U_EDIT_FEEDBACK'] = $edit_feedback_url;
                }

                if($this->canReplyToFeedback($feedback['from_user_id'], $feedback['to_user_id'], $feedback['topic_id'])) {
                    $feedback['U_REPLY_FEEDBACK'] = $this->helper->route('rfd_trader_feedback', array(
                        'reply_id' => $feedback['feedback_id'],
                        'u' => $user_id,
                    ));
                }

                $has_open_report = $this->manager->has_open_report($feedback['feedback_id']);

                // Show report button if the feedback is for the current user viewing the page
                if (($feedback['to_user_id'] == $this->user->data['user_id']) && !$has_open_report) {
                    $feedback['U_REPORT_FEEDBACK'] = append_sid(generate_board_url() . '/trader/view-feedback/?action=report&amp;id=' . $feedback['feedback_id']);
                }

                $feedback['topic_url'] = append_sid(generate_board_url() . "/viewtopic.php?t=" . $feedback['topic_id']);
                $feedback['date_created'] = new \DateTime('@' . $feedback['date_created']);
                $feedback['date_created']->setTimezone($timezone);
                $feedbacks[$key] = $feedback;
            }

            $trader_username_full = get_username_string('full', $user_page_row['user_id'], $user_page_row['username'], $user_page_row['user_colour']);
            $this->template->assign_vars(array(
                'TRADER_USERNAME_FULL' => $trader_username_full,
                'TRADER_USERNAME' => $user_page_row['username'],
                'U_TRADER_PROFILE' => append_sid("{$this->phpbb_root_path}memberlist.$this->phpEx", 'mode=viewprofile&amp;u=' . $user_page_row['user_id']),
                'trader_stats' => $trader_stats,
                'recent_feedback' => $this->manager->getRecentUserFeedbackCounts($user_id),
                'U_ACTION_TAB_ALL' => $this->helper->route("rfd_trader_view", array('u' => $user_id, 'tab' => 'all')),
                'U_ACTION_TAB_BUY' => $this->helper->route("rfd_trader_view", array('u' => $user_id, 'tab' => 'buy')),
                'U_ACTION_TAB_SELL' => $this->helper->route("rfd_trader_view", array('u' => $user_id, 'tab' => 'sell')),
                'U_ACTION_TAB_TRADE' => $this->helper->route("rfd_trader_view", array('u' => $user_id, 'tab' => 'trade')),
                'U_ACTION_TAB_LEFT' => $this->helper->route("rfd_trader_view", array('u' => $user_id, 'tab' => 'left')),
                'CURRENT_TAB' => $tab,
                'feedbacks' => $feedbacks,
                'TOTAL_FEEDBACKS' => $num_feedbacks,
            ));

            $base_url = $this->helper->route('rfd_trader_view', array(
                'u' => $user_id,
            ));

            $this->pagination->generate_template_pagination($base_url, 'pagination', 'start', $num_feedbacks, self::NUM_PER_PAGE, $start);
        } else if ($action == 'report') {
            $this->report_feedback_action($this->request, $this->user);
        } else {
            trigger_error("Unknown Action!");
        }

        return $this->helper->render('view_user_feedback.html', 'Viewing Trader Feedback - User ' . $user_page_row['username']);
    }


    private function report_feedback_action($request, $user)
    {
        $id = $request->variable('id', 0);
        $user_id = (int)$user->data['user_id'];

        // check that this is ajax request and that the user reporting the feedback is the recipient of the feedback
        if($request->is_ajax() && $user_id == $this->manager->getFeedbackRecipientID($id)) {
            $reason = $request->variable('reason', '');

            confirm_box(false, $user->lang['REPORT_DESC'], '', 'report_feedback_form.html', "trader/view-feedback/?action=report&id=".$id);

            if (confirm_box(true)) {

//             REPORT the feedback
                $this->manager->report_feedback($id, $reason);

                if ($request->is_ajax()) {
                    $json_response = new \phpbb\json_response;
                    $json_response->send(array(
                        'MESSAGE_TITLE' => $user->lang['INFORMATION'],
                        'MESSAGE_TEXT' => $user->lang['REPORT_SUCCESS'],
                        'REFRESH_DATA' => array(
                            'time' => 3
                        )
                    ));
                }
            }
        } else {
            // redirect to previous page if report is cancelled, or front page if no referrer
            redirect($request->header('referer', './index.php'));
        }
    }


    private function getUser($user_id)
    {
        $user_id = (int)$user_id;

        $result = $this->db->sql_query('SELECT user_id, user_type, username FROM ' . USERS_TABLE . ' WHERE user_id=' . $this->db->sql_escape($user_id));
        $user_row = $this->db->sql_fetchrow($result);

        return $user_row;
    }

    private function getTopic($topic_id)
    {
        $topic_id = (int)$topic_id;

        $result = $this->db->sql_query('SELECT topic_id, topic_trader_type, topic_title, topic_poster FROM ' . TOPICS_TABLE . ' WHERE topic_id=' . $topic_id);
        return $this->db->sql_fetchrow($result);
    }

    private function fetch_user_row($db, $user_id)
    {
        $sql = 'SELECT * FROM ' . USERS_TABLE . ' WHERE user_id=' . $user_id;
        $result = $db->sql_query($sql);
        $user_row = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        return $user_row;
    }

    private function canEditFeedback($date_created, $from_user_id)
    {

        $time_diff = ($this->request->server('REQUEST_TIME') - $date_created) / 60;

        if (($from_user_id == $this->user->data['user_id'] && $time_diff < self::EDIT_TIME_LIMIT) || $this->isEditMod()) {
            return true;
        }
        return false;
    }

    /**
     * Return true iff current user has edit feedback permissions
     */
    private function isEditMod()
    {
        return ($this->auth->acl_get(RatingsManager::M_TRADER_EDIT) || $this->auth->acl_get(RatingsManager::A_TRADER));
    }

    /**
     * Return true iff current user can reply to the given feedback
     *
     * @param $from_id - The user id of the sender of the feedback
     * @param $to_id - The user id of the receiver of the feedback
     * @param $topic_id - The topic id of the feedback
     */
    private function canReplyToFeedback($from_id, $to_id, $topic_id) {
        return ($this->user->data['user_id'] == $to_id) && $this->manager->canGiveFeedback($from_id, $this->user->data['user_id'], $topic_id);
    }
}