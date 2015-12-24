<?php
session_start();

require 'connect.php';

$sql = 'SELECT PRICE FROM PLAYER_TABLE WHERE PLAYER_ID='.$_POST['PLAYER_ID'].';';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result->num_rows == 0){
	header('Location: change2.php?error=1') && exit();
	die("Could Not connect to data base");
}

$tuple = mysqli_fetch_array($result);

$price_diff = $_POST['PRICE'] - $tuple['PRICE'];

$sql = 'SELECT USER_ID FROM USER_TEAM_TABLE WHERE GK1='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'GK2='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'DF1='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'DF2='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'DF3='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'DF4='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'DF5='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'MF1='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'MF2='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'MF3='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'MF4='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'MF5='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'FW1='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'FW2='.$_POST['PLAYER_ID'].' OR ';
$sql = $sql.'FW3='.$_POST['PLAYER_ID'].';';

$result = mysqli_query($conn, $sql);
$tuple = null;

if($result->num_rows == 0){
	header('Location: change2.php?error=2') && exit();
	die("Could Not connect to data base");
}

while($tuple=mysqli_fetch_array($result))
{
	$sql1 = 'UPDATE USER_TABLE SET TEAM_VALUE = TEAM_VALUE + '.$price_diff.' WHERE USER_ID = '.$tuple["USER_ID"].';';
	$result1 = mysqli_query($conn, $sql1);

	if($result1== 0){
	header('Location: change2.php?error=3') && exit();
	die("Could Not connect to data base");
	}
}

$sql = 'UPDATE PLAYER_TABLE SET PRICE ='.$_POST['PRICE'].' WHERE PLAYER_ID='.$_POST['PLAYER_ID'].';';
$result = mysqli_query($conn, $sql);

if($result== 0){
	header('Location: change2.php?error=4') && exit();
	die("Could Not connect to data base");
}

header('Location: change2.php?success=1') && exit();	
?>
