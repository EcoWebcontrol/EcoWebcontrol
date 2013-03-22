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
		'perl' => array(
			'title' => $lng['admin']['perl_settings'],
			'fields' => array(
				'perl_path' => array(
					'label' => $lng['serversettings']['perl_path'],
					'settinggroup' => 'system',
					'varname' => 'perl_path',
					'type' => 'string',
					'default' => '/usr/bin/perl',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array('lighttpd')
					),	
				'system_perl_suexecworkaround' => array(
					'label' => $lng['serversettings']['perl']['suexecworkaround'],
					'settinggroup' => 'perl',
					'varname' => 'suexecworkaround',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'websrv_avail' => array('apache2')
					),
				'system_perl_suexeccgipath' => array(
					'label' => $lng['serversettings']['perl']['suexeccgipath'],
					'settinggroup' => 'perl',
					'varname' => 'suexecpath',
					'type' => 'string',
					'string_type' => 'dir',
					'default' => '/var/www/cgi-bin/',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array('apache2')
					),
				'perl_server' => array(
					'label' => $lng['serversettings']['perl_server'],
					'settinggroup' => 'serversettings',
					'varname' => 'perl_server',
					'type' => 'string',
					'default' => 'unix:/var/run/nginx/cgiwrap-dispatch.sock',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array('nginx')
					),
				),
			),
		),
	);

?>
