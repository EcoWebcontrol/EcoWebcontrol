<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta http-equiv="Default-Style" content="text/css" />
        <if $settings['panel']['no_robots'] == '0'>
            <meta name="robots" content="noindex, nofollow, noarchive" />
            <meta name="GOOGLEBOT" content="nosnippet" />
        </if>
        <if AREA == 'admin'><link rel="stylesheet" href="templates/{$theme}/assets/css/phpinfo.css"></if>
        <link rel="stylesheet" href="templates/{$theme}/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="templates/{$theme}/assets/css/main.css">
        <link rel="icon" href="templates/{$theme}/assets/img/favicon.ico" type="image/x-icon" />
        <title><if isset($userinfo['loginname']) && $userinfo['loginname'] != ''>{$userinfo['loginname']} - </if>EWC Server Management Panel</title>
    </head>
    <body>
    <if isset($userinfo['loginname'])>
    
        <div class="navbar navbar-fixed-top">
            <a href="{$index_url}" class="brand"><img src="templates/EWC/assets/img/alpha.gif" /></a>
            <div class="navbar-inner">
                <div class="container">
                	<div class="nav-collapse">
    
                        $navigation
                        </ul><!-- /id="topnav" -->
                        
                	</div><!-- /nav-collapse -->
                </div><!-- /container -->
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->
    
    </if>
    
    <if isset($userinfo['loginname'])>
        <div class="container">
            <div class="content">
    <else>
        <div class="container">
        <div class="loginpage">
    </if>