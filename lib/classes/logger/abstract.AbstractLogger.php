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

/* We're using the syslog constants for all the loggers (partly implemented)

LOG_EMERG  	  system is unusable
LOG_ALERT 	  action must be taken immediately
LOG_CRIT 	    critical conditions
LOG_ERR 	    error conditions
LOG_WARNING 	warning conditions
LOG_NOTICE 	  normal, but significant, condition
LOG_INFO 	    informational message
LOG_DEBUG 	  debug-level message

*/

abstract class AbstractLogger
{
	/**
	 * Settings array
	 * @var settings
	 */

	private $settings = array();

	/** 
	 * Enable/Disable Logging
	 * @var logenabled
	 */

	private $logenabled = false;

	/** 
	 * Enable/Disable Cronjob-Logging
	 * @var logcronjob
	 */

	private $logcronjob = false;

	/** 
	 * Loggin-Severity
	 * @var severity
	 */

	private $severity = 1;

	// normal

	/**
	 * setup the main logger
	 *
	 * @param array settings
	 */

	protected function setupLogger($settings)
	{
		$this->settings = $settings;
		$this->logenabled = $this->settings['logger']['enabled'];
		$this->logcronjob = $this->settings['logger']['log_cron'];
		$this->severity = $this->settings['logger']['severity'];
	}

	protected function isEnabled()
	{
		return $this->logenabled;
	}

	protected function getSeverity()
	{
		return $this->severity;
	}

	protected function logCron()
	{
		return $this->logcronjob;
	}

	abstract public function logAction();
}

?>