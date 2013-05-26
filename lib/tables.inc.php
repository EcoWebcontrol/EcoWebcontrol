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

define('TABLE_FTP_GROUPS', 'ftp_groups');
define('TABLE_FTP_USERS', 'ftp_users');
define('TABLE_FTP_QUOTALIMITS', 'ftp_quotalimits');
define('TABLE_FTP_QUOTATALLIES', 'ftp_quotatallies');
define('TABLE_MAIL_USERS', 'mail_users');
define('TABLE_MAIL_VIRTUAL', 'mail_virtual');
define('TABLE_PANEL_ADMINS', 'panel_admins');
define('TABLE_PANEL_CUSTOMERS', 'panel_customers');
define('TABLE_PANEL_DATABASES', 'panel_databases');
define('TABLE_PANEL_DOMAINS', 'panel_domains');
define('TABLE_PANEL_HTACCESS', 'panel_htaccess');
define('TABLE_PANEL_HTPASSWDS', 'panel_htpasswds');
define('TABLE_PANEL_SESSIONS', 'panel_sessions');
define('TABLE_PANEL_SETTINGS', 'panel_settings');
define('TABLE_PANEL_TASKS', 'panel_tasks');
define('TABLE_PANEL_TEMPLATES', 'panel_templates');
define('TABLE_PANEL_TRAFFIC', 'panel_traffic');
define('TABLE_PANEL_TRAFFIC_ADMINS', 'panel_traffic_admins');
define('TABLE_PANEL_DISKSPACE', 'panel_diskspace');
define('TABLE_PANEL_DISKSPACE_ADMINS', 'panel_diskspace_admins');
define('TABLE_PANEL_LANGUAGE', 'panel_languages');
define('TABLE_PANEL_IPSANDPORTS', 'panel_ipsandports');
define('TABLE_PANEL_TICKETS', 'panel_tickets');
define('TABLE_PANEL_TICKET_CATS', 'panel_ticket_categories');
define('TABLE_PANEL_LOG', 'panel_syslog');
define('TABLE_MAIL_AUTORESPONDER', 'mail_autoresponder');
define('TABLE_PANEL_PHPCONFIGS', 'panel_phpconfigs');
define('TABLE_APS_PACKAGES', 'aps_packages');
define('TABLE_APS_INSTANCES', 'aps_instances');
define('TABLE_APS_SETTINGS', 'aps_settings');
define('TABLE_APS_TASKS', 'aps_tasks');
define('TABLE_APS_TEMP_SETTINGS', 'aps_temp_settings');
define('TABLE_PANEL_CRONRUNS', 'cronjobs_run');
define('TABLE_PANEL_REDIRECTCODES', 'redirect_codes');
define('TABLE_PANEL_DOMAINREDIRECTS', 'domain_redirect_codes');
define('TABLE_PANEL_IPDOCROOTSETTINGS', 'ipsandports_docrootsettings');
define('TABLE_PANEL_DOMDOCROOTSETTINGS', 'domain_docrootsettings');
define('TABLE_API_KEY', 'api_key'); //Tabel for new API-Key´s
define('TABLE_MULTISERVER', 'api_multiserver'); //Table for new Multiserver


/* +++ New Extensions Tables */
define('THEMES', 'extensions_theme'); //Tabel for new Design management
define('PLUGINS', 'extensions_plugins');
define('LANGUAGE', 'extensions_language');


/* 
 * 
 * @TODO:Edit ewc.sql in /install with the new tabel structure
 *  
 * */

// APS constants

define('TASK_INSTALL', 1);
define('TASK_REMOVE', 2);
define('TASK_RECONFIGURE', 3);
define('TASK_UPGRADE', 4);
define('TASK_SYSTEM_UPDATE', 5);
define('TASK_SYSTEM_DOWNLOAD', 6);
define('INSTANCE_INSTALL', 1);
define('INSTANCE_TASK_ACTIVE', 2);
define('INSTANCE_SUCCESS', 3);
define('INSTANCE_ERROR', 4);
define('INSTANCE_UNINSTALL', 5);
define('PACKAGE_LOCKED', 1);
define('PACKAGE_ENABLED', 2);

// VERSION INFO

$version = '0.0.1';
$dbversion = '2';
$branding = '-Alpha';
