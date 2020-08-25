<?php
require("../config.inc.php");
$conn = mysqli_connect(
    $config['database_host'], 
    $config['database_user'], 
    $config['database_pass'], 
    $config['database_database']
);

function validateCaptcha($privatekey, $response) {
	$responseData = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$response));
	return $responseData->success;
}
?>