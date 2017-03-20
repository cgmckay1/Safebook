<html>
<head>
</head>
<body>

	
	<?php
		include_once("../model/api.php") ;
	

	
	$uName = trim($_POST['Name']);
	$uName = strip_tags($uName);
	$uName = htmlspecialchars($uName);
	
	$uEmail = trim($_POST['Email']);
	$uEmail = strip_tags($uEmail);
	$uEmail = htmlspecialchars($uEmail);
	
	$uPassword = trim($_POST['Password']);
	$uPassword = strip_tags($uPassword);
	$uPassword = htmlspecialchars($uPassword);
	
	$uConfirm = trim($_POST['Confirm']);
	$uConfirm = strip_tags($uConfirm);
	$uConfirm = htmlspecialchars($uConfirm);
	
if ($_POST["Password"] == $_POST["Confirm"]) {
   // success!	
		$salt1 = 'abcd' ;
		$salt2 = 'efgh' ;
		$saltedpassword = $salt1.$uPassword.$salt2;
		$token = hash('ripemd128', $saltedpassword);
		
		$result = insertUser($uName, $uEmail, $token) ;
}
else {
   // failed :(
   echo ("Failed to create account, passwords did not match :(") ;
}		
	?> 
	
</body>
</html>