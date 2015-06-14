<?php
/**
*
* Trader extension for the phpBB Forum Software package.
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
	'ACL_A_TRADER'			=> 'Kan feedback beheren',
	'ACL_CAT_TRADER'			=> 'Vraag/Aanbod',
	'ACL_M_TRADER_EDIT'			=> 'Kan feedback aanpassen en verwijderen',
	'ACL_U_TRADER_POST'			=> 'Kan vraag/aanbod feedback geven',
	'ACL_U_TRADER_VIEW'			=> 'Kan vraag/aanbod feedback zien',
	'ALL_FEEDBACK_RECEIVED'			=> 'Alle Ontvangen Feedback',
	'ALREADY_GIVEN_FEEDBACK'			=> 'Je hebt al feedback gegeven aan deze gebruiker over dit onderwerp.',
	'BUY'			=> 'Kopen',
	'BUYING'			=> 'Kopen',
	'CANNOT_RATE_SELF'			=> 'Je kan geen feedback geven aan jezelf',
	'COMMENTS_TITLE'			=> 'Verdere Opmerkingen',
	'COMMENTS_TITLE_EDIT'			=> 'Pas opmerkingen aan',
	'DELETE_FEEDBACK_Q'			=> 'Verwijder feedback?',
	'EDIT_HISTORY'			=> 'Edit History',
	'EDIT_THIS_FEEDBACK'			=> 'Pas feedback aan',
	'ENABLE_TRADER'			=> 'Trader Inschakelen',
	'ENABLE_TRADER_DESC'			=> 'Specificeer welke typen Trader topics in dit forum ingeschakeld zijn.',
	'EXPLANATION_PLACEHOLDER'			=> 'Leg uit...',
	'E_CANNOT_EDIT'			=> 'je kan de feedback niet aanpassen',
	'E_CANNOT_LEAVE_FEEDBACK'			=> 'Je kan geen feedback geven - je mist de vereiste permissies.',
	'E_CANNOT_RETURN_FEEDBACK'			=> 'Je kan deze gebruiker geen feedback terug geven',
	'E_CANNOT_VIEW_FEEDBACK'			=> 'je kan de feedback niet zien - je mist de vereiste permissies.',
	'E_FEEDBACK_DELETED'			=> 'Feedback succesvol verwijderd!',
	'E_FEEDBACK_NOT_FOUND'			=> 'Feedback niet gevonden',
	'E_SUCCESSFUL_EDIT'			=> 'Feedback succesvol aangepast',
	'FEEDBACK_BY_AUTHOR'			=> 'door',
	'FEEDBACK_DELETED'			=> 'VERWIJDERD',
	'FEEDBACK_PAGE'			=> 'Feedback Pagina',
	'FEEDBACK_ROLE'			=> 'Jij was de',
	'FEEDBACK_SUCCESS'			=> 'Gebruiker Beoordeeld!',
	'FEEDBACK_TITLE'			=> 'Geef feedback aan ',
	'FEEDBACK_TITLE_EDIT'			=> 'Pas feedback aan voor ',
	'FEEDBACK_TO'			=> 'aan',
	'FEEDBACK_TYPE'			=> 'Type',
	'FEEDBACK_WAS_DELETED'			=> 'Deze feedback is verwijderd',
	'FOR_SALE'			=> 'For sale',
	'FROM_TRADER'			=> 'From',
	'GIVE_FEEDBACK'			=> 'Geef Feedback',
	'GO_TO_TOPIC'			=> 'Go to topic',
	'I_AM'			=> 'Ik wil',
	'LEFT_FOR_OTHERS'			=> 'Gegeven aan anderen',
	'LOG_IN'			=> 'Je moet inloggen om feedback te kunnen geven',
	'LOG_TRADER_REPORT_CLOSED'			=> '<strong>Gesloten Handelaar melding</strong><br />',
	'LOG_TRADER_REPORT_DELETED'			=> '<strong>Verwijderde Handelaar melding</strong><br />',
	'LONG_COMMENT'			=> 'Verdere opmerkingen: (Alleen zichtbaar voor koper, verkoper en moderators/beheerders)',
	'MEMBERS_WHO_LEFT_NEGATIVE'			=> 'Members who left negative',
	'MEMBERS_WHO_LEFT_POSITIVE'			=> 'Members who left positive',
	'NEGATIVE'			=> 'Negatief',
	'NEUTRAL'			=> 'Neutraal',
	'NO_FEEDBACK_TO_DISPLAY'			=> 'Er is geen feedback om weer te geven.',
	'ORIGINAL_COMMENT'			=> 'Originele Opmerking',
	'PAST_12_MONTHS'			=> 'Afgelopen 12 Maanden',
	'PAST_6_MONTHS'			=> 'Afgelopen 6 Maanden',
	'PAST_MONTH'			=> 'Past month',
	'POSITIVE'			=> 'Positief',
	'POSITIVE_FEEDBACK'			=> 'Positieve Feedback',
	'PRIVATE_COMMENT'			=> 'Privé Opmerking',
	'RATED'			=> 'Waardering',
	'RATING_SUMMARY'			=> 'Feedback Samenvatting',
	'REASON'			=> 'Reden',
	'RECEIVED_FROM_BUYERS'			=> 'Van Kopers',
	'RECEIVED_FROM_SELLERS'			=> 'Van Verkopers',
	'RECEIVED_FROM_TRADES'			=> 'Van Ruil',
	'RECENT_RATINGS'			=> 'Recente Waarderingen',
	'RECIPIENT'			=> 'Recipient',
	'REPORT_CLOSED_DESC'			=> 'Dit is een lijst van alle vraag/aanbod meldingen die zijn afgehandeld.',
	'REPORT_CLOSED_TITLE'			=> 'Gesloten Handelaar Meldingen',
	'REPORT_DESC'			=> 'Geef een reden waarom je deze feedback meld',
	'REPORT_DETAILS_TITLE'			=> 'Trader Report details',
	'REPORT_OPEN_DESC'			=> 'Dit is een lijst van alle vraag/aanbod meldingen die nog moeten worden afgehandeld.',
	'REPORT_OPEN_TITLE'			=> 'Open Handelaar Meldingen',
	'REPORT_SUCCESS'			=> 'Deze feedback is succesvol gemeld.',
	'REPORT_THIS_FEEDBACK'			=> 'Meld deze feedback',
	'REPORT_TITLE'			=> 'Meld deze feedback',
	'REQUIRED_CHARACTERS'			=> '* Required 10-200 Characters',
	'REQUIRED_INTENTION_TO'			=> '* Please select whether your intention is to Buy, Sell or Trade.',
	'RETURN_FEEDBACK'			=> 'Geef feedback terug',
	'SEE_PRIVATE_COMMENT'			=> 'Bekijke privé commentaar',
	'SELL'			=> 'Verkopen',
	'SELLING'			=> 'Verkopen',
	'SHORT_COMMENT'			=> 'Kort commentaar: (Zichtbaar voor iedereen) <br> (Minimaal 10 Karakters)' ,
	'SUMMARY'			=> 'Samenvatting',
	'TOPIC_NOT_FOUND'			=> 'Dit onderwerp bestaat niet.',
	'TOPIC_PREFIX_FOR_SALE'			=> '[Aanbod]',
	'TOPIC_PREFIX_WANT_TO_BUY'			=> '[Vraag]',
	'TOPIC_PREFIX_WANT_TO_TRADE'			=> '[Ruil]',
	'TOTAL_POSITIVE_FEEDBACK'			=> 'Totaal Positieve Feedback',
	'TO_BUY'			=> 'Want to buy',
	'TO_TRADE'			=> 'Want to trade',
	'TRADE'			=> 'Ruilen',
	'TRADER_EXPERIENCE'			=> 'Algemene ervaring',
	'TRADER_FEEDBACK'			=> 'Handelaar Feedback',
	'TRADER_FEEDBACK_FOR'			=> 'Handelaar Feedback voor',
	'TRADER_RATING_STATISTICS'			=> 'Handelaar Waardering',
	'TRADER_SCORE'			=> 'Handelaar Score',
	'TRADER_TYPE_BUYER'			=> 'Koper',
	'TRADER_TYPE_SELLER'			=> 'Verkoper',
	'TRADER_TYPE_TRADER'			=> 'Ruiler',
	'TRADER_VIEW_FEEDBACK'			=> 'Bekijk handelaar feedback',
	'TRADING'			=> 'Ruilen',
	'USER_NOT_FOUND'			=> 'De gebruiker die je een waardering wil geven kan niet worden gevonden',
	'VIEW_PROFILE'			=> 'View profile trader',
	'X_FEEDBACK'			=> 'feedback',
	'X_FEEDBACKS'			=> 'feedbacks',
));
