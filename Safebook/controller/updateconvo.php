<?php

include_once("../model/api.php");

session_start();

if (isset ($_SESSION['email']))
{
	$userID = $_SESSION['userID'];
	$receiverID = $_GET['id'];
	
	$conversation = displayConversation ($uName, $receiverID);
	
}else{
	echo "broken";
}
?>