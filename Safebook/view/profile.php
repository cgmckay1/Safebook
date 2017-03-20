<html>
<head>
<title>Safebook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

$profileID = $_GET['id'];
$proName = $_GET['name'];


include_once("navbar.html");			
?>
</div>



<!-- First Container -->
<div class="container-fluid bg-1 text-center">
	<div id="content">
	<?php
		$content = otherProfile($userID, $profileID);

	?>
	
	<button id="add" value="send friend request" type="submit" onclick="sendRequest('<?php echo $proName; ?>', <?php echo $profileID?>);">Add friend</button>
	</div>
	<div id = "requestSent">
	</div>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Message this user</h3>
  <p>Report this user</p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Safebook</p> 
</footer>

<script>

function sendRequest(int,x){
	
	var v = new XMLHttpRequest() ;
			v.onreadystatechange = function() {
			if((this.readyState == 4) && (this.status == 200)){
				document.getElementById("requestSent").innerHTML = this.responseText;
			}};
			v.open("GET", "../controller/request.php?id=" + x + "&var=" + int, true) ;
			v.send() ;
			}
	
</script>

</div>
</body>
</html>