<?php
error_reporting(0);
ini_set('display_errors', 0);
	session_start();

	if($_SESSION["role"]=="employee")
	{
		header("location:../verifybill.php");
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
 <button class="btn"><a class="nav-link" href="../logout1.php">Go To Admin Page!</a></button>
