<?php
/**
 *
 * @package phpBB Extension - Trader
 * @copyright (c) 2015 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 * French translation by ForumsFaciles (http://www.forumsfaciles.fr) & by Galixte (http://www.galixte.com)
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
    'ALREADY_GIVEN_FEEDBACK'    =>  'Vous avez déjà donné un avis à cet utilisateur concernant ce sujet.',
    'ACL_CAT_TRADER'            =>  'Marchand',
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
    'E_SUCCESSFUL_EDIT'         =>  'Avis modifié avec succès',
    'E_CANNOT_RETURN_FEEDBACK'  =>  'Vous ne pouvez pas retourner un avis à cette personne',
    'E_CANNOT_LEAVE_FEEDBACK'   =>  'Vous ne pouvez pas laisser un avis - vous manquez d’autorisations.',
    'E_CANNOT_VIEW_FEEDBACK'    =>  'Vous ne pouvez pas voir cet avis - vous manquez d’autorisations',
    'FEEDBACK_SUCCESS'          =>  'Utilisateur évalué avec succès !',
    'FEEDBACK_TITLE'            =>  'Valider l’avis pour ',
    'FEEDBACK_TITLE_EDIT'       =>  'Modifier l’avis pour ',
    'FEEDBACK_ROLE'             =>  'Vous étiez le',
    'TRADER_EXPERIENCE'         =>  'Expérience générale',
    'TRADER_VIEW_FEEDBACK'      =>  'Voir l’avis du trader',
    'COMMENTS_TITLE'            =>  'Commentaires supplémentaires',
    'COMMENTS_TITLE_EDIT'       =>  'Modifier les commentaires',
    'SHORT_COMMENT'             =>  'Un court commentaire : (visible par tous) <br> (10 caractères minimum)' ,
    'LONG_COMMENT'              =>  'Commentaires supplémentaires : (visible de l’acheteur, du vendeur et de l’équipe seulement)',
    'REASON'                    =>  'Raison',
    'REPORT_DESC'               =>  'Veuillez fournir une explication pour rapporter cet avis',
    'REPORT_TITLE'              =>  'Rapporter cet avis',
    'REPORT_SUCCESS'            =>  'Cet avis a été rapporté avec succès.',
    'REPORT_OPEN_TITLE'         =>  'Rapport du trader ouvert',
    'REPORT_CLOSED_TITLE'       =>  'Rapport du trader fermé',
    'REPORT_OPEN_DESC'          =>  'Voici la liste de tous les rapports d’avis de traders qui sont encore à traiter.',
    'REPORT_CLOSED_DESC'        =>  'Voici la liste de tous les rapports d’avis de traders qui ont été résolus.',
    'LOG_TRADER_REPORT_DELETED' =>  '<strong>Rapport de trader supprimé</strong><br />',
    'LOG_TRADER_REPORT_CLOSED'  =>  '<strong>Rapport de trader fermé</strong><br />',
    'ORIGINAL_COMMENT'          =>  'Comment originel',
    'SUMMARY'                   =>  'Résumé',
    'PRIVATE_COMMENT'           =>  'Commentaire privé',
    'TOPIC_PREFIX_FOR_SALE'     =>  '[VDS]',
    'TOPIC_PREFIX_WANT_TO_BUY'  =>  '[ACH]',
    'TOPIC_PREFIX_WANT_TO_TRADE'=>  '[ECH]',
    'TRADER_SCORE'  			=>  'Score du trader',
    'POSITIVE'    				=>  'Positif',
    'GIVE_FEEDBACK'    			=>  'Donner un avis',
    'RATED'    					=>  'Noté',
    'FEEDBACK_BY_AUTHOR'    	=>  'par',
    'FEEDBACK_TO'    			=>  'à',
    'EXPLANATION_PLACEHOLDER'	=>	'Saisir un explication...',
    'NEGATIVE'					=>	'Négatif',
    'NEUTRAL'					=>  'Neutre',
    'ALL_FEEDBACK_RECEIVED'		=>	'Tous les avis reçus',
    'RECEIVED_FROM_BUYERS'	    =>	'Des acheteurs',
    'RECEIVED_FROM_SELLERS'	    =>	'Des vendeurs',
    'RECEIVED_FROM_TRADES'	    =>	'Des traders',
    'LEFT_FOR_OTHERS'			=>	'Laissés par les autres',
    'RATING_SUMMARY'			=>	'Résumé des notes',
    'FEEDBACK_TYPE'             =>  'Type',
    'FEEDBACK_DELETED'          =>  'SUPPRIME',
    'FEEDBACK_WAS_DELETED'		=>  'Cet avis a été supprimé',
    'TRADER_TYPE_TRADER'        =>  'Trader',
    'TRADER_TYPE_BUYER'         =>  'Acheteur',
    'TRADER_TYPE_SELLER'        =>  'Vendeur',
    'RETURN_FEEDBACK'			=>  'Retourner un avis',
    'EDIT_THIS_FEEDBACK'		=>  'Modifier cet avis',
    'REPORT_THIS_FEEDBACK'		=>  'Reporter cet avis',
    'SEE_PRIVATE_COMMENT'       =>  'Voir le commentaire privé',
    'NO_FEEDBACK_TO_DISPLAY'    =>  'Il n’y a aucun avis à afficher.',
    'DELETE_FEEDBACK_Q'         =>  'Supprimer l’avis ?',
    'TRADER_RATING_STATISTICS'  =>  'Statistiques du trader',
    'POSITIVE_FEEDBACK'         =>  'Avis positif',
    'TOTAL_POSITIVE_FEEDBACK'   =>  'Total des avis positifs',
    'RECENT_RATINGS'            =>  'Notes récentes',
    'PAST'                      =>  'Passé',
    '6_MONTHS'                  =>  '6 Mois',
    '12_MONTHS'                 =>  '12 Mois',
    'X_FEEDBACK'                =>  'avis',
    'X_FEEDBACKS'               =>  'avis',
    'I_AM'                      =>  'Je veux',
    'BUYING'                    =>  'acheter',
    'SELLING'                   =>  'vendre',
    'TRADING'                   =>  'échanger',
    'BUY'                       =>  'Acheter',
    'SELL'                      =>  'Vendre',
    'TRADE'                     =>  'Échanger',
    'FEEDBACK_PAGE'             =>  'Pas d’avis',
    'ENABLE_TRADER'             =>  'Activer Trader',
    'ENABLE_TRADER_DESC'        =>  'Spécifiez quels sujets trader sont activés, le cas échéant.',
    'TRADER_FEEDBACK'           =>  'Avis de trader',
    'TRADER_FEEDBACK_FOR'       =>  'Avis de trader pour',
));
