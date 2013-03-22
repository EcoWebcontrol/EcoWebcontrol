<?php

/**
 * This file is part of the EcoWebcontrol project.
 * Copyright (c) 2003-2009 the SysCP Team (see authors).
 * Copyright (c) 2010 the Froxlor team (http://froxlor.org)
 * Copyright (c) 2013 the EcoWebcontrol Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://eco-webcontrol.com/files/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author	   SysCP team
 * @author     Froxlor team
 * @author     EcoWebcontrol team <team@eco-webcontrol.com> (2013)
 * @license    GPLv2 http://eco-webcontrol.com/files/COPYING.txt
 *
 */

/**
 * Function getPreConfig
 *
 * outputs various content before the update process
 * can be continued (askes for agreement whatever is being asked)
 *
 * @param string version
 *
 * @return string
 */
function getPreConfig($current_version)
{
	$has_preconfig = false;
	$return = '<div class="preconfig"><h3 style="color:#ff0000;">PLEASE NOTE - Important update notifications</h3>';

	include_once makeCorrectFile(dirname(__FILE__).'/preconfig/0.9/preconfig_0.9.inc.php');
	parseAndOutputPreconfig($has_preconfig, $return, $current_version);

	$return .= '<br /><br />'.makecheckbox('update_changesagreed', '<strong>I have read the update notifications above and I am aware of the changes made to my system.</strong>', '1', true, '0', true);
	$return .= '</div>';
	$return .= '<input type="hidden" name="update_preconfig" value="1" />';

	if($has_preconfig) {
		return $return;
	} else {
		return '';
	}
}

function versionInUpdate($current_version, $version_to_check)
{
	if (!isFroxlor()) {
		return true;
	}
	$pos_a = strpos($current_version, '-svn');
	$pos_b = strpos($version_to_check, '-svn');
	// if we compare svn-versions, we have to add -svn0 to the version
	// to compare it correctly	
	if($pos_a === false && $pos_b !== false)
	{
		$current_version.= '-svn9999';
	}
	
	return version_compare($current_version, $version_to_check, '<');
}
