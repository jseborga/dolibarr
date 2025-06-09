<?php
/* Copyright (C) ---Replace with your own copyright and developer email---
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file    htdocs/modulebuilder/template/lib/pettycash.lib.php
 * \ingroup pettycash
 * \brief   Library files with common functions for MyModule
 */

/**
 * Prepare admin pages header
 *
 * @return array<array{string,string,string}>
 */
function pettycashAdminPrepareHead()
{
	global $langs, $conf;

	// global $db;
	// $extrafields = new ExtraFields($db);
	// $extrafields->fetch_name_optionals_label('pettycash');

	$langs->load("pettycash@pettycash");

	$h = 0;
	$head = array();

	$head[$h][0] = dol_buildpath("/pettycash/admin/pettycash.php", 1);
	$head[$h][1] = $langs->trans("Settings");
	$head[$h][2] = 'settings';
	$h++;

	/*
	$head[$h][0] = dol_buildpath("/pettycash/admin/pettycash_extrafields.php", 1);
	$head[$h][1] = $langs->trans("ExtraFields");
	$nbExtrafields = is_countable($extrafields->attributes['pettycash']['label']) ? count($extrafields->attributes['pettycash']['label']) : 0;
	if ($nbExtrafields > 0) {
		$head[$h][1] .= '<span class="badge marginleftonlyshort">' . $nbExtrafields . '</span>';
	}
	$head[$h][2] = 'pettycash_extrafields';
	$h++;

	$head[$h][0] = dol_buildpath("/pettycash/admin/pettycashline_extrafields.php", 1);
	$head[$h][1] = $langs->trans("ExtraFieldsLines");
	$nbExtrafields = is_countable($extrafields->attributes['pettycashline']['label']) ? count($extrafields->attributes['pettycash']['label']) : 0;
	if ($nbExtrafields > 0) {
		$head[$h][1] .= '<span class="badge marginleftonlyshort">' . $nbExtrafields . '</span>';
	}
	$head[$h][2] = 'pettycash_extrafieldsline';
	$h++;
	*/

	$head[$h][0] = dol_buildpath("/pettycash/admin/about.php", 1);
	$head[$h][1] = $langs->trans("About");
	$head[$h][2] = 'about';
	$h++;

	// Show more tabs from modules
	// Entries must be declared in modules descriptor with line
	//$this->tabs = array(
	//	'entity:+tabname:Title:@pettycash:/pettycash/mypage.php?id=__ID__'
	//); // to add new tab
	//$this->tabs = array(
	//	'entity:-tabname:Title:@pettycash:/pettycash/mypage.php?id=__ID__'
	//); // to remove a tab
	complete_head_from_modules($conf, $langs, null, $head, $h, 'pettycash@pettycash');

	complete_head_from_modules($conf, $langs, null, $head, $h, 'pettycash@pettycash', 'remove');

	return $head;
}
