<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mobile Tester</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>


<body>

<div class = "col-md-2 col-md-offset-5">
    <form method = "post" action = "authenticate.php">

        <div class = "text-center"> <h2> Login </h2> </div><br />

        <input type = "text" name = "username" placeholder="Username" class="form-control" /> <br />
        <input type = "password" name = "password" placeholder="Password" class="form-control" /> <br />

        <div class="text-center">
            <input type = "submit" class="btn btn-primary" name = "LOGIN" />
            <a href="registration.php" class="btn btn-default">Register</a>

        </div>
    </form>
</div>




</body>

</html>