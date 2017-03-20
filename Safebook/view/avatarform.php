<html>
<head>
<title>Safebook</title>
<link rel="stylesheet" type="text/css" href="style.css">
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

	else { echo "Please <a href='loginform.php'>log in</a> ,
			or <a href='signupform.php'>sign up</a> ";
			
	}

	include_once("navbar.html");
	

?>
</div>

<?php
if (isset($_SESSION['email']))
	{ ?>

<div class="container-fluid bg-1 text-center">
	<div id="content">
	
		
		<h2>Please select Your Avatar</h2>
		
	<div id="avatars">
		<form action="../controller/avatar.php" method="POST" >
			<label>
				<input type="radio" name="avatar" class="radio" value="img/avatars/king.png" checked />
					<img src="../view/img/avatars/king.png" alt="king"/>
			</label>
  
			<label>
				<input type="radio" name="avatar" class="radio" value="img/avatars/knight.png"/>
					<img src="../view/img/avatars/knight.png" alt="knight"/>
			</label>
  
			<label>
				<input type="radio" name="avatar" class="radio" value="img/avatars/princess.png"/>
					<img src="../view/img/avatars/princess.png" alt="princess"/>
			</label>
  
			<label>
				<input type="radio" name="avatar" class="radio" value="img/avatars/wizard.png"/>
					<img src="../view/img/avatars/wizard.png" alt="wizard"/>
			</label><br/>
			
			<label class="bio">
				<textarea id = "biotext" name="bio" cols="40" rows="3" placeholder="Write a status here"></textarea>
			</label><br/>
			
			<h2>Interests</h2>
			
			<label id = "checkbox">
				<input type="checkbox" class = "checkbox" name="interest[]" value="Sports">Sports<br>
				<input type="checkbox" class = "checkbox" name="interest[]" value="Music">Music<br>
				<input type="checkbox" class = "checkbox" name="interest[]" value="Films/TV">Films/TV<br>
				<input type="checkbox" class = "checkbox" name="interest[]" value="Science">Science<br>
				<input type="checkbox" class = "checkbox" name="interest[]" value="Gaming">Gaming<br>
				<input type="checkbox" class = "checkbox" name="interest[]" value="Reading">Reading<br>
				<input type="checkbox" class = "checkbox" name="interest[]" value="Shopping">Shopping<br>
				
			</label><br/>
			
			<input type="submit" value="Submit"><br/>
  
		</form>
  
	</div>
	
	</div>
	</div>
<?php

	}else{

		echo "Please <a href='loginform.php'>log in</a> ,
			or <a href='signupform.php'>sign up</a> ";
	} ?>
		
		
<footer class="container-fluid bg-4 text-center">
  <p>Safebook</p> 
</footer>
</div>


</body>
</html>