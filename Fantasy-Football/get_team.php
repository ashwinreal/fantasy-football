<?php
session_start();

if(!isset( $_SESSION['email']))
	header('Location: index.php') && exit() && die();
	
// insert into USER_TEAM_TABLE values (1,39,54,83,77,96,90,81,293,279,307,298,289,500,520,490,442,83);
require 'connect.php';

$sql = 'SELECT USER_ID FROM USER_TABLE WHERE EMAIL LIKE \'' . $_SESSION['email'] . '\';';
$result = mysqli_query($conn, $sql);
$tuple = null;
$uid = null;
$GK = null;
$DF = null;
$MF = null;
$FW = null;
$form = null;
$captain = null;
$pname = null;

$totalpoints = null;
$gwpoints = null;
$teamval = null;
$balance = null;

$totusers = null;
$rank = null;
$teamname  = null;

if($result->num_rows == 1)
{
	$tuple = mysqli_fetch_array($result);
	$uid = $tuple["USER_ID"];
	
	$sql = 'SELECT * FROM USER_TEAM_TABLE WHERE USER_ID = ' . $uid . ';';
	$result = mysqli_query($conn, $sql);
	$tuple = null;

	if($result->num_rows == 1)
	{
		$tuple = mysqli_fetch_array($result);
		
		$GK = array(null,$tuple["GK1"],$tuple["GK2"]);
		$DF = array(null,$tuple["DF1"],$tuple["DF2"],$tuple["DF3"],$tuple["DF4"],$tuple["DF5"]);
		$MF = array(null,$tuple["MF1"],$tuple["MF2"],$tuple["MF3"],$tuple["MF4"],$tuple["MF5"]);
		$FW = array(null,$tuple["FW1"],$tuple["FW2"],$tuple["FW3"]);
		$form = $tuple["FORMATION"];
		$captain = $tuple["CAPTAIN"];
	} 	
	
	$sql = 'SELECT * FROM USER_TABLE WHERE USER_ID = ' . $uid . ';';
	$result = mysqli_query($conn, $sql);
	
	if($result->num_rows == 1)
	{
		$tuple = mysqli_fetch_array($result);
		
		$totalpoints = $tuple["TOTAL_POINTS"];
		$gwpoints = $tuple["GW_POINTS"];
		$teamval = $tuple["TEAM_VALUE"];
		$balance = $tuple["BALANCE"];
		$teamname = $tuple["TEAM_NAME"];
	}		
	
	$sql = 'SELECT COUNT(*) AS TOTUSERS FROM USER_TABLE;';
	$result = mysqli_query($conn, $sql);
	
	if($result->num_rows == 1)
	{
		$tuple = mysqli_fetch_array($result);
		
		$totusers = $tuple["TOTUSERS"];
	}
	
	$sql = 'SELECT COUNT(*) AS RANK FROM USER_TABLE WHERE TOTAL_POINTS >' . $totalpoints . ';';
	$result = mysqli_query($conn, $sql);
	
	if($result->num_rows == 1)
	{
		$tuple = mysqli_fetch_array($result);
		
		$rank = $tuple["RANK"] + 1;
	}
	
}

	if($form == 442){
		$src = "http://i.imgur.com/aN42IoQ.png";
	}	
	if($form == 451){
		$src = "http://i.imgur.com/Puje3pQ.png";
	}
	if($form == 433){
		$src = "http://i.imgur.com/bJXVB6v.png";
	}
	if($form == 352){
		$src = "http://i.imgur.com/Ceh64ye.png";
	}

function get_player_name($pid) 
{
	require 'connect.php';
	
	$sql = 'SELECT PLAYER_NAME FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $pid . ';';
	$result = mysqli_query($conn, $sql);
	$tuple = null;

	if($result->num_rows == 1)
	{
		$tuple = mysqli_fetch_array($result);
		
		$pname = $tuple["PLAYER_NAME"];
	}
	
	return $pname;
}

?>
