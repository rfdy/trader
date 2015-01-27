<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
    'ALREADY_GIVEN_FEEDBACK'    =>  'You have already given feedback to this user for this thread.',
    'ACL_CAT_TRADER'            =>  'Trader',
    'ACL_A_TRADER'              =>  'Can manage Feedback',
    'ACL_M_TRADER_EDIT'         =>  'Can edit and delete a feedback',
    'ACL_U_TRADER_VIEW'         =>  'Can view trader feedback',
    'ACL_U_TRADER_POST'         =>  'Can leave trader feedback',
    'TOPIC_NOT_FOUND'           =>  'This topic does not exist.',
    'LOG_IN'                    =>  'Please log in to give feedback',
    'USER_NOT_FOUND'            =>  'The user you are rating cannot be found',
    'CANNOT_RATE_SELF'          =>  'Cannot give feedback to yourself',
    'E_FEEDBACK_NOT_FOUND'      =>  'Feedback not found',
    'E_FEEDBACK_DELETED'        =>  'Feedback successfully deleted!',
    'E_CANNOT_EDIT'             =>  'You cannot edit the feedback',
    'E_SUCCESSFUL_EDIT'         =>  'Feedback successfully edited',
    'E_CANNOT_RETURN_FEEDBACK'  =>  'You cannot return a feedback to this person',
    'E_CANNOT_LEAVE_FEEDBACK'   =>  'You cannot leave feedback - you are lacking the required permissions.',
    'E_CANNOT_VIEW_FEEDBACK'    =>  'You cannot view feedback - you are lacking the required permissions.',
    'FEEDBACK_SUCCESS'          =>  'User Successfully Rated!',
    'FEEDBACK_TITLE'            =>  'Submit Feedback For ',
    'FEEDBACK_TITLE_EDIT'       =>  'Edit Feedback For ',
    'FEEDBACK_ROLE'             =>  'You were the',
    'TRADER_EXPERIENCE'         =>  'Overall experience',
    'TRADER_VIEW_FEEDBACK'      =>  'View Trader Feedback',
    'COMMENTS_TITLE'            =>  'Additional Comments',
    'COMMENTS_TITLE_EDIT'       =>  'Edit Comments',
    'SHORT_COMMENT'             =>  'A short comment: (Visible to all) <br> (Minimum 10 Characters)' ,
    'LONG_COMMENT'              =>  'Additional comments: (Visible to buyer, seller and staff only)',
    'REASON'                    =>  'Reason',
    'REPORT_DESC'               =>  'Please provide an explanation for reporting this feedback',
    'REPORT_TITLE'              =>  'Report this feedback',
    'REPORT_SUCCESS'            =>  'This feedback has been successfully reported.',
    'REPORT_OPEN_TITLE'         =>  'Open Trader reports',
    'REPORT_CLOSED_TITLE'       =>  'Closed Trader reports',
    'REPORT_OPEN_DESC'          =>  'This is a list of all reported trader feedbacks which are still to be handled.',
    'REPORT_CLOSED_DESC'        =>  'This is a list of all reports about trader feedbacks which have previously been resolved.',
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Deleted Trader report</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Closed Trader report</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Original Comment',
    'SUMMARY'                   =>  'Summary',
    'PRIVATE_COMMENT'           =>  'Private Comment',
));
