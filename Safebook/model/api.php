<?php

//http://www.sitepoint.com/forums/showthread.php?581621-Friends-Request-in-PHP	
function userLogin ($uEmail, $uPassword) {
	//  function to login
	
		//  connect to database
	include("serverlogin.php");
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	// select the item from the database
	$sql = "select * from Users where email='".$uEmail."' AND password='".$uPassword."'" ;
	$result = $conn->query($sql);
	

		
	//  return the resultant query
	return $result ;
	
	// close connection
	$conn -> close() ;
	
	}
	
function insertUser ($uName, $uEmail, $token) {
	//  function to insert a new user
	
	//  connect to database
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	// see if the item exists.
	$sql = "select * from Users where email='".$uEmail."'" ;
	$result = $conn->query($sql);
	if ($result -> num_rows > 0 )
	{
		echo ("Email already in use, <a href='../view/signupform.php'>please register</a>") ;
		return false ; 		
	}
				
	
	else {
		$sql = "insert into Users(Username, email, password) values ('".$uName."', '".$uEmail."', '".$token."') " ;		
		$result2 = $conn->query($sql);
		$userID = $conn->insert_id;
	
			session_start();
				$_SESSION['email'] = $uEmail;
				$_SESSION['userID'] = $userID;
				$_SESSION['username'] = $uName;
			echo ("<script>window.location = '../view/avatarform.php'</script>");
			return true ;
		


	}

	// close connection
	$conn -> close() ;
	
} 

function myProfile ($userID){

//  connect to database
include("serverlogin.php");
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// select the item from the database

	$sql = "select * from Users where userID = $userID" ;
	$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)){
	echo '<img src="' .$row["avatar"]. '"/>';
	echo '<h3>' .$row["Username"]. '</h3>';
	echo '<p>' .$row["bio"]. '</p>';
	echo '<p>' .$row["interests"]. '</p>';
}
		
// close connection
$conn -> close() ;
}

function otherProfile ($userID, $profileID){

//  connect to database
include("serverlogin.php");
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// select the item from the database

	$sql = "select * from Users where userID = $profileID" ;
	$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)){
	
	echo '<img src="' .$row["avatar"]. '"/>';
	echo '<h3>' .$row["Username"]. '</h3>';
	echo '<p>' .$row["bio"]. '</p>';
	echo '<p>' .$row["interests"]. '</p>';
}
		
// close connection
$conn -> close() ;
}

function sendRequest($userID, $profileID, $uName, $proName ){
	include("serverlogin.php");
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	 $sql= "SELECT * FROM request WHERE senderID = '" . $userID . "' AND receiverID = '" . $profileID . "'";
	 echo $sql;
	 $result = $conn->query($sql);
      if($result -> num_rows > 0) {
		  
		echo "Friend request has already been sent"; 
	  return false;

	  }else{
			$sql2 = "INSERT INTO request SET senderID = '" . $userID . "', senderName = '".$uName."', receiverID = '" . $profileID . "', receiverName = '".$proName."'";
			$result2 = $conn->query($sql2);
			
			echo $uName." request sent to ".$profileID;

	  }

	    
		
	  $conn -> close() ;
	  
	
}


function displayProfiles () {
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	
	
	$sql = "SELECT userID, Username FROM Users ORDER BY userID DESC";
	
	
			$result = $conn->query($sql);
	

			if ($result->num_rows > 0) {
				echo "<div class='table-responsive'><table class='table'><tr><th>User ID</th><th>Username</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					$id = $row['userID'];
					$name = $row['Username'];
					echo "<tbody>";
					echo "<tr>";
					echo "<td>".$row["userID"]."</td>";
					echo "<td>".$row["Username"]."</td>";
					echo  "<td><a href='../view/profile.php?id=$id&name=$name'>Visit Profile</a></td>";					
					echo  "<td><a href='../view/sendmessage.php?id=$name'>Message User</a></td>";
					echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			} else {
				echo "0 results";
			}
			$conn->close();
}



	
function sendmessage ($uName, $filtered_text, $receiverID) {
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$sql = "INSERT INTO Chats (message, senderID, receiverID) VALUES ('$filtered_text', '$uName', '$receiverID') ";
	
	$result = $conn->query($sql);
	
	$conn->close();	
}


	
function displaymessages ($uName) {
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
$sql = "SELECT senderID,message FROM Chats WHERE chatID IN (SELECT MAX(chatID) FROM Chats WHERE receiverID = '$uName' GROUP BY senderID) ORDER BY chatID DESC ";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<div class='table-responsive'><table class='table'><tr><th>From</th><th></th><th>Message</th></tr>";
				// output data of each row
			while($row = $result->fetch_assoc()) {
				
			$senderID = $row["senderID"];
				echo "<tbody>";
				echo "<tr>";
				echo "<td>".$row["senderID"]."</td>";
				echo "<td></td>";
				echo "<td>".$row["message"]."</td>";
				echo  "<td><a href='../view/sendmessage.php?id=$senderID'>View Chat</a></td>";
				echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			} else {
				echo "0 Messages";
			}
			$conn->close();
}


