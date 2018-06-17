<?php 
//session変数を使えるようにする
	session_start();

//DBに接続
	require('dbconnect.php');

	$unfollower_id = $_GET["unfollower_id"];
	$user_id = $_SESSION["id"];
//SQL文作成（INSERT文）
	$unfollower_sql = "DELETE FROM `followers` WHERE `user_id` = ? AND `follower_id` = ?";
//SQL実行
	$unfollower_data = array($user_id,$unfollower_id);
	$unfollower_stmt = $dbh->prepare($unfollower_sql);
	$unfollower_stmt->execute($unfollower_data);
//一覧に戻る
	header("Location: profile.php?user_id=".$unfollower_id);
 ?>