<?php 
	session_start();

	require('dbconnect.php');

	$follower_id = $_GET["follower_id"];
	$user_id = $_SESSION["id"];

	$user_sql = "INSERT INTO `followers` (`id`, `user_id`, `follower_id`) VALUES (NULL, ?, ?);";

	$user_data = array($user_id,$follower_id);
    $user_stmt = $dbh->prepare($user_sql);
    $user_stmt->execute($user_data);

	header("Location: profile.php?user_id=".$follower_id)

 ?>