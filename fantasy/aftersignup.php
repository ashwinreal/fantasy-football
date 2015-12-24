<?php
session_start();
	require 'connect.php';		

	if (!$conn) {
		header('Location: index.php?error=1') && exit();
		die("Could Not connect to data base");
	}

	echo $_POST['username'];
	echo $_POST['teamname'];
	echo $_POST['email'];
	echo $_POST['password'];
	
	$sql="select U.EMAIL, U.TEAM_NAME from USER_TABLE U where (U.EMAIL LIKE \"".$_POST['email']."\");";
	
	$result =  mysqli_query($conn, $sql);
	
	print_r($result);

	
	if(($result->num_rows) > 0)
	{
	//	echo $sql;
		header('Location: index.php?error=2') && exit(); 
		die("Email already present");
	}

	$sql="SELECT U.EMAIL, U.TEAM_NAME from USER_TABLE U where U.TEAM_NAME LIKE \"".$_POST['teamname']."\";";
	$result =  mysqli_query($conn, $sql);

	if($result->num_rows > 0)
	{
		header('Location: index.php?error=3') && exit();
		die("teamname already present");
	}
	
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['email'] = $_POST["EMAIL"];
		$_SESSION['teamname'] = $_POST["teamname"];
		
		$sql="INSERT INTO USER_TABLE (`EMAIL`,`TEAM_NAME`,`NAME`) values (\"".$_POST['email']."\",\"".$_POST['teamname']."\",\"".$_POST['username']."\");";
		$result =  mysqli_query($conn, $sql);
		
		if($result==0)
		{
			header('Location: index.php?error=4') && exit();
			die("failed to add");
		}
		
		//echo "!";
		$sql="select USER_ID from USER_TABLE where EMAIL like \"". $_POST['email']."\";";
		//echo $sql;
		//echo "<br>";
		$result =  mysqli_query($conn, $sql);
		//print_r( $result);
		$user = mysqli_fetch_array($result);
		$uid = $user['USER_ID'];
		
		$q = "insert into GW_HISTORY (PLAYER_ID) values ($uid)";
		mysqli_query($conn,$q);

		$_SESSION['USER_ID'] = $uid;
			
		$sql = "INSERT INTO LOGIN (`USER_ID`,`PASSWORD`) VALUES (". $uid.","."\"".$_POST['password']."\");";
		$result =  mysqli_query($conn, $sql);
		//echo $sql;

		if($result==0)
		{
			header('Location: index.php?error=4') && exit();
			die("failed to add 2");
		}
			
		$_SESSION['SIGNEDUP'] = true;
		
		header('Location: transfer.php')&& exit();		
?>
