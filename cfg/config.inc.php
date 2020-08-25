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
    $config['database_database'] = 'fourground';
    $config['database_user'] = 'root';
    $config['database_pass'] = '';
	
	if($config['project_debug'] = true) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}

    $config['recaptcha_secret'] = '';
    $config['recaptcha_sitekey'] = '';    
?>