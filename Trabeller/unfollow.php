<?php 
	session_start();

	require('dbconnect.php');

	$unfollower_id = $_GET["unfollower_id"];
	$user_id = $_SESSION["id"];

	$unfollower_sql = "DELETE FROM `followers` WHERE `user_id` = ? AND `follower_id` = ?";

	$unfollower_data = array($user_id,$unfollower_id);
	$unfollower_stmt = $dbh->prepare($unfollower_sql);
	$unfollower_stmt->execute($unfollower_data);

	header("Location: profile.php?user_id=".$unfollower_id);
 ?>