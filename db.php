<?php  
session_start();
	$con=@mysqli_connect("localhost","root","","notice");
	//var_dump($con);
	if(!$con)
		die("erron in connection");
	/*else
		echo "done";*/
	
 ?>

