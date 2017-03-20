<?php
include("../model/api.php");
session_start();

if (isset ($_SESSION['email']))
{
	$uEmail = $_SESSION['email'] ;
	$userID = $_SESSION['userID'];
	$uName = $_SESSION['username'];
}
else{
	
	echo ("You are not logged in <a href='../view/loginform.php'>login here </a>") ; 
} 
	$receiverID = $_GET['id'];
	$message = $_POST['msg'];
	
	
	
	
if (isset($_POST['sendmessage'])) {	

$filter_array = array('\bass(es|holes?)?\b', '\bshit(e|ted|ting|ty|head)?\b', '\bfuck(ed|er|ing|head)?\b');
    $filtered_text = $message;

    foreach($filter_array as $word)
    {
        $match_count = preg_match_all('/' . $word . '/i', $message, $matches);
        for($i = 0; $i < $match_count; $i++) // preg_match_all performs a global regular expression match with a for loop
            {
                $badwordstr = trim($matches[0][$i]); //trim removes white space from beginning and end of string
                $filtered_text = preg_replace('/\b' . $badwordstr . '\b/', str_repeat("*", strlen($badwordstr)), $filtered_text); // preg_replace performs a regex search and replaces filtered word with asterix 
            }   // str_repeat function to repeat the string, strlen finds the length so knows how many asterix to use
    }
 
	$res = sendmessage ($uName, $filtered_text, $receiverID);
	echo ("<script>window.location = '../view/sendmessage.php?id=$receiverID'</script>");
}

?>