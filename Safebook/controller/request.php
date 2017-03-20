<?php
include ("../model/api.php"); 
session_start();

if (isset($_SESSION['email']))
{
$uEmail = $_SESSION['email'];
$userID = $_SESSION['userID'];
$uName = $_SESSION['username'];

$proName = $_GET['var'];	
$profileID = $_GET['id'];	
echo $proName;
echo $profileID;


$text = sendRequest($userID, $profileID, $uName, $proName);
}else{}




?>