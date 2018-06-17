<?php

//DBに接続
$feed_id = $_GET["feed_id"];
require('dbconnect.php');


//Delete文（SQL文)
//DELETE FROM テーブル名　WHERE 条件
$sql = "DELETE FROM `feeds` WHERE `feeds`.`id` = ?";

//SQL実行
$data = array($feed_id);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

// POSTを空にする。URLで読み込み直す。
header('Location: timeline.php');
            
//一覧に戻る

?>