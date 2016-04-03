<?php
print_r($_POST);

session_start();
if(!isset( $_SESSION['email']))
	header('Location: index.php') && exit() && die();
	
require 'connect.php';

echo $_POST["FORMATION"];

$sql = 'UPDATE USER_TEAM_TABLE SET ' . 
$_POST["S_GK1"] . '=' . $_SESSION["SS_GK1"] . ', ' .
$_POST["S_GK2"] . '=' . $_SESSION["SS_GK2"] . ', ' .
$_POST["S_DF1"] . '=' . $_SESSION["SS_DF1"] . ', ' .
$_POST["S_DF2"] . '=' . $_SESSION["SS_DF2"] . ', ' .
$_POST["S_DF3"] . '=' . $_SESSION["SS_DF3"] . ', ' .
$_POST["S_DF4"] . '=' . $_SESSION["SS_DF4"] . ', ' .
$_POST["S_DF5"] . '=' . $_SESSION["SS_DF5"] . ', ' .
$_POST["S_MF1"] . '=' . $_SESSION["SS_MF1"] . ', ' .
$_POST["S_MF2"] . '=' . $_SESSION["SS_MF2"] . ', ' .
$_POST["S_MF3"] . '=' . $_SESSION["SS_MF3"] . ', ' .
$_POST["S_MF4"] . '=' . $_SESSION["SS_MF4"] . ', ' .
$_POST["S_MF5"] . '=' . $_SESSION["SS_MF5"] . ', ' .
$_POST["S_FW1"] . '=' . $_SESSION["SS_FW1"] . ', ' .
$_POST["S_FW2"] . '=' . $_SESSION["SS_FW2"] . ', ' .
$_POST["S_FW3"] . '=' . $_SESSION["SS_FW3"] . ', ' .
"FORMATION" . '=' . $_POST["FORMATION"]  . ', ' .
"CAPTAIN" . '=' . $_POST["CAPTAIN"]  . ' ' .
 'WHERE USER_ID=' . $_SESSION["USER_ID"] . ';';

//echo $sql . '<br>';
/*
echo $_POST["S_GK1"] . ' ' . $_SESSION["SS_GK1"] . '<br>';
echo $_POST["S_GK2"] . ' ' . $_SESSION["SS_GK2"] . '<br>';

echo $_POST["S_DF1"] . ' ' . $_SESSION["SS_DF1"] . '<br>';
echo $_POST["S_DF2"] . ' ' . $_SESSION["SS_DF2"] . '<br>';
echo $_POST["S_DF3"] . ' ' . $_SESSION["SS_DF3"] . '<br>';
echo $_POST["S_DF4"] . ' ' . $_SESSION["SS_DF4"] . '<br>';
echo $_POST["S_DF5"] . ' ' . $_SESSION["SS_DF5"] . '<br>';

echo $_POST["S_MF1"] . ' ' . $_SESSION["SS_MF1"] . '<br>';
echo $_POST["S_MF2"] . ' ' . $_SESSION["SS_MF2"] . '<br>';
echo $_POST["S_MF3"] . ' ' . $_SESSION["SS_MF3"] . '<br>';
echo $_POST["S_MF4"] . ' ' . $_SESSION["SS_MF4"] . '<br>';
echo $_POST["S_MF5"] . ' ' . $_SESSION["SS_MF5"] . '<br>';

echo $_POST["S_FW1"] . ' ' . $_SESSION["SS_FW1"] . '<br>';
echo $_POST["S_FW2"] . ' ' . $_SESSION["SS_FW2"] . '<br>';
echo $_POST["S_FW3"] . ' ' . $_SESSION["SS_FW3"] . '<br>';*/

$result = mysqli_query($conn, $sql);

if($result == 1)
{	
	echo 'user database changed';
	header('Location: profile.php') && exit() && die();
}
	
?>
