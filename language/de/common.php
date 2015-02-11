<?php
/**
*
* @package phpBB Extension - Trader
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
    'ALREADY_GIVEN_FEEDBACK'    =>  'Du hast diesen User bereits für diesen Thread bewertet.',
    'ACL_CAT_TRADER'            =>  'Trader',
    'ACL_A_TRADER'              =>  'Kann Bewertungen managen',
    'ACL_M_FEEDBACK_EDIT'       =>  'Kann Bewertungen bearbeiten und löschen',
    'TOPIC_NOT_FOUND'           =>  'Dieses Thema existiert nicht.',
    'LOG_IN'                    =>  'Du musst dich einloggen, um eine Bewertung abzugeben.',
    'USER_NOT_FOUND'            =>  'Der User, den du versuchst zu bewerten, kann nicht gefunden werden',
    'CANNOT_RATE_SELF'          =>  'Du kannst dich nicht selbst bewerten',
    'E_FEEDBACK_NOT_FOUND'      =>  'Bewertung nicht gefunden',
    'E_FEEDBACK_DELETED'        =>  'Bewertung erfolgreich gelöscht!',
    'E_CANNOT_EDIT'             =>  'Du kannst die Bewertung nicht bearbeiten',
    'E_SUCCESSFUL_EDIT'         =>  'Bewertung erfolgreich bearbeitet',
    'E_CANNOT_RETURN_FEEDBACK'  =>  'Du kannst diesem User kein Feedback zurückgeben',
    'FEEDBACK_SUCCESS'          =>  'User erfolgreich bewertet!',
    'FEEDBACK_TITLE'            =>  'Bewertung für ',
    'FEEDBACK_TITLE_EDIT'       =>  'Bearbeite die Bewertung für ',
    'FEEDBACK_ROLE'             =>  'Du warst der',
    'TRADER_EXPERIENCE'         =>  'Gesamte Erfahrung',
    'COMMENTS_TITLE'            =>  'Weitere Kommentare',
    'COMMENTS_TITLE_EDIT'       =>  'Kommentare bearbeiten',
    'SHORT_COMMENT'             =>  'Ein kurzer Kommentar: (für alle sichtbar) <br> (Minimum 10 Zeichen)' ,
    'LONG_COMMENT'              =>  'Weitere Kommentare: (sichtbar für Käufer, Verkäufer und die Belegschaft)',
));
