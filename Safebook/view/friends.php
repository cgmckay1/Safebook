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




include_once("navbar.html");			
?>
</div>



<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<div class = "row">
		<div class="container">
	
			<div class="col-sm-6">
				<?php
		
					$content = displayFriends($userID);
				?>
			</div>
	
		
		
			<div class="col-sm-6">
				<div id = "confirmation">
			
				<?php $request = displayRequests($userID);?>
				
				</div>
	
			</div>
		</div>
	
</div>
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Safebook</p> 
</footer>
	<script>

function accept(int){
	
	var v = new XMLHttpRequest() ;
			v.onreadystatechange = function() {
			if((this.readyState == 4) && (this.status == 200)){
				document.getElementById("confirmation").innerHTML = this.responseText;
			}};
			v.open("GET", "../controller/accept.php?id=" + int , true) ;
			v.send() ;
			}
			
function decline(int){
	
	var v = new XMLHttpRequest() ;
			v.onreadystatechange = function() {
			if((this.readyState == 4) && (this.status == 200)){
				document.getElementById("confirmation").innerHTML = this.responseText;
			}};
			v.open("GET", "../controller/decline.php?id=" + int , true) ;
			v.send() ;
			}
	
</script>


</div>
</body>
</html>