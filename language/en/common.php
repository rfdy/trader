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
    'ACL_A_TRADER'              => 'Can manage Feedback',
    'ACL_M_FEEDBACK_EDIT'       =>  'Can edit and delete a feedback',
    'TOPIC_NOT_FOUND'           =>  'This topic does not exist.',
    'LOG_IN'                    =>  'Please log in to give feedback',
    'USER_NOT_FOUND'            =>  'The user you are rating cannot be found',
    'CANNOT_RATE_SELF'          =>  'Cannot give feedback to yourself',
    'E_FEEDBACK_NOT_FOUND'      =>  'Cannot find the feedback',
    'E_FEEDBACK_DELETED'        =>  'Feedback successfully deleted!',
    'E_CANNOT_EDIT'             =>  'You cannot edit the feedback',
    'E_SUCCESSFUL_EDIT'         =>  'Feedback successfully edited',
    'FEEDBACK_SUCCESS'          =>  'User Successfully Rated!',
    'FEEDBACK_TITLE'            =>  'Submit Feedback For ',
    'FEEDBACK_TITLE_EDIT'       =>  'Edit Feedback For ',
    'FEEDBACK_ROLE'             =>  'You were the',
    'TRADER_EXPERIENCE'         =>  'Overall experience',
    'DEAL_URL'                  =>  'Deal thread URL: (Required)',
    'DEAL_URL_DESCR'            =>  'ex: http://www.site.com/forum/showthread.php?t=1234',
    'COMMENTS_TITLE'            =>  'Additional Comments',
    'COMMENTS_TITLE_EDIT'       =>  'Edit Comments',
    'SHORT_COMMENT'             =>  'A short comment: (Visible to all) <br> (Minimum 10 Characters)' ,
    'LONG_COMMENT'              =>  'Additional comments: (Visible to buyer, seller and staff only)',
));
