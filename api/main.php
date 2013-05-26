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
  $Server = TRUE;
  error_reporting(E_ALL);
  if(get_magic_quotes_runtime())
{
	//Deactivate
	set_magic_quotes_runtime(false);
}

/**
 * Reverse magic_quotes_gpc=on to have clean GPC data again
 */

if(get_magic_quotes_gpc())
{
	$in = array(&$_GET, &$_POST, &$_COOKIE);

	while(list($k, $v) = each($in))
	{
		foreach($v as $key => $val)
		{
			if(!is_array($val))
			{
				$in[$k][$key] = stripslashes($val);
				continue;
			}

			$in[] = & $in[$k][$key];
		}
	}

	unset($in);
}
  
 
 header("Content-type: text/xml; charset=utf-8");
 echo "<?xml version=\"1.0\" encoding=\"utf-8\"?><api>"; 
 include '../lib/tables.inc.php';
 include '../lib/classes/database/class.db.php';
				 
				
function findIncludeClass($dirname, $classname)
{
	$dirhandle = opendir($dirname);
	while(false !== ($filename = readdir($dirhandle)))
	{
		if($filename != '.' && $filename != '..' && $filename != '')
		{
			if($filename == 'class.' . $classname . '.php' || $filename == 'abstract.' . $classname . '.php' || $filename == 'interface.' . $classname . '.php')
			{
				include($dirname . $filename);
				return;
			}

			if(is_dir($dirname . $filename))
			{
				findIncludeClass($dirname . $filename . '/', $classname);
			}
		}
	}
	closedir($dirhandle);
}				
				
function includeFunctions($dirname){
		$dirhandle = opendir($dirname);
		while(false !== ($filename = readdir($dirhandle))){
			if($filename != '.' && $filename != '..' && $filename != ''){
				if((substr($filename, 0, 9) == 'function.' || substr($filename, 0, 9) == 'constant.') && substr($filename, -4 ) == '.php'){
					include($dirname . $filename);

					
				}
		
				if(is_dir($dirname . $filename)){
					includeFunctions($dirname . $filename . '/');
					}
				}
			}
			closedir($dirhandle);
	}
 
 function query_first($query){
    $query = mysql_query($query);
	$query = mysql_fetch_array($query);
	return $query;
 }



$libdirname = '/var/www/ewc/lib';
includeFunctions($libdirname . '/functions/');
findIncludeClass($libdirname . '/classes/', $classname);
 include '../lib/userdata.inc.php';
$db_link = mysql_connect ($sql['host'],$sql['user'],$sql['password']);
unset($sql['password']);

if ( $db_link )
{
    mysql_select_db($sql['db']);
	$key1 = $_POST['key1'];
	$key2 = $_POST['key2'];
	$funk = $_POST['funk'];
	$res = "SELECT `user`,`allow` FROM `api_key` WHERE `key_1` = '".$key1."' AND `key_2` = '".$key2."'" ;
	$res = mysql_query($res);
	$res = mysql_fetch_array($res);
	echo $res['allow'];
	if (isset($res['allow'])) {
		echo "<detais>";
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
			$userinfo = "SELECT * FROM `panel_admins` WHERE `loginname` = '".$res['user']."'";
			$userinfo = query_first($userinfo);
			echo '<user>'.$res['user'].'</user>';
			echo "<allow>".$res['allow']."</allow>";
			echo '<user>Reseller</user>';
		}
		elseif ($res['allow'] == '4') {
			$userinfo = "SELECT * FROM `panel_admins` WHERE `loginname` = '".$res['user']."'";
			$userinfo = query_first($userinfo);
			echo '<user>'.$res['user'].'</user>';
			echo "<allow>".$res['allow']."</allow>";
		}
		elseif ($res['allow'] == '10') {
			echo '<user>Server</user>';
		}
		echo "</detais>";
	}
		
	else {
		echo "<error><code>No Access</code></error></api>";
		exit;
	}
	
	if ($funk != '') {
		echo '<funk>';
		if ($res['allow'] == '1') {
			include "./api_lib/customer.php";
		}

		elseif ($res['allow'] == '2') {
			include "./api_lib/mail.php";
		}
		elseif ($res['allow'] == '3') {
			include "./api_lib/reseller.php";
			echo "<lib>"."api_lib/reseller.php"."</lib>";
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