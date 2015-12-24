<?php
session_start();

require 'connect.php';

$POINTS = 4*$_POST['GOALS'] + 3*$_POST['ASSISTS'] + floor($_POST['MINS_PLAYED']/30) - 4*$_POST['PENALTY_MISSED'] + floor($_POST['SAVES']/3) - floor($_POST['GOALS_CONCEDED']/2) + $_POST['BONUS'];

if(isset($_POST['CLEAN_SHEET']))
{
	$_POST['CLEAN_SHEET'] = 1;
	$POINTS = $POINTS + 3;
}
else
	$_POST['CLEAN_SHEET'] = 0;

if(isset($_POST['YELLOW']))
{
	$_POST['YELLOW'] = 1;
	$POINTS = $POINTS - 1;
}
else
	$_POST['YELLOW']= 0;
if(isset($_POST['RED']))
{
	$_POST['RED'] = 1;
	$POINTS = $POINTS - 3;
}
else
	$_POST['RED'] = 0;

$sql = 'UPDATE GW_POINTS SET GOALS='.$_POST['GOALS'].',ASSISTS='.$_POST['ASSISTS'].',MINS_PLAYED='.$_POST['MINS_PLAYED'].',CLEAN_SHEET='.$_POST['CLEAN_SHEET'].',YELLOW='.$_POST['YELLOW'].',RED='.$_POST['RED'].',PENALTY_MISSED='.$_POST['PENALTY_MISSED'].',SAVES='.$_POST['SAVES'].',GOALS_CONCEDED='.$_POST['GOALS_CONCEDED'].',BONUS='.$_POST['BONUS'].',GW_POINTS='.$POINTS.' WHERE PLAYER_ID='.$_POST['PLAYER_ID'].';';


echo $sql;

$result = mysqli_query($conn, $sql);

if(!$result){
	header('Location: change.php?error=1') && exit();
	die("Could Not connect to data base");
}	

header('Location: change.php?success=1') && exit();
?>
