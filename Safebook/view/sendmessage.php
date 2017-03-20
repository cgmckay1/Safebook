<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
<div class="header">	
<?php
include("../model/api.php");
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
$receiverID = $_GET['id'];

include_once("navbar.html");
?>
</div>
<div class="container-fluid bg-1 text-center">
<div class="content">
	<h1>Message this User</h1>
	<?php
	$conversation = displayConversation ($uName, $receiverID);
	?>
	
	<form action="../controller/send.php?id=<?php echo $receiverID; ?>" method="POST" enctype='multipart/form-data' onsubmit="return confirm('Are you sure you want to message this user?');" > 
	<textarea id ="chattext" name="msg" cols="40" rows="4" placeholder="Message this user"></textarea>	
    <input type="submit" name="sendmessage" value="Send Message" >
	</form>
</div>
</div>
<footer class="container-fluid bg-4 text-center">
  <p>Safebook</p> 
</footer>
</div>
</form>
</body>
</html> 