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
  *  ║ @author     Jkoan <jkoan@eco-webcontrol.com>                             ║
  *  ║ @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt              ║
  *  ║ @package    API                                                          ║
  *  ╚══════════════════════════════════════════════════════════════════════════╝ 
  */
  
 
 header("Content-type: text/xml; charset=utf-8");
 echo "<?xml version=\"1.0\" encoding=\"utf-8\"?><api>"; 
 include '../lib/userdata.inc.php';
 include '../lib/tables.inc.php';
				 include '../lib/classes/database/class.db.php';
				 
				
				
				
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
				 
						 function query_first($query)
						 {
						    $query = mysql_query($query);
							$query = mysql_fetch_array($query);
							return $query;
						 }
						 
						 $libdirname = '/var/www/ewc/lib';
				
				
				$libdirname = '/var/www/ewc/lib';
				includeFunctions($libdirname . '/functions/');
				 
				$db_link = mysql_connect ($sql['host'],$sql['user'],$sql['password']);
				unset($sql['password']);

 
 $settings_data = loadConfigArrayDir('actions/admin/settings/');
$settings = loadSettings($settings_data, $db_link);
 
if ( $db_link )
{
    mysql_select_db($sql['db']);
	$key1 = $_POST['key1'];
	$key2 = $_POST['key2'];
	$funk = $_POST['funk'];
	
	$res = mysql_query("SELECT `user`,`allow` FROM `api_key` WHERE `key_1` = '".mysql_real_escape_string($key1)."' AND `key_2` = '".mysql_real_escape_string($key2)."'");
	$res = mysql_fetch_array($res);
	$query = 'SELECT * FROM `' . TABLE_PANEL_ADMINS . '` WHERE `loginname`="' . $res['user'] .'"';
	$query = mysql_query($query);
	
	$userinfo = mysql_fetch_array($query);
	
	if ($res['allow'] == '0' OR '') {
			echo "<error><code>No Access</code></error></api>";
			exit;
		}
	elseif ($res['allow'] == '1') {
		echo '<user>Kunde</user>';
	}
	elseif ($res['allow'] == '2') {
		echo '<user>Mail</user>';
	}
	elseif ($res['allow'] == '3') {
		echo '<user>Reseller</user>';
	}
	elseif ($res['allow'] == '4') {
		echo '<user>Admin</user>';
	}
	elseif ($res['allow'] == '10') {
		echo '<user>Server</user>';
	}
	else {
		echo "<error><code>No Access</code></error></api>";
		exit;
	}
	
	if ($funk !='') {
		echo '<funk>';
		if ($res['allow'] == '1') {
			include "./api_lib/customer.php";
		}

		elseif ($res['allow'] == '2') {
			include "./api_lib/mail.php";
		}
		elseif ($res['allow'] == '3') {
			include "./api_lib/reseller.php";
		}
		elseif ($res['allow'] == '4') {
			include "./api_lib/admin.php";
		}
		elseif ($res['allow'] == '10') {
			include "./api_lib/server.php";
		}
		
		echo "</funk>";
	}
	
			
		
	  mysql_close($db_link);
}
else
{
    echo'<error><code>DB-Fehler: ' . mysql_error().'</code></error>';
}


	
  echo '</api>';
?>