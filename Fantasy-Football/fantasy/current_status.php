<style>

body{
background: url("./images/back.jpg");
}

a {
	text-decoration: none;
	color: black;
	font-size: 20px;
	font-weight: bold;
}

table
{	
	margin-left: auto;
	margin-right: auto;
}

#bkg{
	background-color: rgba(41, 137, 233, 0.4);
}

tr,td{text-align:center;}


#info
{
	position:absolute;
	margin-left: 0px;
	margin-top:200px;
}

#info tr:nth-child(even)
{
	background: #90CAF9;
}
#info tr:nth-child(odd)
{
	background: #BBDEFB;
}
#info td:nth-child(odd)
{
	width: 200px;
}
#info td:nth-child(even)
{
	width: 50px;
}

#pname
{
	position:absolute;
	color: white;
	font-size: 25px;
	margin-left: 10px;
	margin-top:125px;
}

#back
{
	position:absolute;
	margin-left: 0px;
	margin-top: 0px;
	width: 75px;
	height: 75px;
}
	
</style>

<a href='#'><img id=back src='./images/goback.png' onclick="location.href='profile.php'"></a>

<?php
session_start();

if(!isset( $_SESSION['email']))
	header('Location: index.php') && exit() && die();
	
require 'connect.php';

function get_player_info($pid) 
{
	require 'connect.php';
	
	$sql = 'SELECT P.PLAYER_NAME, G.GW_POINTS FROM PLAYER_TABLE P, GW_POINTS G WHERE P.PLAYER_ID=G.PLAYER_ID AND ';
	$sql = $sql. 'G.PLAYER_ID = ' . $pid .';';
//	echo $sql;
	$result = mysqli_query($conn, $sql);
	$tuple = null;

	if($result->num_rows == 1)
	{
		$tuple = mysqli_fetch_array($result);
	}
	
	return $tuple;
}

if(isset($_GET['plid']))
{
	$sql = 'SELECT PLAYER_NAME FROM PLAYER_TABLE WHERE PLAYER_ID ='.$_GET['plid'].';';
	$result = mysqli_query($conn, $sql);
	$tuple = null;
		
	if($result->num_rows == 0)
	{
		unset($_GET['plid']);
		header('Location: current_status.php?error=1') && exit();
		die("error");	
	}
	
	$tuple = mysqli_fetch_array($result);
	
	echo '<div id=pname>';
	echo '<h2>'.$tuple['PLAYER_NAME'].'</h2>'; 
	echo '</div>'; 
	
	$sql = 'SELECT * FROM GW_POINTS WHERE PLAYER_ID ='.$_GET['plid'].';';
	$result = mysqli_query($conn, $sql);
	$tuple = null;

	if($result->num_rows == 0)
	{
		unset($_GET['plid']);
		header('Location: current_status.php?error=1') && exit();
		die("error");	
	}
	
	$tuple = mysqli_fetch_array($result);
	
	echo '<div id=info>';
	echo '<table><tbody>';
	echo '<tr>';
	echo '<td>';
	echo 'GOALS SCORED';
	echo '</td>';
	echo '<td>';
	echo $tuple['GOALS'];
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'ASSISTS';
	echo '</td>';
	echo '<td>';
	echo $tuple['ASSISTS'];
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'MINUTES PLAYED';
	echo '</td>';
	echo '<td>';
	echo $tuple['MINS_PLAYED'];
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'CLEAN_SHEET';
	echo '</td>';
	echo '<td>';
	echo $tuple['CLEAN_SHEET'];
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'YELLOW CARD';
	echo '</td>';
	echo '<td>';
	echo $tuple['YELLOW'];
	echo '</td>';
	echo '</tr>';	
	echo '<tr>';
	echo '<td>';
	echo 'RED CARD';
	echo '</td>';
	echo '<td>';
	echo $tuple['RED'];
	echo '</td>';
	echo '</tr>';	
	echo '<tr>';
	echo '<td>';
	echo 'GOALS CONCEDED';
	echo '</td>';
	echo '<td>';
	echo $tuple['GOALS_CONCEDED'];
	echo '</td>';
	echo '</tr>';		
	echo '<tr>';
	echo '<td>';
	echo 'BONUS';
	echo '</td>';
	echo '<td>';
	echo $tuple['BONUS'];
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'POINTS';
	echo '</td>';
	echo '<td>';
	echo $tuple['GW_POINTS'];
	echo '</td>';
	echo '</tr>';	
	echo '</tbody></table>';
	echo '</div>';
}



