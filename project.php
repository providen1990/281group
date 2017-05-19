<?php
session_start();
if($_SESSION['username'] == ''){
    echo "Please Login";
    exit();
}

$connection1 = mysqli_connect('aamlirqxmyy6o6.ctytw0bcszve.us-west-2.rds.amazonaws.com', 'root', '1234qwer');
if (!$connection1) {
    die("Database Connection Failed" . mysqli_error($connection1));
}
$select_db1 = mysqli_select_db($connection1, 'ebdb');
if (!$select_db1) {
    die("Database Selection Failed" . mysqli_error($connection1));
}
$arr1= explode('=', getenv("REQUEST_URI"));
$query1 = "SELECT * FROM projects WHERE project_id=" . $arr1[1];

$response1 = mysqli_query($connection1, $query1);
$row1 = mysqli_fetch_assoc($response1);

setcookie($row1["project_id"], $row1["project_name"], time() - 3600);
setcookie($row1["project_id"], $row1["project_name"], time() + 60);
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php 
require 'templates/metaAndResources.php';


?>

</head>

<body>

    <div id="wrapper">
        <?php
        require 'templates/navbar.php';

        $arr= explode('=', getenv("REQUEST_URI"));
        $query = "SELECT * FROM projects WHERE project_id=" . $arr[1];

        $response = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($response);

        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> <?php echo $row["project_name"]; ?> </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="main.php">Dashboard</a>
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

                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Project Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tester" role="tab">Tester Registration</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="home" role="tabpanel">
                            <p>&nbsp;</p>
                            <p class="text-left"><strong>Project Description:</strong></p>
                            <p class="text-left"> <?php echo $row["project_description"]; ?> </p>

                            <p class="text-left"><strong>Skills Required:</strong></p>
                            <p class="text-left"> <?php echo $row["skill_required"]; ?> </p>

                            <p class="text-left"><strong>Project Start Date:</strong></p>
                            <p class="text-left"> <?php echo $row["project_start_date"]; ?> </p>

                            <p class="text-left"><strong>Project End Date:</strong></p>
                            <p class="text-left"> <?php echo $row["project_end_date"]; ?> </p>

                        </div>
                        <div class="tab-pane" id="tester" role="tabpanel">

                            <div class="row">

                                <div class="col-lg-6">

                                    <form method="POST" action="test.php" id="form">
                                        <p>&nbsp;</p>
                                        <input class="form-control" name="name" type="text" placeholder="enter your fullname" required><br />
                                        <input class="form-control" name="email" type="email" placeholder="enter your email" required><br />

                                        <!--<div class='input-append date form_datetime'>
                                            <input type='text' class="form-control " placeholder="Tester Start Date" required/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div><br />


                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" placeholder="Tester End Date" required/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div><br />-->


                                        <textarea class="form-control" rows="4"  name="comment" form="form" placeholder="comment"></textarea><br />
                                        <button class="btn btn-primary" type="submit" name="submit" value= "<?php echo htmlspecialchars($arr[1]); ?>" > <a href="Manage_Projects.php" style="color:white">Apply </button>
                                    </form>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>

	



            <!-- container-fluid, the search form -->
            </div>
        <!-- page-wrapper, page contain search form-->
        </div>
    <!-- wrapper, contain nav and everything-->
    </div>





<?php 
mysqli_close($connection);
require 'templates/jQueryAndJavascript.php'; ?>

</body>

</html>