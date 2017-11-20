<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consumption</title>
</head>
<body>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Mess Bill</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href=xyz.php class="nav-link">Stock Management</a>
      </li>
      <li class="nav-item">
        <a href=new_student1.php class="nav-link">Student details</a>
      </li>
      
    <li class="nav-item">
        <a href=consumption.php class="nav-link active">New bill</a>
      </li>
	<li class="nav-item">
		<a href=sam2.php class="nav-link">Total Bill</a>
		</li>
		<li class="nav-item">
		<a href=billing.php class="nav-link">Individual Bill</a>
		</li>
		</ul>
  </div> 
</nav>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">New Bill</h1>
    <p class="lead">You can Add the Bill details here</p>
  </div>
</div>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
<div class="card">
  <div class="card-body">
<form action="ctable.php" method="post">
<div class='form-group'>
<b>Select the student roll no</b>
<select name="roll_no" class='form-control'>
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
<select name="item" class='form-control'>
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
    <input type="number" name="quantity" class="form-control"><br/><br/>
    <input type="submit" value="Submit" class='btn btn-primary'>
</div></form>
</body>
</html>