<?php
	session_start();
	
	require 'connect.php';
	
	$sql = "select * from PLAYER_TABLE;";
	$result = mysqli_query($conn,$sql);
	
	$GK = array();
	$DF = array();
	$MF = array();
	$FW = array();
	$GK_size=0;
	$DF_size=0;
	$MF_size=0;
	$FW_size=0;
	
	if ($result->num_rows > 0)
	{
		while($player = mysqli_fetch_array($result))
		{
			if($player["POSITION"] == "GK")
				{array_push($GK,$player);
					$GK_size=$GK_size+1;
					}
			else if($player["POSITION"] == "DF")
				{array_push($DF,$player);
					$DF_size=$DF_size+1;
					}
			else if($player["POSITION"] == "MF")
				{array_push($MF,$player);
					$MF_size=$MF_size+1;
					}
			else if($player["POSITION"] == "FW")
				{array_push($FW,$player);	
					$FW_size=$FW_size+1;	
					}
		}		
	}

	if(!isset($_SESSION['SIGNEDUP']))
	{
		$sql = 'SELECT * FROM USER_TEAM_TABLE WHERE USER_ID = ' . $_SESSION['USER_ID'] . ';';
		$result = mysqli_query($conn, $sql);
		$tuple = null;

		if($result->num_rows == 1)
		{
			$tuple = mysqli_fetch_array($result);
		
			$GKP = array(null,$tuple["GK1"],$tuple["GK2"]);
			$DFP = array(null,$tuple["DF1"],$tuple["DF2"],$tuple["DF3"],$tuple["DF4"],$tuple["DF5"]);
			$MFP = array(null,$tuple["MF1"],$tuple["MF2"],$tuple["MF3"],$tuple["MF4"],$tuple["MF5"]);
			$FWP = array(null,$tuple["FW1"],$tuple["FW2"],$tuple["FW3"]);
		}
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $GKP[1] . ';';
		$result = mysqli_query($conn, $sql);
		$GKP[1] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $GKP[2] . ';';
		$result = mysqli_query($conn, $sql);
		$GKP[2] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $DFP[1] . ';';
		$result = mysqli_query($conn, $sql);
		$DFP[1] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $DFP[2] . ';';
		$result = mysqli_query($conn, $sql);
		$DFP[2] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $DFP[3] . ';';
		$result = mysqli_query($conn, $sql);
		$DFP[3] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $DFP[4] . ';';
		$result = mysqli_query($conn, $sql);
		$DFP[4] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $DFP[5] . ';';
		$result = mysqli_query($conn, $sql);
		$DFP[5] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $MFP[1] . ';';
		$result = mysqli_query($conn, $sql);
		$MFP[1] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $MFP[2] . ';';
		$result = mysqli_query($conn, $sql);
		$MFP[2] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $MFP[3] . ';';
		$result = mysqli_query($conn, $sql);
		$MFP[3] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $MFP[4] . ';';
		$result = mysqli_query($conn, $sql);
		$MFP[4] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $MFP[5] . ';';
		$result = mysqli_query($conn, $sql);
		$MFP[5] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $FWP[1] . ';';
		$result = mysqli_query($conn, $sql);
		$FWP[1] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $FWP[2] . ';';
		$result = mysqli_query($conn, $sql);
		$FWP[2] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM PLAYER_TABLE WHERE PLAYER_ID = ' . $FWP[3] . ';';
		$result = mysqli_query($conn, $sql);
		$FWP[3] = mysqli_fetch_array($result);
		
		$sql = 'SELECT * FROM USER_TABLE WHERE USER_ID = ' . $_SESSION['USER_ID'] . ';';
		$result = mysqli_query($conn, $sql);
		$tuple = mysqli_fetch_array($result);
		$teamvalue = $tuple['TEAM_VALUE'];
		$balance = $tuple['BALANCE'];				
	}
?>
	
<html>
<head>
<a href='#'><img id=back src='./images/goback.png' onclick="location.href='profile.php'"></a>
	
<h2 style="margin-left:100px;">Welcome, <?php echo " ". $_SESSION['username'];?> <br>
Team Name: <?php echo " ". $_SESSION['teamname'];?> </h2>
</head>		
	
<style>
	div{
	overflow:hidden;
    overflow-y: scroll;
    height: 500px; // change this to desired height
    display: inline-block;
    
    
}


    
#players{ position: absolute; padding: 10px; padding-right:15px; top: 225px; right: 500px; z-index: 99;background-color:rgba(41, 137, 233, 0.5); 
	border-radius: 20px;}
