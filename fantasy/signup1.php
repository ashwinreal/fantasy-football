<?php
require 'connect.php';

echo "hey";
 if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = $_POST["email"];
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }
//$email=$_POST['sup_email'];
$name=$_POST['sup_name'];
$password=$_POST['sup_password'];
$teamname=$_POST['sup_teamname'];

echo $email;

echo "hey";
$sql="select EMAIL from USER_TABLE where EMAIL='$email'";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0)
{
	die(header("location:index.php?loginFailed=true&reason=already_registered_email"));
	
	}
	else
	{
	$sql="insert into USER_TABLE (EMAIL,NAME,TEAM_NAME) values ('$email','$name','$teamname')";
	if(mysqli_query($conn,$sql))
	{
		$sql="select USER_ID from USER_TABLE where EMAIL='$email'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$id=$row['USER_ID'];
		$sql="insert into LOGIN values ($id,'$password')";
		if(mysqli_query($conn,$sql))
		{
			header('Location: new_team.php');
		}
	}
	else
	{
		echo "Try Again";
	}
	}


?>





