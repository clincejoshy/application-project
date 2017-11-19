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
echo "Connected successfully<br>";
$studname=$_POST["select"];
$sqld = "select * from sconsumption where sconsumption.name = '$studname'";

if ($conn->query($sqld) === FALSE){
    echo "Error: " . $sqld . "<br>" . $conn->error;
}
$sql1 = "SELECT * FROM sconsumption where rollno=".$studname;
$sql2 = "select sum(tprice) from sconsumption where rollno=".$studname;
$result = $conn->query($sql1);
$result1 = $conn->query($sql2);
$row1 = $result1->fetch_assoc();
if ($result->num_rows > 0) {
    // output data of each row
	echo "<table>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td> <td>" . $row["date"]. "</td> <td>" . $row["itemname"]. "</td> <td>" . $row["tprice"]. "</td></tr><br>" ;
	echo "</table>";
	
    }
	echo "Total price is ". $row1["sum(tprice)"];
} else {
    echo "Go and eat. Not took anything!<br> Total amount is 0";
}
//header('Location:xyz.php');
$conn->close();
?>