<?php

	$POST_is_here = isset($_POST);
	if ($POST_is_here == true){
		
		$ValuePOST = file_get_contents('php://input');
		$MyArray = json_decode($ValuePOST, true);
		$UserName = $MyArray['Name'];

		require 'db_config.php';
		$mysqli = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		$mysqli -> query ("SET NAMES 'utf8'");

		$result = $mysqli -> query ("INSERT INTO `test_table` (`Name`) VALUES ('$UserName')");

		$mysqli -> close();
	}
	
?>