
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter new student details</title>
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
        <a href=new_student1.php class="nav-link active">Student details</a>
      </li>
      
    <li class="nav-item">
        <a href=consumption.php class="nav-link">New bill</a>
      </li>
	<li class="nav-item">
		<a href=sam2.php class="nav-link">Total Bill</a>
		</li>
		</ul>
  </div> 
</nav>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Student Details</h1>
    <p class="lead">You can Add or Delete the student details here</p>
  </div>
</div>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  
  
<div class="card">
  <div class="card-body">  
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
if ($itemName!='' && $iprice!='') {
   
$sql = "insert into student values('$itemName','$iprice')";


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
	echo "<table class='table'><thead class='thead-dark'><tr><th>Roll no</th><th>Name</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
		
        echo "<tr><td>".$row["rollno"]."</td><td>".$row["name"]."</td></tr>";
    }
	echo "</tbody></table>";
} else {
    echo "0 Student records";
}

$conn->close();
?>
</div></div><br/>
<div class="card">
  <div class="card-body">  
<h1>Enter new student details</h1>
Fields marked as <font color='red'>*</font> are mandatory
<form action="#" method="post">
<b>Roll no<font color='red'>*</font></b>
    <input type="number" name="rollno" class="form-control"><br/><b>Name<font color='red'>*</font></b>
    <input type="text" name="name" class="form-control"><br/>
    <input type="submit"  class='btn btn-primary'>
</form>
</div></div>
<br/>

<div class="card">
  <div class="card-body">  
<h2>
Delete a Student record
</h2>
<form action="delete_stud.php" method="post">
<div class='form-group'>
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