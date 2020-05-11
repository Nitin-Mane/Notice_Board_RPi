<?php 
include "db.php";
 if(isset($_POST["status"]))  
 {
 		$st = $_POST["status"];
 	 $qry = "UPDATE `noticeborad` SET `status` = '$st' WHERE `noticeborad`.`id` = 3;";
        mysqli_query($con,$qry) or die("error in $qry == ----> ".mysqli_error($con));
 }

?>

