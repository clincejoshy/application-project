<?php 
	session_start();
	
	if($_SESSION["role"]=="admin")
	{
		header("location:../xyz.php");
	}
		
		else
		{
			echo "404 Not found";
		}







 ?>