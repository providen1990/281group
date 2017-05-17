<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    require 'templates/metaAndResources.php';
    require 'apiFunction.php';
    require 'connect.php';

    $arr= explode('=', getenv("REQUEST_URI"));
    $query = "SELECT * FROM user WHERE user_id=" . $arr[1];

    $response = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($response);

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
                    <h1 class="page-header"> <?php if ($row['role_id'] == 1) { echo "Tester: " . $row["name"];} else { echo "Manager: " . $row["name"];} ?> </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i><a href="main.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-list"></i><a href="Community.php">Community</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> User
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label> Experience </label>
                    <p> <?php echo $row["experience"]; ?> </p>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label> Device </label>
                    <p> <?php echo $row["skill"]; ?> </p>
                    <hr>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label> Contact </label>
                    <p> <?php echo $row["email"]; ?> </p>
                    <hr>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-6">

                    <form method="POST" action="" id="form">
                        <legend>Request Form</legend>
                        <input class="form-control" name="name" type="text" placeholder="enter your fullname" required><br />
                        <input class="form-control" name="email" type="email" placeholder="enter your email" required><br />
                        <input class="form-control" name="projectname" type="text" placeholder="enter project name" required><br />
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

require 'templates/jQueryAndJavascript.php'; ?>

</body>

</html>



