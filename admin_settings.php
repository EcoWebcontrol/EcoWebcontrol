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

define('AREA', 'admin');

/**
 * Include our init.php, which manages Sessions, Language etc.
 */

$need_db_sql_data = true;
$need_root_db_sql_data = true;
require ("./lib/init.php");

if(($page == 'settings' || $page == 'overview')
   && $userinfo['change_serversettings'] == '1')
{
	$settings_data = loadConfigArrayDir('./actions/admin/settings/');
	$settings = loadSettings($settings_data, $db);

	if(isset($_POST['send'])
	   && $_POST['send'] == 'send')
	{
		$_part = isset($_GET['part']) ? $_GET['part'] : '';

		if($_part == '')
		{
			$_part = isset($_POST['part']) ? $_POST['part'] : '';
		}

		if($_part != '')
		{
			if($_part == 'all')
			{
				$settings_all = true;
				$settings_part = false;
			}
			else
			{
				$settings_all = false;
				$settings_part = true;
			}

			$only_enabledisable = false;
		}
		else
		{
			$settings_all = false;
			$settings_part = false;
			$only_enabledisable = true;
		}
		
		// check if the session timeout is too low #815
		if (isset($_POST['session_sessiontimeout']) && $_POST['session_sessiontimeout'] <= 60) {
			standard_error($lng['error']['session_timeout'], $lng['error']['session_timeout_desc']);
		}

		if(processFormEx(
			$settings_data,
			$_POST,
			array('filename' => $filename, 'action' => $action, 'page' => $page),
			$_part,
			$settings_all,
			$settings_part,
			$only_enabledisable
			)
		) {
			$log->logAction(ADM_ACTION, LOG_INFO, "rebuild configfiles due to changed setting");
			inserttask('1');
			inserttask('5');

			# Using nameserver, insert a task which rebuilds the server config
			if ($settings['system']['bind_enable'])
			{
				inserttask('4');
			}
			standard_success('settingssaved', '', array('filename' => $filename, 'action' => $action, 'page' => $page));
		}
	}
	else
	{
		$_part = isset($_GET['part']) ? $_GET['part'] : '';

		if($_part == '')
		{
			$_part = isset($_POST['part']) ? $_POST['part'] : '';
		}

		$fields = buildFormEx($settings_data, $_part);

		$settings_page = '';
		if($_part == '')
		{
			eval("\$settings_page .= \"" . getTemplate("settings/settings_overview") . "\";");
		}
		else
		{
			eval("\$settings_page .= \"" . getTemplate("settings/settings") . "\";");
		}

		eval("echo \"" . getTemplate("settings/settings_form_begin") . "\";");
		eval("echo \$settings_page;");
		eval("echo \"" . getTemplate("settings/settings_form_end") . "\";");

	}
}
elseif($page == 'rebuildconfigs'
       && $userinfo['change_serversettings'] == '1')
{
	if(isset($_POST['send'])
	   && $_POST['send'] == 'send')
	{
		$log->logAction(ADM_ACTION, LOG_INFO, "rebuild configfiles");
		inserttask('1');
		inserttask('5');
		inserttask('10');

		# Using nameserver, insert a task which rebuilds the server config
		if ($settings['system']['bind_enable'])
		{
			inserttask('4');
		}
		standard_success('rebuildingconfigs', '', array('filename' => 'admin_index.php'));
	}
	else
	{
		ask_yesno('admin_configs_reallyrebuild', $filename, array('page' => $page));
	}
}
elseif($page == 'updatecounters'
       && $userinfo['change_serversettings'] == '1')
{
	if(isset($_POST['send'])
	   && $_POST['send'] == 'send')
	{
		$log->logAction(ADM_ACTION, LOG_INFO, "updated resource-counters");
		$updatecounters = updateCounters(true);
		$customers = '';
		foreach($updatecounters['customers'] as $customerid => $customer)
		{
			eval("\$customers.=\"" . getTemplate("settings/updatecounters_row_customer") . "\";");
		}

		$admins = '';
		foreach($updatecounters['admins'] as $adminid => $admin)
		{
			eval("\$admins.=\"" . getTemplate("settings/updatecounters_row_admin") . "\";");
		}

		eval("echo \"" . getTemplate("settings/updatecounters") . "\";");
	}
	else
	{
		ask_yesno('admin_counters_reallyupdate', $filename, array('page' => $page));
	}
}
elseif($page == 'wipecleartextmailpws'
       && $userinfo['change_serversettings'] == '1')
{
	if(isset($_POST['send'])
	   && $_POST['send'] == 'send')
	{
		$log->logAction(ADM_ACTION, LOG_WARNING, "wiped all cleartext mail passwords");
		$db->query("UPDATE `" . TABLE_MAIL_USERS . "` SET `password`='' ");
		$db->query("UPDATE `" . TABLE_PANEL_SETTINGS . "` SET `value`='0' WHERE `settinggroup`='system' AND `varname`='mailpwcleartext'");
		redirectTo('admin_settings.php', array('s' => $s));
	}
	else
	{
		ask_yesno('admin_cleartextmailpws_reallywipe', $filename, array('page' => $page));
	}
}
elseif($page == 'wipequotas'
       && $userinfo['change_serversettings'] == '1')
{
	if(isset($_POST['send'])
	   && $_POST['send'] == 'send')
	{
		$log->logAction(ADM_ACTION, LOG_WARNING, "wiped all mailquotas");

		// Set the quota to 0 which means unlimited

		$db->query("UPDATE `" . TABLE_MAIL_USERS . "` SET `quota`='0' ");
		$db->query("UPDATE " . TABLE_PANEL_CUSTOMERS . " SET `email_quota_used` = 0");
		redirectTo('admin_settings.php', array('s' => $s));
	}
	else
	{
		ask_yesno('admin_quotas_reallywipe', $filename, array('page' => $page));
	}
}
elseif($page == 'enforcequotas'
       && $userinfo['change_serversettings'] == '1')
{
	if(isset($_POST['send'])
	   && $_POST['send'] == 'send')
	{
		// Fetch all accounts

		$result = $db->query("SELECT `quota`, `customerid` FROM " . TABLE_MAIL_USERS);

		while($array = $db->fetch_array($result))
		{
			$difference = $settings['system']['mail_quota'] - $array['quota'];
			$db->query("UPDATE " . TABLE_PANEL_CUSTOMERS . " SET `email_quota_used` = `email_quota_used` + " . (int)$difference . " WHERE `customerid` = '" . $array['customerid'] . "'");
		}

		// Set the new quota

		$db->query("UPDATE `" . TABLE_MAIL_USERS . "` SET `quota`='" . $settings['system']['mail_quota'] . "'");

		// Update the Customer, if the used quota is bigger than the allowed quota

		$db->query("UPDATE " . TABLE_PANEL_CUSTOMERS . " SET `email_quota` = `email_quota_used` WHERE `email_quota` < `email_quota_used`");
		$log->logAction(ADM_ACTION, LOG_WARNING, 'enforcing mailquota to all customers: ' . $settings['system']['mail_quota'] . ' MB');
		redirectTo('admin_settings.php', array('s' => $s));
	}
	else
	{
		ask_yesno('admin_quotas_reallyenforce', $filename, array('page' => $page));
	}
}
elseif ($page == 'languages') {
	if (isset($_GET['action'])) {
		if ($_GET['action'] != '' and !is_numeric($_GET['action'])) {
			if ($_GET['action'] == 'active') {
					$db->query("UPDATE `".TABLE_PANEL_LANGUAGE."` SET `active`=1 WHERE language='".$db->escape($_GET['language'])."'");
					redirectTo('admin_settings.php',array('s' => $s, 'page' => $page));			
			}
			elseif ($_GET['action'] == 'deactive') {
				$result = $db->query("SELECT `active` from ".TABLE_PANEL_LANGUAGE);
				while ($language =  $db->fetch_array($db_languages)){
					
				}
				if ($active_lngs >= 1) {
					$db->query("UPDATE `".TABLE_PANEL_LANGUAGE."` SET `active`=0 WHERE language='".$db->escape($_GET['language'])."'");
					redirectTo('admin_settings.php',array('s' => $s, 'page' => $page));
				}
				
			}
		}
	}
	else {
		$db_languages = $db->query("SELECT `language`, `active` FROM `".TABLE_PANEL_LANGUAGE);
		$languages ='';
		$languages = '<tr><td><h3>'.$lng['login']['language'].'</h3></td><td><h3>'.$lng['panel']['active'].'</h3></td><td>'.$lng['panel']['options'].'</td></tr>';
		while ($language = $db->fetch_array($db_languages))
			{
			  $languages .= "<tr>";
			  $languages .= "<td>". $language['language'] . "</td>";
			  if ($language['active'] =='1') {
				  $languages .= "<td>". $lng['panel']['yes'] . "</td>";
				  $languages .= "<td width=\"150px\"><a class=\"btn btn-danger\" href=\"".$linker->getLink(array('section' => 'settings','page' => $page, 'action' => 'deactive', 'language' => $language['language']))." \" ><i class=\"icon-minus-sign icon-white\"></i> ".$lng['panel']['disable']."</a></td>";
			  }
			  elseif ($language['active'] =='0') {
				  $languages .= "<td>". $lng['panel']['no'] . "</td>";
				  $languages .= "<td width=\"150px\"><a class=\"btn btn btn-success\" href=\"".$linker->getLink(array('section' => 'settings','page' => $page, 'action' => 'active', 'language' => $language['language']))." \" ><i class=\"icon-plus-sign icon-white\"></i> ".$lng['panel']['enable']."</a></td>";
				  
			  }
			  else {
				  
			  }
			  $languages .= "</tr>";
			}
		eval("echo \"" . getTemplate("settings/languages") . "\";");
	}
}
