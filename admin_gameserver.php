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
 
 define('AREA', 'admin');
 $need_db_sql_data = true;
 require ("./lib/init.php");
 if ($page == 'overview' or '') {
 	if ($action == '') {
		 $gameserver='';
	    $result = $db->query("SELECT `serverid`, `owner`, `game` FROM `".TABEL_GAMESERVER."`");
		while($row = $db->fetch_array($result)){
			$gameserver .= '<tr>';
			$gameserver .= '<td>'.$row['serverid']."</td>";
			$gameserver .= '<td>'.$row['owner']."</td>";
			$gameserver .= '<td>'.$row['game']."</td>";
			$gameserver .= '<td><a href="'.$e.'" alt='.$lng.' class="btn btn-mini"><i class="icon-pencil"></i></a></td>';
			$gameserver .= '</tr>';
		}
		eval("echo \"" . getTemplate("gameserver/overview") . "\";");
	 }
	elseif ($action == 'add') {
		if (isset($_POST['game']) and $_POST['game'] != '') {
			$result = $db->query_first("SELECT `props` FROM `".GAMESERVER_GAMES."` WHERE `game`='".$db->escape($_POST['game'])."'");
			$unsel = unserialize($result);
			eval("echo \"" . getTemplate("gameserver/add") . "\";");
		}
		else {
			$result = $db->query("SELECT `game`, `version`, `id` FROM `".GAMESERVER_GAMES."`");
			$gameserver='';
			while($row = $db->fetch_array($result)){
				$gameserver .= makeoption($row['game'], $row['id'], null, true, true);
			}
			eval("echo \"" . getTemplate("gameserver/add_game") . "\";");
		}
		
	}
 	
 }