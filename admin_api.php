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
	include './lib/userdata.inc.php';
	
	$page = $_GET['page'];
	if ($page == 'key') {
		if ($action == 'add') {
			
				$sql = "INSERT INTO `".TABLE_API_KEY."` (`key_1`, `key_2`, `user`, `allow`) VALUES ('".generate_password('40')."', '".generate_password('40')."', '123', '1');";
				$result = $db->query($sql);
				standard_success('passwordok');
				
			}
			
			elseif ($action == '') {
			eval("echo \"" . getTemplate("api/key") . "\";");
			}
			
		}
		
		elseif($page == 'doc'){
			eval("echo \"" . getTemplate("api/doc") . "\";");
		}
 
?>