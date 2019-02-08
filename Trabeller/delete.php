<?php

$feed_id = $_GET["feed_id"];
require('dbconnect.php');

$sql = "DELETE FROM `feeds` WHERE `feeds`.`id` = ?";

$data = array($feed_id);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

header('Location: timeline.php');

?>