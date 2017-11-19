<!DOCTYPE html>
<html>
<title>Billing page</title>
<head>
Individual Billing
</head>
<body>
<h1>Please select the student from the box...</h1>

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
echo "This is your billing info!";
echo "<form action='createbill.php' method='post'>";
echo "<div class='form-group'>";
echo "<select name='select' class='form-control'>";	
$sql3 = mysqli_query($conn, "SELECT rollno From student");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['rollno']."'>".$row['rollno']."</option>" ;
}
echo "</select>";
echo "<br/><input type='submit' value='Generate' class='btn btn-danger'>";
echo "</div></form>";
$conn->close();
?>
  
</body>
</html>
