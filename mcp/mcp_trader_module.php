<?php

namespace rfd\trader\mcp;

use phpbb\datetime;
use rfd\trader\Service\RatingsManager;

class mcp_trader_module
{
    const NUM_PER_PAGE = 10;


    public $u_action;
    public $options;

    private $id;

    /**
     * @var \rfd\trader\Service\RatingsManager
     */
    protected $manager;

    /**
     * @var \phpbb\pagination
     */
    protected $pagination;

    /**
     * @var \phpbb\controller\helper
     */
    protected $helper;

    public function fetch_user_row($db, $user_id) {
        $sql = 'SELECT * FROM ' . USERS_TABLE . ' WHERE user_id=' . $user_id;
        $result = $db->sql_query($sql);
        $user_row = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        return $user_row;
    }

    public function get_username_full($db, $user_id) {
        $user_row = $this->fetch_user_row($db, $user_id);

        $username_full = get_username_string('full', $user_row['user_id'], $user_row['username'], $user_row['user_colour']);

        return $username_full;
    }

    function main($id, $mode)
    {
        global $module, $phpbb_container, $action, $request;

        $this->id = $id;

        $this->manager = $phpbb_container->get('rfd.trader.ratings_manager');
        $this->pagination = $phpbb_container->get('pagination');
        $this->helper = $phpbb_container->get('controller.helper');

        switch($action) {
            case 'close':
            case 'delete':
                $report_ids = $request->variable('report_id', 0);
                if($report_ids != 0) {
                    $report_ids = array($report_ids);
                } else {
                    $report_ids = $request->variable('report_id_list', array(0));
                }
                $report_ids = $this->formatReportIds($report_ids);
                $this->update_reports_status($report_ids, $mode, $action);
                break;
        }

        switch ($mode) {
            case 'open_trader_reports':
                $module->set_display($id, 'trader_report_details', false);
                $this->show_reports(RatingsManager::REPORT_ACTIVE);
                break;
            case 'closed_trader_reports':
                $module->set_display($id, 'trader_report_details', false);
                $this->show_reports(RatingsManager::REPORT_CLOSED);
                break;
            case 'trader_report_details':
                $module->set_display($id, 'trader_report_details', true);
                $this->show_report_details();
                break;
        }

        $module->set_display('reports', 'report_details', false);
        $module->set_display('pm_reports', 'pm_report_details', false);
    }

    private function formatReportIds($report_ids) {
        $arr = array();

        // Check if no valid report ids
        if(count($report_ids) <= 1 && (!$report_ids[0] || $report_ids[0] == 0)) {
            return $arr;
        }

        return $report_ids;
    }

    private function show_reports($status) {
        global $request,$phpbb_root_path,$phpEx;
        global $template, $db, $user, $config, $action;

        $start = $request->variable('start', 0);

        switch ($action)
        {
            case 'close':
            case 'delete':
                $report_id_list = $request->variable('report_id_list', array(0));
                if (!sizeof($report_id_list))
                {
                    trigger_error('NO_REPORT_SELECTED');
                }
                $this->manager->close_reports($report_id_list, $action);
            break;
        }
        $reports = $this->manager->get_reported_feedbacks($start, self::NUM_PER_PAGE, $status);
        $report_count = $this->manager->get_reports_count($status);


        if ($user->data['user_timezone']) {
            $timezone = new \DateTimeZone($user->data['user_timezone']);

        } else {
            $timezone = new \DateTimeZone($config['board_timezone']);
        }
        foreach ($reports as $key => $report) {
            $comments = $this->manager->getLatestFeedbackComment($report['feedback_id']);

            $report['short_comment'] = $comments['short_comment'];
            $report['long_comment'] = $comments['long_comment'];

            $report['to_username'] = $this->get_username_full($db, $report['to_user_id']);
            $report['from_username'] = $this->get_username_full($db, $report['from_user_id']);

            $report['f_date_created'] = new \DateTime('@' . $report['f_date_created']);
            $report['f_date_created']->setTimezone($timezone);

            $report['r_date_created'] = new \DateTime('@' . $report['r_date_created']);
            $report['r_date_created']->setTimezone($timezone);

            $report['U_VIEW_DETAILS'] = append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=' .$this->id.'&amp;mode=trader_report_details&amp;report_id=' . $report['report_id']);

            $reports[$key] = $report;
        }

        $template->assign_vars(array(
            'REPORTS'       =>  $reports,
            'OPEN'          =>  $status,
            'S_CLOSED'      =>  $status ? false : true,
        ));

        $base_url = append_sid("{$phpbb_root_path}mcp.$phpEx", "i={$this->id}&amp;mode=open_trader_reports");

        $this->pagination->generate_template_pagination($base_url, 'pagination', 'start', $report_count, self::NUM_PER_PAGE, $start);

        add_form_key('mcp_trader');
        $this->tpl_name = 'mcp_trader_reports';
    }

