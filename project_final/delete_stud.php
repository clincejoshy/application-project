<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="mess";

// Create connection
$conn =mysqli_connect($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully<br>";
$itemName=$_POST["select"];
$sqld = "delete from student where student.rollno = $itemName";

if ($conn->query($sqld) === FALSE){
    echo "Error: " . $sqld . "<br>" . $conn->error;
}
else
{
	echo "Roll no ".$itemName." removed successfully";
	
}

$conn->close();
header('Location:new_student1.php');
?>