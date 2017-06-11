<?php

	require_once('mysql.php');
	
	$db = new MySQL();

	header('Content-Type: application/json');

    if (isset($_GET['id'])) {
		
		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = $db->prepare("INSERT INTO `logged_actions` (`action`, `ip`) VALUES (?, ?)");
		$sql->execute(array("Fetched unicorn information, unicorn id: " . $_GET['id'], $ip));
		
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://unicorns.idioti.se/" . $_GET['id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "Accept: application/json"
            ),
        ));
       
        $json = curl_exec($curl);
        $error = curl_error($curl);
	}
	else
	{
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://unicorns.idioti.se/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "Accept: application/json"
            ),
        ));
       
        $json = curl_exec($curl);
        $error = curl_error($curl);
	}
	
	if ($json != null)
		echo json_encode($json);
	if ($error != null)
		echo json_encode($error);
	
?>
