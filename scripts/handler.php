<?php
error_reporting(E_ALL);
require '../lib/userdata.inc.php';
require '../lib/functions.php';
require '../lib/tables.inc.php';

$db = new db($sql['host'], $sql['user'], $sql['password'], $sql['db']);
unset($sql['password']);
$res = $db->query("SELECT * FROM `".TABEL_GAMESERVER."`");
		while($row = $db->fetch_array($res)){
			if ($row['status']=='3') {//status 3 means to start the server
				if ($row['game']=='mc_vanilla') {
					safe_exec('/var/customers/gameserver/'.$row['serverid']);
					safe_exec('screen -dmS gameserver_id_'.$row['serverid'].' java -Xms1024M -Xmx1024M -jar /var/customers/gameserver/'.$row['serverid'].'/minecraft_server.jar nogui');
					$db->query("UPDATE `".$sql['db']."`.`".TABEL_GAMESERVER."` SET `status` = '1' WHERE `".TABEL_GAMESERVER."`.`serverid` =".$row['serverid'].";");
				}
			}
			elseif ($row['status']=='4') {//status 4 means to stop the server
				if ($row['game']=='mc_vanilla') {
					exec("screen -S gameserver_id_".$row['serverid']." -X -p0 stuff $'stop\n'");
					$db->query("UPDATE `".$sql['db']."`.`".TABEL_GAMESERVER."` SET `status` = '2' WHERE `".TABEL_GAMESERVER."`.`serverid` =".$row['serverid'].";");
				}
			}
				
			
			
		}
?>