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
$rollno=$_POST["roll_no"];
$sql2="select name from student where rollno='$rollno'";
$result1 = $conn->query($sql2);
$row2 = $result1->fetch_assoc();
$name=$row2["name"];
$itemname=$_POST["item"];
$quantity=$_POST["quantity"];
$sql1="select price from item where item_name='$itemname'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$price=$row["price"];
$sql="insert into sconsumption values('$rollno',curdate(),'$quantity'*'$price','$name','$itemname')";
$conn->query($sql);
?>