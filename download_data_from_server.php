<?php
	
	function PrintData_from_database($MyData){
		$response = array();

		$response["persons"] = array();
		
		while ( ($row = $MyData -> fetch_assoc()) != false ){
			$person = array();
			$person["id"] = $row["id"];
			$person["Name"] = $row["Name"];

			array_push($response["persons"], $person);
			
		}

		$response["success"] = 1;
		echo json_encode($response);
		
	}



	require 'db_config.php';
	$mysqli = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	$mysqli -> query ("SET NAMES 'utf8'");

	
	$MyData = $mysqli -> query (" SELECT * FROM `test_table` ");
	PrintData_from_database($MyData);


	$mysqli -> close();

	

?>