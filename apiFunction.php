<?php
function getSearchResult($searchText, $searchType) {

	$link = "http://" . $_SERVER['HTTP_HOST'] . "/CMPE281/api/search_result.php?searchText=" . $searchText . "&searchType=" . $searchType;
	return file_get_contents($link);	
}

function Redirect($url){
    //header("Location:  " . $url);
    print "<script type='text/javascript'>
   	     	window.location = '". $url ."'; </script>";
    exit();
}

function getIDByEmail($email, $connection){

    $query = "SELECT user_id,email FROM user WHERE email='$email'";
    $response = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($response);
    return $row['user_id'];
}

function getNameByID($id, $connection){

    $query = "SELECT name FROM user WHERE user_id='$id'";
    $response = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($response);
    return $row['name'];
}
?>