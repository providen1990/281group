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

<body background="crop.gif">

<div class = "col-md-2 col-md-offset-5">

<form method="post" action="register.php">
	<div class = "text-center"> <h2> Registration </h2> </div><br />
	<input type="email" class="form-control" name="username" placeholder="Email" required /> <br />
	<input type="password" class="form-control" name="password" placeholder="Password" required /> <br />
	<input type="text" class="form-control" name="name" placeholder="Full-name" required /> <br />
    <input type="text" class="form-control" name="experience" placeholder="Experience in Years" required /> <br />
    <input type="text" class="form-control" name="skill" placeholder="Skills" required /> <br />
    <fieldset>
        <input type="checkbox" name="role_id" value="1" />Tester <br />
        <input type="checkbox" name="role_id" value="2" />Manager<br />
    </fieldset>
	<div class="text-center"> 
  	  <input type="submit" class="btn btn-secondary" name="submit" />
	</div>
	
</form>
</div>






</body>

</html>