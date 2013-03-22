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
		'security' => array(
			'title' => $lng['admin']['security_settings'],
			'fields' => array(
				'panel_unix_names' => array(
					'label' => $lng['serversettings']['unix_names'],
					'settinggroup' => 'panel',
					'varname' => 'unix_names',
					'type' => 'bool',
					'default' => true,
					'save_method' => 'storeSettingField',
					),
				'system_mailpwcleartext' => array(
					'label' => $lng['serversettings']['mailpwcleartext'],
					'settinggroup' => 'system',
					'varname' => 'mailpwcleartext',
					'type' => 'bool',
					'default' => true,
					'save_method' => 'storeSettingField',
					),
				),
			),
		),
	);

?>