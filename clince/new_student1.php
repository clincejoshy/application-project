
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter new student details</title>
</head>
<body><h1>Enter new student details</h1>
<form action="#" method="post">
<b>Roll no</b>
    <input type="number" name="rollno"><br/><b>Name :</b>
    <input type="text" name="name"><br/><br/>
    <br/>
    <input type="submit">
</form>
<br/>
<h2>
Exsting student details
</h2>
<?php
error_reporting(0);
ini_set('display_errors', 0);

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
$itemName=$_POST["name"];
$iprice=$_POST["rollno"];
//$query_insert="insert into item values('$itemName','$iprice')";
//$query_select="select * from item;";
//mysqli_query($db,$query_insert) or die('Error querying database');
//mysqli_query($conn,$query_select);
if ($itemName!="" || $iprice!="") {
   
$sql = "insert into student values('$itemName','$iprice')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$sql1 = "SELECT * FROM student ORDER BY rollno ASC";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table><tr><th>Roll no</th><th>Name</th></tr>";
    while($row = $result->fetch_assoc()) {
		
        echo "<tr><td>".$row["rollno"]."</td><td>".$row["name"]."</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<h2>
Delete a Student record
</h2>
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
else
{
//echo "connected";

} 
echo "<select name='select'>";	
$sql3 = mysqli_query($conn, "SELECT * From student ORDER BY rollno ASC");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['rollno']."'>".$row['rollno']."</option>" ;
}
echo "</select>"
   //<input type="button" value="delete">
?>
<input type="button" value="Delete" action="#">
</body>
</html>