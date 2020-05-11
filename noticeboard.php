<?php 
include "db.php";
$st = $_GET["q"];
$id = $_GET["i"];
 if ($_GET['q'] == 1) 
 {
 	// echo "<a href='?q=1' id='st'>disable</a>";
	$qry = "UPDATE `noticeborad` SET `status` = '0' WHERE `noticeborad`.`id` = $id;";
    mysqli_query($con,$qry) or die("error in $qry == ----> ".mysqli_error($con));
}else
{
// echo "<a href='?q=0' id='st'>enable</a>";
	$qry = "UPDATE `noticeborad` SET `status` = '1' WHERE `noticeborad`.`id` = $id;";
   	mysqli_query($con,$qry) or die("error in $qry == ----> ".mysqli_error($con));
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Notice borad | Admin side</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<table>
 	<thead>
 		<tr>
 			<td>sr.</td>
 			<td>title</td>
 			<td>type</td>
 			<td>path</td>
 			<td>status</td>
 		</tr>
 	</thead>
 	<tbody>
 	
 		 			<?php 

        $sql_query="SELECT * FROM `noticeborad` ORDER BY `noticeborad`.`id` DESC";
            $result_set=mysqli_query($con,$sql_query); 
                                    $a=1;             
                                     while($rows=mysqli_fetch_array($result_set))
                                         {
                                         	$i = $rows['id'];
 		 			 ?>
 		 			<tr>
	 		 			<td><?php echo $a; ?></td>
	 		 			<td><?php echo $rows['title']; ?></td>
	 		 			<td><?php echo $rows['type']; ?></td>
	 		 			<td><?php echo $rows['path']; ?></td>
	 		 			<td>
	 		 				<?php if ($rows['status'] == 1) {
	 		 					# code...
	 		 					echo "<a href='?q=1&i=$i' id='st'>disable</a>";
	 		 				}else
	 		 				{
	 		 					echo "<a href='?q=0&i=$i' id='st'>enable</a>";
	 		 				} 
	 		 				?>
	 		 			</td>
	 		 		</tr>
 		 		<?php 
 		 		$a++;
 		 	} ?>

 	</tbody>
 </table>
  <script>

  </script>
</body>
</html>