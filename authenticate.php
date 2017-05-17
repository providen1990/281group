<?php
	require_once ('connect.php');
	require('apiFunction.php');
	extract($_POST);

	// hash the password
	$pass = hash("sha256", $password);
	// query check
	$query = "SELECT email, password FROM user WHERE email=" . quote($username) . " and password=" . quote($pass);
	$response = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($response);
	mysqli_close($connection);
	// check if there is the row in db
	if($row){
		//start session when login session end when user close browser
		session_start();
		$_SESSION["username"] = $username;
		Redirect("main.php");
	}
	else Redirect("index.php");
	
	/*--------------------------helper function------------------------*/
	function quote($text){
		return "'" . $text . "'";
	}


?>
