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
echo "name".itemName."price".iprice;
$db="mess";
$query_insert="insert into item values(".itemName.",".price.")";
$query_select="select * from item";
mysqli_query($db,$query_insert) or die('Error querying database');
mysqli_query($db,$query_select) or die('Error querying database');

?>