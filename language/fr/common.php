<?php
/**
 *
 * @package phpBB Extension - Acme Demo
 * @copyright (c) 2013 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 * French translation by ForumsFaciles (http://www.forumsfaciles.fr)
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
    'ACL_A_TRADER'              =>  'Peut gérer les avis',
    'ACL_M_FEEDBACK_EDIT'       =>  'Peut modifier et supprimer un avis',
    'TOPIC_NOT_FOUND'           =>  'Ce sujet n’existe pas.',
    'LOG_IN'                    =>  'Veuillez vous connecter pour donner un avis',
    'USER_NOT_FOUND'            =>  'L’utilisateur que vous essayez d’évaluer est introuvable',
    'CANNOT_RATE_SELF'          =>  'Vous ne pouvez pas vous donner un avis à vous-même',
    'E_FEEDBACK_NOT_FOUND'      =>  'Avis non trouvé',
    'E_FEEDBACK_DELETED'        =>  'Avis supprimé avec succès!',
    'E_CANNOT_EDIT'             =>  'Vous ne pouvez pas modifier cet avis',
    'E_SUCCESSFUL_EDIT'         =>  'Avis modifié avec succès',
    'FEEDBACK_SUCCESS'          =>  'Utilisateur évalué avec succès!',
    'FEEDBACK_TITLE'            =>  'Valider l’avis pour ',
    'FEEDBACK_TITLE_EDIT'       =>  'Modifier l’avis pour ',
    'FEEDBACK_ROLE'             =>  'Vous étiez le',
    'TRADER_EXPERIENCE'         =>  'Expérience générale',
    'COMMENTS_TITLE'            =>  'Commentaires supplémentaires',
    'COMMENTS_TITLE_EDIT'       =>  'Modifier les commentaires',
    'SHORT_COMMENT'             =>  'Un court commentaire: (visible par tous) <br> (10 caractères minimum)' ,
    'LONG_COMMENT'              =>  'Commentaires supplémentaires: (visible de l’acheteur, du vendeur et de l’équipe seulement)',
));
