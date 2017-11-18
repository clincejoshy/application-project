<?php
echo $_POST["iname"];
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo $_POST["iname"];
$itemName=$_POST["iname"];
$iprice=$_POST["price"];
echo "name".$itemName."price".$iprice;
$db="mess";
$query_insert="insert into item values(".$itemName.",".$iprice.")";
$query_select="SELECT * from item";
mysqli_query($conn,$query_insert) or die('Error querying database');
mysqli_query($conn,$query_select) or die('Error querying database');

?>