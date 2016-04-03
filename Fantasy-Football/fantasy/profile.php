<?php
	session_start();	
	require 'get_team.php';
	
	
		$_SESSION["SS_GK1"] = $GK[1];
		$_SESSION["SS_GK2"] = $GK[2];
		$_SESSION["SS_DF1"] = $DF[1];
		$_SESSION["SS_DF2"] = $DF[2];
		$_SESSION["SS_DF3"] = $DF[3];
		$_SESSION["SS_DF4"] = $DF[4];
		$_SESSION["SS_DF5"] = $DF[5];
		$_SESSION["SS_MF1"] = $MF[1];
		$_SESSION["SS_MF2"] = $MF[2];
		$_SESSION["SS_MF3"] = $MF[3];
		$_SESSION["SS_MF4"] = $MF[4];
		$_SESSION["SS_MF5"] = $MF[5];
		$_SESSION["SS_FW1"] = $FW[1];
		$_SESSION["SS_FW2"] = $FW[2];
		$_SESSION["SS_FW3"] = $FW[3];
		$_SESSION["USER_ID"] = $uid;
		$_SESSION["FORMATION"] = $form;
		$_SESSION["CAPTAIN"] = $captain;
	
	require 'connect.php';
	
	$sql = 'SELECT * FROM ADDITIONAL;';
	$result = mysqli_query($conn, $sql);
	$tuple = null;

	if($result->num_rows == 0){
		session_unset();
		header('Location: index.php') && exit();
		die("Could Not connect to data base");
	}
	
	$tuple = mysqli_fetch_array($result);	
	
?>

<html>
<style>

