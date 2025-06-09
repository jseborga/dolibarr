<?php
require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once '../lib/pettycash.lib.php';

if (!$user->admin) accessforbidden();

$langs->loadLangs(array('admin','pettycash@pettycash'));

$action = GETPOST('action','alpha');
if ($action == 'update') {
    dolibarr_set_const($db,'PETTYCASH_DEFAULT_ACCOUNT',GETPOST('PETTYCASH_DEFAULT_ACCOUNT','int'),'chaine',0,'',$conf->entity);
    dolibarr_set_const($db,'PETTYCASH_DOC_PATH',GETPOST('PETTYCASH_DOC_PATH','alpha'),'chaine',0,'',$conf->entity);
    setEventMessage($langs->trans('SetupSaved'), 'mesgs');
}

$page_name='pettycash_setup';
llxHeader('', $langs->trans('PettyCashSetup'));
$form=new Form($db);
print load_fiche_titre($langs->trans('PettyCashSetup'), '', 'setup');

print '<form method="post">';
print '<input type="hidden" name="action" value="update">';
print '<table class="noborder">';
print '<tr class="liste_titre"><td>'.$langs->trans('Parameter').'</td><td>'.$langs->trans('Value').'</td></tr>';
print '<tr><td>'.$langs->trans('InitialAccount').'</td><td>'; 
print $form->select_comptes(GETPOST('PETTYCASH_DEFAULT_ACCOUNT',$conf->global->PETTYCASH_DEFAULT_ACCOUNT),'PETTYCASH_DEFAULT_ACCOUNT',2);
print '</td></tr>';
print '<tr><td>'.$langs->trans('DocumentPath').'</td><td>'; 
print '<input type="text" name="PETTYCASH_DOC_PATH" value="'.dol_escape_htmltag($conf->global->PETTYCASH_DOC_PATH).'" class="minwidth300">';
print '</td></tr>';
print '</table>';
print $form->buttonsSaveCancel();
print '</form>';

llxFooter();
$db->close();
