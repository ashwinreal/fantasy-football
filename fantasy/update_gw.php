<?php
session_start();

require 'connect.php';

$sql = 'SELECT * FROM USER_TEAM_TABLE;';
$result = mysqli_query($conn, $sql);
$tuple = null;


//echo $sql.'<br>';

if($result->num_rows == 0){
	header('Location: admin.php?error=2') && exit();
	die("Could Not connect to data base");
}

while($tuple = mysqli_fetch_array($result))
{
	$pl=  array();
	if($tuple['FORMATION']==433)
	{
		array_push($pl,$tuple['GK1']);
		array_push($pl,$tuple['DF1']); array_push($pl,$tuple['DF2']); array_push($pl,$tuple['DF3']); array_push($pl,$tuple['DF4']);
		array_push($pl,$tuple['MF1']); array_push($pl,$tuple['MF2']); array_push($pl,$tuple['MF3']);
		array_push($pl,$tuple['FW1']); array_push($pl,$tuple['FW2']); array_push($pl,$tuple['FW3']);
	}
	else if($tuple['FORMATION']==442)
	{
		array_push($pl,$tuple['GK1']);
		array_push($pl,$tuple['DF1']); array_push($pl,$tuple['DF2']); array_push($pl,$tuple['DF3']); array_push($pl,$tuple['DF4']);
		array_push($pl,$tuple['MF1']); array_push($pl,$tuple['MF2']); array_push($pl,$tuple['MF3']); array_push($pl,$tuple['MF4']);
		array_push($pl,$tuple['FW1']); array_push($pl,$tuple['FW2']);
	}
	else if($tuple['FORMATION']==451)
	{
		array_push($pl,$tuple['GK1']);
		array_push($pl,$tuple['DF1']); array_push($pl,$tuple['DF2']); array_push($pl,$tuple['DF3']); array_push($pl,$tuple['DF4']);
		array_push($pl,$tuple['MF1']); array_push($pl,$tuple['MF2']); array_push($pl,$tuple['MF3']); array_push($pl,$tuple['MF4']); array_push($pl,$tuple['MF5']);
		array_push($pl,$tuple['FW1']);
	}
	else if($tuple['FORMATION']==352)
	{
		array_push($pl,$tuple['GK1']);
		array_push($pl,$tuple['DF1']); array_push($pl,$tuple['DF2']); array_push($pl,$tuple['DF3']);
		array_push($pl,$tuple['MF1']); array_push($pl,$tuple['MF2']); array_push($pl,$tuple['MF3']); array_push($pl,$tuple['MF4']); array_push($pl,$tuple['MF5']);
		array_push($pl,$tuple['FW1']); array_push($pl,$tuple['FW2']);
	}
	
	$i = 0;
	$points = 0;
	for($i=0;$i<11;$i++)
	{
		$sql1 = "SELECT GW_POINTS FROM GW_POINTS WHERE PLAYER_ID=".$pl[$i].";";
//		echo $sql1.'<br>';
		$result1 = mysqli_query($conn,$sql1);
		if($result1->num_rows > 0)
		{
			$tuple1 = mysqli_fetch_array($result1);
			$points = $points + $tuple1['GW_POINTS'];
		}
		else
		{
			echo $result1;
			header('Location: admin.php?error=3') && exit();
		}
	}
		
	$sql1 = "UPDATE USER_TABLE SET GW_POINTS =".$points." WHERE USER_ID=".$tuple['USER_ID'].";";
//	echo $sql1.'<br>';
	$result1 = mysqli_query($conn,$sql1);

	if($result==0)
	{
		header('Location: admin.php?error=4') && exit();
		die();
	}	
	
	
}

header('Location: admin.php?updated=1') && exit();
die();
?>	
	