$form = 0;

$i = 0;

if(isset($_SESSION["FORMATION"]))
	$form = $_SESSION["FORMATION"];
else
	echo 'yoyo';	

echo '<table id=bkg><tbody>';
echo '<tr>';
echo '<td>';
echo '<table><tbody>';
echo '<tr>';
echo '<td>';
	echo '<img src="./images/gk.png" height=120px width=120px>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
	$tup = get_player_info($_SESSION["SS_GK1"]);
	echo '<a href=current_status.php?plid='.$_SESSION["SS_GK1"].'>'.$tup['PLAYER_NAME'].'</a>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
	echo $tup['GW_POINTS'];
echo '</td>';
echo '</tr>';
echo '</tbody></table>';

echo '<table><tbody>';

	echo '<tr>';
	for($i=0;$i<(floor($form/100));$i++)
	{
		echo '<td>';
		echo '<img src="./images/def.png" height=120px width=120px>';
		echo '</td>';
	}
	echo '</tr>';
	for($i=0;$i<(floor($form/100));$i++)
	{
		echo '<td>';
		$temp = "SS_DF".($i+1);
		$tup = get_player_info($_SESSION[$temp]);
		echo '<a href=current_status.php?plid='.$_SESSION[$temp].'>'.$tup['PLAYER_NAME'].'</a>';
		echo '</td>';
	}
	echo '</tr>';
	for($i=0;$i<(floor($form/100));$i++)
	{
		echo '<td>';
		$temp = "SS_DF".($i+1);
		$tup = get_player_info($_SESSION[$temp]);
		echo $tup['GW_POINTS'];
		echo '</td>';
	}	
	echo '</tr>';
	
echo '</tbody></table>';

echo '<table><tbody>';

	echo '<tr>';
	for($i=0;$i<(floor($form/10)%10);$i++)
	{
		echo '<td>';
		echo '<img src="./images/def.png" height=120px width=120px>';
		echo '</td>';
	}
	echo '</tr>';
	for($i=0;$i<(floor($form/10)%10);$i++)
	{
		echo '<td>';
		$temp = "SS_MF".($i+1);
		$tup = get_player_info($_SESSION[$temp]);
		echo '<a href=current_status.php?plid='.$_SESSION[$temp].'>'.$tup['PLAYER_NAME'].'</a>';
		echo '</td>';
	}
	echo '</tr>';
	for($i=0;$i<(floor($form/10)%10);$i++)
	{
		echo '<td>';
		$temp = "SS_MF".($i+1);
		$tup = get_player_info($_SESSION[$temp]);
		echo $tup['GW_POINTS'];
		echo '</td>';
	}	
	echo '</tr>';
	
echo '</tbody></table>';

echo '<table><tbody>';

	echo '<tr>';
	for($i=0;$i<($form%10);$i++)
	{
		echo '<td>';
		echo '<img src="./images/def.png" height=120px width=120px>';
		echo '</td>';
	}
	echo '</tr>';
	for($i=0;$i<($form%10);$i++)
	{
		echo '<td>';
		$temp = "SS_FW".($i+1);
		$tup = get_player_info($_SESSION[$temp]);
		echo '<a href=current_status.php?plid='.$_SESSION[$temp].'>'.$tup['PLAYER_NAME'].'</a>';
		echo '</td>';
	}
	echo '</tr>';
	for($i=0;$i<($form%10);$i++)
	{
		echo '<td>';
		$temp = "SS_FW".($i+1);
		$tup = get_player_info($_SESSION[$temp]);
		echo $tup['GW_POINTS'];
		echo '</td>';
	}	
	echo '</tr>';
	
echo '</tbody></table>';
echo '</td>';
echo '</tr>';
echo '</tbody></table>';
?>

<script>
 $(".button-fill").hover(function () {
    $(this).children(".button-inside").addClass('full');
}, function() {
  $(this).children(".button-inside").removeClass('full');
});

</script>
</body>

</html>
