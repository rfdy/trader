<?php
/**
*
* @package phpBB Extension - Trader [French]
* French translation by ForumsFaciles (http://www.forumsfaciles.fr) & by Galixte (http://www.galixte.com)
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
    'ALREADY_GIVEN_FEEDBACK'    =>  'Vous avez déjà donné un avis à cet utilisateur concernant ce sujet.',
    'ACL_CAT_TRADER'            =>  'Trader',
    'ACL_A_TRADER'              =>  'Peut gérer les avis.',
    'ACL_M_TRADER_EDIT'         =>  'Peut modifier et supprimer un avis.',
    'ACL_U_TRADER_VIEW'         =>  'Peut afficher les avis des traders.',
    'ACL_U_TRADER_POST'         =>  'Peut laisser des avis aux traders.',
    'TOPIC_NOT_FOUND'           =>  'Ce sujet n’existe pas.',
    'LOG_IN'                    =>  'Veuillez vous connecter pour donner un avis',
    'USER_NOT_FOUND'            =>  'L’utilisateur que vous essayez d’évaluer est introuvable',
    'CANNOT_RATE_SELF'          =>  'Vous ne pouvez pas vous donner un avis à vous-même',
    'E_FEEDBACK_NOT_FOUND'      =>  'Avis non trouvé',
    'E_FEEDBACK_DELETED'        =>  'Avis supprimé avec succès !',
    'E_CANNOT_EDIT'             =>  'Vous ne pouvez pas modifier cet avis',
    'E_SUCCESSFUL_EDIT'         =>  'Avis modifié avec succès !',
    'E_CANNOT_RETURN_FEEDBACK'  =>  'Vous ne pouvez pas retourner un avis à cette personne',
    'E_CANNOT_LEAVE_FEEDBACK'   =>  'Vous ne pouvez pas laisser un avis - vous manquez d’autorisations.',
    'E_CANNOT_VIEW_FEEDBACK'    =>  'Vous ne pouvez pas voir cet avis - vous manquez d’autorisations',
    'FEEDBACK_SUCCESS'          =>  'Utilisateur évalué avec succès !',
    'FEEDBACK_TITLE'            =>  'Donner un avis pour ',
    'FEEDBACK_TITLE_EDIT'       =>  'Modifier l’avis pour ',
    'FEEDBACK_ROLE'             =>  'Vous étiez le',
    'TRADER_EXPERIENCE'         =>  'Avis global',
    'TRADER_VIEW_FEEDBACK'      =>  'Voir les avis du trader',
    'COMMENTS_TITLE'            =>  'Commentaires',
    'COMMENTS_TITLE_EDIT'       =>  'Modifier les commentaires',
    'SHORT_COMMENT'             =>  'Résumé :<br>(visible par tous - 10 caractères minimum)' ,
    'LONG_COMMENT'              =>  'Commentaire privé :<br>(visible uniquement par l’acheteur, le vendeur et l’équipe du forum)',
    'REASON'                    =>  'Raison',
    'REPORT_DESC'               =>  'Veuillez fournir une explication pour rapporter cet avis.',
    'REPORT_TITLE'              =>  'Rapporter cet avis',
    'REPORT_SUCCESS'            =>  'Cet avis a été rapporté avec succès !',
    'REPORT_OPEN_TITLE'         =>  'Rapports des traders ouverts',
    'REPORT_CLOSED_TITLE'       =>  'Rapports des traders fermés',
    'REPORT_OPEN_DESC'          =>  'Voici la liste de tous les rapports d’avis de traders qui sont encore à traiter.',
    'REPORT_CLOSED_DESC'        =>  'Voici la liste de tous les rapports d’avis de traders qui ont été résolus.',
    'REPORT_DETAILS_TITLE'         =>  'Détails des rapports des traders',
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Rapport de trader supprimé</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Rapport de trader fermé</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Commentaire d’origine',
    'SUMMARY'                   =>  'Résumé',
    'PRIVATE_COMMENT'           =>  'Commentaire privé',
    'TOPIC_PREFIX_FOR_SALE'     =>  '[VDS]',
    'TOPIC_PREFIX_WANT_TO_BUY'  =>  '[ACH]',
    'TOPIC_PREFIX_WANT_TO_TRADE'=>  '[ECH]',
    'TRADER_SCORE'  			=>  'Score du trader',
    'POSITIVE'    				=>  'Positif(s)',
    'GIVE_FEEDBACK'    			=>  'Donner un avis',
    'RATED'    					=>  'Noté',
    'FEEDBACK_BY_AUTHOR'    	=>  'par',
    'FEEDBACK_TO'    			=>  'à',
    'EXPLANATION_PLACEHOLDER'	=>	'Saisir un explication...',
    'NEGATIVE'					=>	'Négatif(s)',
    'NEUTRAL'					=>  'Neutre(s)',
    'ALL_FEEDBACK_RECEIVED'		=>	'Tous les avis reçus',
    'RECEIVED_FROM_BUYERS'	    =>	'Des acheteurs',
    'RECEIVED_FROM_SELLERS'	    =>	'Des vendeurs',
    'RECEIVED_FROM_TRADES'	    =>	'Des traders',
    'LEFT_FOR_OTHERS'			=>	'Laissés aux autres',
    'RATING_SUMMARY'			=>	'Résumé de la note',
    'FEEDBACK_TYPE'             =>  'Type',
    'FEEDBACK_DELETED'          =>  'SUPPRIME',
    'FEEDBACK_WAS_DELETED'		=>  'Cet avis a été supprimé',
    'TRADER_TYPE_TRADER'        =>  'Trader',
    'TRADER_TYPE_BUYER'         =>  'Acheteur',
    'TRADER_TYPE_SELLER'        =>  'Vendeur',
    'RETURN_FEEDBACK'			=>  'Retourner un avis',
    'EDIT_THIS_FEEDBACK'		=>  'Modifier cet avis',
    'REPORT_THIS_FEEDBACK'		=>  'Rapporter cet avis',
    'SEE_PRIVATE_COMMENT'       =>  'Voir le commentaire privé',
    'NO_FEEDBACK_TO_DISPLAY'    =>  'Il n’y a aucun avis à afficher.',
    'DELETE_FEEDBACK_Q'         =>  'Supprimer l’avis ?',
    'TRADER_RATING_STATISTICS'  =>  'Statistiques du trader',
    'POSITIVE_FEEDBACK'         =>  'Avis positif(s)',
    'TOTAL_POSITIVE_FEEDBACK'   =>  'Total des avis positifs',
    'RECENT_RATINGS'            =>  'Notes récentes',
    'PAST_MONTH'                  =>  'Dernier mois',
    'PAST_6_MONTHS'                  =>  '6 derniers mois',
    'PAST_12_MONTHS'                 =>  '12 derniers mois',
    'X_FEEDBACK'                =>  'avis',
    'X_FEEDBACKS'               =>  'avis',
    'I_AM'                      =>  'Je veux',
    'BUYING'                    =>  'acheter',
    'SELLING'                   =>  'vendre',
    'TRADING'                   =>  'échanger',
    'BUY'                       =>  'Acheter',
    'SELL'                      =>  'Vendre',
    'TRADE'                     =>  'Échanger',
    'FEEDBACK_PAGE'             =>  'Page du profil trader de',
    'ENABLE_TRADER'             =>  'Activer la fonctionnalité Trader',
    'ENABLE_TRADER_DESC'        =>  'Vous pouvez préciser le cas échéant quels types de sujets Trader vous souhaitez activer.',
    'TRADER_FEEDBACK'           =>  'Profil trader',
    'TRADER_FEEDBACK_FOR'       =>  'Profil trader de',
    'TO_BUY'                    =>  'Achète',
    'FOR_SALE'                  =>  'Vends',
    'TO_TRADE'                  =>  'Échange',
    'GO_TO_TOPIC'               =>  'Voir le sujet',
    'VIEW_PROFILE'				=> 'Voir le profil trader de l’utilisateur',
    'EDIT_HISTORY'				=> 'Historique des modifications',
    'MEMBERS_WHO_LEFT_POSITIVE'	=> 'Utilisateurs ayant laissé un avis positif',
    'MEMBERS_WHO_LEFT_NEGATIVE'	=> 'Utilisateurs ayant laissé un avis négatif',
    'RECIPIENT'				    => 'Adressé à',
    'REQUIRED_CHARACTERS'		=> '* Nombre de caractères requis entre 10 et 200.',
    'REQUIRED_INTENTION_TO'		=> '* Veuillez indiquer si votre intention est d’acheter, vendre ou échanger.',
    'FROM_TRADER'		=> 'De',
));
