<?php 
include "db.php";
if (isset($_POST['submit']))
 	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo '<script>alert("Username or Password is empty")</script>';
			}
		else
			{

				// Define $username and $password
				if(isset($_POST['username'])){$user_id = $_POST['username'];}
				if(isset($_POST['password'])){$password = $_POST['password'];}
				// To protect MySQL injection for Security purpose
					
				$user_id = stripslashes($user_id);
				$password = stripslashes($password);
				$user_id = mysqli_real_escape_string($conn,$user_id);
				$password = mysqli_real_escape_string($conn,$password);

				$result=mysqli_query($conn,"SELECT * FROM user WHERE (username='$user_id') AND password='$password'");
				  if (mysqli_num_rows($result) > 0) 
				  		{
			    			// output data of each row
							while($row = $result->fetch_assoc()) {
								$id=$row["id"];
								 
								$_SESSION["user_login"] = $id;
								}
						}
						else
						{
							 
									$error1="Username or Password is invalid";
							
						}

						}
						
			}
 
	/*header("location: detail.php?q=$details_value ");
	exit();*/


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>notice borad login</title>
 </head>
 <body>
<form action="" method="post">
					<input type="text" class="user" name="username" placeholder="Enter your username" required="">
					<input type="password" name="password" class="lock" placeholder="Password" required="">
					<input type="submit" value="Login" name="submit">
				 
				</form>
 </body>
 </html>