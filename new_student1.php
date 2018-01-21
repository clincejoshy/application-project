
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">
    <title>Enter New Student Details</title>
</head>
<body>
<?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:php/autologin.php");
    }
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Tricodia - Mess Calculator</a>

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
        <a href=new_student1.php class="nav-link active">Student Details</a>
      </li>

    <li class="nav-item">
        <a href=consumption.php class="nav-link">New Bill</a>
      </li>
	<li class="nav-item">
		<a href=sam2.php class="nav-link">Total Bill</a>
		</li>
		<li class="nav-item active">
        <a class="nav-link" href="logout1.php">Logout</a>
      </li>

		</ul>
  </div>
</nav>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Student Details</h1>
    <p class="lead">You can Add or Delete the Student Details here</p>
  </div>
</div>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">


<div class="card">
  <div class="card-body">
<h2>
Exsting Student Details
</h2>
<?php
error_reporting(0);
ini_set('display_errors', 0);
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";
$itemName=$_POST["name"];
$iprice=$_POST["rollno"];
$pwd=$_POST["password"];
//$query_insert="insert into item values('$itemName','$iprice')";
//$query_select="select * from item;";
//mysqli_query($db,$query_insert) or die('Error querying database');
//mysqli_query($conn,$query_select);
if ($itemName!='' && $iprice!='') {

$sql = "insert into student values('$itemName','$iprice','$pwd')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "<font color='red'>Error: " . $sql . "</font><br>" . $conn->error;
}
}
else{
	//echo "Fields marked as <font color='red'>*</font> cannot be empty<br/>";
}
$sql1 = "SELECT * FROM student ORDER BY rollno ASC";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'><tr><th>Room No</th><th>Admission No</th><th>Name</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {

        echo "<tr><td>".$row["room"]."</td><td>".$row["rollno"]."</td><td>".$row["name"]."</td></tr>";
    }
	echo "</tbody></table>";
} else {
    echo "0 Student Records";
}

$conn->close();
?>
</div></div><br/>
<div class="card">
  <div class="card-body">
<h1>Enter new Student Details</h1>
Fields marked as <font color='red'>*</font> are mandatory
<form action="#" method="post">
<b>Roll no<font color='red'>*</font></b>
    <input type="number" name="rollno" class="form-control"><br/><b>Name<font color='red'>*</font></b>
    <input type="text" name="name" class="form-control"><br/><b>Password<font color='red'>*</font></b>
	<input type="password" name="password" class="form-control"><br/>
    <input type="submit"  class='btn btn-primary'>
</form>
</div></div>
<br/>

<div class="card">
  <div class="card-body">
<h2>
Delete a Student Record
</h2>
<form action="delete_stud.php" method="post">
<div class='form-group'>
<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
//echo "connected";

}

echo "<select name='select' class='form-control'>";
$sql3 = mysqli_query($conn, "SELECT * From student ORDER BY rollno ASC");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['rollno']."'>".$row['rollno']."</option>" ;
}
echo "</select>"
   //<input type="button" value="delete">

?>
<br/>
<input type="submit" value="Delete"  class='btn btn-danger'>
</div></form>
</div></div><br/><br/>
</body>
</html>