table{width:500px;}

td{text-align: center;
//background: #ffffff;
//border-style: solid;
//border-color:#000000;
color: black;
}
tr:nth-child(odd) {
    background: #BBDEFB;
}

tr:nth-child(even) {
    background: #90CAF9;
}


h1{//text-align: center;
//background: #ffffff;
//border-style: solid;
//border-color:#000000;
padding-top: 17px;
//padding-right: 50px;
//padding-bottom: 25px;
padding-left: 20px;
color: #ffffff;
font-size: 80px;}

h2{//text-align: center;
//background: #ffffff;
//border-style: solid;
//border-color:#000000;
padding-top: 17px;
//padding-right: 50px;
//padding-bottom: 25px;
padding-left: 20px;
color: #ffffff;
font-size: 50px;}


body{text-align: left;
//background: url("http://i.imgur.com/G9umvu3.png");
background: url("./images/back.jpg");
font-family: "Century Gothic", Century Gothic, sans-serif;
color: #ffffff;}

button{cursor: pointer;
  -o-transition:.5s;
  -ms-transition:.5s;
  -moz-transition:.5s;
  -webkit-transition:.5s;
  transition:.5s;
  border-radius: 10px 10px 10px 10px; border: 0px;
  height:22px;
  width:50px;
  margin-left:15px;} 	

button:hover{background-color:#bd9647;
color: #ffffff;} 

#GK_TABLE {
    line-height:30px;
    background-color:#bd9647;
    height:500px;
  //  width:300px;
    float:left;
    box-shadow: rgb(0, 0, 0) 2px 2px 15px 0px;
    border-radius: 20px 20px 20px 20px;
    margin-left :30px
   // padding-left:30px;
}
#MF_TABLE {
    line-height:30px;
    background-color:#bd9647;
    height:500px;
 //   width:300px;
    float:left;
box-shadow: rgb(0, 0, 0) 2px 2px 15px 0px;
    border-radius: 20px 20px 20px 20px;
}
#DF_TABLE {
    line-height:30px;
    background-color:#bd9647;
    height:500px;
 //   width:300px;
box-shadow: rgb(0, 0, 0) 2px 2px 15px 0px;
    border-radius: 20px 20px 20px 20px;
    float:left;
}
#FW_TABLE {
    line-height:30px;
    background-color:#bd9647;
    height:500px;
 //   width:300px;
box-shadow: rgb(0, 0, 0) 2px 2px 15px 0px;
    border-radius: 20px 20px 20px 20px;
    float:left;
}
td{padding:4px;}

