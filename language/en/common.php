<?php
/**
*
* @package phpBB Extension - Trader [English]
* @copyright (c) 2015 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

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
    'REPORT_DETAILS_TITLE'      =>  'Trader Report details',
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Deleted Trader report</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Closed Trader report</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Original Comment',
    'SUMMARY'                   =>  'Summary',
    'PRIVATE_COMMENT'           =>  'Private Comment',
    'TOPIC_PREFIX_FOR_SALE'     =>  '[FS]',
    'TOPIC_PREFIX_WANT_TO_BUY'  =>  '[WTB]',
    'TOPIC_PREFIX_WANT_TO_TRADE'=>  '[WTT]',
    'TRADER_SCORE'  			=>  'Trader Score',
    'POSITIVE'    				=>  'Positive',
    'GIVE_FEEDBACK'    			=>  'Give Feedback',
    'RATED'    					=>  'Rated',
    'FEEDBACK_BY_AUTHOR'    	=>  'by',
    'FEEDBACK_TO'    			=>  'to',
    'EXPLANATION_PLACEHOLDER'	=>	'Enter an explanation...',
    'NEGATIVE'					=>	'Negative',
    'NEUTRAL'					=>  'Neutral',
    'ALL_FEEDBACK_RECEIVED'		=>	'All Feedback Received',
    'RECEIVED_FROM_BUYERS'	    =>	'From Buyers',
    'RECEIVED_FROM_SELLERS'	    =>	'From Sellers',
    'RECEIVED_FROM_TRADES'	    =>	'From Trades',
    'LEFT_FOR_OTHERS'			=>	'Left for Others',
    'RATING_SUMMARY'			=>	'Rating Summary',
    'FEEDBACK_TYPE'             =>  'Type',
    'FEEDBACK_DELETED'          =>  'DELETED',
    'FEEDBACK_WAS_DELETED'		=>  'This feedback was deleted',
    'TRADER_TYPE_TRADER'        =>  'Trader',
    'TRADER_TYPE_BUYER'         =>  'Buyer',
    'TRADER_TYPE_SELLER'        =>  'Seller',
    'RETURN_FEEDBACK'			=>  'Return Feedback',
    'EDIT_THIS_FEEDBACK'		=>  'Edit this feedback',
    'REPORT_THIS_FEEDBACK'		=>  'Report this feedback',
    'SEE_PRIVATE_COMMENT'       =>  'See private comment',
    'NO_FEEDBACK_TO_DISPLAY'    =>  'There is no feedback to display.',
    'DELETE_FEEDBACK_Q'         =>  'Delete feedback?',
    'TRADER_RATING_STATISTICS'  =>  'Trader Rating Statistics',
    'POSITIVE_FEEDBACK'         =>  'Positive Feedback',
    'TOTAL_POSITIVE_FEEDBACK'   =>  'Total Positive Feedback',
    'RECENT_RATINGS'            =>  'Recent Ratings',
    'PAST_MONTH'                  =>  'Past month',
    'PAST_6_MONTHS'                  =>  'Past 6 months',
    'PAST_12_MONTHS'                 =>  'Past 12 months',
    'X_FEEDBACK'                =>  'feedback',
    'X_FEEDBACKS'               =>  'feedbacks',
    'I_AM'                      =>  'I am',
    'BUYING'                    =>  'Buying',
    'SELLING'                   =>  'Selling',
    'TRADING'                   =>  'Trading',
    'BUY'                       =>  'Buy',
    'SELL'                      =>  'Sell',
    'TRADE'                     =>  'Trade',
    'FEEDBACK_PAGE'             =>  'Feedback Page',
    'ENABLE_TRADER'             =>  'Enable Trader',
    'ENABLE_TRADER_DESC'        =>  'Specify which trader topics are enabled, if any.',
    'TRADER_FEEDBACK'           =>  'Trader Feedback',
    'TRADER_FEEDBACK_FOR'       =>  'Trader Feedback for',
    'TO_BUY'                    =>  'Want to buy',
    'FOR_SALE'                  =>  'For sale',
    'TO_TRADE'                  =>  'Want to trade',
    'GO_TO_TOPIC'               =>  'Go to topic',
    'VIEW_PROFILE'				=> 'View profile trader',
    'EDIT_HISTORY'				=> 'Edit History',
    'MEMBERS_WHO_LEFT_POSITIVE'	=> 'Members who left positive',
    'MEMBERS_WHO_LEFT_NEGATIVE'	=> 'Members who left negative',
    'RECIPIENT'				    => 'Recipient',
    'REQUIRED_CHARACTERS'		=> '* Required 10-200 Characters',
    'REQUIRED_INTENTION_TO'		=> '* Please select whether your intention is to Buy, Sell or Trade.',
    'FROM_TRADER'		=> 'From',
));
