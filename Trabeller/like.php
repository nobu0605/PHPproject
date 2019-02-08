<?php
	session_start();

	require('dbconnect.php');

	$feed_id = $_GET["feed_id"];

	$sql = "INSERT INTO `likes` (`id`, `user_id`, `feed_id`) VALUES (NULL, ?, ?);";

	$data = array($_SESSION["id"],$feed_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
	header("Location: timeline.php")

 ?>