<html>
<head>
<title>Safebook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">	
<div class="header">	

<?php
session_start();

if (isset($_SESSION['email']))
{
$uEmail = $_SESSION['email'];
$userID = $_SESSION['userID'];
$uName = $_SESSION['username'];


}

else echo "Please <a href='loginform.php'>log in</a> ,
			or <a href='signupform.php'>sign up</a> ";
			
?>
</div>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Safebook</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">My Profile</a></li>
		<li><a href="#">View Friends</a></li>
		<li><a href='viewmessage.php'>View Messages</a></li>
		<li><a href='../controller/logout.php'>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--<div class="content">-->
	<div class="container-fluid bg-1 text-center">
<!--<h1>Register a SafeBook account</h1>
	<form action="../controller/signup.php" method="POST" >
	Enter your Username : <input type="text" name="Name" placeholder="Username" required><br/> <br/>
    Enter your Email : <input type="email" name="Email" placeholder="Email Address" required><br/> <br/>
	Enter your Password : <input type="text" name="Password" placeholder="Password" required><br/> <br/>
	Confirm Password : <input type="text" name="Confirm" placeholder="Confirm Password" required><br/> <br/>
    <input type="submit" class ="button" value="Submit">
	</form>
</div>-->

  <form class="sign-up" action="../controller/signup.php" method="POST" >
    <h1 class="sign-up-title">Sign up for an acccount!</h1>
    <input type="text" class="sign-up-input" name="Name" placeholder="What's your username?" autofocus>
    <input type="email" class="sign-up-input" name="Email" placeholder="What's your email?" autofocus>
    <input type="password" class="sign-up-input" name="Password" placeholder="Choose a password">
    <input type="password" name="Confirm" class="sign-up-input" placeholder="Confirm Password" required><br/> <br/>
    <input type="submit" value="Sign up!" class="sign-up-button">
  </form>
</div>

</div>
</div>
</body>
</html>