    private function show_report_details() {
        global $request, $template, $user, $config, $db, $module;

        if(($report_id = $request->variable('report_id', 0)) == 0) {
            // no report id - show error message
            trigger_error('NO_REPORT');
        }

        // fix mcp sidebar link
        $module->adjust_url('&amp;report_id='.$report_id);

        $report_row = $this->manager->get_report($report_id);

        if(!$report_row) {
            trigger_error('NO_REPORT');
        }

        $feedback_row = $this->manager->getAllFeedbackInfo($report_row['feedback_id']);

        if ($user->data['user_timezone']) {
            $timezone = new \DateTimeZone($user->data['user_timezone']);

        } else {
            $timezone = new \DateTimeZone($config['board_timezone']);
        }

        $feedback_row['to_username'] = $this->get_username_full($db, $feedback_row['to_user_id']);
        $feedback_row['from_username'] = $this->get_username_full($db, $feedback_row['from_user_id']);

        $report_row['date_created'] = new \DateTime('@' . $report_row['date_created']);
        $report_row['date_created']->setTimezone($timezone);

        $feedback_row['date_created'] = new \DateTime('@' . $feedback_row['date_created']);
        $feedback_row['date_created']->setTimezone($timezone);

        $U_EDIT = $this->helper->route('rfd_trader_edit_feedback', array ('feedback_id' => $report_row['feedback_id']));

        $template->assign_vars(array(
            'REPORT'           =>  $report_row,
            'FEEDBACK'         =>  $feedback_row,
            'S_REPORT_CLOSED'  =>  !$report_row['status'],
            'U_EDIT'           =>  $U_EDIT,
        ));

        add_form_key('mcp_trader');
        $this->tpl_name = 'mcp_report_details';
    }

    /**
     * @param array $report_ids
     * @param $mode
     */
    private function update_reports_status(array $report_ids, $mode, $action)
    {
        global $user, $phpbb_log;

        $module_name = '\rfd\trader\mcp\mcp_trader_module';

        $redirect = 'mcp.php?i='.$module_name.'&amp;mode=open_trader_reports';
        $success_msg = '';

        if(!$report_ids) {
            trigger_error('NO_REPORT_SELECTED');
        }

        if (!$this->manager->isTraderModerator()) {
            trigger_error('NOT_AUTHORISED');
        }

        $s_hidden_fields = build_hidden_fields(array(
                'i'					=> $module_name,
                'mode'				=> $mode,
                'report_id_list'	=> $report_ids,
                'action'			=> $action,
                'redirect'			=> $redirect)
        );

        if (confirm_box(true)) {
            // add moderator log entries
            foreach ($report_ids as $report_id) {
                $report = $this->manager->get_report($report_id);

                if ($report && $action == 'delete') {
                    $this->manager->deleteReport($report['report_id'], $phpbb_log, $user);
                } else if ($report && $action == 'close' && !$this->manager->isReportClosed($report)) {
                    $this->manager->closeReport($report['report_id'], $phpbb_log, $user);
                }
            }

            $success_msg = 'REPORT' . (count($report_ids) > 1 ? 'S' : '') . '_' . ($action == 'close' ? 'CLOSED' : 'DELETED') . '_SUCCESS';
        } else {
            $confirm_msg = ($action == 'close' ? 'CLOSE' : 'DELETE') . '_REPORT' . (count($report_ids) > 1 ? 'S' : '') . '_CONFIRM';
            confirm_box(false, $user->lang($confirm_msg), $s_hidden_fields);
        }

        if (!$success_msg) {
            redirect($redirect);
        } else {
            meta_refresh(3, $redirect);
            trigger_error($user->lang[$success_msg] . '<br /><br />' . sprintf($user->lang['RETURN_PAGE'], "<a href=\"$redirect\">", '</a>'));
        }
    }
}

