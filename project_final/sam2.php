<!DOCTYPE html>
<html>
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
        <a href=consumption.php class="nav-link">New bill</a>
      </li>
	<li class="nav-item">
		<a href=sam2.php class="nav-link active">Total Bill</a>
		</li>
		</ul>
  </div> 
</nav>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Total Bill</h1>
    <p class="lead">The total bill details of all students are shown here</p>
  </div>
</div>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
<div class="card">
  <div class="card-body">

<table style="width:100%" class='table'><thead class='thead-dark'>
  <tr>
    <th>rollno</th>
    <th>name</th> 
    <th>total bill</th>
  </tr></thead><tbody>
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
$sql = "SELECT * FROM student  ORDER BY rollno ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

while($row = $result->fetch_assoc()){
$rollno=$row["rollno"];

$name=$row["name"];

$sql1 = "SELECT sum(tprice) FROM sconsumption where rollno=$rollno";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row


while($row1 = $result1->fetch_assoc()){
$totalbill=$row1["sum(tprice)"];
echo "<tr>";
echo "    <td>$rollno</td>";
echo "   <td>$name</td>";
echo "   <td>$totalbill</td>";
 echo "</tr>";}
}else{
echo "0 student records";
}

  }
}else{
echo "0 student records";
}
$conn->close();
?>


</tbody>
</table>

</body>
</html>
