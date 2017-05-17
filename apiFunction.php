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
?>