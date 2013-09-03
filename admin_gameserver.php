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
 * @package    Gameserver
 * 
 */
 
 define('AREA', 'admin');
 $need_db_sql_data = true;
 require ("./lib/init.php");
 if ($page == 'overview' or '') {
 	if ($action == '') {
		 $gameserver='';
	    $result = $db->query("SELECT `serverid`, `owner`, `game`,`status` FROM `".TABEL_GAMESERVER."`");
		while($row = $db->fetch_array($result)){
			$gameserver .= '<tr>';
			$gameserver .= '<td>'.$row['serverid']."</td>";
			$gameserver .= '<td>'.$row['owner']."</td>";
			$gameserver .= '<td>'.$row['game']."</td>";
			if ($row['status']==2) {
				$gameserver .= '<td><a href="'.$linker->getLink(array('section' => 'gameserver','page' => 'server', 'action' => 'start','id'=>$row['serverid'])).'" alt='.$lng.' class="btn btn-mini"><i class="icon-play"></i></a></td>';		
			}
			elseif ($row['status']==1) {
				$gameserver .= '<td><a href="'.$linker->getLink(array('section' => 'gameserver','page' => 'server', 'action' => 'stop','id'=>$row['serverid'])).'" alt='.$lng.' class="btn btn-mini"><i class="icon-stop"></i></a></td>';			
			}
			else {
				$gameserver .= '<td><a href="'.$linker->getLink(array('section' => 'gameserver','page' => 'overview')).'" alt='.'"Bitte warten"'.' class="btn btn-mini"><i class="icon-overview"></i></a></td>';		
				
			}
			$gameserver .= '</tr>';
		}
		eval("echo \"" . getTemplate("gameserver/overview") . "\";");
	 }
	elseif ($action == 'add') {
		if (isset($_POST['game']) and $_POST['game'] != '') {
			$props = $db->query_first("SELECT `props` FROM `".GAMESERVER_GAMES."` WHERE `game`='".$db->escape($_POST['game'])."'");
			$gameserver_add_data = include_once dirname(__FILE__).'/lib/formfields/admin/gameserver/formfield.gameserver_add.php';
			$gameserver_add_form = htmlform::genHTMLForm($gameserver_add_data);
		
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
elseif ($page =='server') {
	if ($action=='start') {
		$db->query("UPDATE `".$sql['db']."`.`".TABEL_GAMESERVER."` SET `status` = '3' WHERE `".TABEL_GAMESERVER."`.`serverid` =".$_GET['id'].";");
		redirectTo('admin_gameserver.php', Array('page' => ''));
	}
	elseif ($action=='stop') {
		$db->query("UPDATE `".$sql['db']."`.`".TABEL_GAMESERVER."` SET `status` = '4' WHERE `".TABEL_GAMESERVER."`.`serverid` =".$_GET['id'].";");
		redirectTo('admin_gameserver.php', Array('page' => ''));
	}
}