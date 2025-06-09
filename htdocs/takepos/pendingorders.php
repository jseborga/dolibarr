<?php
require '../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/commande/class/commande.class.php';
require_once DOL_DOCUMENT_ROOT.'/societe/class/societe.class.php';

$langs->loadLangs(array('cashdesk','orders'));

llxHeader('', $langs->trans('PendingOrders'));

print '<h3>'.$langs->trans('PendingOrders').'</h3>';

$sql = "SELECT rowid, ref, total_ttc, fk_soc, date_creation FROM ".MAIN_DB_PREFIX."commande WHERE module_source='web' AND fk_statut IN (".Commande::STATUS_DRAFT.",".Commande::STATUS_VALIDATED.") ORDER BY date_creation DESC";
$resql = $db->query($sql);
if ($resql) {
    print '<table class="noborder centpercent">';
    print '<tr class="liste_titre"><th>'.$langs->trans('Ref').'</th><th>'.$langs->trans('Customer').'</th><th>'.$langs->trans('Date').'</th><th class="right">'.$langs->trans('AmountTTC').'</th></tr>';
    while ($obj = $db->fetch_object($resql)) {
        $soc = new Societe($db);
        $soc->fetch($obj->fk_soc);
        print '<tr class="oddeven"><td>'.$obj->ref.'</td><td>'.dol_escape_htmltag($soc->name).'</td><td>'.dol_print_date($db->jdate($obj->date_creation), 'day').'</td><td class="right">'.price($obj->total_ttc).'</td></tr>';
    }
    print '</table>';
} else {
    dol_print_error($db);
}

llxFooter();
$db->close();
