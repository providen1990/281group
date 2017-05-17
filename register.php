<?php
	require_once ('connect.php');
	
	extract($_POST);
	
	//prepare, process query
	$pass = hash("sha256", $password);
	$query = "INSERT INTO user (email,name,password,role_id,experience,skill) VALUES (" . quote($email) . ", " . quote($name) . ", " . quote($pass) . ", " . quote($role_id) . ", " . quote($experience) . ", " . quote($skill) . ");";
	$response = mysqli_query($connection, $query);
	mysqli_close($connection);
		
	
	
	//display to browser
	if($response == TRUE){
		//start session when login session end when user close browser
		session_start();
		$_SESSION["username"] = $username;
		Redirect("main.php");
	}
	else{
	
		Redirect("index.php");
	}
	
	/*--------------------------helper function------------------------*/
	function quote($text){
		return "'" . $text . "'";
	}
	
	function Redirect($url){
    		//header("Location:  " . $url);
   		print "<script type='text/javascript'>
   	     	window.location = '". $url ."'; </script>";
    		exit();
	}
?>

