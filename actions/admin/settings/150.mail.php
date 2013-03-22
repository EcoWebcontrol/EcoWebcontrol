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

return array(
	'groups' => array(
		'mail' => array(
			'title' => $lng['admin']['mailserversettings'],
			'fields' => array(
				'system_vmail_uid' => array(
					'label' => $lng['serversettings']['vmail_uid'],
					'settinggroup' => 'system',
					'varname' => 'vmail_uid',
					'type' => 'int',
					'default' => 2000,
					'int_min' => 1,
					'int_max' => 65535,
					'save_method' => 'storeSettingField',
					),
				'system_vmail_gid' => array(
					'label' => $lng['serversettings']['vmail_gid'],
					'settinggroup' => 'system',
					'varname' => 'vmail_gid',
					'type' => 'int',
					'default' => 2000,
					'int_min' => 1,
					'int_max' => 65535,
					'save_method' => 'storeSettingField',
					),
				'system_vmail_homedir' => array(
					'label' => $lng['serversettings']['vmail_homedir'],
					'settinggroup' => 'system',
					'varname' => 'vmail_homedir',
					'type' => 'string',
					'string_type' => 'dir',
					'default' => '/var/customers/mail/',
					'save_method' => 'storeSettingField',
					),
				'system_vmail_maildirname' => array(
					'label' => $lng['serversettings']['vmail_maildirname'],
					'settinggroup' => 'system',
					'varname' => 'vmail_maildirname',
					'type' => 'string',
					'string_type' => 'dir',
					'default' => 'Maildir',
					'save_method' => 'storeSettingField',
					),
				'panel_sendalternativemail' => array(
					'label' => $lng['serversettings']['sendalternativemail'],
					'settinggroup' => 'panel',
					'varname' => 'sendalternativemail',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					),
				'system_mail_quota_enabled' => array(
					'label' => $lng['serversettings']['mail_quota_enabled'],
					'settinggroup' => 'system',
					'varname' => 'mail_quota_enabled',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					),
				'system_mail_quota' => array(
					'label' => $lng['serversettings']['mail_quota'],
					'settinggroup' => 'system',
					'varname' => 'mail_quota',
					'type' => 'int',
					'default' => 100,
					'save_method' => 'storeSettingField',
					),
				'system_autoresponder_enabled' => array(
					'label' => $lng['serversettings']['autoresponder_active'],
					'settinggroup' => 'autoresponder',
					'varname' => 'autoresponder_active',
					'type' => 'bool',
					'default' => false,
					'cronmodule' => 'froxlor/autoresponder',
					'save_method' => 'storeSettingField',
					),
				'system_last_autoresponder_run' => array(
					'settinggroup' => 'autoresponder',
					'varname' => 'last_autoresponder_run',
					'type' => 'hidden',
					'default' => 0,
					),
				'system_catchall_enabled' => array(
					'label' => $lng['serversettings']['catchall_enabled'],
					'settinggroup' => 'catchall',
					'varname' => 'catchall_enabled',
					'type' => 'bool',
					'default' => true,
					'save_method' => 'storeSettingResetCatchall',
					),
				),
			),
		),
	);

?>
