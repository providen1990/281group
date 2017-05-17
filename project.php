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


$arr= explode('=', getenv("REQUEST_URI"));
$query = "SELECT * FROM projects WHERE project_id=" . $arr[1];

$response = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($response);

setcookie($row["project_id"], $row["project_name"], time() - 3600);
setcookie($row["project_id"], $row["project_name"], time() + 60);



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
                        <h1 class="page-header"> <?php echo $row["project_name"]; ?> </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-list"></i><a href="Manage_Projects.php">Manage Projects</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Project
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                    	<label> Description </label>
                        <p> <?php echo $row["project_description"]; ?> </p>
                       
		    </div>
		</div>
		<div class="row">
                    <div class="col-lg-12">
                    	<label> Skills Required </label>
                        <p> <?php echo $row["skill_required"]; ?> </p>
                    	<hr>   
		    </div>
		    
		</div>
		
		<div class="row">
		
                    <div class="col-lg-6">
                    	
                    	<form method="POST" action="test.php" id="form">
                    	    <legend>Apply Form</legend>
                    	    <input class="form-control" name="name" type="text" placeholder="enter your fullname" required><br />
                    	    <input class="form-control" name="email" type="email" placeholder="enter your email" required><br />
                    	    <textarea class="form-control" rows="4"  name="comment" form="form" placeholder="comment"></textarea><br />
                            <button class="btn btn-primary" type="submit" name="submit" value= "<?php echo htmlspecialchars($arr[1]); ?>" > Apply </button>
                       	</form>
		    </div>
		</div>

	



            <!-- container-fluid, the search form -->
            </div>
        <!-- page-wrapper, page contain search form-->
        </div>
    <!-- wrapper, contain nav and everything-->
    </div>




//-------------------------ending tags---------------------------------------------
<?php 
mysqli_close($connection);
require 'templates/jQueryAndJavascript.php'; ?>

</body>

</html>