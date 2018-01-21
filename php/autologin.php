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