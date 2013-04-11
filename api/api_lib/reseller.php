<?php
if (!isset($Server)) {
	die('You not an Server');
}



if ($funk == 'reseller_add_customer') {
	if($userinfo['customers_used'] < $userinfo['customers'] || $userinfo['customers'] == '-1')
		{
		 		$errors = 0;
				$name = validate($_POST['name'], 'name');
				$firstname = validate($_POST['firstname'], 'first name');
				$company = validate($_POST['company'], 'company');
				$street = validate($_POST['street'], 'street');
				$zipcode = validate($_POST['zipcode'], 'zipcode', '/^[0-9 \-A-Z]*$/');
				$city = validate($_POST['city'], 'city');
				$phone = validate($_POST['phone'], 'phone', '/^[0-9\- \+\(\)\/]*$/');
				$fax = validate($_POST['fax'], 'fax', '/^[0-9\- \+\(\)\/]*$/');
				$email = validate($_POST['email'], 'email');
				$customernumber = validate($_POST['customernumber'], 'customer number', '/^[A-Za-z0-9 \-]*$/Di');
				$def_language = validate($_POST['def_language'], 'default language');
				$diskspace = intval_ressource($_POST['diskspace']);
				$gender = intval_ressource($_POST['gender']);
				$traffic = doubleval_ressource($_POST['traffic']);
				$subdomains = intval_ressource($_POST['subdomains']);
				$emails = intval_ressource($_POST['emails']);
				$email_accounts = intval_ressource($_POST['email_accounts']);

				if($settings['system']['mail_quota_enabled'] == '1'){	
						$email_quota = - 1;
				}
				
				if($settings['autoresponder']['autoresponder_active'] == '1')
				{
					$email_autoresponder = intval_ressource($_POST['email_autoresponder']);

				}
				else
				{
					$email_autoresponder = 0;
				}

				$email_imap = 0;
				if(isset($_POST['email_imap']))
					$email_imap = intval_ressource($_POST['email_imap']);

				$email_pop3 = 0;
				if(isset($_POST['email_pop3']))
					$email_pop3 = intval_ressource($_POST['email_pop3']);

				$ftps = 0;
				if(isset($_POST['ftps']))
					$ftps = intval_ressource($_POST['ftps']);

				$tickets = ($settings['ticket']['enabled'] == 1 ? intval_ressource($_POST['tickets']) : 0);

				$mysqls = intval_ressource($_POST['mysqls']);


				if($settings['aps']['aps_active'] == '1')
				{
					$number_of_aps_packages = intval_ressource($_POST['number_of_aps_packages']);
					
				}
				else
				{
					$number_of_aps_packages = 0;
				}

				$createstdsubdomain = 0;
				if(isset($_POST['createstdsubdomain']))
					$createstdsubdomain = intval($_POST['createstdsubdomain']); 
					/* 
					 * @TODO: Make Reseller-subdomain 
					 * example: 
					 * 		admin1 domain -> dom1.tld 
					 * 		admin2 domain -> dom2.tld
					 * 
					 * if admin1 create an user than user.dom1.tld
					 * 
					 * if admin2 create an user than user.dom2.tld
					 * 
					 * */

				$password = validate($_POST['new_customer_password'], 'password');
				// only check if not empty,
				// cause empty == generate password automatically
				if($password != '')
				{
					$password = validatePassword($password);
					echo "<pw-info>Password was empty. System will generate an random PW</pw-info>";
					echo "<pw>".$password."</pw>";
				}

				$backup_allowed = 0;
				if(isset($_POST['backup_allowed']))
					$backup_allowed = intval($_POST['backup_allowed']);

				if ($backup_allowed != 0)
				{
					$backup_allowed = 1;
				}

				// gender out of range? [0,2]
				if ($gender < 0 || $gender > 2) {
					$gender = 0;
				}

				$sendpassword = 0;
				if(isset($_POST['sendpassword']))
					$sendpassword = intval($_POST['sendpassword']);

				$phpenabled = 0;
				if(isset($_POST['phpenabled']))
					$phpenabled = intval($_POST['phpenabled']);

				$perlenabled = 0;
				if(isset($_POST['perlenabled']))
					$perlenabled = intval($_POST['perlenabled']);

				$store_defaultindex = 0;
				if(isset($_POST['store_defaultindex']))
					$store_defaultindex = intval($_POST['store_defaultindex']);
				/* 
				 * 
				 * @TODO:APS installer at user creation will been writtern
				 * 
				 * */
				$diskspace = $diskspace * 1024;
				$traffic = $traffic * 1024 * 1024;

				if(((($userinfo['diskspace_used'] + $diskspace) > $userinfo['diskspace']) && ($userinfo['diskspace'] / 1024) != '-1')
				   || ((($userinfo['mysqls_used'] + $mysqls) > $userinfo['mysqls']) && $userinfo['mysqls'] != '-1')
				   || ((($userinfo['emails_used'] + $emails) > $userinfo['emails']) && $userinfo['emails'] != '-1')
				   || ((($userinfo['email_accounts_used'] + $email_accounts) > $userinfo['email_accounts']) && $userinfo['email_accounts'] != '-1')
				   || ((($userinfo['email_forwarders_used'] + $email_forwarders) > $userinfo['email_forwarders']) && $userinfo['email_forwarders'] != '-1')
				   || ((($userinfo['email_quota_used'] + $email_quota) > $userinfo['email_quota']) && $userinfo['email_quota'] != '-1' && $settings['system']['mail_quota_enabled'] == '1')
				   || ((($userinfo['email_autoresponder_used'] + $email_autoresponder) > $userinfo['email_autoresponder']) && $userinfo['email_autoresponder'] != '-1' && $settings['autoresponder']['autoresponder_active'] == '1')
				   || ((($userinfo['ftps_used'] + $ftps) > $userinfo['ftps']) && $userinfo['ftps'] != '-1')
				   || ((($userinfo['tickets_used'] + $tickets) > $userinfo['tickets']) && $userinfo['tickets'] != '-1')
				   || ((($userinfo['subdomains_used'] + $subdomains) > $userinfo['subdomains']) && $userinfo['subdomains'] != '-1')
				   || ((($userinfo['aps_packages_used'] + $number_of_aps_packages) > $userinfo['aps_packages']) && $userinfo['aps_packages'] != '-1' && $settings['aps']['aps_active'] == '1')
				   || (($diskspace / 1024) == '-1' && ($userinfo['diskspace'] / 1024) != '-1')
				   || ($mysqls == '-1' && $userinfo['mysqls'] != '-1')
				   || ($emails == '-1' && $userinfo['emails'] != '-1')
				   || ($email_accounts == '-1' && $userinfo['email_accounts'] != '-1')
				   || ($email_forwarders == '-1' && $userinfo['email_forwarders'] != '-1')
				   || ($email_quota == '-1' && $userinfo['email_quota'] != '-1' && $settings['system']['mail_quota_enabled'] == '1')
				   || ($email_autoresponder == '-1' && $userinfo['email_autoresponder'] != '-1' && $settings['autoresponder']['autoresponder_active'] == '1')
				   || ($ftps == '-1' && $userinfo['ftps'] != '-1')
				   || ($tickets == '-1' && $userinfo['tickets'] != '-1')
				   || ($subdomains == '-1' && $userinfo['subdomains'] != '-1')
				   || ($number_of_aps_packages == '-1' && $userinfo['aps_packages'] != '-1'))
				{
					echo "<error>youcantallocatemorethanyouhave</error>";
					$errors++;
				}

				// Either $name and $firstname or the $company must be inserted

				if($name == ''
				   && $company == '')
				{
						echo "myname";
						$errors++;

				}
				elseif($firstname == ''
				       && $company == '')
				{
					echo "myfirstname";
					$errors++;
				}
				elseif($email == '')
				{
					echo "emailadd";
					$errors++;
				}
				elseif(!validateEmail($email))
				{
					echo "emailiswrong";
					$errors++;
				}
				else
				{
					if(isset($_POST['new_loginname'])
					   && $_POST['new_loginname'] != '')
					{
						$accountnumber = intval($settings['system']['lastaccountnumber']);
						$loginname = validate($_POST['new_loginname'], 'loginname', '/^[a-z0-9\-_]+$/i');

						// Accounts which match systemaccounts are not allowed, filtering them

						if(preg_match('/^' . preg_quote($settings['customer']['accountprefix'], '/') . '([0-9]+)/', $loginname))
						{
							echo "loginnameissystemaccount";
							$errors++;
						}
						
						//Additional filtering for Bug #962
						if(function_exists('posix_getpwnam') && !in_array("posix_getpwnam",explode(",",ini_get('disable_functions'))) && posix_getpwnam($loginname)) {
							//standard_error('loginnameissystemaccount', $settings['customer']['accountprefix']);
							echo "loginnameissystemaccount";
							$errors++;
						}
					}
					else
					{
						$accountnumber = intval($settings['system']['lastaccountnumber']) + 1;
						$loginname = $settings['customer']['accountprefix'] . $accountnumber;
					}

					// Check if the account already exists

					$loginname_check = "SELECT `loginname` FROM `" . TABLE_PANEL_CUSTOMERS . "` WHERE `loginname` = '" . mysql_real_escape_string($loginname) . "'";
					$loginname_check_admin = "SELECT `loginname` FROM `" . TABLE_PANEL_ADMINS . "` WHERE `loginname` = '" . mysql_real_escape_string($loginname) . "'";
					$loginname_check = mysql_query($loginname_check);
					$loginname_check = mysql_fetch_array($loginname_check);
					$loginname_check_admin = mysql_query($loginname_check_admin);
					$loginname_check_admin = mysql_fetch_array($loginname_check_admin);

					if(strtolower($loginname_check['loginname']) == strtolower($loginname)
					   || strtolower($loginname_check_admin['loginname']) == strtolower($loginname))
					{
						echo "loginnameexists";
						$errors++;
					}
					elseif(!validateUsername($loginname, $settings['panel']['unix_names'], 14 - strlen($settings['customer']['mysqlprefix'])))
					{
						echo "loginnameiswrong";
						$errors++;
					}

					$guid = intval($settings['system']['lastguid']) + 1;
					$documentroot = makeCorrectDir($settings['system']['documentroot_prefix'] . '/' . $loginname);

					if(file_exists($documentroot))
					{
						//standard_error('documentrootexists', $documentroot);
						echo "documentrootexists";
						$errors++;
					}

					if($createstdsubdomain != '1')
					{
						$createstdsubdomain = '0';
					}

					if($phpenabled != '0')
					{
						$phpenabled = '1';
					}

					if($perlenabled != '0')
					{
						$perlenabled = '1';
					}

					if($password == '')
					{
						$password = substr(md5(uniqid(microtime(), 1)), 12, 6);
					}

					$_theme = $settings['panel']['default_theme'];
						if($errors == '0'){
						$result = mysql_query(
							"INSERT INTO `" . TABLE_PANEL_CUSTOMERS . "` SET
							`adminid` = '" . (int)$userinfo['adminid'] . "',
							`loginname` = '" . mysql_real_escape_string($loginname) . "',
							`password` = '" . substr(sha1(md5($password).$password.sha1($password)),-30,15) . "',
							`name` = '" . mysql_real_escape_string($name) . "',
							`firstname` = '" . mysql_real_escape_string($firstname). "',
							`gender` = '" . (int)$gender . "',
							`company` = '" . mysql_real_escape_string($company) . "',
							`street` = '" . mysql_real_escape_string($street) . "',
							`zipcode` = '" . mysql_real_escape_string($zipcode) . "',
							`city` = '" . mysql_real_escape_string($city) . "',
							`phone` = '" . mysql_real_escape_string($phone) . "',
							`fax` = '" . mysql_real_escape_string($fax) . "',
							`email` = '" . mysql_real_escape_string($email) . "',
							`customernumber` = '" . mysql_real_escape_string($customernumber) . "',
							`def_language` = '" . mysql_real_escape_string($def_language) . "',
							`documentroot` = '" . mysql_real_escape_string($documentroot) . "',
							`guid` = '" . mysql_real_escape_string($guid) . "',
							`diskspace` = '" . mysql_real_escape_string($diskspace) . "',
							`traffic` = '" . mysql_real_escape_string($traffic) . "',
							`subdomains` = '" . mysql_real_escape_string($subdomains) . "',
							`emails` = '" . mysql_real_escape_string($emails) . "',
							`email_accounts` = '" . mysql_real_escape_string($email_accounts) . "',
							`email_forwarders` = '" . mysql_real_escape_string($email_forwarders) . "',
							`email_quota` = '" . mysql_real_escape_string($email_quota) . "',
							`ftps` = '" . mysql_real_escape_string($ftps) . "',
							`tickets` = '" . mysql_real_escape_string($tickets) . "',
							`mysqls` = '" . mysql_real_escape_string($mysqls) . "',
							`standardsubdomain` = '0',
							`phpenabled` = '" . mysql_real_escape_string($phpenabled) . "',
							`imap` = '" . mysql_real_escape_string($email_imap) . "',
							`pop3` = '" . mysql_real_escape_string($email_pop3) . "',
							`aps_packages` = '" . (int)$number_of_aps_packages . "',
							`perlenabled` = '" . mysql_real_escape_string($perlenabled) . "',
							`email_autoresponder` = '" . mysql_real_escape_string($email_autoresponder) . "',
							`backup_allowed` = '" . mysql_real_escape_string($backup_allowed) . "',
							`theme` = '" . mysql_real_escape_string($_theme) . "'"
						);
						echo '1'.$settings['autoresponder']['autoresponder_active'].'1';
						$customerid = mysql_insert_id($link_id);
						$admin_update_query = "UPDATE `" . TABLE_PANEL_ADMINS . "` SET `customers_used` = `customers_used` + 1";
	
						if($mysqls != '-1')
						{
							$admin_update_query.= ", `mysqls_used` = `mysqls_used` + 0" . (int)$mysqls;
						}
	
						if($emails != '-1')
						{
							$admin_update_query.= ", `emails_used` = `emails_used` + 0" . (int)$emails;
						}
	
						if($email_accounts != '-1')
						{
							$admin_update_query.= ", `email_accounts_used` = `email_accounts_used` + 0" . (int)$email_accounts;
						}
	
						if($email_forwarders != '-1')
						{
							$admin_update_query.= ", `email_forwarders_used` = `email_forwarders_used` + 0" . (int)$email_forwarders;
						}
	
						if($email_quota != '-1')
						{
							$admin_update_query.= ", `email_quota_used` = `email_quota_used` + 0" . (int)$email_quota;
						}
	
						if($email_autoresponder != '-1'
							&& $settings['autoresponder']['autoresponder_active'] == 1)
						{
							$admin_update_query.= ", `email_autoresponder_used` = `email_autoresponder_used` + 0" . (int)$email_autoresponder;
						}
	
						if($subdomains != '-1')
						{
							$admin_update_query.= ", `subdomains_used` = `subdomains_used` + 0" . (int)$subdomains;
						}
	
						if($ftps != '-1')
						{
							$admin_update_query.= ", `ftps_used` = `ftps_used` + 0" . (int)$ftps;
						}
	
						if($tickets != '-1'
						   && $settings['ticket']['enabled'] == 1)
						{
							$admin_update_query.= ", `tickets_used` = `tickets_used` + 0" . (int)$tickets;
						}
	
						if(($diskspace / 1024) != '-1')
						{
							$admin_update_query.= ", `diskspace_used` = `diskspace_used` + 0" . (int)$diskspace;
						}
	
						if($number_of_aps_packages != '-1')
						{
							$admin_update_query.= ", `aps_packages_used` = `aps_packages_used` + 0" . (int)$number_of_aps_packages;
						}
	
						$admin_update_query.= " WHERE `adminid` = '" . (int)$userinfo['adminid'] . "'";
						mysql_query($admin_update_query);
						mysql_query("UPDATE `" . TABLE_PANEL_SETTINGS . "` " . "SET `value`='" . mysql_real_escape_string($guid) . "' " . "WHERE `settinggroup`='system' AND `varname`='lastguid'");
	
						if($accountnumber != intval($settings['system']['lastaccountnumber']))
						{
							mysql_query("UPDATE `" . TABLE_PANEL_SETTINGS . "` " . "SET `value`='" . mysql_real_escape_string($accountnumber) . "' " . "WHERE `settinggroup`='system' AND `varname`='lastaccountnumber'");
						}
	
						//$log->logAction(ADM_ACTION, LOG_INFO, "added user '" . $loginname . "'");
	
						$data = Array();
						$data['loginname'] = $loginname;
						$data['uid'] = $guid;
						$data['gid'] = $guid;
						$data['store_defaultindex'] = $store_defaultindex;
						$data = serialize($data);
						mysql_query('INSERT INTO `' . TABLE_PANEL_TASKS . '` (`type`, `data`) VALUES ("2", "' . mysql_real_escape_string($data) . '")');
	
						# Using filesystem - quota, insert a task which cleans the filesystem - quota
						if ($settings['system']['diskquota_enabled'])
						{
							mysql_query('DELETE FROM `' . TABLE_PANEL_TASKS . '` WHERE `type`="10"');
							mysql_query('INSERT INTO `' . TABLE_PANEL_TASKS . '` (`type`) VALUES ("10")');
						}
						// Add htpasswd for the webalizer stats
	
						if(CRYPT_STD_DES == 1)
						{
							$saltfordescrypt = substr(md5(uniqid(microtime(), 1)), 4, 2);
							$htpasswdPassword = crypt($password, $saltfordescrypt);
						}
						else
						{
							$htpasswdPassword = crypt($password);
						}
	
						if($settings['system']['awstats_enabled'] == '1')
						{
							echo "aws on ";
							mysql_query("INSERT INTO `" . TABLE_PANEL_HTPASSWDS . "` " . "(`customerid`, `username`, `password`, `path`) " . "VALUES ('" . (int)$customerid . "', '" . mysql_real_escape_string($loginname) . "', '" . mysql_real_escape_string($htpasswdPassword) . "', '" . mysql_real_escape_string(makeCorrectDir($documentroot . '/awstats/')) . "')");
							//$log->logAction(ADM_ACTION, LOG_NOTICE, "automatically added awstats htpasswd for user '" . $loginname . "'");
						}
						else
						{
							echo "webs on";
							mysql_query("INSERT INTO `" . TABLE_PANEL_HTPASSWDS . "` " . "(`customerid`, `username`, `password`, `path`) " . "VALUES ('" . (int)$customerid . "', '" . mysql_real_escape_string($loginname) . "', '" . mysql_real_escape_string($htpasswdPassword) . "', '" . mysql_real_escape_string(makeCorrectDir($documentroot . '/webalizer/')) . "')");
							//$log->logAction(ADM_ACTION, LOG_NOTICE, "automatically added webalizer htpasswd for user '" . $loginname . "'");
						}
	
						mysql_query('DELETE FROM `' . TABLE_PANEL_TASKS . '` WHERE `type`="1"');
						mysql_query('INSERT INTO `' . TABLE_PANEL_TASKS . '` (`type`) VALUES ("1")');
						$cryptPassword = makeCryptPassword(mysql_real_escape_string($password),1);
						$result = mysql_query("INSERT INTO `" . TABLE_FTP_USERS . "` " . "(`customerid`, `username`, `password`, `homedir`, `login_enabled`, `uid`, `gid`) " . "VALUES ('" . (int)$customerid . "', '" . mysql_real_escape_string($loginname) . "', '" . mysql_real_escape_string($cryptPassword) . "', '" . mysql_real_escape_string($documentroot) . "', 'y', '" . (int)$guid . "', '" . (int)$guid . "')");
						$result = mysql_query("INSERT INTO `" . TABLE_FTP_GROUPS . "` " . "(`customerid`, `groupname`, `gid`, `members`) " . "VALUES ('" . (int)$customerid . "', '" . mysql_real_escape_string($loginname) . "', '" . mysql_real_escape_string($guid) . "', '" . mysql_real_escape_string($loginname) . "')");
						$result = mysql_query("INSERT INTO `" . TABLE_FTP_QUOTATALLIES . "` (`name`, `quota_type`, `bytes_in_used`, `bytes_out_used`, `bytes_xfer_used`, `files_in_used`, `files_out_used`, `files_xfer_used`) VALUES ('" . mysql_real_escape_string($loginname) . "', 'user', '0', '0', '0', '0', '0', '0')");
						//$log->logAction(ADM_ACTION, LOG_NOTICE, "automatically added ftp-account for user '" . $loginname . "'");
	
						if($createstdsubdomain == '1')
						{
							if (isset($settings['system']['stdsubdomain'])
								&& $settings['system']['stdsubdomain'] != ''
							) {
								$_stdsubdomain = $loginname . '.' . $settings['system']['stdsubdomain'];
							}
							else
							{
								$_stdsubdomain = $loginname . '.' . $settings['system']['hostname'];
							}
	
							mysql_query("INSERT INTO `" . TABLE_PANEL_DOMAINS . "` SET " .
								"`domain` = '". mysql_real_escape_string($_stdsubdomain) . "', " .
								"`customerid` = '" . (int)$customerid . "', " .
								"`adminid` = '" . (int)$userinfo['adminid'] . "', " .
								"`parentdomainid` = '-1', " .
								"`ipandport` = '" . mysql_real_escape_string($settings['system']['defaultip']) . "', " .
								"`documentroot` = '" . mysql_real_escape_string($documentroot) . "', " .
								"`zonefile` = '', " .
								"`isemaildomain` = '0', " .
								"`caneditdomain` = '0', " .
								"`openbasedir` = '1', " .
								"`safemode` = '1', " .
								"`speciallogfile` = '0', " .
								"`specialsettings` = '', " .
								"`add_date` = '".date('Y-m-d')."'");
							$domainid = mysql_insert_id($link_id);
							mysql_query('UPDATE `' . TABLE_PANEL_CUSTOMERS . '` SET `standardsubdomain`=\'' . (int)$domainid . '\' WHERE `customerid`=\'' . (int)$customerid . '\'');
							//$log->logAction(ADM_ACTION, LOG_NOTICE, "automatically added standardsubdomain for user '" . $loginname . "'");
	
							mysql_query('DELETE FROM `' . TABLE_PANEL_TASKS . '` WHERE `type`="1"');
							mysql_query('INSERT INTO `' . TABLE_PANEL_TASKS . '` (`type`) VALUES ("1")');
						}
	
						if($sendpassword == '1')
						{
							$replace_arr = array(
								'FIRSTNAME' => $firstname,
								'NAME' => $name,
								'COMPANY' => $company,
								'SALUTATION' => getCorrectUserSalutation(array('firstname' => $firstname, 'name' => $name, 'company' => $company)),
								'USERNAME' => $loginname,
								'PASSWORD' => $password
							);
	
							// Get mail templates from database; the ones from 'admin' are fetched for fallback
	
							$result = mysql_query_first('SELECT `value` FROM `' . TABLE_PANEL_TEMPLATES . '` WHERE `adminid`=\'' . (int)$userinfo['adminid'] . '\' AND `language`=\'' . mysql_real_escape_string($def_language) . '\' AND `templategroup`=\'mails\' AND `varname`=\'createcustomer_subject\'');
							$mail_subject = html_entity_decode(replace_variables((($result['value'] != '') ? $result['value'] : $lng['mails']['createcustomer']['subject']), $replace_arr));
							$result = mysql_query_first('SELECT `value` FROM `' . TABLE_PANEL_TEMPLATES . '` WHERE `adminid`=\'' . (int)$userinfo['adminid'] . '\' AND `language`=\'' . mysql_real_escape_string($def_language) . '\' AND `templategroup`=\'mails\' AND `varname`=\'createcustomer_mailbody\'');
							$mail_body = html_entity_decode(replace_variables((($result['value'] != '') ? $result['value'] : $lng['mails']['createcustomer']['mailbody']), $replace_arr));
	
							$_mailerror = false;
							try {
								$mail->Subject = $mail_subject;
								$mail->AltBody = $mail_body;
								$mail->MsgHTML(str_replace("\n", "<br />", $mail_body));
								$mail->AddAddress($email, getCorrectUserSalutation(array('firstname' => $firstname, 'name' => $name, 'company' => $company)));
								$mail->Send();
							} catch(phpmailerException $e) {
								$mailerr_msg = $e->errorMessage();
								$_mailerror = true;
							} catch (Exception $e) {
								$mailerr_msg = $e->getMessage();
								$_mailerror = true;
							}
	
							if ($_mailerror) {
								//$log->logAction(ADM_ACTION, LOG_ERR, "Error sending mail: " . $mailerr_msg);
								echo "errorsendingmail";
							}
	
							$mail->ClearAddresses();
							//$log->logAction(ADM_ACTION, LOG_NOTICE, "automatically sent password to user '" . $loginname . "'");
							}
					}
				}
			}
else {
	echo "<error>no customer info or Reseller had to mutch Customers</error>";
	}	
}

if ($funk == 'reseller_del_customer'){
	$loginname = validate($_POST['loginname'], 'name');
	$del_all = is_numeric($_POST['del_all']); // 1=delete all || 0=delete user but NO Data
}
?>