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
 function generate_password($length){
                $pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $pool .= "abcdefghijklmnopqrstuvwxyz";
                $pool .= "1234567890";
 
                $password="";
                for ($i = 0; $i < $length; $i++) {
                        $password .= $pool{rand(0, strlen($pool)-1)};
                }
                return $password;
        }
 
 	require ("./lib/init.php");

	if ($page == 'key') {
		if ($action == 'add') {
				$key1=generate_password('40');
				$key2=generate_password('40');
				$result = $db->query("INSERT INTO `".TABLE_API_KEY."` (`key_1`, `key_2`, `user`, `allow`) VALUES ('".$key1."', '".$key2."', '".$userinfo['name']."', '1');");
				eval("echo \"" . getTemplate("api/key_add") . "\";");
			}
			
			elseif ($action == '') {
				$pagingcode = '';
				$api_keys='';
				$result = $db->query("SELECT `key_1`, `key_2`, `user`, `allow` FROM `".TABLE_API_KEY."`");
				while($row = $db->fetch_array($result)){
					$api_keys .= '<tr>';
					$api_keys .= '<td>'.substr($row['key_1'], 0, -15)."***************"."</td>";
					$api_keys .= '<td>'.substr($row['key_2'], 0, -15)."***************"."</td>";
					$api_keys .= '<td>'.$row['user']."</td>";
					$api_keys .= "<td><i class=\"icon-trash\"></i></td>";
					$api_keys .= '</tr>';
				}
				unset($result,$row);
				eval("echo \"" . getTemplate("api/key") . "\";");
				unset($api_keys);
			}
			
		}
		
	elseif($page == 'doc'){
		eval("echo \"" . getTemplate("api/doc") . "\";");
	}
 
?>