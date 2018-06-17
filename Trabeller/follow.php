<?php 
//session変数を使えるようにする
	session_start();

//DBに接続
	require('dbconnect.php');
//feed_idを取得
	$follower_id = $_GET["follower_id"];
	$user_id = $_SESSION["id"];
//SQL文作成（INSERT文）
	$user_sql = "INSERT INTO `followers` (`id`, `user_id`, `follower_id`) VALUES (NULL, ?, ?);";
//SQL実行
	$user_data = array($user_id,$follower_id);
    $user_stmt = $dbh->prepare($user_sql);
    $user_stmt->execute($user_data);
// //一覧に戻る
	header("Location: profile.php?user_id=".$follower_id)
    // echo "<pre>";
    // var_dump($user_stmt);
    // echo "</pre>";

 ?>