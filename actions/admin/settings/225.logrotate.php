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
		'logrotate' => array(
			'title' => $lng['logrotate'],
			'fields' => array(
				'logrotate_enabled' => array(
					'label' => $lng['logrotate_enabled'],
					'settinggroup' => 'system',
					'varname' => 'logrotate_enabled',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'overview_option' => true
				),
				'logrotate_binary' => array(
					'label' => $lng['logrotate_binary'],
					'settinggroup' => 'system',
					'varname' => 'logrotate_binary',
					'type' => 'string',
					'default' => '/usr/sbin/logrotate',
					'save_method' => 'storeSettingField',
					'overview_option' => false
				),
				'logrotate_interval' => array(
					'label' => $lng['logrotate_interval'],
					'settinggroup' => 'system',
					'varname' => 'logrotate_interval',
					'type' => 'option',
					'default' => 'weekly',
					'option_mode' => 'one',
				        'option_options' => array('daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly'),
					'save_method' => 'storeSettingField',
					'overview_option' => false
				),
				'logrotate_keep' => array(
					'label' => $lng['logrotate_keep'],
					'settinggroup' => 'system',
					'varname' => 'logrotate_keep',
					'type' => 'string',
					'default' => '4',
					'save_method' => 'storeSettingField',
					'overview_option' => false
				),				
				),
			),
		),
	);

?>