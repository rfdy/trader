<?php
/**
*
* Trader extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (http://www.forumsfaciles.fr) & by Galixte (http://www.galixte.com)
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
	'ACL_A_TRADER'			=> 'Peut gérer les avis.',
	'ACL_CAT_TRADER'			=> 'Trader',
	'ACL_M_TRADER_EDIT'			=> 'Peut modifier et supprimer un avis.',
	'ACL_U_TRADER_POST'			=> 'Peut laisser des avis aux traders.',
	'ACL_U_TRADER_VIEW'			=> 'Peut afficher les avis des traders.',
	'ALL_FEEDBACK_RECEIVED'			=> 'Tous les avis reçus',
	'ALREADY_GIVEN_FEEDBACK'			=> 'Vous avez déjà donné un avis à cet utilisateur concernant ce sujet.',
	'BUY'			=> 'Acheter',
	'BUYING'			=> 'acheter',
	'CANNOT_RATE_SELF'			=> 'Vous ne pouvez pas vous donner un avis à vous-même',
	'COMMENTS_TITLE'			=> 'Commentaires',
	'COMMENTS_TITLE_EDIT'			=> 'Modifier les commentaires',
	'DELETE_FEEDBACK_Q'			=> 'Supprimer l’avis ?',
	'EDIT_HISTORY'			=> 'Historique des modifications',
	'EDIT_THIS_FEEDBACK'			=> 'Modifier cet avis',
	'ENABLE_TRADER'			=> 'Activer la fonctionnalité Trader',
	'ENABLE_TRADER_DESC'			=> 'Vous pouvez préciser le cas échéant quels types de sujets Trader vous souhaitez activer.',
	'EXPLANATION_PLACEHOLDER'			=> 'Saisir un explication…',
	'E_CANNOT_EDIT'			=> 'Vous ne pouvez pas modifier cet avis',
	'E_CANNOT_LEAVE_FEEDBACK'			=> 'Vous ne pouvez pas laisser un avis - vous manquez d’autorisations.',
	'E_CANNOT_RETURN_FEEDBACK'			=> 'Vous ne pouvez pas retourner un avis à cette personne',
	'E_CANNOT_VIEW_FEEDBACK'			=> 'Vous ne pouvez pas voir cet avis - vous manquez d’autorisations',
	'E_FEEDBACK_DELETED'			=> 'Avis supprimé avec succès !',
	'E_FEEDBACK_NOT_FOUND'			=> 'Avis non trouvé',
	'E_SUCCESSFUL_EDIT'			=> 'Avis modifié avec succès !',
	'FEEDBACK_BY_AUTHOR'			=> 'par',
	'FEEDBACK_DELETED'			=> 'SUPPRIME',
	'FEEDBACK_PAGE'			=> 'Page du profil trader de',
	'FEEDBACK_ROLE'			=> 'Vous étiez le',
	'FEEDBACK_SUCCESS'			=> 'Utilisateur évalué avec succès !',
	'FEEDBACK_TITLE'			=> 'Donner un avis pour ',
	'FEEDBACK_TITLE_EDIT'			=> 'Modifier l’avis pour ',
	'FEEDBACK_TO'			=> 'à',
	'FEEDBACK_TYPE'			=> 'Type',
	'FEEDBACK_WAS_DELETED'		=>  'Cet avis a été supprimé',
	'FOR_SALE'			=> 'Vends',
	'FROM_TRADER'			=> 'De',
	'GIVE_FEEDBACK'			=> 'Donner un avis',
	'GO_TO_TOPIC'			=> 'Voir le sujet',
	'I_AM'			=> 'Je veux',
	'LEFT_FOR_OTHERS'			=> 'Laissés aux autres',
	'LOG_IN'			=> 'Veuillez vous connecter pour donner un avis',
	'LOG_TRADER_REPORT_CLOSED'			=> '<strong>Rapport de trader fermé</strong><br />',
	'LOG_TRADER_REPORT_DELETED'			=> '<strong>Rapport de trader supprimé</strong><br />',
	'LONG_COMMENT'			=> 'Commentaire privé :<br>(visible uniquement par l’acheteur, le vendeur et l’équipe du forum)',
	'MEMBERS_WHO_LEFT_NEGATIVE'			=> 'Utilisateurs ayant laissé un avis négatif',
	'MEMBERS_WHO_LEFT_POSITIVE'			=> 'Utilisateurs ayant laissé un avis positif',
	'NEGATIVE'			=> 'Négatif(s)',
	'NEUTRAL'			=> 'Neutre(s)',
	'NO_FEEDBACK_TO_DISPLAY'			=> 'Il n’y a aucun avis à afficher.',
	'ORIGINAL_COMMENT'			=> 'Commentaire d’origine',
	'PAST_12_MONTHS'			=> '12 derniers mois',
	'PAST_6_MONTHS'			=> '6 derniers mois',
	'PAST_MONTH'			=> 'Dernier mois',
	'POSITIVE'			=> 'Positif(s)',
	'POSITIVE_FEEDBACK'			=> 'Avis positif(s)',
	'PRIVATE_COMMENT'			=> 'Commentaire privé',
	'RATED'			=> 'Noté',
	'RATING_SUMMARY'			=> 'Résumé de la note',
	'REASON'			=> 'Raison',
	'RECEIVED_FROM_BUYERS'			=> 'Des acheteurs',
	'RECEIVED_FROM_SELLERS'			=> 'Des vendeurs',
	'RECEIVED_FROM_TRADES'			=> 'Des traders',
	'RECENT_RATINGS'			=> 'Notes récentes',
	'RECIPIENT'			=> 'Adressé à',
	'REPORT_CLOSED_DESC'			=> 'Voici la liste de tous les rapports d’avis de traders qui ont été résolus.',
	'REPORT_CLOSED_TITLE'			=> 'Rapports des traders fermés',
	'REPORT_DESC'			=> 'Veuillez fournir une explication pour rapporter cet avis.',
	'REPORT_DETAILS_TITLE'			=> 'Détails des rapports des traders',
	'REPORT_OPEN_DESC'			=> 'Voici la liste de tous les rapports d’avis de traders qui sont encore à traiter.',
	'REPORT_OPEN_TITLE'			=> 'Rapports des traders ouverts',
	'REPORT_SUCCESS'			=> 'Cet avis a été rapporté avec succès !',
	'REPORT_THIS_FEEDBACK'			=> 'Rapporter cet avis',
	'REPORT_TITLE'			=> 'Rapporter cet avis',
	'REQUIRED_CHARACTERS'			=> '* Nombre de caractères requis entre 10 et 200.',
	'REQUIRED_INTENTION_TO'			=> '* Veuillez indiquer si votre intention est d’acheter, vendre ou échanger.',
	'RETURN_FEEDBACK'			=> 'Retourner un avis',
	'SEE_PRIVATE_COMMENT'			=> 'Voir le commentaire privé',
	'SELL'			=> 'Vendre',
	'SELLING'			=> 'vendre',
	'SHORT_COMMENT'			=> 'Résumé :<br>(visible par tous - 10 caractères minimum)' ,
	'SUMMARY'			=> 'Résumé',
	'TOPIC_NOT_FOUND'			=> 'Ce sujet n’existe pas.',
	'TOPIC_PREFIX_FOR_SALE'			=> '[VDS]',
	'TOPIC_PREFIX_WANT_TO_BUY'			=> '[ACH]',
	'TOPIC_PREFIX_WANT_TO_TRADE'			=> '[ECH]',
	'TOTAL_POSITIVE_FEEDBACK'			=> 'Total des avis positifs',
	'TO_BUY'			=> 'Achète',
	'TO_TRADE'			=> 'Échange',
	'TRADE'			=> 'Échanger',
	'TRADER_EXPERIENCE'			=> 'Avis global',
	'TRADER_FEEDBACK'			=> 'Profil trader',
	'TRADER_FEEDBACK_FOR'			=> 'Profil trader de',
	'TRADER_RATING_STATISTICS'			=> 'Statistiques du trader',
	'TRADER_SCORE'			=> 'Score du trader',
	'TRADER_TYPE_BUYER'			=> 'Acheteur',
	'TRADER_TYPE_SELLER'			=> 'Vendeur',
	'TRADER_TYPE_TRADER'			=> 'Trader',
	'TRADER_VIEW_FEEDBACK'			=> 'Voir les avis du trader',
	'TRADING'			=> 'échanger',
	'USER_NOT_FOUND'			=> 'L’utilisateur que vous essayez d’évaluer est introuvable',
	'VIEW_PROFILE'			=> 'Voir le profil trader de l’utilisateur',
	'X_FEEDBACK'			=> 'avis',
	'X_FEEDBACKS'			=> 'avis',
));
