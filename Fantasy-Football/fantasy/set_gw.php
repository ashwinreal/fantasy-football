<?php
session_start();

require 'connect.php';

$sql = 'SELECT * FROM ADDITIONAL;';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result->num_rows == 0){
	header('Location: admin.php?error=1') && exit();
	die("Could Not connect to data base");
}

$tuple = mysqli_fetch_array($result);

$gw_no = $tuple['GW'];

$gw_no = 'GW'.$gw_no;

$sql = 'UPDATE GW_HISTORY, GW_POINTS , PLAYER_TABLE SET '.$gw_no.'= GW_POINTS.GW_POINTS, PLAYER_TABLE.TOTAL_POINTS = (PLAYER_TABLE.TOTAL_POINTS + GW_POINTS.GW_POINTS) WHERE GW_HISTORY.PLAYER_ID = GW_POINTS.PLAYER_ID AND GW_POINTS.PLAYER_ID = PLAYER_TABLE.PLAYER_ID;';
$result = mysqli_query($conn, $sql);

if($result==0){
	header('Location: admin.php?error=8') && exit();
	die("Could Not connect to data base");
}

$sql = 'UPDATE USER_TABLE SET TOTAL_POINTS = (TOTAL_POINTS + GW_POINTS);';
$result = mysqli_query($conn, $sql);

if($result== 0){
	header('Location: admin.php?error=3') && exit();
	die("Could Not connect to data base");
}

$sql = 'UPDATE USER_TABLE SET GW_POINTS = 0';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result== 0){
	header('Location: admin.php?error=4') && exit();
	die("Could Not connect to data base");
}

$sql = 'UPDATE GW_POINTS SET GOALS = 0, ASSISTS = 0, MINS_PLAYED = 0, CLEAN_SHEET = 0, YELLOW = 0, RED = 0, PENALTY_MISSED = 0, SAVES = 0, GOALS_CONCEDED = 0, BONUS = 0, GW_POINTS = 0;';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result== 0){
	header('Location: admin.php?error=5') && exit();
	die("Could Not connect to data base");
}

$sql = 'UPDATE ADDITIONAL SET GW = GW + 1';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result== 0){
	header('Location: admin.php?error=6') && exit();
	die("Could Not connect to data base");
}

header('Location: admin.php?updated=1') && exit();
die();
?>	
	
