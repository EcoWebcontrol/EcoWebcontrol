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
		'diskquota' => array(
			'title' => $lng['diskquota'],
			'fields' => array(
				'diskquota_enabled' => array(
					'label' => $lng['serversettings']['diskquota_enabled'],
					'settinggroup' => 'system',
					'varname' => 'diskquota_enabled',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'overview_option' => true
				),
				'diskquota_repquota_path' => array(
					'label' => $lng['serversettings']['diskquota_repquota_path']['description'],
					'settinggroup' => 'system',
					'varname' => 'diskquota_repquota_path',
					'type' => 'string',
					'default' => '/usr/sbin/repquota',
					'save_method' => 'storeSettingField',
				),
				'diskquota_quotatool_path' => array(
					'label' => $lng['serversettings']['diskquota_quotatool_path']['description'],
					'settinggroup' => 'system',
					'varname' => 'diskquota_quotatool_path',
					'type' => 'string',
					'default' => '/usr/bin/quotatool',
					'save_method' => 'storeSettingField',
				),
				'diskquota_customer_partition' => array(
					'label' => $lng['serversettings']['diskquota_customer_partition']['description'],
					'settinggroup' => 'system',
					'varname' => 'diskquota_customer_partition',
					'type' => 'string',
					'default' => '/dev/root',
					'save_method' => 'storeSettingField',
				),
				),
			),
		),
	);

?>
