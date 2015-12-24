<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<style>
	body{background:url("./images/admin_back.jpg");background-size: cover;}
	
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

input, select
{
	font-family: 'Open Sans', sans-serif;
	font-size: 23px;
	color: white;
	margin-left: 450px;
	margin-top: 25px;
	background-color:rgba(50, 50, 50, 0.8);
	height:50px;
	width:250px;
	transition: background-color 0.5s ease;
}
input
{
	margin-left:30px;
}
select:hover
{
	background-color:rgba(0, 0, 0, 0.6);
}
input:hover
{
	background-color:rgba(0, 0, 0, 0.6);
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

<a href='#'><img id=back src='./images/goback.png' onclick="location.href='admin.php'"></a>

<?php
session_start();

if(isset($_SESSION["cid"]))
	unset($_SESSION["cid"]);
	
require 'connect.php';

$sql = 'SELECT * FROM CLUB_TABLE;';
$result = mysqli_query($conn, $sql);
$tuple = null;

if($result->num_rows == 0){
	header('Location: ask_gw.php') && exit();
	die("Could Not connect to data base");
}	
?>

<form id='b' action='change.php' method='POST'>
<select id = "team" name='team'>
<?php
	while($tuple = mysqli_fetch_array($result))
	{
		echo '<option value=' .$tuple['CLUB_ID'].'>'.$tuple['NAME'].'</option>';
	}
?>
</select>
<input type='submit' value='GO!!'></input>
</form>

</html>
