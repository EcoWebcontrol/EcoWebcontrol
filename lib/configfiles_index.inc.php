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

$configcommand = array();

if(isConfigDir($settings['system']['apacheconf_vhost']))
{
	$configcommand['vhost'] = 'mkdir -p ' . $settings['system']['apacheconf_vhost'];
	$configcommand['include'] = 'echo -e "\\nInclude ' . makeCorrectDir($settings['system']['apacheconf_vhost']) . '*.conf" >> ' . makeCorrectFile(makeCorrectDir('/etc/apache2/httpd.conf'));
	$configcommand['v_inclighty'] = 'echo -e \'\\ninclude_shell "cat ' . makeCorrectDir($settings['system']['apacheconf_vhost']) . '*.conf"\' >> /etc/lighttpd/lighttpd.conf';
}
else
{
	$configcommand['vhost'] = 'touch ' . $settings['system']['apacheconf_vhost'];
	$configcommand['include'] = 'echo -e "\\nInclude ' . $settings['system']['apacheconf_vhost'] . '" >> ' . makeCorrectFile('/etc/apache2/httpd.conf');
	$configcommand['v_inclighty'] = 'echo -e \'\\ninclude "' . $settings['system']['apacheconf_vhost'] . '"\' >> /etc/lighttpd/lighttpd.conf';
}

if(isConfigDir($settings['system']['apacheconf_diroptions']))
{
	$configcommand['diroptions'] = 'mkdir -p ' . $settings['system']['apacheconf_diroptions'];
	$configcommand['d_inclighty'] = 'echo -e \'\\ninclude_shell "cat ' . makeCorrectDir($settings['system']['apacheconf_diroptions']) . '*.conf"\' >> /etc/lighttpd/lighttpd.conf';
}
else
{
	$configcommand['diroptions'] = 'touch ' . $settings['system']['apacheconf_diroptions'];
	$configcommand['d_inclighty'] = 'echo -e \'\\ninclude "' . $settings['system']['apacheconf_diroptions'] . '"\' >> /etc/lighttpd/lighttpd.conf';
}

$cfgPath = 'lib/configfiles/';
$configfiles = Array();
$configfiles = array_merge(include $cfgPath . 'squeeze.inc.php', include $cfgPath . 'precise.inc.php', include $cfgPath . 'lucid.inc.php', include $cfgPath . 'hardy.inc.php', include $cfgPath . 'gentoo.inc.php', include $cfgPath . 'suse11.inc.php', include $cfgPath . 'sle10.inc.php', include $cfgPath . 'freebsd.inc.php');

