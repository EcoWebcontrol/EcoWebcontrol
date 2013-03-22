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

return array (
	'customer' => array (
		'aps' => array (
			'label' => $lng['customer']['aps'],
			'required_resources' => 'phpenabled',
			'show_element' => ( getSetting('aps', 'aps_active') == true ),
			'elements' => array (
				array (
					'url' => 'customer_aps.php?action=overview',
					'label' => $lng['aps']['overview'],
				),
				array (
					'url' => 'customer_aps.php?action=customerstatus',
					'label' => $lng['aps']['status'],
				),
				array (
					'url' => 'customer_aps.php?action=search',
					'label' => $lng['aps']['search'],
				),
			),
		),
	),
	'admin' => array (
		'aps' => array (
			'label' => $lng['admin']['aps'],
			'required_resources' => 'can_manage_aps_packages',
			'show_element' => ( getSetting('aps', 'aps_active') == true ),
			'elements' => array (
				array (
					'url' => 'admin_aps.php?action=upload',
					'label' => $lng['aps']['upload'],
				),
				array (
					'url' => 'admin_aps.php?action=scan',
					'label' => $lng['aps']['scan'],
				),
				array (
					'url' => 'admin_aps.php?action=managepackages',
					'label' => $lng['aps']['managepackages'],
				),
				array (
					'url' => 'admin_aps.php?action=manageinstances',
					'label' => $lng['aps']['manageinstances'],
				),
			),
		),
	),
);
?>