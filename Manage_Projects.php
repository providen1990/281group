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
                        <h1 class="page-header"> Manage Projects </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Manage Projects
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
                                    <option value="projectName">By Project Name</option>
                                    <option value="managerName">By Manager Name</option>
                                    <option value="skill">By Skill</option>
                                </select>
                       
                            </div>
                        </form>
		    </div>
		</div>

    <?php
        extract($_GET);

	if ($searchType == "projectName") {
	
		$sql = "SELECT p.project_id,p.project_name,p.project_start_date,p.project_end_date,p.project_description,p.project_estimated_effort,p.skill_required FROM `projects` p WHERE project_name LIKE '%$searchText%' ";
	}
	else if ($searchType == "managerName") {
	
		$sql = "SELECT p.project_id,p.project_name,p.project_start_date,p.project_end_date,p.project_description,p.project_estimated_effort,p.skill_required  FROM user u, users_project up, projects p WHERE up.project_id = p.project_id and up.user_id = u.user_id and u.role_id =2 and u.name like '%$searchText%' ";
	}
	else if ($searchType == "skill") {
	
		$sql = "SELECT p.project_id,p.project_name,p.project_start_date,p.project_end_date,p.project_description,p.project_estimated_effort,p.skill_required  FROM user u, users_project up, projects p WHERE up.project_id = p.project_id and up.user_id = u.user_id  and u.skill like '%$searchText%' ";
	}
	/*else{
		$sql = "SELECT * FROM `projects` WHERE project_start_date >" . $_COOKIE["lasttime"];
		setcookie("lasttime", time(), time() + 3600*24*30, "/demo1");
	}*/
	
	
	if ($result = mysqli_query($connection, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		if ($row_cnt >= 1) {
			echo '<div class="row">';
			echo '<div class="col-lg-12">';
			echo '<h2>Search Results</h2>';
			echo '<div class="table-responsive">';
			echo '<table class="table table-bordered table-hover">';
			echo '<thead><tr><th>Id</th><th>Project Name</th><th>Start Date</th><th>End Date</th><th>Description</th><th>Effort</th><th>Skill Needed</th></tr></thead>';
			echo '<tbody>';
			#echo '<tr><th>Name</th><th>Email</th><th>Experience</th><th>Skill</th><th>User #Rating</th></tr>';
			$count=1;
			while ($row2 = mysqli_fetch_assoc($result)) {
				
				echo '<tr>';
				foreach ($row2 as $key => $value) {
					
					if ($key == "project_id") echo '<td>', $count, '</td>';

					else if ($key == "project_name"){
						
						$temp= "project.php?project_id=" . $row2["project_id"];
						echo "<td><a href=" . $temp . ">" . $value . "</a></td>";
					}
					else echo '<td>', $value, '</td>';
					
				}
				echo '</tr>';
				$count++;
			}
			echo '</tbody></table></div></div></div><br />';
			
		} else echo "<p>No records found</p>";
		
		/* close result set*/
		mysqli_free_result($result);
		
	}
	// close db connection
	mysqli_close($connection);

?>




            <!-- container-fluid, the search form -->
            </div>
        <!-- page-wrapper, page contain search form-->
        </div>
    <!-- wrapper, contain nav and everything-->
    </div>




//-------------------------ending tags---------------------------------------------
<?php 

//  <a href='project.php?project_id=1'>a link</a>

require 'templates/jQueryAndJavascript.php'; ?>

</body>

</html>