<?php

	//feed_idを取得
	$feed_id = $_GET["feed_id"];

	require('dbconnect.php');

    $sql = 'SELECT f.*,u.name,u.img_name FROM feeds AS f LEFT JOIN users AS u ON f.user_id=u.id WHERE f.id = "'.$feed_id.'"';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $feed_feed = $stmt->fetch(PDO::FETCH_ASSOC);

  // 更新ボタンが押されたら（POST送信されたデータが存在したら）
    if (!empty($_POST)) {
      // Update文でDBに保存
      $update_sql = "UPDATE `feeds` SET `feed` = ? WHERE `feeds`.`id` = ?";
      $date = array($_POST["feed"],$feed_id);

      // SQL文実行
      $stmt = $dbh->prepare($update_sql);
      $stmt->execute($date);

      // 一覧に戻る
      header("Location: timeline.php");
    }

	//編集したいfeesd tableのデータを取得して、入力らんに初期表示しましょう。
	//ポイント
	//書いた人の情報も表示したいので、テーブル結合を使う(timelineと同じもの)
	//編集したいfeeds tableのデータは一件だけです（繰り返し処理は必要ないよ）

	//SQL文作成

	//SQL文実行

	//フェッチ(データ取得)

	//↓HTML内にデータ表示の処理を記述


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Learn SNS</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="margin-top: 60px;">
  <div class="container">
  	<div class="row">
  		<div class="col-xs-4 col-xs-offset-4">
  			<form class="form-group" method="post">
  				<img src="user_profile_img/<?php echo $feed_feed['img_name'];?>" width="60">
  				<?php echo $feed_feed['name'];?><br>
  				<?php echo $feed_feed['created'];?><br>
  				<textarea class="form-control" name="feed"><?php echo $feed_feed["feed"] ;?></textarea>
  				<input type="submit" value="更新" class="btn btn-warning btn-xs">
  			</form>
  		</div>
  	
  	</div>
  	
  </div>

  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>