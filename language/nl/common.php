<?php
/**
*
* @package phpBB Extension - Trader [Nederlands]
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
    'ALREADY_GIVEN_FEEDBACK'    =>  'Je hebt al feedback gegeven aan deze gebruiker over dit onderwerp.',
    'ACL_CAT_TRADER'            =>  'Vraag/Aanbod',
    'ACL_A_TRADER'              =>  'Kan feedback beheren',
    'ACL_M_TRADER_EDIT'         =>  'Kan feedback aanpassen en verwijderen',
    'ACL_U_TRADER_VIEW'         =>  'Kan vraag/aanbod feedback zien',
    'ACL_U_TRADER_POST'         =>  'Kan vraag/aanbod feedback geven',
    'TOPIC_NOT_FOUND'           =>  'Dit onderwerp bestaat niet.',
    'LOG_IN'                    =>  'Je moet inloggen om feedback te kunnen geven',
    'USER_NOT_FOUND'            =>  'De gebruiker die je een waardering wil geven kan niet worden gevonden',
    'CANNOT_RATE_SELF'          =>  'Je kan geen feedback geven aan jezelf',
    'E_FEEDBACK_NOT_FOUND'      =>  'Feedback niet gevonden',
    'E_FEEDBACK_DELETED'        =>  'Feedback succesvol verwijderd!',
    'E_CANNOT_EDIT'             =>  'je kan de feedback niet aanpassen',
    'E_SUCCESSFUL_EDIT'         =>  'Feedback succesvol aangepast',
    'E_CANNOT_RETURN_FEEDBACK'  =>  'Je kan deze gebruiker geen feedback terug geven',
    'E_CANNOT_LEAVE_FEEDBACK'   =>  'Je kan geen feedback geven - je mist de vereiste permissies.',
    'E_CANNOT_VIEW_FEEDBACK'    =>  'je kan de feedback niet zien - je mist de vereiste permissies.',
    'FEEDBACK_SUCCESS'          =>  'Gebruiker Beoordeeld!',
    'FEEDBACK_TITLE'            =>  'Geef feedback aan ',
    'FEEDBACK_TITLE_EDIT'       =>  'Pas feedback aan voor ',
    'FEEDBACK_ROLE'             =>  'Jij was de',
    'TRADER_EXPERIENCE'         =>  'Algemene ervaring',
    'TRADER_VIEW_FEEDBACK'      =>  'Bekijk handelaar feedback',
    'COMMENTS_TITLE'            =>  'Verdere Opmerkingen',
    'COMMENTS_TITLE_EDIT'       =>  'Pas opmerkingen aan',
    'SHORT_COMMENT'             =>  'Kort commentaar: (Zichtbaar voor iedereen) <br> (Minimaal 10 Karakters)' ,
    'LONG_COMMENT'              =>  'Verdere opmerkingen: (Alleen zichtbaar voor koper, verkoper en moderators/beheerders)',
    'REASON'                    =>  'Reden',
    'REPORT_DESC'               =>  'Geef een reden waarom je deze feedback meld',
    'REPORT_TITLE'              =>  'Meld deze feedback',
    'REPORT_SUCCESS'            =>  'Deze feedback is succesvol gemeld.',
    'REPORT_OPEN_TITLE'         =>  'Open Handelaar Meldingen',
    'REPORT_CLOSED_TITLE'       =>  'Gesloten Handelaar Meldingen',
    'REPORT_OPEN_DESC'          =>  'Dit is een lijst van alle vraag/aanbod meldingen die nog moeten worden afgehandeld.',
    'REPORT_CLOSED_DESC'        =>  'Dit is een lijst van alle vraag/aanbod meldingen die zijn afgehandeld.',
    'REPORT_DETAILS_TITLE'      =>  'Trader Report details',
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Verwijderde Handelaar melding</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Gesloten Handelaar melding</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Originele Opmerking',
    'SUMMARY'                   =>  'Samenvatting',
    'PRIVATE_COMMENT'           =>  'Privé Opmerking',
    'TOPIC_PREFIX_FOR_SALE'     =>  '[Aanbod]',
    'TOPIC_PREFIX_WANT_TO_BUY'  =>  '[Vraag]',
    'TOPIC_PREFIX_WANT_TO_TRADE'=>  '[Ruil]',
    'TRADER_SCORE'              =>  'Handelaar Score',
    'POSITIVE'                  =>  'Positief',
    'GIVE_FEEDBACK'             =>  'Geef Feedback',
    'RATED'                     =>  'Waardering',
    'FEEDBACK_BY_AUTHOR'        =>  'door',
    'FEEDBACK_TO'               =>  'aan',
    'EXPLANATION_PLACEHOLDER'   =>  'Leg uit...',
    'NEGATIVE'                  =>  'Negatief',
    'NEUTRAL'                   =>  'Neutraal',
    'ALL_FEEDBACK_RECEIVED'     =>  'Alle Ontvangen Feedback',
    'RECEIVED_FROM_BUYERS'      =>  'Van Kopers',
    'RECEIVED_FROM_SELLERS'     =>  'Van Verkopers',
    'RECEIVED_FROM_TRADES'      =>  'Van Ruil',
    'LEFT_FOR_OTHERS'           =>  'Gegeven aan anderen',
    'RATING_SUMMARY'            =>  'Feedback Samenvatting',
    'FEEDBACK_TYPE'             =>  'Type',
    'FEEDBACK_DELETED'          =>  'VERWIJDERD',
    'FEEDBACK_WAS_DELETED'      =>  'Deze feedback is verwijderd',
    'TRADER_TYPE_TRADER'        =>  'Ruiler',
    'TRADER_TYPE_BUYER'         =>  'Koper',
    'TRADER_TYPE_SELLER'        =>  'Verkoper',
    'RETURN_FEEDBACK'           =>  'Geef feedback terug',
    'EDIT_THIS_FEEDBACK'        =>  'Pas feedback aan',
    'REPORT_THIS_FEEDBACK'      =>  'Meld deze feedback',
    'SEE_PRIVATE_COMMENT'       =>  'Bekijke privé commentaar',
    'NO_FEEDBACK_TO_DISPLAY'    =>  'Er is geen feedback om weer te geven.',
    'DELETE_FEEDBACK_Q'         =>  'Verwijder feedback?',
    'TRADER_RATING_STATISTICS'  =>  'Handelaar Waardering',
    'POSITIVE_FEEDBACK'         =>  'Positieve Feedback',
    'TOTAL_POSITIVE_FEEDBACK'   =>  'Totaal Positieve Feedback',
    'RECENT_RATINGS'            =>  'Recente Waarderingen',
    'PAST_MONTH'                  =>  'Past month',
    'PAST_6_MONTHS'                  =>  'Afgelopen 6 Maanden',
    'PAST_12_MONTHS'                 =>  'Afgelopen 12 Maanden',
    'X_FEEDBACK'                =>  'feedback',
    'X_FEEDBACKS'               =>  'feedbacks',
    'I_AM'                      =>  'Ik wil',
    'BUYING'                    =>  'Kopen',
    'SELLING'                   =>  'Verkopen',
    'TRADING'                   =>  'Ruilen',
    'BUY'                       =>  'Kopen',
    'SELL'                      =>  'Verkopen',
    'TRADE'                     =>  'Ruilen',
    'FEEDBACK_PAGE'             =>  'Feedback Pagina',
    'ENABLE_TRADER'             =>  'Trader Inschakelen',
    'ENABLE_TRADER_DESC'        =>  'Specificeer welke typen Trader topics in dit forum ingeschakeld zijn.',
    'TRADER_FEEDBACK'           =>  'Handelaar Feedback',
    'TRADER_FEEDBACK_FOR'       =>  'Handelaar Feedback voor',
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
