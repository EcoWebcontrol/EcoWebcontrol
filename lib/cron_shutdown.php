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

if($settings['logger']['log_cron'] == '1')
{
	$cronlog->setCronLog(0);
	fwrite($debugHandler, 'Logging for cron has been shutdown' . "\n");
}

$db->close();
fwrite($debugHandler, 'Closing database connection' . "\n");

if(isset($db_root))
{
	$db_root->close();
	fwrite($debugHandler, 'Closing database rootconnection' . "\n");
}

if($keepLockFile === true)
{
	fwrite($debugHandler, '=== Keep lockfile because of exception ===');
}

fclose($debugHandler);

if($keepLockFile === false
   && $cronscriptDebug === false)
{
	unlink($lockfile);
}

