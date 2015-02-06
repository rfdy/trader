<?php
/**
*
* @package phpBB Extension - Acme Demo
* Swedish translation by Holger (http://www.maskinisten.net)
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
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Raderade handlar-rapport</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Stängde handlar-rapport</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Originalkommentar',
    'SUMMARY'                   =>  'Sammanfattning',
    'PRIVATE_COMMENT'           =>  'Privat kommentar',
));
