<html>
<head>
<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
</style>
<body style="background-color:#A4FDFF">
<?php

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

$stmt = $conn->prepare("SELECT * FROM vol WHERE id = ?");
$stmt->bind_param("s", $editID);
$editID=$_COOKIE["id"];
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$name=$row["fullname"];
$phone=$row["phone"];
$email=$row["email"];
$address=$row["address"];
$gender=$row["gender"];
$help=$row["help"];

$conn->close();

?>

<h2 align="center"> <br>Thank you for volunteering <?php echo $name ?>. <br><br>We will contact you through <?php echo $email." and ".$phone?> when required. <br><br> We have noted your address and the 
respective team will contact you if people need help in 2 km radius.</h2>
<br>
<img src="pic.jpg" alt="Do For Kerala Icon" style="width:auto;height:auto;" class = "center">


<h1></h1>
</body>
</head>
</html>