<?php 
session_start();


// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$login_user_id = $_SESSION["id"];
$comment = $_POST["write_comment"];
$feed_id = $_POST["feed_id"];

//DBに接続
	require('dbconnect.php');
//SQL文作成（INSERT文）
	 $comment_sql = "INSERT INTO `comments` (`id`, `comment`, `user_id`, `feed_id`, `created`) VALUES (NULL, ?, ?, ?,NOW());";
// $sql = "INSERT INTO `likes` (`id`, `user_id`, `feed_id`) VALUES (NULL, ?, ?);";
//SQL実行

    $comment_data = array($comment,$login_user_id,$feed_id);
    $comment_stmt = $dbh->prepare($comment_sql);
    $comment_stmt->execute($comment_data);



//一覧に戻る

    $update_sql = "UPDATE `feeds` SET `comment_count` = `comment_count` +1 WHERE `id`=?";

    $update_data = array($feed_id);

    $update_stmt = $dbh->prepare($update_sql);
    $update_stmt->execute($update_data);

    $comments = array();




header('Location: timeline.php');

 ?>