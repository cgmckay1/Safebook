<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="container">
	<div class="header">	
<?php
session_start();

if (isset ($_SESSION['email']))
{
	$uEmail = $_SESSION['email'] ;
	$userID = $_SESSION['userID'];
	$uName = $_SESSION['username'];
	echo "Logged in as $uName". "<br>";
}
else{
	
	echo ("You are not logged in <a href='loginform.php'>login here </a>") ; 
} 
	
	
	include("../model/api.php");
	
?>
</div>
	<div class="content">
	<h1>Your Messages</h1>
<a href="index.php">Return</a>

	
	<?php
	include_once("../model/api.php") ;
	
	$display = displaymessages ($userID);
?>
</div>
</div>
</body>
</html>