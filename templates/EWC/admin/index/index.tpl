$header
	<article>

	<if 0 < $awaitingtickets && $settings['ticket']['enabled'] == 1 >
        <div class="alert alert-error">
            <a class="close" data-dismiss="alert">&times;</a>
            <h4 class="alert-heading">{$lng['admin']['warning']}</h4>
            {$awaitingtickets_text}
        </div>
	</if>

    <div style="width:100%; overflow:hidden;"></div>

    <ul class="nav nav-pills">
      <li class="active"><a href="#ressource" data-toggle="pill">{$lng['admin']['ressourcedetails']}</a></li>
      <li><a href="#systemdetails" data-toggle="pill">{$lng['admin']['systemdetails']}</a></li>
      <li><a href="#froxlordetails" data-toggle="pill">{$lng['admin']['EcoWebcontroldetails']}</a></li>
      <li><a href="#phpinfo" data-toggle="pill">{$lng['admin']['phpinfo']}</a></li>
    </ul>

<div class="tab-content">
	<div class="tab-pane active" id="ressource">
		<table class="table table-bordered table-striped">
		<tr>
			<td width="50%">{$lng['admin']['customers']} ({$lng['admin']['usedmax']}):</td>
			<td>{$overview['number_customers']} ({$userinfo['customers']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['domains']} ({$lng['admin']['usedmax']}):</td>
			<td>{$overview['number_domains']} ({$userinfo['domains']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['subdomains']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['subdomains_used']} ({$userinfo['subdomains_used']}/{$userinfo['subdomains']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['diskspace']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['diskspace_used']} ({$userinfo['diskspace_used']}/{$userinfo['diskspace']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['traffic']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['traffic_used']} ({$userinfo['traffic_used']}/{$userinfo['traffic']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['mysqls']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['mysqls_used']} ({$userinfo['mysqls_used']}/{$userinfo['mysqls']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['emails']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['emails_used']} ({$userinfo['emails_used']}/{$userinfo['emails']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['accounts']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['email_accounts_used']} ({$userinfo['email_accounts_used']}/{$userinfo['email_accounts']})</td>
		</tr>
		<tr>
			<td>{$lng['customer']['forwarders']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['email_forwarders_used']} ({$userinfo['email_forwarders_used']}/{$userinfo['email_forwarders']})</td>
		</tr>
		<if $settings['system']['mail_quota_enabled'] == 1>
		<tr>
			<td>{$lng['customer']['email_quota']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['email_quota_used']} ({$userinfo['email_quota_used']}/{$userinfo['email_quota']})</td>
		</tr>
		</if>
		<if $settings['autoresponder']['autoresponder_active'] == 1>
		<tr>
			<td>{$lng['customer']['autoresponder']}  ({$lng['admin']['usedmax']}):</td>
			<td>{$userinfo['email_autoresponder_used']} ({$userinfo['email_autoresponder']})</td>
		</tr>
		</if>
		<if (int)$settings['aps']['aps_active'] == 1>
		<tr>
			<td>{$lng['aps']['numberofapspackages']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['aps_packages_used']} ({$userinfo['aps_packages_used']}/{$userinfo['aps_packages']})</td>
		</tr>
		</if>
		<tr>
			<td>{$lng['customer']['ftps']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['ftps_used']} ({$userinfo['ftps_used']}/{$userinfo['ftps']})</td>
		</tr>
		<if $settings['ticket']['enabled'] == 1>
		<tr>
			<td>{$lng['customer']['tickets']} ({$lng['admin']['used']} ({$lng['admin']['assignedmax']})):</td>
			<td>{$overview['tickets_used']} ({$userinfo['tickets_used']}/{$userinfo['tickets']})</td>
		</tr>
		</if>
		</table>
	</div>
    
	<div class="tab-pane" id="systemdetails">
		<table class="table table-bordered table-striped">
		<tr>
			<td width="50%">{$lng['admin']['serversoftware']}:</td>
			<td>{$_SERVER['SERVER_SOFTWARE']}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['phpversion']}:</td>
			<td>{$dash['phpversion']}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['phpmemorylimit']}:</td>
			<td>{$dash['phpmemorylimit']}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['mysqlserverversion']}:</td>
			<td>{$dash['mysqlserverversion']}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['mysqlclientversion']}:</td>
			<td>{$dash['mysqlclientversion']}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['webserverinterface']}:</td>
			<td>{$dash['webserverinterface']}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['sysload']}:</td>
			<td>{$dash['load']}</td>
		</tr>
		<if $showkernel == 1>
			<tr>
				<td>Kernel:</td>
				<td>{$dash['kernel']}</td>
			</tr>
		</if>
		<if $uptime != ''>
		<tr>
			<td>Uptime:</td>
			<td>{$dash['uptime']}</td>
		</tr>
		</if>
		<if $localtime != ''>
		<tr>
			<td>Servertime:</td>
			<td>$localtime</td>
		</tr>
		</if>
		</table>
		<table class="table table-bordered table-striped">
		<tr>
			<td><img src="?page=pic_states"></td>

		</tr>
		</table>
    </div>
        
	<div class="tab-pane" id="froxlordetails">
		<table class="table table-bordered table-striped">
		{$outstanding_tasks}		
		{$cron_last_runs}
		<tr>
			<td width="50%">{$lng['admin']['installedversion']}:</td>
			<td>{$version}{$branding}</td>
		</tr>
		
		<if $updateserveroffline == TRUE>
			<tr>
				<td>{$lng['admin']['latestversion']}:</td>
					<td>-</td>
			</tr>
			
			<tr>
				<td colspan="2"><strong>{$lng['error']['updateserveroffline']}</strong></td>
			</tr>
		</if>

		<if $updateserveroffline == FALSE>
			<tr>
				<td>{$lng['admin']['latestversion']}:</td>
				<if $isnewerversion != 0 >
					<td><strong>$lookfornewversion_lable</strong></td>
				<else>
					<td>$lookfornewversion_lable</td>
				</if>
			</tr>
			<if $isnewerversion != '0' >
			<tr>
				<td colspan="2"><strong>{$lng['admin']['newerversionavailable']}</strong></td>
			</tr>
				<if $lookfornewversion_addinfo != ''>
				<tr>
					<td colspan="2">$lookfornewversion_addinfo</td>
				</tr>
				</if>
			</if>
		</if>
		</table>
	</div>
	<div class="tab-pane" id="phpinfo">
		<table class="table table-bordered table-striped">
		<if $phpinfo != ''>
		<tr>
			<td>$phpinfo</td>
		</tr>
		</if>
		</table>
    </div>
</div>

	</article>
$footer