td{text-align: center;
//background: #ffffff;
//border-style: solid;
//border-color:#000000;
color: #ffffff;
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

body{text-align: left;
background: url("./images/back.jpg");
//background: url("http://i.imgur.com/PqbPuc0.png");
font-family: "Century Gothic", Century Gothic, sans-serif;
padding-top: 305px;
//padding-right: 50px;
//padding-bottom: 25px;
padding-left: 90px;
color:#ffffff;}

button{cursor: pointer;
  -o-transition:.5s;
  -ms-transition:.5s;
  -moz-transition:.5s;
  -webkit-transition:.5s;
  transition:.5s;} 	

button:hover{background-color:#bd9647;
color: #ffffff;}
	

</style>


<head>
<title>My Team - Fantasy Football 2015</title>

</head>

<script src="functions.js"></script>
<button type="button" style="position: absolute; padding: 10px; padding-right:15px; top: 100px; right: 600px; z-index: 99; border-radius: 20px 20px 20px 20px; border: 0px;"
onclick = "document.location.href='current_status.php'">Gameweek Status</button>
<button type="button" style="position: absolute; padding: 10px; padding-right:15px; top: 100px; right: 290px; z-index: 99; border-radius: 20px 20px 20px 20px; border: 0px;"
onclick = "document.location.href='logout.php'">Logout</button>
<br \>
<button id="trans" type="button" style="position: absolute; padding: 10px; padding-right:15px; top: 100px; right: 380px; z-index: 99; border-radius: 20px 20px 20px 20px; border: 0px;"
onclick = "document.location.href='transfer.php'">Transfer</button>

<body>	

<div id="txtBox_4" objtype="2" style="width: 951px; height: 230px; position: absolute; padding: 10px; top: 16px; left: 12px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 48pt;">
        <span style="color: rgb(189, 150, 71);">My Team 
           </span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 1200px; height: 230px; position: absolute; padding: 10px; top: 6px; left: 0px; z-index: 4; " class="" align="right">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 48pt;">
        <span style="color: rgb(255, 255, 255);">Welcome, <?php	echo $_SESSION['username']?>
           </span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 951px; height: 230px; position: absolute; padding: 10px; top: 86px; left: 12px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 36pt;">
        <span style="color: rgb(255, 255, 255);"><?php	echo $teamname;?> 
           </span></span></span></div>
           
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 205px; left: 955px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">GameWeek Points: <?php	echo $gwpoints;?>
           </span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 235px; left: 955px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">Overall Points: <?php	echo $totalpoints; ?>
           </span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 265px; left: 955px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">Overall Rank: <?php echo $rank;?>
           </span></span></span></div>   
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 295px; left: 955px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">Total Users: <?php	echo $totusers;?>
           </span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 325px; left: 955px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">Total Team Value: <?php echo $teamval;?>
           </span></span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 355px; left: 955px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">Balance in bank: <?php	echo $balance;?>
           </span></span></span></div>
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 165px; left: 641px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 20pt;">
        <span style="color: rgb(255, 255, 255);">Starting XI
           </span></span></span></div>			   
<div id="txtBox_4" objtype="2" style="width: 200px; height: 230px; position: absolute; padding: 10px; top: 165px; left: 951px; z-index: 4; " class="">
  <span style="font-weight: bold;">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 20pt;">
        <span style="color: rgb(255, 255, 255);">Points/Rankings
           </span></span></span></div>


<div style="position: absolute; padding: 10px; top: 153px; left: 15px; z-index: 100; ">
    <span style="font-family: 'Century Gothic';">
      <span style="font-size: 12pt;">
        <span style="color: rgb(255, 255, 255);">Select your preferred formation
           </span></span></span></div>
		   
		   
<form style="position: absolute; top: 155px; left: 274px; z-index: 100; " >
<select id="formation" style="height: 35px;width: 65px; border-radius: 20px 0px 0px 20px; border:0px; padding-left:7px;">
  <option <?php if($form == 442){echo "selected" ;}?> value="442">4-4-2</option>
  <option <?php if($form == 451){echo "selected" ;}?> value="451">4-5-1</option>
  <option <?php if($form == 433){echo "selected" ;}?> value="433">4-3-3</option>
  <option <?php if($form == 352){echo "selected" ;}?> value="352">3-5-2</option>
</select>
</form>



<!--
Team Selection Forms
-->

<form style="position: absolute; padding: 10px; top: 205px; left: 640px; z-index: 100; " >
Goalkeeper<br>
<select onchange="select_swap(this.id)" id="GK1" style="width: 263px; height: 25px; background-color:#deb258; border-color:#000000; position:relative; top:1px; border:0px;"> 
  <option selected="selected" value="GK1"><?php	echo get_player_name($GK[1])?></option>
<!--  <option value="GK2"><?php echo get_player_name($GK[2])?></option> -->
</select>

<br>

Defenders<br>
<select onchange="select_swap(this.id)" id="DF1" style="width: 263px; height: 25px;  background-color:#deb258; border-color:#000000;  border:0px;">
  <option selected="selected" value="DF1"><?php	echo get_player_name($DF[1])?></option>
  <option value="DF2"><?php	echo get_player_name($DF[2])?></option>
  <option value="DF3"><?php	echo get_player_name($DF[3])?></option>
  <option value="DF4"><?php	echo get_player_name($DF[4])?></option>
  <option value="DF5"><?php	echo get_player_name($DF[5])?></option>
</select> 
 <br>

<select onchange="select_swap(this.id)" id="DF2" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:1px; border:0px;">
  <option value="DF1"><?php	echo get_player_name($DF[1])?></option>
  <option selected="selected" value="DF2"><?php	echo get_player_name($DF[2])?></option>
  <option value="DF3"><?php	echo get_player_name($DF[3])?></option>
  <option value="DF4"><?php	echo get_player_name($DF[4])?></option>
  <option value="DF5"><?php	echo get_player_name($DF[5])?></option>
</select>
<br>

<select onchange="select_swap(this.id)" id="DF3" style="width: 263px; height: 25px;  background-color:#deb258; border-color:#000000; position:relative; top:2px; border:0px;">
  <option value="DF1"><?php echo get_player_name($DF[1])?></option>
  <option value="DF2"><?php	echo get_player_name($DF[2])?></option>
  <option selected="selected" value="DF3"><?php	echo get_player_name($DF[3])?></option>
  <option value="DF4"><?php	echo get_player_name($DF[4])?></option>
  <option value="DF5"><?php	echo get_player_name($DF[5])?></option>
</select> 
<br>

<select onchange="select_swap(this.id)" id="DF4" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:3px; border:0px;">
  <option value="DF1"><?php	echo get_player_name($DF[1])?></option>
  <option value="DF2"><?php	echo get_player_name($DF[2])?></option>
  <option value="DF3"><?php	echo get_player_name($DF[3])?></option>
  <option selected="selected" value="DF4"><?php	echo get_player_name($DF[4])?></option>
  <option value="DF5"><?php	echo get_player_name($DF[5])?></option>
</select> 

<br>

<select onchange="select_swap(this.id)" id="DF5" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:4px; border:0px;">
  <option value="DF1"><?php	echo get_player_name($DF[1])?></option>
  <option value="DF2"><?php	echo get_player_name($DF[2])?></option>
  <option value="DF3"><?php	echo get_player_name($DF[3])?></option>
  <option value="DF4"><?php	echo get_player_name($DF[4])?></option>
  <option selected="selected" value="DF5"><?php	echo get_player_name($DF[5])?></option>
</select> 

<br>
<div style="position:relative; top:4px;">
Midfielders<br>

</div>


<select onchange="select_swap(this.id)" id="MF1" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:3px; border:0px;">
  <option selected="selected" value="MF1"><?php	echo get_player_name($MF[1])?></option>
  <option value="MF2"><?php	echo get_player_name($MF[2])?></option>
  <option value="MF3"><?php	echo get_player_name($MF[3])?></option>
  <option value="MF4"><?php	echo get_player_name($MF[4])?></option>
  <option value="MF5"><?php	echo get_player_name($MF[5])?></option>
</select> 
<br>

<select onchange="select_swap(this.id)" id="MF2" style="width: 263px; height: 25px;  background-color:#deb258; border-color:#000000; position:relative; top:4px; border:0px;">
  <option value="MF1"><?php	echo get_player_name($MF[1])?></option>
  <option selected="selected" value="MF2"><?php	echo get_player_name($MF[2])?></option>
  <option value="MF3"><?php	echo get_player_name($MF[3])?></option>
  <option value="MF4"><?php	echo get_player_name($MF[4])?></option>
  <option value="MF5"><?php	echo get_player_name($MF[5])?></option>
</select> 
<br>

<select onchange="select_swap(this.id)" id="MF3" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:5px; border:0px;">
  <option value="MF1"><?php	echo get_player_name($MF[1])?></option>
  <option value="MF2"><?php	echo get_player_name($MF[2])?></option>
  <option selected="selected" value="MF3"><?php	echo get_player_name($MF[3])?></option>
  <option value="MF4"><?php	echo get_player_name($MF[4])?></option>
  <option value="MF5"><?php	echo get_player_name($MF[5])?></option>
</select> 
<br>

<select onchange="select_swap(this.id)" id="MF4" style="width: 263px; height: 25px;    background-color:#deb258; border-color:#000000; position:relative; top:6px; border:0px;">
  <option value="MF1"><?php	echo get_player_name($MF[1])?></option>
  <option value="MF2"><?php	echo get_player_name($MF[2])?></option>
  <option value="MF3"><?php	echo get_player_name($MF[3])?></option>
  <option selected="selected" value="MF4"><?php	echo get_player_name($MF[4])?></option>
  <option value="MF5"><?php	echo get_player_name($MF[5])?></option>
</select> 

<br>

<select onchange="select_swap(this.id)" id="MF5" style="width: 263px; height: 25px;  background-color:#deb258; border-color:#000000; position:relative; top:7px; border:0px;">
  <option value="MF1"><?php	echo get_player_name($MF[1])?></option>
  <option value="MF2"><?php	echo get_player_name($MF[2])?></option>
  <option value="MF3"><?php	echo get_player_name($MF[3])?></option>
  <option value="MF4"><?php	echo get_player_name($MF[4])?></option>
  <option selected="selected" value="MF5"><?php	echo get_player_name($MF[5])?></option>
</select> 
<br>
<div style="position:relative; top:5px;">
Forwards<br>

</div>


<select onchange="select_swap(this.id)" id="FW1" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:4px;border:0px;">
  <option selected="selected" value="FW1"><?php	echo get_player_name($FW[1])?></option>
  <option value="FW2"><?php	echo get_player_name($FW[2])?></option>
  <option value="FW3"><?php	echo get_player_name($FW[3])?></option>

</select> 

<br>

<select onchange="select_swap(this.id)" id="FW2" style="width: 263px; height: 25px;   background-color:#deb258; border-color:#000000; position:relative; top:5px; border:0px;">
  <option value="FW1"><?php	echo get_player_name($FW[1])?></option>
  <option selected="selected" value="FW2"><?php	echo get_player_name($FW[2])?></option>
  <option value="FW3"><?php	echo get_player_name($FW[3])?></option>
</select> 

<br>

<select onchange="select_swap(this.id)" id="FW3" style="width: 263px; height: 25px;  background-color:#deb258; border-color:#000000; border:0px; position:relative; top:6px; border:0px;">
  <option value="FW1"><?php	echo get_player_name($FW[1])?></option>
  <option value="FW2"><?php	echo get_player_name($FW[2])?></option>
  <option selected="selected" value="FW3"><?php	echo get_player_name($FW[3])?></option>
</select> 

</form>




<!--
END_Team Selection Forms
-->


<!--
Substitution Selection Forms
-->

<select hidden id="GK2" style="width: 276px; height: 25px;  border:0px; background-color:#deb258; color:#000000;" disabled>
  <option value="GK2">GK2</option>
  </select> 

<!--
END_Substitution Selection Forms
-->

<img id="formimage" src=<?php echo $src?> style="width: 930px; height: 500px; position: absolute; top: 220px; left: -135px;"/>


<div id="boxTool_2" objtype="5" style="width: 300px; height: 521px; border: 1px solid rgb(51, 51, 51);
position: absolute; top: 155px; left: 630px; z-index: -1; background-color: rgb(189, 150, 71); box-shadow: rgb(0, 0, 0) 2px 2px 15px 0px; border-radius: 20px;"
class=""></div>
<div id="boxTool_2" objtype="5" style="width: 300px; height: 255px; border: 1px solid rgb(51, 51, 51);
position: absolute; top: 155px; left: 940px; z-index: -1; background-color: rgb(189, 150, 71); box-shadow: rgb(0, 0, 0) 2px 2px 15px 0px; border-radius: 20px;"
class=""></div>

<!--
FORM TO PASS PLAYER VARIABLES TO CONFIRM
-->

<form action="set_team.php" method="POST">
<input type='hidden' id="S_GK1" name="S_GK1" value="">
<input type='hidden' id='S_GK2' name="S_GK2" value="">
<input type='hidden' id='S_DF1' name="S_DF1" value="">
<input type='hidden' id='S_DF2' name="S_DF2" value="">
<input type='hidden' id='S_DF3' name="S_DF3" value="">
<input type='hidden' id='S_DF4' name="S_DF4" value="">
<input type='hidden' id='S_DF5' name="S_DF5" value="">
<input type='hidden' id='S_MF1' name="S_MF1" value="">
<input type='hidden' id='S_MF2' name="S_MF2" value="">
<input type='hidden' id='S_MF3' name="S_MF3" value="">
<input type='hidden' id='S_MF4' name="S_MF4" value="">
<input type='hidden' id='S_MF5' name="S_MF5" value="">  
<input type='hidden' id='S_FW1' name="S_FW1" value="">
<input type='hidden' id='S_FW2' name="S_FW2" value="">
<input type='hidden' id='S_FW3' name="S_FW3" value="">
<input type='hidden' id='FORM' name="FORMATION" value="<?php echo $form?>">
<input type='hidden' id='CAPTAIN' name="CAPTAIN" value="<?php echo $captain?>">
<input id="cteam" type='submit' value='Confirm Team' style="position: absolute; padding: 10px; padding-right:15px; top: 100px; right:475px; z-index: 99; border-radius: 20px 20px 20px 20px; border: 0px;">
</form>

<button type="button" style="position: absolute; padding: 10px; padding-left:15px; top: 155px; left: 332px; z-index: 99; border-radius: 0px 20px 20px 0px; border: 0px;"
onclick="myFunction()">select</button>


<script>
	check_transfer(<?php echo $tuple["TRANSFER"]?>);
	myFunction();
	set_selected();
</script>

</body>
	

</html>
