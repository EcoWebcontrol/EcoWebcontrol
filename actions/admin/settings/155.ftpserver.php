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
	'ftpserver' => array(
			'title' => $lng['admin']['ftpserversettings'],
			'fields' => array(
				'ftpserver' => array(
					'label' => $lng['admin']['ftpserver'],
					'settinggroup' => 'system',
					'varname' => 'ftpserver',
					'type' => 'option',
					'default' => 'proftpd',
					'option_mode' => 'one',
					'option_options' => array('proftpd' => 'Proftpd', 'pureftpd' => 'Pureftpd'),
					'save_method' => 'storeSettingField',
				),
			),
		),
	)
);

?>
