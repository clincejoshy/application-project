<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Price Range</title>
</head>
<body><h1>Add a new item</h1>
<form action="sample.php" method="post"><b>Name of the item</b>
    <input type="text" name="iname"><br/><br/>
    <b>Price per item</b>
    <input type="number" name="price"><br/><br/>
    <input type="submit">
</form>
<h1>Delete an item</h1>
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
echo "<select name='select'>";	
$sql3 = mysqli_query($conn, "SELECT * From item");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['item_name']."'>".$row['item_name']."</option>" ;
}
echo "</select>"
   //<input type="button" value="delete">
?>
</body>
</html>