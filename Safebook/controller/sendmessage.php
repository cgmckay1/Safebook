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
	echo "Logged in as $uEmail". "<br>";
}
else{
	
	echo ("You are not logged in <a href='loginform.php'>login here </a>") ; 
} 
	$sellerid = $_GET['id'];
	$message = $_POST['msg'];
	
	
	include("../model/serverlogin.php");
	
if (isset($_POST['sendmessage'])) {	
	$message = sendmessage ($userID);
}

?>
</div>
<div class="content">
	<h1>Message the Seller</h1>
	<a href="index.php">Return</a>
	<form action="sendmessage.php?id=<?php echo $sellerid; ?>" method="POST" enctype='multipart/form-data' onsubmit="return confirm('Are you sure you want to message this user?');" > 
	<textarea name="msg" cols="40" rows="4" placeholder="Message the seller"></textarea>	
    <input type="submit" name="sendmessage" value="Send Message" >
	</form>
</div>
</div>
</form>
</body>
</html> 