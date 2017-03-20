<?php
	session_start();

	if (isset($_SESSION['email']))
	{
		$uEmail = $_SESSION['email'];
		$userID = $_SESSION['userID'];
		$uName = $_SESSION['username'];


	}

	
	
	include_once("../model/api.php") ;
	
	$avatar = $_POST['avatar'];
	$bio = $_POST['bio'];
	$checkBox = implode(', ', $_POST['interest']);

	
	$insert = insertAvatar($avatar, $bio, $uEmail, $checkBox);
	
		
	
	
	?>
		