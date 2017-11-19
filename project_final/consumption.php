<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consumption</title>
</head>
<body>
<form action="ctable.php" method="post">
<b>Select the student roll no</b>
<select name="roll_no">
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
echo "connected";

} 
$sql3 = mysqli_query($conn, "SELECT * From student ORDER BY rollno ASC");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['rollno']."'>".$row['rollno']."</option>" ;
}
echo "</select>";
?>
<br/><br/>
<b>Select item</b>
<select name="item">
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
echo "connected";

} 
$sql03 = mysqli_query($conn, "SELECT * From item");
$row = mysqli_num_rows($sql03);

while ($row = mysqli_fetch_array($sql03)){
echo "<option value='".$row['item_name']."'>".$row['item_name']."</option>" ;
}
?>
</select><br/><br/>
    <b>Enter the quantity consumed</b>
    <input type="number" name="quantity"><br/><br/>
    <input type="submit" value="Submit">
</form>



<h3>Links</h3>
<a href=xyz.php>Enter the item details</a>
<br/>
<a href=new_student1.php>Enter the Student details</a>
<br/>
<a href=consumption.php>New bill</a>
<br/>
<a href=sam2.php>Total Bill details</a>
<br/>
</body>
</html>