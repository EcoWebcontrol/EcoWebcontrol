<?php

/**
 * This file is part of the EcoWebcontrol project.
 * Copyright (c) 2013 the EcoWebcontrol Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://eco-webcontrol.com/files/COPYING.txt
 *
 * @author     EcoWebcontrol team <team@eco-webcontrol.com> (2013)
 * @license    GPLv2 http://eco-webcontrol.com/files/COPYING.txt
 * @package    Formfields
 * 
 */

 
 
 
return array(
	'gameserver_add' => array(
		'title' => $lng['gameserver']['new_gameserver'],
		'sections' => array(
			'section_a' => array(
				'title' => $lng['admin']['accountdata'],
				'fields' => array(
					'server' => array(
						'label' => $lng['admin']['server'],
						'type' => 'select',
						'select_var' => $form_server
					),
					'createstdsubdomain' => array(
						'label' => $lng['gameserver']['start_server'],
						'type' => 'checkbox',
						'desc' => $lng['gameserver']['start_server']['description'],
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array('1')
					),
					'port' => array(
						'label' => $lng['login']['password'],
						'type' => 'password',
						'autocomplete' => 'off'
					),
					'new_customer_password_suggestion' => array(
						'label' => $lng['customer']['generated_pwd'],
						'type' => 'text',
						'value' => generatePassword(),
					),
					'sendpassword' => array(
						'label' => $lng['admin']['sendpassword'],
						'type' => 'checkbox',
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array('1')
					),					
					eval($props)
				)
			)
		)
	)
);
