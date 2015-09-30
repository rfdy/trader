<?php
/**
*
* Trader extension for the phpBB Forum Software package.
* German translation by RobertHeim (http://www.maskinisten.net)
*
* @copyright (c) 2015 RFDY
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
	'ACL_A_TRADER'			=> 'Kann Bewertungen managen',
	'ACL_CAT_TRADER'			=> 'Trader',
	'ACL_M_TRADER_EDIT'			=> 'Kann Bewertungen bearbeiten und löschen',
	'ACL_U_TRADER_POST'			=> 'Can leave trader feedback',
	'ACL_U_TRADER_VIEW'			=> 'Can view trader feedback',
	'ALL_FEEDBACK_RECEIVED'			=> 'All Feedback Received',
	'ALREADY_GIVEN_FEEDBACK'			=> 'Du hast diesen User bereits für diesen Thread bewertet.',
	'BUY'			=> 'Buy',
	'BUYING'			=> 'Buying',
	'CANNOT_RATE_SELF'			=> 'Du kannst dich nicht selbst bewerten',
	'COMMENTS_TITLE'			=> 'Weitere Kommentare',
	'COMMENTS_TITLE_EDIT'			=> 'Kommentare bearbeiten',
	'DELETE_FEEDBACK_Q'			=> 'Delete feedback?',
	'EDIT_HISTORY'			=> 'Edit History',
	'EDIT_THIS_FEEDBACK'			=> 'Edit this feedback',
	'ENABLE_TRADER'			=> 'Enable Trader',
	'ENABLE_TRADER_DESC'			=> 'Specify which trader topics are enabled, if any.',
	'EXPLANATION_PLACEHOLDER'			=> 'Enter an explanation...',
	'E_CANNOT_EDIT'			=> 'Du kannst die Bewertung nicht bearbeiten',
	'E_CANNOT_LEAVE_FEEDBACK'			=> 'You cannot leave feedback - you are lacking the required permissions.',
	'E_CANNOT_RETURN_FEEDBACK'			=> 'Du kannst diesem User kein Feedback zurückgeben',
	'E_CANNOT_VIEW_FEEDBACK'			=> 'You cannot view feedback - you are lacking the required permissions.',
	'E_FEEDBACK_DELETED'			=> 'Bewertung erfolgreich gelöscht!',
	'E_FEEDBACK_NOT_FOUND'			=> 'Bewertung nicht gefunden',
	'E_SUCCESSFUL_EDIT'			=> 'Bewertung erfolgreich bearbeitet',
	'FEEDBACK_BY_AUTHOR'			=> 'by',
	'FEEDBACK_DELETED'			=> 'DELETED',
	'FEEDBACK_PAGE'			=> 'Feedback Page',
	'FEEDBACK_ROLE'			=> 'Du warst der',
	'FEEDBACK_SUCCESS'			=> 'User erfolgreich bewertet!',
	'FEEDBACK_TITLE'			=> 'Bewertung für ',
	'FEEDBACK_TITLE_EDIT'			=> 'Bearbeite die Bewertung für ',
	'FEEDBACK_TO'			=> 'to',
	'FEEDBACK_TYPE'			=> 'Type',
	'FEEDBACK_WAS_DELETED'			=> 'This feedback was deleted',
	'FOR_SALE'			=> 'For sale',
	'FROM_TRADER'			=> 'From',
	'GIVE_FEEDBACK'			=> 'Give Feedback',
	'GO_TO_TOPIC'			=> 'Go to topic',
	'I_AM'			=> 'I am',
	'LEFT_FOR_OTHERS'			=>	'Left for Others',
	'LOG_IN'			=> 'Du musst dich einloggen, um eine Bewertung abzugeben.',
	'LOG_TRADER_REPORT_CLOSED'			=> '<strong>Closed Trader report</strong><br />',
	'LOG_TRADER_REPORT_DELETED'			=> '<strong>Deleted Trader report</strong><br />',
	'LONG_COMMENT'			=> 'Weitere Kommentare: (sichtbar für Käufer, Verkäufer und die Belegschaft)',
	'MEMBERS_WHO_LEFT_NEGATIVE'			=> 'Members who left negative',
	'MEMBERS_WHO_LEFT_POSITIVE'			=> 'Members who left positive',
	'NEGATIVE'			=> 'Negative',
	'NEUTRAL'			=> 'Neutral',
	'NO_FEEDBACK_TO_DISPLAY'			=> 'There is no feedback to display.',
	'ORIGINAL_COMMENT'			=> 'Original Comment',
	'PAST_12_MONTHS'			=> 'Past 12 months',
	'PAST_6_MONTHS'			=> 'Past 6 months',
	'PAST_MONTH'			=> 'Past month',
	'POSITIVE'			=> 'Positive',
	'POSITIVE_FEEDBACK'			=> 'Positive Feedback',
	'PRIVATE_COMMENT'			=> 'Private Comment',
	'RATED'			=> 'Rated',
	'RATING_SUMMARY'			=>	'Rating Summary',
	'REASON'			=> 'Reason',
	'RECEIVED_FROM_BUYERS'			=> 'From Buyers',
	'RECEIVED_FROM_SELLERS'			=> 'From Sellers',
	'RECEIVED_FROM_TRADES'			=> 'From Trades',
	'RECENT_RATINGS'			=> 'Recent Ratings',
	'RECIPIENT'			=> 'Recipient',
	'REPORT_CLOSED_DESC'			=> 'This is a list of all reports about trader feedbacks which have previously been resolved.',
	'REPORT_CLOSED_TITLE'			=> 'Closed Trader reports',
	'REPORT_DESC'			=> 'Please provide an explanation for reporting this feedback',
	'REPORT_DETAILS_TITLE'			=> 'Trader Report details',
	'REPORT_OPEN_DESC'			=> 'This is a list of all reported trader feedbacks which are still to be handled.',
	'REPORT_OPEN_TITLE'			=> 'Open Trader reports',
	'REPORT_SUCCESS'			=> 'This feedback has been successfully reported.',
	'REPORT_THIS_FEEDBACK'			=> 'Report this feedback',
	'REPORT_TITLE'			=> 'Report this feedback',
	'REQUIRED_CHARACTERS'			=> '* Required 10-200 Characters',
	'REQUIRED_INTENTION_TO'			=> '* Please select whether your intention is to Buy, Sell or Trade.',
	'RETURN_FEEDBACK'			=> 'Return Feedback',
	'SEE_PRIVATE_COMMENT'			=> 'See private comment',
	'SELL'			=> 'Sell',
	'SELLING'			=> 'Selling',
	'SHORT_COMMENT'			=> 'Ein kurzer Kommentar: (für alle sichtbar) <br> (Minimum 10 Zeichen)' ,
	'SUMMARY'			=> 'Summary',
	'TOPIC_NOT_FOUND'			=> 'Dieses Thema existiert nicht.',
	'TOPIC_PREFIX_FOR_SALE'			=> '[FS]',
	'TOPIC_PREFIX_WANT_TO_BUY'			=> '[WTB]',
	'TOPIC_PREFIX_WANT_TO_TRADE'			=> '[WTT]',
	'TOTAL_POSITIVE_FEEDBACK'			=> 'Total Positive Feedback',
	'TO_BUY'			=> 'Want to buy',
	'TO_TRADE'			=> 'Want to trade',
	'TRADE'			=> 'Trade',
	'TRADER_EXPERIENCE'			=> 'Gesamte Erfahrung',
	'TRADER_FEEDBACK'			=> 'Trader Feedback',
	'TRADER_FEEDBACK_FOR'			=> 'Trader Feedback for',
	'TRADER_RATING_STATISTICS'			=> 'Trader Rating Statistics',
	'TRADER_SCORE'			=> 'Trader Score',
	'TRADER_TYPE_BUYER'			=> 'Buyer',
	'TRADER_TYPE_SELLER'			=> 'Seller',
	'TRADER_TYPE_TRADER'			=> 'Trader',
	'TRADER_VIEW_FEEDBACK'			=> 'View Trader Feedback',
	'TRADING'			=> 'Trading',
	'USER_NOT_FOUND'			=> 'Der User, den du versuchst zu bewerten, kann nicht gefunden werden',
	'VIEW_TRADER_FEEDBACK_PROFILE'			=> 'View profile trader',
	'X_FEEDBACK'			=> 'feedback',
	'X_FEEDBACKS'			=> 'feedbacks',
));
