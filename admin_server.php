<?php

/**
 * This file is part of the EcoWebcontrol project.
 * Copyright (c) 2013 the EcoWebcontrol Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://eco-webcontrol.com/files/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     EcoWebcontrol team <team@eco-webcontrol.com> (2013)
 * @license    GPLv2 http://eco-webcontrol.com/files/COPYING.txt
 *
 */

define('AREA', 'admin');

/**
 * Include our init.php, which manages Sessions, Language etc.
 */

require ("./lib/init.php");


if($page == 'overview')
{
	if($action == '')
	{
		eval("echo \"" . getTemplate("multiserver/index") . "\";");
	}

	if($action == 'add')
	{
		
	}

	if($action == 'delete')
	{
		
	}

	if($action == 'edit')
	{
		
	}
}