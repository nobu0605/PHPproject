<?php 
session_start();
// DB接続
require('dbconnect.php');//ファイルの中身がそのまま出ている
require('function.php');//関数を宣言してるだけ。ファイルの中身の全部処理してるわけじゃない

    $signin_user = get_signin_user($dbh,$_SESSION["id"]);
    check_signin($_SESSION["id"]);

// ユーザーの一覧を表示するため取得する
    $sql = 'SELECT * FROM `users` ';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);


    while (true) {
        $all = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($all == false) {
            break;
        }

// SQL文作成

// SQL文実行

// 繰り返し文の中でフェッチ（配列に保存）

// データ保存した配列を表示で使用する

    // feed数を取得するSQL文を作成
    $feed_sql = "SELECT COUNT(*) AS `feed_cnt` FROM `feeds` WHERE `user_id` = ?";
    // 今回はusers.idです
    $feed_data = array($all["id"]);

    // SQL文を実行
    $feed_stmt = $dbh->prepare($feed_sql);
    $feed_stmt->execute($feed_data);
    // feed数を取得
    $feed = $feed_stmt->fetch(PDO::FETCH_ASSOC);

    $all["feed_cnt"] = $feed["feed_cnt"];

    $all_users[] = $all;

  }

 ?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Trabeller</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <LINK rel="SHORTCUT ICON" href="assets2/img/bell.jpeg">
</head>
<body style="margin-top: 60px; background: #E4E6EB;">

      <?php include("navbar.php") ?>


  <div class="container">
  <?php foreach($all_users as $all_user){ ?>
    <div class="row">
      <div class="col-xs-12">

          <div class="thumbnail">
            <div class="row">
              <div class="col-xs-1">
                <a href="profile.php?user_id=<?php echo $all_user['id'] ?>" ><img src="user_profile_img/<?php echo $all_user['img_name'] ?>" width="80"></a>
              </div>
              <div class="col-xs-11">
                名前 <?php echo $all_user['name'] ?><br>
                <a href="#" style="color: #7F7F7F;"><?php echo $all_user['created'] ?>からメンバー</a>
              </div>
            </div>
            
            <div class="row feed_sub">
              <div class="col-xs-12">
                <span class="comment_count">投稿数 : <?php echo $all_user["feed_cnt"]; ?></span>
              </div>
            </div>
          </div><!-- thumbnail -->
      </div><!-- class="col-xs-12" -->
    </div><!-- class="row" -->
    <?php } ?>
  </div><!-- class="cotainer" -->
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/sns.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>