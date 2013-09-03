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

$libdirname = dirname(__FILE__);

includeFunctions($libdirname . '/functions/');

function includeFunctions($dirname)
{
	$dirhandle = opendir($dirname);
	while(false !== ($filename = readdir($dirhandle)))
	{
		if($filename != '.' && $filename != '..' && $filename != '')
		{
			if((substr($filename, 0, 9) == 'function.' || substr($filename, 0, 9) == 'constant.') && substr($filename, -4 ) == '.php')
			{
				include($dirname . $filename);
			}

			if(is_dir($dirname . $filename))
			{
				includeFunctions($dirname . $filename . '/');
			}
		}
	}
	closedir($dirhandle);
}

function __autoload($classname)
{
	global $libdirname, $theme;

	findIncludeClass($libdirname . '/classes/', $classname);
}

function findIncludeClass($dirname, $classname)
{
	$dirhandle = opendir($dirname);
	while(false !== ($filename = readdir($dirhandle)))
	{
		if($filename != '.' && $filename != '..' && $filename != '')
		{
			if($filename == 'class.' . $classname . '.php' || $filename == 'abstract.' . $classname . '.php' || $filename == 'interface.' . $classname . '.php')
			{
				include($dirname . $filename);
				return;
			}

			if(is_dir($dirname . $filename))
			{
				findIncludeClass($dirname . $filename . '/', $classname);
			}
		}
	}
	closedir($dirhandle);
}


function exportDetails($fielddata, $newfieldvalue)
{
	print_r($newfieldvalue);
}

