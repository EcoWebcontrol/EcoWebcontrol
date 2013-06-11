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
 *
 */
 
/**
 * Send Command in a Shh session
 * @param The SSH connection
 * @param The Command to send
 * @return Returns a stream
 *
 * @author Jkoan <jkoan@gmx.de>
 */
function open_exec($connection, $command){
	$stream = ssh2_exec($connection, $command);
	return $stream;
}

?>