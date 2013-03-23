<?php

/**  ╔══════════════════════════════════════════════════════════════════════════╗ 
  *  ║ This file is part of EcoWebcontrol.                                      ║
  *  ║ Copyright (c) 2013 the EcoWebcontrol Team (see authors).                 ║
  *  ╠══════════════════════════════════════════════════════════════════════════╣ 
  *  ║ For the full copyright and license information, please view the COPYING  ║
  *  ║ file that was distributed with this source code. You can also view the   ║
  *  ║ COPYING file online at http://files.froxlor.org/misc/COPYING.txt         ║
  *  ║                                                                          ║
  *  ║ @copyright  (c) the authors                                              ║
  *  ║ @author     Jkoan <jkoan@http://eco-webcontrol.com>                      ║
  *  ║ @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt              ║
  *  ║ @package    Multiserver                                                  ║
  *  ╚══════════════════════════════════════════════════════════════════════════╝ 
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