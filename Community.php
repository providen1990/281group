<?php
session_start();
if($_SESSION['username'] == ''){
    echo "Please Login";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php 
require 'templates/metaAndResources.php'; 
require_once 'connect.php';
require 'apiFunction.php';
?>

</head>

<body>

    <div id="wrapper">
        <?php require 'templates/navbar.php'; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Community </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="main.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Community
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-9">
                        <form method="get" action="">
                            <div class="form-group input-group">

                                <input type="text" class="form-control" name="searchText" required>
                                <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>

                                <select class="form-control" style="max-width:200px;" name="searchType">
                                    <option value="name">By Name</option>
                                    <option value="project">By Project</option>
                                    <option value="skill">By Skill</option>
                                </select>
                       
                            </div>
                        </form>
		    </div>
		</div>

    <?php
        extract($_GET);
        $sql = "";
	if ($searchType == "name") {
		$sql = "Select user_id,name,email,experience,skill,user_rating from `user` WHERE name LIKE '%$searchText%' ";
	}
	if ($searchType == "project") {
		$sql = "select u.user_id,u.name,u.email,u.experience,u.skill,u.user_rating from user u , projects p, users_project up where u.user_id = up.user_id and p.project_id = up.project_id and p.project_name LIKE '%$searchText%'";

	}
	if ($searchType == "skill") {
		$sql = "Select user_id,name,email,experience,skill,user_rating from `user` WHERE skill LIKE '%$searchText%' ";
		
	}
    if ($sql != "") {
        if ($result = mysqli_query($connection, $sql)) {
            $row_cnt = mysqli_num_rows($result);
            if ($row_cnt >= 1) {
                echo '<div class="row">';
                echo '<div class="col-lg-12">';
                echo '<h2>Search Results</h2>';
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered table-hover">';
                echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Experience</th><th>Skill</th><th>User Rating</th></tr></thead>';
                echo '<tbody>';
                #echo '<tr><th>Name</th><th>Email</th><th>Experience</th><th>Skill</th><th>User #Rating</th></tr>';
                $count = 1;
                while ($row2 = mysqli_fetch_assoc($result)) {

                    echo '<tr>';
                    foreach ($row2 as $key => $value) {

                        if ($key == "user_id") echo '<td>', $count, '</td>';

                        else if ($key == "name") {

                            $temp = "User_Profile.php?user_id=" . $row2["user_id"];
                            echo "<td><a href=" . $temp . ">" . $value . "</a></td>";
                        } else echo '<td>', $value, '</td>';

                    }
                    echo '</tr>';
                    $count++;
                }
                echo '</tbody></table></div></div></div><br />';

            } else echo "<p>No records found</p>";

            /* close result set*/
            mysqli_free_result($result);

        }
    }
    else {

        $sql = "select user_id As count, user_id, Sum(num_bug_report) As TotalBug, Count(testcase_id) as TotalTestcase from record group by user_id ORDER by ToTalBug DESC ";
        $result = mysqli_query($connection, $sql);
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<h2>Recommended</h2>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead><tr><th>ID</th><th>Name</th><th>Total Bug Found</th><th>Total Testcase</th></tr></thead>';
        echo '<tbody>';
        #echo '<tr><th>Name</th><th>Email</th><th>Experience</th><th>Skill</th><th>User #Rating</th></tr>';
        $count = 1;
        while ($row2 = mysqli_fetch_assoc($result)) {

            echo '<tr>';
            foreach ($row2 as $key => $value) {

                if ($key == "count") {

                    echo '<td>', $count, '</td>';
                }
                else if ($key == "user_id") {

                    $temp = "User_Profile.php?user_id=" . $row2["user_id"];
                    echo "<td><a href=" . $temp . ">" . getNameByID($row2['user_id'], $connection) . "</a></td>";
                }
                else if ($key == "TotalBug"){
                    echo '<td>', $value, '</td>';
                }
                else if ($key == "TotalTestcase"){
                    echo '<td>', $value, '</td>';
                }

            }
            echo '</tr>';
            $count++;
        }
        echo '</tbody></table></div></div></div><br />';

    }
	// close db connection
	mysqli_close($connection);

?><!-- container-fluid, the search form -->
            </div>
        <!-- page-wrapper, page contain search form-->
        </div>
    <!-- wrapper, contain nav and everything-->
    </div>




//-------------------------ending tags---------------------------------------------
<?php 

require 'templates/jQueryAndJavascript.php'; ?>

</body>

</html>

