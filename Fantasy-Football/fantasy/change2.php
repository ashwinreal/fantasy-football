<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<style>
	body{background:url("./images/admin_back.jpg");background-size: cover;}
	
	html{color:white;}
	
* {
  font-family: 'Open Sans', sans-serif;
}
.button-fill {
  text-align: center;
  background: #ccc;
  display: inline-block;
  position: relative;
  text-transform: uppercase;
  margin: 25px;
}
.button-fill.grey {
  background: #445561;
  color: white;
}
.button-fill.orange {
  background: #f26b43;
  color: #fff;
}
.button-fill.orange .button-inside {
  color: #f26b43;
}
.button-fill.orange .button-inside.full {
  border: 1px solid #f26b43;
}
.button-text {
  padding: 0 25px;
  line-height: 56px;
  letter-spacing: .1em;
}
.button-inside {
  width: 0px;
  height: 54px;
  margin: 0;
  float: left;
  position: absolute;
  top: 1px;
  left: 50%;
  line-height: 54px;
  color: #445561;
  background: #fff;
  text-align: center;
  overflow: hidden;
  -webkit-transition: width 0.5s, left 0.5s, margin 0.5s;
  -moz-transition: width 0.5s, left 0.5s, margin 0.5s;
  -o-transition: width 0.5s, left 0.5s, margin 0.5s;
  transition: width 0.5s, left 0.5s, margin 0.5s;
}
.button-inside.full {
  width: 100%;
  left: 0%;
  top: 0;
  margin-right: -50px;
  border: 1px solid #445561;
}
.inside-text {
  text-align: center;
  position: absolute;
  right: 50%;
  letter-spacing: .1em;
  text-transform: uppercase;
  -webkit-transform: translateX(50%);
  -moz-transform: translateX(50%);
  -ms-transform: translateX(50%);
  transform: translateX(50%);
  
}
table{
	margin-left:auto;
	margin-right:auto;
	background-color:rgba(66, 84, 225, 0.3);
}

input, select
{
	font-family: 'Open Sans', sans-serif;
	font-size: 23px;
	color: black;
	background-color:rgba(255, 255, 209, 0.7);
	transition: background-color 0.5s ease;
}
td{
	font-family: 'Open Sans', sans-serif;
	font-size: 23px;
	color: white;
	padding:7px;
}
select{
	margin-left: 175px;
	margin-top:  80px;
}
	
input
{
	width:75px;
}
select:hover
{
	background-color:rgba(66, 69, 0, 0.7);
	color: white;	
}
input:hover
{
	background-color:rgba(66, 69, 0, 0.7);
	color: white;	
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

<a href='#'><img id=back src='./images/goback.png' onclick="location.href='ask_team.php'"></a>

<?php
session_start();

if($_GET['success']==1)
{
	echo 'successfully inserted';
	unset($_GET['success']);
}
else if($_GET['error']==1)
{
	echo 'Unsuccessful';
	unset($_GET['error']);
}

if(!isset($_SESSION['cid']))
	$_SESSION['cid'] = $_POST['team'];
	
require 'connect.php';

$sql = 'SELECT * FROM PLAYER_TABLE WHERE CLUB_ID='.$_SESSION['cid'].';';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result->num_rows == 0){
	unset($_SESSION['cid']);	
	header('Location: ask_team.php') && exit();
	die("Could Not connect to data base");
}	
?>

<form action='change_price.php' method='POST'>			
<select id = "PLAYER_ID" name='PLAYER_ID'>
<?php
	while($tuple = mysqli_fetch_array($result))
	{
		echo '<option value=' .$tuple['PLAYER_ID'].'>'.$tuple['PLAYER_NAME'].'</option>';
	}
?>
</select>
<table><tbody>
<tr>
	<td>PRICE:</td>
	<td><input type='number' step='0.1' name='PRICE'></input></td>
</tr>
<tr><td></td><td>	
<input type='submit' value='GO!!'></input>
</td></tr>
</tbody></table>	
</form>

</html>
