<?php
session_start();

	require 'connect.php';
	if (!$conn) {
		header('Location: transfer.php') && die("Could Not connect to data base");
	}


if(isset($_SESSION['SIGNEDUP'])) //new
{
	$sql = "INSERT INTO USER_TEAM_TABLE VALUES (".
	$_SESSION['USER_ID']. ", " .
	$_POST['PID_GK1']. ", " .
	$_POST['PID_GK2']. ", " .
	$_POST['PID_DF1']. ", " .
	$_POST['PID_DF2']. ", " .
	$_POST['PID_DF3']. ", " .
	$_POST['PID_DF4']. ", " .
	$_POST['PID_DF5']. ", " .
	$_POST['PID_MF1']. ", " .
	$_POST['PID_MF2']. ", " .
	$_POST['PID_MF3']. ", " .
	$_POST['PID_MF4']. ", " .
	$_POST['PID_MF5']. ", " .
	$_POST['PID_FW1']. ", " .
	$_POST['PID_FW2']. ", " .
	$_POST['PID_FW3']. ", " .
	"433" . ", " .
	$_POST['PID_FW1']. ");" ;
	
	echo $sql;
	
	$result = mysqli_query($conn,$sql);
	
	if($result==1)
	{
		$sql = "UPDATE USER_TABLE SET " .
		'TEAM_VALUE ='. $_POST['TEAM_VALUE'] . ", ".
		'BALANCE =' . $_POST['BANK_BALANCE'] . " ".
		' WHERE USER_ID=' . $_SESSION["USER_ID"] . ';';
		
		echo $sql;
		
		$result = mysqli_query($conn,$sql);
		
		if($result == 1)
		{
		unset($_SESSION['SIGNEDUP']);
		header('Location: profile.php') && exit();
		die();
		}
	}
}
else
{
	$sql = "UPDATE USER_TEAM_TABLE SET ".
	'GK1 =' .$_POST['PID_GK1']. ", " .
	'GK2 =' .$_POST['PID_GK2']. ", " .
	'DF1 =' .$_POST['PID_DF1']. ", " .
	'DF2 =' .$_POST['PID_DF2']. ", " .
	'DF3 =' .$_POST['PID_DF3']. ", " .
	'DF4 =' .$_POST['PID_DF4']. ", " .
	'DF5 =' .$_POST['PID_DF5']. ", " .
	'MF1 =' .$_POST['PID_MF1']. ", " .
	'MF2 =' .$_POST['PID_MF2']. ", " .
	'MF3 =' .$_POST['PID_MF3']. ", " .
	'MF4 =' .$_POST['PID_MF4']. ", " .
	'MF5 =' .$_POST['PID_MF5']. ", " .
	'FW1 =' .$_POST['PID_FW1']. ", " .
	'FW2 =' .$_POST['PID_FW2']. ", " .
	'FW3 =' .$_POST['PID_FW3']. 
	' WHERE USER_ID=' . $_SESSION["USER_ID"] . ';';

	echo $_POST["TEAM_VALUE"];
	echo $sql;
	
	$result = mysqli_query($conn,$sql);
	
	if($result==1)
	{
		$sql = "UPDATE USER_TABLE SET " .
		'TEAM_VALUE ='. $_POST["TEAM_VALUE"] . ", ".
		'BALANCE =' . $_POST["BANK_BALANCE"] . " ".
		' WHERE USER_ID=' . $_SESSION["USER_ID"] . ';';
		
		echo $sql;
		
		$result = mysqli_query($conn,$sql);
		
		if($result == 1)
		{
		unset($_SESSION['SIGNEDUP']);
		header('Location: profile.php') && exit();
		die();
		}
	}
}
	
	
	
	
	



?>
