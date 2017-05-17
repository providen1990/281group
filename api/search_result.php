<?php 
require_once '../connect.php';


$fullLink = 'http://' . $_SERVER['HTTP_HOST'] . getenv('REQUEST_URI');
$fullLinkArr = parse_url($fullLink);
parse_str($fullLinkArr['query'], $varArr);

$query = "";
// Manage_Project
if ($varArr['searchType'] == 'projectName'){//search query
    $searchText = $varArr['searchText'];
    $query = "SELECT p.project_id,p.project_name,p.project_start_date,p.project_end_date,p.project_description,p.project_estimated_effort,p.skill_required FROM `projects` p WHERE project_name LIKE '%$searchText%' ";
}
else if ($varArr['searchType'] == 'managerName'){
    $searchText = $varArr['searchText'];
    $query = "SELECT p.project_id,p.project_name,p.project_start_date,p.project_end_date,p.project_description,p.project_estimated_effort,p.skill_required  FROM user u, users_project up, projects p WHERE up.project_id = p.project_id and up.user_id = u.user_id and u.role_id =2 and u.name like '%$searchText%' ";
}
else if ($varArr['searchType'] == 'skill'){
    $searchText = $varArr['searchText'];
    $query = "SELECT p.project_id,p.project_name,p.project_start_date,p.project_end_date,p.project_description,p.project_estimated_effort,p.skill_required  FROM user u, users_project up, projects p WHERE up.project_id = p.project_id and up.user_id = u.user_id  and u.skill like '%$searchText%' ";
}

// Community
else if ($varArr['searchType'] == 'name'){
    $searchText = $varArr['searchText'];
    $query = "Select user_id,name,email,experience,skill,user_rating from `user` WHERE name LIKE '%$searchText%' ";
}
else if ($varArr['searchType'] == 'project'){
    $searchText = $varArr['searchText'];
    $query = "select u.user_id,u.name,u.email,u.experience,u.skill,u.user_rating from user u , projects p, users_project up where u.user_id = up.user_id and p.project_id = up.project_id and p.project_name LIKE '%$searchText%'";
}
else if ($varArr['searchType'] == 'testerSkill'){
    $searchText = $varArr['searchText'];
    $query = "Select user_id,name,email,experience,skill,user_rating from `user` WHERE skill LIKE '%$searchText%' ";
}
else{
    $searchText = $varArr['searchText'];
}

$result = mysqli_query($connection, $query);
$arr = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($arr, $row);
}

echo json_encode($arr, JSON_PRETTY_PRINT); // this give json string. Use json_decode($temp, true) to get array from json
// close db connection
mysqli_close($connection);
?>