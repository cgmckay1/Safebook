	<?php
	include_once("../model/api.php") ;
	
		//$uEmail = $_POST["Email"] ;
		//$uPassword = $_POST["Password"] ;

		$uEmail = trim($_POST['Email']);
		$uEmail = strip_tags($uEmail);
		$uEmail = htmlspecialchars($uEmail);
		
		$uPassword = trim($_POST['Password']);
		$uPassword = strip_tags($uPassword);
		$uPassword = htmlspecialchars($uPassword);
		
		$salt1 = 'abcd' ;
		$salt2 = 'efgh' ;
		$saltedpassword = $salt1.$uPassword.$salt2;
	
		$token = hash('ripemd128', $saltedpassword);
		
			$result = userLogin($uEmail, $token) ;
			$rows = $result->num_rows;
			
			if ($rows == 1) {

				$row = mysqli_fetch_assoc($result);
				$userID = $row["userID"];
				$uName = $row["Username"];
				
				session_start();
				$_SESSION['email'] = $uEmail;
				$_SESSION['username'] = $uName;
				$_SESSION['userID'] = $userID;
				
				
				echo "<script>window.location = '../view/index.php'</script>";			
				
			}
			else {
				echo "<script type='text/javascript'>alert('login failed!')</script>";
				echo ("<script>window.location = '../view/loginform.php'</script>") ; 
			}
		
		
		

	?> 

