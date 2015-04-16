<?php
/**
*
* @package phpBB Extension - Trader [Swedish]
* Swedish translation by Holger (http://www.maskinisten.net)
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
    'ALREADY_GIVEN_FEEDBACK'    =>  'Du har redan lämnat feedback om tråden till denna användaren.',
    'ACL_CAT_TRADER'            =>  'Handlare',
    'ACL_A_TRADER'              =>  'Kan hantera feedback',
    'ACL_M_TRADER_EDIT'         =>  'Kan ändra och radera feedback',
    'ACL_U_TRADER_VIEW'         =>  'Kan se handlar-feedback',
    'ACL_U_TRADER_POST'         =>  'Kan lämna feedback till handlare',
    'TOPIC_NOT_FOUND'           =>  'Detta ämne existerar ej.',
    'LOG_IN'                    =>  'Logga in för att lämna feedback',
    'USER_NOT_FOUND'            =>  'Användaren som du vill lämna feedback om existerar ej',
    'CANNOT_RATE_SELF'          =>  'Du kan ej lämna feedback till dig själv',
    'E_FEEDBACK_NOT_FOUND'      =>  'Feedback kunde ej hittas',
    'E_FEEDBACK_DELETED'        =>  'Feedback har raderats!',
    'E_CANNOT_EDIT'             =>  'Du kan ej ändra din feedback',
    'E_SUCCESSFUL_EDIT'         =>  'Feedback har ändrats',
    'E_CANNOT_RETURN_FEEDBACK'  =>  'Du kan ej lämna feedback till denna användare',
    'E_CANNOT_LEAVE_FEEDBACK'   =>  'Du har ej behörighet att lämna feedback.',
    'E_CANNOT_VIEW_FEEDBACK'    =>  'Du har ej behörighet att se feedback.',
    'FEEDBACK_SUCCESS'          =>  'Användaren har erhållit feedback!',
    'FEEDBACK_TITLE'            =>  'Lämna feedback till ',
    'FEEDBACK_TITLE_EDIT'       =>  'Ändra feedback till ',
    'FEEDBACK_ROLE'             =>  'Du var',
    'TRADER_EXPERIENCE'         =>  'Total upplevelse',
    'TRADER_VIEW_FEEDBACK'      =>  'Se handlarens feedback',
    'COMMENTS_TITLE'            =>  'Ytterligare kommentarer',
    'COMMENTS_TITLE_EDIT'       =>  'Ändra kommentarer',
    'SHORT_COMMENT'             =>  'En kort kommentar: (synlig för alla) <br> (minst 10 tecken)' ,
    'LONG_COMMENT'              =>  'Ytterligare kommentarer: (endast synliga för köpare, säljare och webbsidans team)',
    'REASON'                    =>  'Orsak',
    'REPORT_DESC'               =>  'Ange en orsak för rapport av denna feedback',
    'REPORT_TITLE'              =>  'Rapportera feeback',
    'REPORT_SUCCESS'            =>  'Feedbacken har rapporterats.',
    'REPORT_OPEN_TITLE'         =>  'Öppna handlar-rapporter',
    'REPORT_CLOSED_TITLE'       =>  'Stängda handlar-rapporter',
    'REPORT_OPEN_DESC'          =>  'Denna lista innehåller alla rapporterade handlar-feedbacker som ej har hanterats.',
    'REPORT_CLOSED_DESC'        =>  'Denna lista innehåller alla rapporterade handlar-feedbacker som har lösts.',
    'REPORT_DETAILS_TITLE'      =>  'Trader Report details',
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Raderade handlar-rapport</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Stängde handlar-rapport</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Originalkommentar',
    'SUMMARY'                   =>  'Sammanfattning',
    'PRIVATE_COMMENT'           =>  'Privat kommentar',
    'TOPIC_PREFIX_FOR_SALE' => '[SÄ]',
    'TOPIC_PREFIX_WANT_TO_BUY' => '[KÖ]',
    'TOPIC_PREFIX_WANT_TO_TRADE'=> '[BY]',
    'TRADER_SCORE' => 'Handlarvärdering',
    'POSITIVE' => 'Positiv',
    'GIVE_FEEDBACK' => 'Lämna feedback',
    'RATED' => 'Värderad',
    'FEEDBACK_BY_AUTHOR' => 'av',
    'FEEDBACK_TO' => 'till',
    'EXPLANATION_PLACEHOLDER'	=>	'Ange en förklaring ...',
    'NEGATIVE'	=>	'Negativ',
    'NEUTRAL'	=> 'Neutral',
    'ALL_FEEDBACK_RECEIVED'	=>	'All feedback mottagen',
    'RECEIVED_FROM_BUYERS'	=>	'Från köpare',
    'RECEIVED_FROM_SELLERS'	=>	'Från säljare',
    'RECEIVED_FROM_TRADES'	=>	'Från bytespartner',
    'LEFT_FOR_OTHERS'	=>	'Lämnad till andra',
    'RATING_SUMMARY'	=>	'Sammanfattning av värdering',
    'FEEDBACK_TYPE' => 'Typ',
    'FEEDBACK_DELETED' => 'RADERAD',
    'FEEDBACK_WAS_DELETED'	=> 'Denna feedback har raderats',
    'TRADER_TYPE_TRADER' => 'Byteshandlare',
    'TRADER_TYPE_BUYER' => 'Köpare',
    'TRADER_TYPE_SELLER' => 'Säljare',
    'RETURN_FEEDBACK'	=> 'Lämna feedback',
    'EDIT_THIS_FEEDBACK'	=> 'Redigera denna feedback',
    'REPORT_THIS_FEEDBACK'	=> 'Rapportera denna feedback',
    'SEE_PRIVATE_COMMENT' => 'Visa privat kommentar',
    'NO_FEEDBACK_TO_DISPLAY' => 'Det finns ingen feedback.',
    'DELETE_FEEDBACK_Q' => 'Radera feedback?',
    'TRADER_RATING_STATISTICS' => 'Handlarstatistik',
    'POSITIVE_FEEDBACK' => 'Positiv feedback',
    'TOTAL_POSITIVE_FEEDBACK' => 'Total positiv feedback',
    'RECENT_RATINGS' => 'Nya värderingar',
    'PAST_MONTH' => 'Past month',
    'PAST_6_MONTHS' => 'Senaste 6 månaderna',
    'PAST_12_MONTHS' => 'Senaste 12 månaderna',
    'X_FEEDBACK' => 'feedback',
    'X_FEEDBACKS' => 'feedback',
    'I_AM' => 'Jag',
    'BUYING' => 'Köpare',
    'SELLING' => 'Säljare',
    'TRADING' => 'Bytare',
    'BUY' => 'Köp',
    'SELL' => 'Sälj',
    'TRADE' => 'Byt',
    'FEEDBACK_PAGE' => 'Feedbacksida',
    'ENABLE_TRADER' => 'Aktivera handlare',
    'ENABLE_TRADER_DESC' => 'Ange aktiverade handlar-ämnen.',
    'TRADER_FEEDBACK' => 'Handlarfeedback',
    'TRADER_FEEDBACK_FOR' => 'Handlarfeedback för',
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