#back
{
	position:absolute;
	margin-left: 0px;
	margin-top: 0px;
	width: 75px;
	height: 75px;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<body>
	
<button id="GK_BUTTON" onclick="myfun('GK_TABLE')">GK</button>
<button id="DF_BUTTON" onclick="myfun('DF_TABLE')">DF</button>	
<button id="MF_BUTTON" onclick="myfun('MF_TABLE')">MF</button>
<button id="FW_BUTTON" onclick="myfun('FW_TABLE')">FW</button>	
<br \> <br \>

<script src="transfer_functions.js">
</script>	

<?php	

	function get_club_name($cid) 
	{
		require 'connect.php';
	
		$sql = 'SELECT NAME FROM CLUB_TABLE WHERE CLUB_ID = ' . $cid . ';';
		$result = mysqli_query($conn, $sql);
		$tuple = null;

		if($result->num_rows == 1)
		{
			$tuple = mysqli_fetch_array($result);
			
			$cname = $tuple["NAME"];
		}
	
		return $cname;
	}

	
	///////////////////   GK TABLE   //////////////////////
	
	echo '<div id="GK_TABLE"><table>';
	for($i=0; $i<$GK_size; $i++)
    {
		echo '<tr onclick="take_player(this.id)" id="GKR_' . $i .'">';
		echo '<td>' . "&nbsp &nbsp &nbsp" . $GK[$i]['PLAYER_NAME'] . "  " .'</td>'
		.'<td>' .get_club_name($GK[$i]['CLUB_ID']) .'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp &nbsp" . $GK[$i]['PRICE'].'</td>'
		.'<td hidden>'.$GK[$i]['CLUB_ID'].'</td>'
		.'<td hidden>'.$GK[$i]['PLAYER_ID'].'</td>'
		.'<td hidden>'.$GK[$i]['POSITION'].'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp" . $GK[$i]['TOTAL_POINTS'].'</td>'; 
		echo '</tr>';
    }
	echo '</table></div>';
	
	///////////////////   DF TABLE   //////////////////////
	
	echo '<div style="display:none" id="DF_TABLE"><table >';
	for($i=0; $i<$DF_size; $i++)
    {
		echo '<tr onclick="take_player(this.id)" id="DFR_' . $i .'">';
		echo '<td>'. "&nbsp &nbsp &nbsp" .$DF[$i]['PLAYER_NAME'].'</td>'
		.'<td>'.get_club_name($DF[$i]['CLUB_ID']).'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp &nbsp" . $DF[$i]['PRICE'].'</td>'
		.'<td hidden>'.$DF[$i]['CLUB_ID'].'</td>'
		.'<td hidden>'.$DF[$i]['PLAYER_ID'].'</td>'
		.'<td hidden>'.$DF[$i]['POSITION'].'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp &nbsp " . $DF[$i]['TOTAL_POINTS'].'</td>';        
    echo '</tr>';
    }
	echo '</table></div>';
	
	///////////////////   MF TABLE   //////////////////////
	
	echo '<div style="display:none" id="MF_TABLE"><table >';
	for($i=0; $i<$MF_size; $i++)
    {
		echo '<tr onclick="take_player(this.id)" id="MFR_' . $i .'">';
		echo '<td>'. "&nbsp &nbsp &nbsp" . $MF[$i]['PLAYER_NAME'].'</td>'
		.'<td>'.get_club_name($MF[$i]['CLUB_ID']).'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp" . $MF[$i]['PRICE'].'</td>'
		.'<td hidden>'.$MF[$i]['CLUB_ID'].'</td>'
		.'<td hidden>'.$MF[$i]['PLAYER_ID'].'</td>'
		.'<td hidden>'.$MF[$i]['POSITION'].'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp " . $MF[$i]['TOTAL_POINTS'].'</td>';             
		echo '</tr>';
    }
	echo '</table></div>';
	
	///////////////////   FW TABLE   //////////////////////
	
	echo '<div style="display:none" id="FW_TABLE"><table >';
	for($i=0; $i<$FW_size; $i++)
    {
		echo '<tr onclick="take_player(this.id)" id="FWR_' . $i .'">';
		echo '<td>'. "&nbsp &nbsp &nbsp" . $FW[$i]['PLAYER_NAME'].'</td>'
		.'<td>'.get_club_name($FW[$i]['CLUB_ID']).'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp" . $FW[$i]['PRICE'].'</td>'
		.'<td hidden>'.$FW[$i]['CLUB_ID'].'</td>'
		.'<td hidden>'.$FW[$i]['PLAYER_ID'].'</td>'
		.'<td hidden>'.$FW[$i]['POSITION'].'</td>'
		.'<td>'. "&nbsp &nbsp &nbsp &nbsp " . $FW[$i]['TOTAL_POINTS'].'</td>';             
    echo '</tr>';
    }
	echo '</table></div>';
?>

<form id="players" action="save_transfer.php" method="POST">
TEAM VALUE   : 
<input readonly type="text" id='TEAM_VALUE' name="TEAM_VALUE" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $teamvalue;} else {echo 0.0;}?> style="text-align: center; width: 50px; padding: 5px; border-radius: 20px 20px 20px 20px; border: 0px;"><br>
BANK BALANCE :
<input readonly type="text" id='BANK_BALANCE' name="BANK_BALANCE" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $balance;} else {echo 100.0;}?> style="text-align: center; width: 50px; padding: 5px; border-radius: 20px 20px 20px 20px; border: 0px;"><br> <br \>
<input type="text" disabled id='S_GK1' name="S_GK1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[1]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_GK1">x</button><input type="hidden" id="PID_GK1" name="PID_GK1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[1]['PLAYER_ID'];}?>"><input type="hidden" id="CID_GK1" name="CID_GK1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[1]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_GK1" name="PRI_GK1" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[1]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_GK2' name="S_GK2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[2]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_GK2">x</button><input type="hidden" id="PID_GK2" name="PID_GK2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[2]['PLAYER_ID'];}?>"><input type="hidden" id="CID_GK2" name="CID_GK2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[2]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_GK2" name="PRI_GK2" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $GKP[2]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_DF1' name="S_DF1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[1]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_DF1">x</button><input type="hidden" id="PID_DF1" name="PID_DF1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[1]['PLAYER_ID'];}?>"><input type="hidden" id="CID_DF1" name="CID_DF1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[1]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_DF1" name="PRI_DF1" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[1]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_DF2' name="S_DF2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[2]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_DF2">x</button><input type="hidden" id="PID_DF2" name="PID_DF2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[2]['PLAYER_ID'];}?>"><input type="hidden" id="CID_DF2" name="CID_DF2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[2]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_DF2" name="PRI_DF2" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[2]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_DF3' name="S_DF3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[3]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_DF3">x</button><input type="hidden" id="PID_DF3" name="PID_DF3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[3]['PLAYER_ID'];}?>"><input type="hidden" id="CID_DF3" name="CID_DF3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[3]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_DF3" name="PRI_DF3" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[3]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_DF4' name="S_DF4" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[4]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_DF4">x</button><input type="hidden" id="PID_DF4" name="PID_DF4" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[4]['PLAYER_ID'];}?>"><input type="hidden" id="CID_DF4" name="CID_DF4" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[4]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_DF4" name="PRI_DF4" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[4]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_DF5' name="S_DF5" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[5]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_DF5">x</button><input type="hidden" id="PID_DF5" name="PID_DF5" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[5]['PLAYER_ID'];}?>"><input type="hidden" id="CID_DF5" name="CID_DF5" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[5]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_DF5" name="PRI_DF5" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $DFP[5]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_MF1' name="S_MF1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[1]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_MF1">x</button><input type="hidden" id="PID_MF1" name="PID_MF1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[1]['PLAYER_ID'];}?>"><input type="hidden" id="CID_MF1" name="CID_MF1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[1]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_MF1" name="PRI_MF1" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[1]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_MF2' name="S_MF2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[2]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_MF2">x</button><input type="hidden" id="PID_MF2" name="PID_MF2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[2]['PLAYER_ID'];}?>"><input type="hidden" id="CID_MF2" name="CID_MF2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[2]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_MF2" name="PRI_MF2" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[2]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_MF3' name="S_MF3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[3]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_MF3">x</button><input type="hidden" id="PID_MF3" name="PID_MF3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[3]['PLAYER_ID'];}?>"><input type="hidden" id="CID_MF3" name="CID_MF3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[3]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_MF3" name="PRI_MF3" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[3]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_MF4' name="S_MF4" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[4]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_MF4">x</button><input type="hidden" id="PID_MF4" name="PID_MF4" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[4]['PLAYER_ID'];}?>"><input type="hidden" id="CID_MF4" name="CID_MF4" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[4]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_MF4" name="PRI_MF4" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[4]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_MF5' name="S_MF5" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[5]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_MF5">x</button><input type="hidden" id="PID_MF5" name="PID_MF5" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[5]['PLAYER_ID'];}?>"><input type="hidden" id="CID_MF5" name="CID_MF5" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[5]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_MF5" name="PRI_MF5" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $MFP[5]['PRICE'];} else {echo 0;}?>><br> 
<input type="text" disabled id='S_FW1' name="S_FW1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[1]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_FW1">x</button><input type="hidden" id="PID_FW1" name="PID_FW1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[1]['PLAYER_ID'];}?>"><input type="hidden" id="CID_FW1" name="CID_FW1" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[1]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_FW1" name="PRI_FW1" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[1]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_FW2' name="S_FW2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[2]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_FW2">x</button><input type="hidden" id="PID_FW2" name="PID_FW2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[2]['PLAYER_ID'];}?>"><input type="hidden" id="CID_FW2" name="CID_FW2" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[2]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_FW2" name="PRI_FW2" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[2]['PRICE'];} else {echo 0;}?>><br>
<input type="text" disabled id='S_FW3' name="S_FW3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[3]['PLAYER_NAME'];}?>"><button type="button" onclick="remove_player(this.id)" id="RM_FW3">x</button><input type="hidden" id="PID_FW3" name="PID_FW3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[3]['PLAYER_ID'];}?>"><input type="hidden" id="CID_FW3" name="CID_FW3" value="<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[3]['CLUB_ID'];} else {echo 0;}?>"><input type="hidden" id="PRI_FW3" name="PRI_FW3" value=<?php if(!isset($_SESSION['SIGNEDUP'])) {echo $FWP[3]['PRICE'];} else {echo 0;}?>><br>
<input id='confirm_button' type='submit' value='Confirm Team' style="position: absolute; padding: 10px; padding-right:15px; top: 420px; right: 150px; z-index: 99; border-radius: 20px 20px 20px 20px; border: 0px;">
</form>	

<script>set_clubs();</script>

</body>
</html>
