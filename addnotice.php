<?php 
include "db.php";

function insertpdata($con,$title,$types,$target_file)
{
    $qry = "INSERT INTO `noticeborad` (`id`, `title`, `type`, `path`,`status`) VALUES (NULL, '$title','$types','$target_file','1')";
        mysqli_query($con,$qry) or die("error in $qry == ----> ".mysqli_error($con));
}
/*image upload*/
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {

	if (empty($_POST['title']) || empty($_POST['types'])) 
			{
				echo '<script>alert(" empty")</script>';
			}
		else
			{
				$title = $_POST['title'];
				$types = $_POST['types'];
			      
			     
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

				        insertpdata($con,$title,$types,$target_file);
                            echo '<script type="text/javascript">'; 
                            echo 'alert("successfully registraion.");';
                            echo '</script>';

				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}



			}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Add notice board</title>
</head>
<body>
<form method="post" action="#" enctype="multipart/form-data">
	<input type="text" name="title">
	<select name="types">
		<option value="Image">Image</option>
		<option value="Video">Video</option>
	</select>
	<input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="upload">
</form>
</body>
</html>