<?php
//   arcader configuration file.
//   Uncomment values by removing the // before changing!
	
    $config = array();

	$config['project_debug'] = true;
	$config['project_name'] = 'Arcader';
	$config['project_domain'] = 'spacemy.xyz';
	$config['project_owner'] = 'tydentlor';
    $config['project_discord'] = 'https://discord.gg/WjYeQNd';
    
    $config['database_host'] = 'localhost';
    $config['database_database'] = '1120044';
    $config['database_user'] = '1120044';
    $config['database_pass'] = 'Svetlana12';
	
	if($config['project_debug'] = true) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}

    $config['recaptcha_secret'] = '';
    $config['recaptcha_sitekey'] = '';    
?>