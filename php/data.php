<html>
<head>

<meta http-equiv="refresh" content="4;URL='disp.php'">
<body>
<?php

if($_COOKIE["user"]=="1"){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dfk";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO vol (fullname, phone, email)
VALUES ('Raj', '8089435053', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
	$last_id=$last_id/2;
   // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt = $conn->prepare("DELETE FROM `vol` WHERE `vol`.`id` = ?");
$stmt->bind_param("i", $last_id1);

// set parameters and execute
$last_id1=$last_id*2;
$stmt->execute();

//To increment gradually irrespective of the extra insertion for last_id
$stmt = $conn->prepare("UPDATE `vol` SET id=? WHERE id=? ");
$stmt->bind_param("ii", $t_id,$original_id);

// set parameters and execute
$t_id=$last_id;
$original_id=($last_id*2)-1;

$stmt->execute();



$conn->close();

$cookie_name = "user";
$cookie_value = "2";
setcookie($cookie_name, $cookie_value, time() + 20, "/"); 

$cookie_name = "id";
$cookie_value = $last_id;
setcookie($cookie_name, $cookie_value, time() + 3600, "/"); 

}

?>

<h1 align="center">Thank You</h1>
<p align="center"><br>Please wait a few seconds, you will be redirected.</p>
</body>
</head>
</html>