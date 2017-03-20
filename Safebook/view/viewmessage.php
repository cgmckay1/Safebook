<html>
<head>
<title>Safebook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">	
<div class="header">	

<?php
include ("../model/api.php"); 
session_start();

if (isset($_SESSION['email']))
{
$uEmail = $_SESSION['email'];
$userID = $_SESSION['userID'];
$uName = $_SESSION['username'];

}

else echo "Please <a href='loginform.php'>log in</a> ,
			or <a href='signupform.php'>sign up</a> ";


include_once("navbar.html");			
?>
</div>
<?php
if (isset($_SESSION['email']))
	{ ?>


<!-- First Container -->
<div class="container-fluid bg-1 text-center">
	<div id="content">
	<?php
		$content = displaymessages($uName);
		

	?>
	</div>
</div>
<?php
	}else{
		
		echo "Please <a href='loginform.php'>log in</a> ,
			or <a href='signupform.php'>sign up</a> ";
	}?>




<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Safebook</p> 
</footer>

	
	


</div>
</body>
</html>