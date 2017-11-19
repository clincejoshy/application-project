<!DOCTYPE html>
<html>
<body>

<table style="width:100%">
  <tr>
    <th>rollno</th>
    <th>name</th> 
    <th>total bill</th>
  </tr>
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
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

while($row = $result->fetch_assoc()){
$rollno=$row["rollno"];

$name=$row["name"];

$sql1 = "SELECT sum(tprice) FROM sconsumption where rollno='$rollno'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row


while($row1 = $result1->fetch_assoc()){
$totalbill=$row1["sum(tprice)"];
echo "<tr>";
echo "    <td>'$rollno'</td>";
echo "   <td>'$name'</td>";
echo "   <td>'$totalbill'</td>";
 echo "</tr>";}
}else{
echo "0 results";
}

  }
}else{
echo "0 results";
}
?>
</body>
</html>
