<!DOCTYPE html>
<html lang="en-US">
<title>Billing page</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

Individual Billing
</head>
<body>
<?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="student")
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
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul class="navbar-nav" >

		<li class="nav-item">
		<a href=billing.php class="nav-link active">Individual Bill</a>
		</li>
		<li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
		</ul>
  </div>
</nav>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Individual Bill</h1>
    <p class="lead">You can see the individual bill details here</p>
  </div>
</div>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">

<br/>
<div class="card">
  <div class="card-body">
<?php
require("connect.php");

// Create connection

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
$sql1 = "SELECT * FROM sconsumption where rollno=".$_SESSION['id'];
$sql2 = "select sum(tprice) from sconsumption where rollno=".$_SESSION['id'];
$result = $conn->query($sql1);
$result1 = $conn->query($sql2);
$result3 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$row2 = $result3->fetch_assoc();
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>";
if ($result->num_rows > 0) {
    // output data of each row
	echo "<table  class='table'><thead class='thead-dark'><tr><th>Date</th><th>Item</th><th>Cost</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["date"]. "</td> <td>" . $row["itemname"]. "</td> <td>" . $row["tprice"]. "</td></tr><br>" ;


    }
	echo "</tbody></table>";
	echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
} else {
    echo "Go and eat. Haven't took anything!<br> Total amount is 0";
}
//header('Location:xyz.php');
$conn->close();
?>
</div></div></body>
</html>
