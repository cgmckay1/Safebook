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
			
$profileID = '54';			
			
if(isset($_POST["add"])) {
	 $request = sendRequest($userID, $profileID);
	 echo 'it worked';
 }else{
	 echo 'failure';
 }
 ?>