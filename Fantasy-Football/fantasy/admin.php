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

#b
{
	margin-left:200px;
	margin-top:300px;
}
</style>
<body>
<?php

require 'connect.php';

	$sql = 'SELECT * FROM ADDITIONAL;';
	$result = mysqli_query($conn, $sql);
	$tuple = null;

	if($result->num_rows == 0){
		session_unset();
		header('Location: admin.php?error=1') && exit();
		die("Could Not connect to data base");
	}
	
	$tuple = mysqli_fetch_array($result);
	
	$trans = 0;
	
	if($tuple["TRANSFER"]==1)
		$trans = 'Disable Transfer';
	else
		$trans = 'Enable Transfer';
?>
<div id='b'>
<a href="#">
  <div onclick="document.location.href='ask_team.php'" class="button-fill grey">
    <div class="button-text">Update Scores</div>
    <div class="button-inside">
      <div class="inside-text">Update</div>
    </div>
  </div></a>
</html>

<a href="#">
  <div class="button-fill grey" onclick="document.location.href='update_gw.php'">
    <div class="button-text">Update Gameweek</div>
    <div class="button-inside">
      <div class="inside-text">Update</div>
    </div>
  </div></a>
</html>

<a href="#">
  <div class="button-fill grey" onclick="document.location.href='set_gw.php'">
    <div class="button-text">Set Gameweek</div>
    <div class="button-inside">
      <div class="inside-text">Set</div>
    </div>
  </div></a>
</html>

<a href="#">
  <div class="button-fill grey" onclick="document.location.href='toggle.php'">
    <div class="button-text"><?php echo $trans;?></div>
    <div class="button-inside">
      <div class="inside-text">Change</div>
    </div>
  </div></a>
</div>

<a style="margin-left:630px;" href="#">
  <div onclick="document.location.href='ask_team2.php'" class="button-fill grey">
    <div class="button-text">Update Price</div>
    <div class="button-inside">
      <div class="inside-text">Update</div>
    </div>
  </div></a>
</html>

<script>
 $(".button-fill").hover(function () {
    $(this).children(".button-inside").addClass('full');
}, function() {
  $(this).children(".button-inside").removeClass('full');
});

</script>
</body>

</html>
