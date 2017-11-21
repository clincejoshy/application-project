<!DOCTYPE html>
<html>
<title>Billing page</title>
<head>
Individual Billing
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
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a href=xyz.php class="nav-link">Stock Management</a>
      </li>
      <li class="nav-item">
        <a href=new_student1.php class="nav-link">Student details</a>
      </li>
      
    <li class="nav-item">
        <a href=consumption.php class="nav-link">New bill</a>
      </li>
	<li class="nav-item">
		<a href=sam2.php class="nav-link">Total Bill</a>
		</li>
		<li class="nav-item">
		<a href=billing.php class="nav-link active">Individual Bill</a>
		</li>
		</ul>
  </div> 
</nav>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Individual Bill</h1>
    <p class="lead">You can see the individual bill details of the students here</p>
  </div>
</div>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  Fields marked as <font color='red'>*</font> cannot be empty<br/>
<div class="card">
  <div class="card-body"> 
<h1>Select Roll no</h1>

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
else
{
//echo "connected";
}
echo "<form action='#' method='post'>";
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
</div></div><br/>
<div class="card">
  <div class="card-body"> 
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
$studname=$_POST["select"];
//$sqld = "select *,DATE_FORMAT(date, "%Y") from sconsumption where sconsumption.name = '$studname'";

if ($conn->query($sqld) === FALSE){
    //echo "" . $sqld . "<br>" . $conn->error;
}
$sql1 = "SELECT *,DATE_FORMAT(date,'%D-%M-%Y') FROM sconsumption where rollno=".$studname;
$sql2 = "select sum(tprice) from sconsumption where rollno=".$studname;
$result = $conn->query($sql1);
$result1 = $conn->query($sql2);
$result3 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$row2 = $result3->fetch_assoc();
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ". $row2["name"]."</div>";
if ($result->num_rows > 0) {
    // output data of each row
	echo "<table  class='table'><thead class='thead-dark'><tr><th>Date</th><th>Item</th><th>Cost</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["DATE_FORMAT(date,'%D-%M-%Y')"]. "</td> <td>" . $row["itemname"]. "</td> <td>" . $row["tprice"]. "</td></tr><br>" ;
	
	
    }
	echo "</tbody></table>";
	echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
} else {
    echo "Go and eat. Not took anything!<br> Total amount is 0";
}
//header('Location:xyz.php');
$conn->close();
?>  
</div></div></body>
</html>
