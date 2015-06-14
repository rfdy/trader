<?php
/**
*
* Trader extension for the phpBB Forum Software package.
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'ACL_A_TRADER'			=> 'Kan hantera feedback',
	'ACL_CAT_TRADER'			=> 'Handlare',
	'ACL_M_TRADER_EDIT'			=> 'Kan ändra och radera feedback',
	'ACL_U_TRADER_POST'			=> 'Kan lämna feedback till handlare',
	'ACL_U_TRADER_VIEW'			=> 'Kan se handlar-feedback',
	'ALL_FEEDBACK_RECEIVED'			=> 'All feedback mottagen',
	'ALREADY_GIVEN_FEEDBACK'			=> 'Du har redan lämnat feedback om tråden till denna användaren.',
	'BUY'			=> 'Köp',
	'BUYING'			=> 'Köpare',
	'CANNOT_RATE_SELF'			=> 'Du kan ej lämna feedback till dig själv',
	'COMMENTS_TITLE'			=> 'Ytterligare kommentarer',
	'COMMENTS_TITLE_EDIT'			=> 'Ändra kommentarer',
	'DELETE_FEEDBACK_Q'			=> 'Radera feedback?',
	'EDIT_HISTORY'			=> 'Edit History',
	'EDIT_THIS_FEEDBACK'			=> 'Redigera denna feedback',
	'ENABLE_TRADER'			=> 'Aktivera handlare',
	'ENABLE_TRADER_DESC'			=> 'Ange aktiverade handlar-ämnen.',
	'EXPLANATION_PLACEHOLDER'			=> 'Ange en förklaring ...',
	'E_CANNOT_EDIT'			=> 'Du kan ej ändra din feedback',
	'E_CANNOT_LEAVE_FEEDBACK'			=> 'Du har ej behörighet att lämna feedback.',
	'E_CANNOT_RETURN_FEEDBACK'			=> 'Du kan ej lämna feedback till denna användare',
	'E_CANNOT_VIEW_FEEDBACK'			=> 'Du har ej behörighet att se feedback.',
	'E_FEEDBACK_DELETED'			=> 'Feedback har raderats!',
	'E_FEEDBACK_NOT_FOUND'			=> 'Feedback kunde ej hittas',
	'E_SUCCESSFUL_EDIT'			=> 'Feedback har ändrats',
	'FEEDBACK_BY_AUTHOR'			=> 'av',
	'FEEDBACK_DELETED'			=> 'RADERAD',
	'FEEDBACK_PAGE'			=> 'Feedbacksida',
	'FEEDBACK_ROLE'			=> 'Du var',
	'FEEDBACK_SUCCESS'			=> 'Användaren har erhållit feedback!',
	'FEEDBACK_TITLE'			=> 'Lämna feedback till ',
	'FEEDBACK_TITLE_EDIT'			=> 'Ändra feedback till ',
	'FEEDBACK_TO'			=> 'till',
	'FEEDBACK_TYPE'			=> 'Typ',
	'FEEDBACK_WAS_DELETED'			=> 'Denna feedback har raderats',
	'FOR_SALE'			=> 'For sale',
	'FROM_TRADER'			=> 'From',
	'GIVE_FEEDBACK'			=> 'Lämna feedback',
	'GO_TO_TOPIC'			=> 'Go to topic',
	'I_AM'			=> 'Jag',
	'LEFT_FOR_OTHERS'			=> 'Lämnad till andra',
	'LOG_IN'			=> 'Logga in för att lämna feedback',
	'LOG_TRADER_REPORT_CLOSED'			=> '<strong>Stängde handlar-rapport</strong><br />',
	'LOG_TRADER_REPORT_DELETED'			=> '<strong>Raderade handlar-rapport</strong><br />',
	'LONG_COMMENT'			=> 'Ytterligare kommentarer: (endast synliga för köpare, säljare och webbsidans team)',
	'MEMBERS_WHO_LEFT_NEGATIVE'			=> 'Members who left negative',
	'MEMBERS_WHO_LEFT_POSITIVE'			=> 'Members who left positive',
	'NEGATIVE'			=> 'Negativ',
	'NEUTRAL'			=> 'Neutral',
	'NO_FEEDBACK_TO_DISPLAY'			=> 'Det finns ingen feedback.',
	'ORIGINAL_COMMENT'			=> 'Originalkommentar',
	'PAST_12_MONTHS'			=> 'Senaste 12 månaderna',
	'PAST_6_MONTHS'			=> 'Senaste 6 månaderna',
	'PAST_MONTH'			=> 'Past month',
	'POSITIVE'			=> 'Positiv',
	'POSITIVE_FEEDBACK'			=> 'Positiv feedback',
	'PRIVATE_COMMENT'			=> 'Privat kommentar',
	'RATED'			=> 'Värderad',
	'RATING_SUMMARY'			=> 'Sammanfattning av värdering',
	'REASON'			=> 'Orsak',
	'RECEIVED_FROM_BUYERS'			=> 'Från köpare',
	'RECEIVED_FROM_SELLERS'			=> 'Från säljare',
	'RECEIVED_FROM_TRADES'			=> 'Från bytespartner',
	'RECENT_RATINGS'			=> 'Nya värderingar',
	'RECIPIENT'			=> 'Recipient',
	'REPORT_CLOSED_DESC'			=> 'Denna lista innehåller alla rapporterade handlar-feedbacker som har lösts.',
	'REPORT_CLOSED_TITLE'			=> 'Stängda handlar-rapporter',
	'REPORT_DESC'			=> 'Ange en orsak för rapport av denna feedback',
	'REPORT_DETAILS_TITLE'			=> 'Trader Report details',
	'REPORT_OPEN_DESC'			=> 'Denna lista innehåller alla rapporterade handlar-feedbacker som ej har hanterats.',
	'REPORT_OPEN_TITLE'			=> 'Öppna handlar-rapporter',
	'REPORT_SUCCESS'			=> 'Feedbacken har rapporterats.',
	'REPORT_THIS_FEEDBACK'			=> 'Rapportera denna feedback',
	'REPORT_TITLE'			=> 'Rapportera feeback',
	'REQUIRED_CHARACTERS'			=> '* Required 10-200 Characters',
	'REQUIRED_INTENTION_TO'			=> '* Please select whether your intention is to Buy, Sell or Trade.',
	'RETURN_FEEDBACK'			=> 'Lämna feedback',
	'SEE_PRIVATE_COMMENT'			=> 'Visa privat kommentar',
	'SELL'			=> 'Sälj',
	'SELLING'			=> 'Säljare',
	'SHORT_COMMENT'			=> 'En kort kommentar: (synlig för alla) <br> (minst 10 tecken)' ,
	'SUMMARY'			=> 'Sammanfattning',
	'TOPIC_NOT_FOUND'			=> 'Detta ämne existerar ej.',
	'TOPIC_PREFIX_FOR_SALE'			=> '[SÄ]',
	'TOPIC_PREFIX_WANT_TO_BUY'			=> '[KÖ]',
	'TOPIC_PREFIX_WANT_TO_TRADE'			=> '[BY]',
	'TOTAL_POSITIVE_FEEDBACK'			=> 'Total positiv feedback',
	'TO_BUY'			=> 'Want to buy',
	'TO_TRADE'			=> 'Want to trade',
	'TRADE'			=> 'Byt',
	'TRADER_EXPERIENCE'			=> 'Total upplevelse',
	'TRADER_FEEDBACK'			=> 'Handlarfeedback',
	'TRADER_FEEDBACK_FOR'			=> 'Handlarfeedback för',
	'TRADER_RATING_STATISTICS'			=> 'Handlarstatistik',
	'TRADER_SCORE'			=> 'Handlarvärdering',
	'TRADER_TYPE_BUYER'			=> 'Köpare',
	'TRADER_TYPE_SELLER'			=> 'Säljare',
	'TRADER_TYPE_TRADER'			=> 'Byteshandlare',
	'TRADER_VIEW_FEEDBACK'			=> 'Se handlarens feedback',
	'TRADING'			=> 'Bytare',
	'USER_NOT_FOUND'			=> 'Användaren som du vill lämna feedback om existerar ej',
	'VIEW_PROFILE'			=> 'View profile trader',
	'X_FEEDBACK'			=> 'feedback',
	'X_FEEDBACKS'			=> 'feedback',
));