function displayRequests($userID){
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * FROM request where receiverID = '" . $userID . "' AND confirmation IS NULL";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<div class='table-responsive'><table class='table'><tr><th>Friend Requests</th><th></th></tr>";
				// output data of each row
			while($row = $result->fetch_assoc()) {
				
			$requestName = $row["senderName"];
			$requestID = $row["senderID"];
			
				echo "<tbody>";
				echo "<tr>";
				echo "<td>You have a friend request from $requestName</td>";
				echo  "<td><button id='accept' onclick='accept($requestID)' >Accept</button> <button id='decline' onclick='decline($requestID)' >Decline</button></td>";
				echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			} else {
				echo "No new friend requests :(";
			}
			$conn->close();
	
}

function acceptRequest($userID, $profileID){
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "INSERT INTO Friends (userID, friendID) VALUES ('$userID', '$profileID') ";
	$sql2 = "UPDATE request SET confirmation ='ACCEPTED' where receiverID = $userID AND senderID = $profileID";
	
	$result = $conn->query($sql);
	$reslut2 = $conn->query($sql2);
	
	$conn->close();	
	
}

function declineRequest($userID, $profileID){
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "UPDATE request SET confirmation ='DECLINED' where receiverID = $userID AND senderID = $profileID";
	echo $sql;
	
	$result = $conn->query($sql);
	
	$conn->close();	
	
	
}

function insertAvatar($avatar, $bio, $uEmail, $checkBox) {
	//  function to insert avatar and bio
	
	//  connect to database
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	// insert query
	$sql = "UPDATE Users SET avatar = '".$avatar."', bio = '".$bio."', interests = '" . $checkBox . "' where email='".$uEmail."'" ;
	$result = $conn->query($sql);
	
	echo "<script>window.location = '../view/index.php'</script>";
	
	
	return $result ;
	
	$conn->close();
	
}

	


function displayConversation ($uName, $receiverID) {
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	
	
	$sql = "SELECT * FROM Chats WHERE senderID = '".$uName."' AND receiverID = '".$receiverID."' OR senderID = '".$receiverID."' AND receiverID = '".$uName."' ORDER BY chatID ASC";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<div class='table-responsive'><table class='table'><tr><th>From</th> <th></th><th>Message</th></tr>";
				// output data of each row
			while($row = $result->fetch_assoc()) {
				
			$senderID = $row["senderID"];
			
				echo "<tbody>";
				echo "<tr>";
				echo "<td>".$row["senderID"]."</td>";
				echo "<td> </td>";
				echo "<td>".$row["message"]."</td>";
				echo "</tr>";
			echo "</div>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			} else {
				echo "0 Messages";
			}
			$conn->close();
}
function displayfriends ($userID) {
	
	include("serverlogin.php");
	
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * FROM request WHERE confirmation = 'ACCEPTED' ";
	
			$result = $conn->query($sql);
	

			if ($result->num_rows > 0) {
				echo "<div class='table-responsive'><table class='table'><tr><th>Username</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$name = $row['senderName'];
					$id = $row['senderID'];
					echo "<tbody>";
					echo "<tr>";
					echo "<td>".$row["senderName"]."</td>";
					echo  "<td><a href='../view/profile.php?id=$id&name=$name'>Visit Profile</a></td>";					
					echo  "<td><a href='../view/sendmessage.php?id=$name'>Message User</a></td>";
					echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			} else {
				echo "0 results";
			}
			$conn->close();
}

?>