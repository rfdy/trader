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
	'ACL_A_TRADER'			=> 'Možeš upravljati povratnim odgovorima',
	'ACL_CAT_TRADER'			=> 'Trgovac',
	'ACL_M_TRADER_EDIT'			=> 'Možeš urediti ili obrisati povratne odgovore',
	'ACL_U_TRADER_POST'			=> 'Možeš ostaviti povratni odgovor trgovcu',
	'ACL_U_TRADER_VIEW'			=> 'Možeš vidjeti povratni odgovor trgovcu',
	'ALL_FEEDBACK_RECEIVED'			=> 'Svi primljeni povratni odgovori',
	'ALREADY_GIVEN_FEEDBACK'			=> 'Vec si dao povratni odgovor ovom korisniku u ovoj temi.',
	'BUY'			=> 'Kupnja',
	'BUYING'			=> 'Kupujem',
	'CANNOT_RATE_SELF'			=> 'Ne možeš sam sebi dati povratni odgovor',
	'COMMENTS_TITLE'			=> 'Dodatni komentari',
	'COMMENTS_TITLE_EDIT'			=> 'Uredi komentare',
	'DELETE_FEEDBACK_Q'			=> 'Obrisati povratni odgovor?',
	'EDIT_HISTORY'			=> 'Edit History',
	'EDIT_THIS_FEEDBACK'			=> 'Uredi ovaj povratni odgovor',
	'ENABLE_TRADER'			=> 'Omoguci trgovinu',
	'ENABLE_TRADER_DESC'			=> 'Ako ih ima, odredi koje su trgovacke teme ukljucene.',
	'EXPLANATION_PLACEHOLDER'			=> 'Unesi objašnjenje...',
	'E_CANNOT_EDIT'			=> 'Ne možeš urediti povratni odgovor',
	'E_CANNOT_LEAVE_FEEDBACK'			=> 'Ne možeš ostaviti povratni odgovor - nedostaju ti potrebne dozvole.',
	'E_CANNOT_RETURN_FEEDBACK'			=> 'Ne možeš uzvratiti povratni odgovor ovoj osobi',
	'E_CANNOT_VIEW_FEEDBACK'			=> 'Ne možeš vidjeti povratni odgovor - nedostaju ti potrebne dozvole.',
	'E_FEEDBACK_DELETED'			=> 'Uspješno je obrisan povratni odgovor!',
	'E_FEEDBACK_NOT_FOUND'			=> 'Povratni odgovor nije pronaden',
	'E_SUCCESSFUL_EDIT'			=> 'Uspješno je ureden povratni odgovor',
	'FEEDBACK_BY_AUTHOR'			=> 'od',
	'FEEDBACK_DELETED'			=> 'OBRISANO',
	'FEEDBACK_PAGE'			=> 'Stranica povratnih odgovora',
	'FEEDBACK_ROLE'			=> 'Bio si',
	'FEEDBACK_SUCCESS'			=> 'Korisnik je uspješno ocijenjen!',
	'FEEDBACK_TITLE'			=> 'Ostavi povratni odgovor za ',
	'FEEDBACK_TITLE_EDIT'			=> 'Uredi povratni odgovor za ',
	'FEEDBACK_TO'			=> 'za',
	'FEEDBACK_TYPE'			=> 'Tip',
	'FEEDBACK_WAS_DELETED'			=> 'Ovaj je povratni odgovor obrisan',
	'FOR_SALE'			=> 'For sale',
	'FROM_TRADER'			=> 'From',
	'GIVE_FEEDBACK'			=> 'Predaj povratni odgovor',
	'GO_TO_TOPIC'			=> 'Go to topic',
	'I_AM'			=> 'Ja',
	'LEFT_FOR_OTHERS'			=> 'Ostavljeno za ostalo',
	'LOG_IN'			=> 'Prijavi se na forum kako bi ostavio povratni odgovor',
	'LOG_TRADER_REPORT_CLOSED'			=> '<strong>Zatvorena prijava trgovca</strong><br />',
	'LOG_TRADER_REPORT_DELETED'			=> '<strong>Obrisana prijava trgovca</strong><br />',
	'LONG_COMMENT'			=> 'Dodatni komentari: (Vidljivi samo kupcu, prodavatelju i osoblju foruma)',
	'MEMBERS_WHO_LEFT_NEGATIVE'			=> 'Members who left negative',
	'MEMBERS_WHO_LEFT_POSITIVE'			=> 'Members who left positive',
	'NEGATIVE'			=> 'Negativno',
	'NEUTRAL'			=> 'Neutralno',
	'NO_FEEDBACK_TO_DISPLAY'			=> 'Nema povratnih odgvoora za prikazati.',
	'ORIGINAL_COMMENT'			=> 'Prvotni komentar',
	'PAST_12_MONTHS'			=> 'Zadnjih 12 mjeseci',
	'PAST_6_MONTHS'			=> 'Zadnjih 6 mjeseci',
	'PAST_MONTH'			=> 'Zadnjih',
	'POSITIVE'			=> 'Pozitivno',
	'POSITIVE_FEEDBACK'			=> 'Pozitivni povratni odgovor',
	'PRIVATE_COMMENT'			=> 'Privatni komentar',
	'RATED'			=> 'Ocijenjen',
	'RATING_SUMMARY'			=>	'Ukupna ocjena',
	'REASON'			=> 'Razlog',
	'RECEIVED_FROM_BUYERS'			=> 'Od kupaca',
	'RECEIVED_FROM_SELLERS'			=> 'Od prodavatelja',
	'RECEIVED_FROM_TRADES'			=> 'Od zamjena',
	'RECENT_RATINGS'			=> 'Nedavne ocjene',
	'RECIPIENT'			=> 'Recipient',
	'REPORT_CLOSED_DESC'			=> 'Ovo je lista svih prijavljenih povratnih odgovora trgovca koji su razriješeni.',
	'REPORT_CLOSED_TITLE'			=> 'Zatvorene prijave trgovca',
	'REPORT_DESC'			=> 'Molimo te da objasniš razlog prijave ovog povratnog odgovora',
	'REPORT_DETAILS_TITLE'			=> 'Trader Report details',
	'REPORT_OPEN_DESC'			=> 'Ovo je lista svih prijavljenih povratnih odgovora trgovca koji cekaju na obradu.',
	'REPORT_OPEN_TITLE'			=> 'Otvorene prijave trgovca',
	'REPORT_SUCCESS'			=> 'Ovaj je povratni odgovor uspješno prijavljen.',
	'REPORT_THIS_FEEDBACK'			=> 'Prijavi ovaj povratni odgovor',
	'REPORT_TITLE'			=> 'Prijavi ovaj povratni odgovor',
	'REQUIRED_CHARACTERS'			=> '* Required 10-200 Characters',
	'REQUIRED_INTENTION_TO'			=> '* Please select whether your intention is to Buy, Sell or Trade.',
	'RETURN_FEEDBACK'			=> 'Vrati povratni odgovor',
	'SEE_PRIVATE_COMMENT'			=> 'Vidi privatne komentare',
	'SELL'			=> 'Prodaja',
	'SELLING'			=> 'Prodajem',
	'SHORT_COMMENT'			=> 'Kratki komentar: (Vidljiv svima) <br> (Najmanje 10 znakova)' ,
	'SUMMARY'			=> 'Kratki pregled',
	'TOPIC_NOT_FOUND'			=> 'Ova tema ne postoji.',
	'TOPIC_PREFIX_FOR_SALE'			=> '[PRODAJEM]',
	'TOPIC_PREFIX_WANT_TO_BUY'			=> '[KUPUJEM]',
	'TOPIC_PREFIX_WANT_TO_TRADE'			=> '[MIJENJAM]',
	'TOTAL_POSITIVE_FEEDBACK'			=> 'Svi pozitivni povratni odgovori',
	'TO_BUY'			=> 'Want to buy',
	'TO_TRADE'			=> 'Want to trade',
	'TRADE'			=> 'Zamjena',
	'TRADER_EXPERIENCE'			=> 'Ukupno iskustvo',
	'TRADER_FEEDBACK'			=> 'Povratni odgovor trgovca',
	'TRADER_FEEDBACK_FOR'			=> 'Povratni odgovor trgovca za ',
	'TRADER_RATING_STATISTICS'			=> 'Statistika ocjene trgovca',
	'TRADER_SCORE'			=> 'Ocjena trgovca',
	'TRADER_TYPE_BUYER'			=> 'Kupac',
	'TRADER_TYPE_SELLER'			=> 'Prodavatelj',
	'TRADER_TYPE_TRADER'			=> 'Zamjenitelj',
	'TRADER_VIEW_FEEDBACK'			=> 'Pogledaj povratni odgovor trgovca',
	'TRADING'			=> 'Mijenjam',
	'USER_NOT_FOUND'			=> 'Korisnik kojeg želiš ocijeniti ne postoji',
	'VIEW_TRADER_FEEDBACK_PROFILE'			=> 'View profile trader',
	'X_FEEDBACK'			=> 'povratni odgovor',
	'X_FEEDBACKS'			=> 'povratni odgovori',
));
