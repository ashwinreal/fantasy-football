<?php
session_start();
require 'connect.php';


$uid = $_SESSION['USER_ID'];

$sql = "select * from GW_HISTORY WHERE PLAYER_ID = $uid";  


$total=0;

$res = mysqli_query($conn,$sql);


if(mysqli_num_rows($res)>0)
{
while($row = mysqli_fetch_assoc($res))
{
	$total = $row['GW1'] + $row['GW2'] + $row['GW3'] + $row['GW4'] + $row['GW5'] + $row['GW6'] + $row['GW7'] + $row['GW8'] + $row['GW9'] + $row['GW10'];

}
}
else
{
	$total = 0;
}

$query ="update USER_TABLE set TOTAL_POINTS = $total where USER_ID = $uid";
mysqli_query($conn,$query);




?>



