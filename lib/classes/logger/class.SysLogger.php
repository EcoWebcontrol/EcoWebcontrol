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

class SysLogger extends AbstractLogger
{
	/**
	 * Userinfo
	 * @var array
	 */

	private $userinfo = array();

	/**
	 * Syslogger Objects Array
	 * @var loggers
	 */

	static private $loggers = array();

	/**
	 * Class constructor.
	 *
	 * @param array userinfo
	 * @param array settings
	 */

	protected function __construct($userinfo, $settings)
	{
		parent::setupLogger($settings);
		$this->userinfo = $userinfo;
	}

	/**
	 * Singleton ftw ;-)
	 *
	 */

	static public function getInstanceOf($_usernfo, $_settings)
	{
		if(!isset(self::$loggers[$_usernfo['loginname']]))
		{
			self::$loggers[$_usernfo['loginname']] = new SysLogger($_usernfo, $_settings);
		}

		return self::$loggers[$_usernfo['loginname']];
	}

	public function logAction($action = USR_ACTION, $type = LOG_NOTICE, $text = null)
	{
		if(parent::isEnabled())
		{
			if(parent::getSeverity() <= 1
			   && $type == LOG_NOTICE)
			{
				return;
			}

			$_action = 'unknown';

			switch($action)
			{
				case USR_ACTION:
					$_action = 'customer';
					break;
				case RES_ACTION:
					$_action = 'reseller';
					break;
				case ADM_ACTION:
					$_action = 'administrator';
					break;
				case CRON_ACTION:
					$_action = 'cronjob';
					break;
				case LOG_ERROR:
					$_action = 'internal';
					break;
				default:
					$_action = 'unknown';
					break;
			}

			if(!isset($this->userinfo['loginname'])
			   || $this->userinfo['loginname'] == '')
			{
				$name = 'unknown';
			}
			else
			{
				$name = " (" . $this->userinfo['loginname'] . ")";
			}

			openlog("Froxlor", LOG_NDELAY, LOG_USER);

			if($text != null
			   && $text != '')
			{
				syslog((int)$type, "[" . ucfirst($_action) . " Action" . $name . "] " . $text);
			}
			else
			{
				syslog((int)$type, "[" . ucfirst($_action) . " Action" . $name . "] No text given!!! Check scripts!");
			}

			closelog();
		}
	}
}

?>
