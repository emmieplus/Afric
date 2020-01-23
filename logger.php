<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$username = $_POST['us'];
$password = $_POST['pw'];
$password = md5($password); 
 
$sql = "SELECT * FROM users WHERE sid='$username' AND password='$password' AND role='admin'"; 
$result = $conn->query($sql);
if ($result->num_rows == 1 ) {
 
    // output data of each row
    while($row = $result->fetch_assoc()) { 
		if ($row["role"] == "admin"){
			$_SESSION["id"] = $row["id"];
			$_SESSION["sid"] = $row["sid"];
			$_SESSION["surname"] = $row["surname"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["gender"] = $row["gender"];
			$_SESSION["avatar"] = $row["dp"];
			$_SESSION["role"] = $row["role"];
		
			//declaring cookies
			$staff_name = $row["surname"];
			$staff_gender = $row["gender"];
			$staff_sid = $row["sid"];
			
			//setting cookies
			setcookie("staff_name", $staff_name, time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("staff_gender", $staff_gender, time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("staff_sid", $staff_sid, time() +(86400 * 30), "/"); // 86400 = 1 day
			if($_COOKIE['staff_gender'] == ("male" || "MALE")) {
				setcookie("staff_avatar", "images/img_avatar3.png", time() + (86400 * 30), "/"); // 86400 = 1 day
			} else { 
				setcookie("staff_avatar", "images/img_avatar4.png", time() + (86400 * 30), "/"); // 86400 = 1 day
			}
			
			echo "<br>session complete";
			$_SESSION['comment'] = "";
			header('Location: ./home.php');
			//header('home.php') ;//08101336055
		}else{
			$_SESSION['comment'] = "Sorry, You are not a Staff <a href='studentindex.php'>GOTO STUDENT LOGIN</a></br>";
			header('Location: ./index.php'); 
		}
	}
}
else {
    $_SESSION['comment'] = "Sorry, Invalid login credential.</br>";
	header('Location: ./index.php'); 
}
$conn->close();
 

/*
// prepare and bind
$stmt = $conn->prepare("INSERT INTO test (sid, surname, othernames) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $sid, $firstname, $lastname);
//taking values
// set parameters and execute
$sid = "D614j878";
$firstname = "aliyu";
$lastname = "abdulbasit";
//$email = "john@example.com";
if ($stmt->execute()) 
{ 
echo "New records created successfully";
}
else{
	echo "No record created";
} 
$stmt->close();
$conn->close();*/
?>