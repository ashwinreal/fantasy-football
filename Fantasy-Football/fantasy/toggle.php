<?php

	require 'connect.php';

	$sql = 'UPDATE ADDITIONAL SET TRANSFER = MOD(TRANSFER + 1,2);';
	$result = mysqli_query($conn, $sql);

	if($result==0){
		session_unset();
		header('Location: admin.php?error=1') && exit();
		die("Could Not connect to data base");
	}
	
	header('Location: admin.php?transfer_changed=1') && exit();
	die();

?>
	
	
