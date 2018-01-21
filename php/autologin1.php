<?php 
error_reporting(0);
ini_set('display_errors', 0);
	session_start();
	
	if($_SESSION["role"]=="employee")
	{
		header("location:../billing.php");
	}
		
		else
		{
			echo "404 Not found";
		}







 ?>