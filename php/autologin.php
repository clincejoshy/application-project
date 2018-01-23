<html lang="en">
<link rel="stylesheet" href="../assets/css/form-elements.css">

<?php
	session_start();

	if($_SESSION["role"]=="student")
	{
		header("location:../billing.php");
	}

		else
		{
			echo "404 Not found";

		}
 ?>
 <br/>
 <br/>
 <br/>
 <br/>
 <button class="btn"><a href="../logout.php">Go To Login Page!</a></button>
</html>
