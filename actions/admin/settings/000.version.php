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
		'version' => array(
			'fields' => array(
				'panel_version' => array(
					'settinggroup' => 'panel',
					'varname' => 'version',
					'type' => 'hidden',
					'default' => '',
					),
				'panel_frontend' => array(
					'settinggroup' => 'panel',
					'varname' => 'frontend',
					'type' => 'hidden',
					'default' => '',
					),
				'system_last_tasks_run' => array(
					'settinggroup' => 'system',
					'varname' => 'last_tasks_run',
					'type' => 'hidden',
					'default' => '',
					'save_method' => 'storeSettingField',
					),
				'system_last_traffic_run' => array(
					'settinggroup' => 'system',
					'varname' => 'last_traffic_run',
					'type' => 'hidden',
					'default' => '',
					),
				'system_lastcronrun' => array(
					'settinggroup' => 'system',
					'varname' => 'lastcronrun',
					'type' => 'hidden',
					'default' => '',
					),
				'system_lastguid' => array(
					'settinggroup' => 'system',
					'varname' => 'lastguid',
					'type' => 'hidden',
					'default' => 9999,
					),
				'system_lastaccountnumber' => array(
					'settinggroup' => 'system',
					'varname' => 'lastaccountnumber',
					'type' => 'hidden',
					'default' => 0,
					),
				),
			),
		),
	);

?>
