<?php
include ("../model/api.php"); 
session_start();

if (isset($_SESSION['email']))
{
$uEmail = $_SESSION['email'];
$userID = $_SESSION['userID'];
$uName = $_SESSION['username'];

$profileID = $_GET['id'];	

	
	$text = declineRequest($userID, $profileID);
	echo "Friend request declined";

}else{}
?>