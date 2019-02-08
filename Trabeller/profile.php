<?php
session_start();
require('dbconnect.php');
require('function.php');

$signin_user = get_signin_user($dbh,$_SESSION["id"]);
check_signin($_SESSION["id"]);

  if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
  }else{
    $user_id = $_SESSION["id"];
  }


    $profile_sql = "SELECT * FROM `users`  WHERE `id` =?";

    $profile_data = array($user_id);

    $profile_stmt = $dbh->prepare($profile_sql);
    $profile_stmt->execute($profile_data);

    $profile_user = $profile_stmt->fetch(PDO::FETCH_ASSOC);


    $following_sql = "SELECT `fw`.*,`u`.`name`,`u`.`img_name`,`u`.`created` FROM `followers` AS `fw` LEFT JOIN `users` AS `u` ON `fw`.`follower_id` = `u`.`id` WHERE `user_id` =?";
    $following_data = array($user_id);
    $following_stmt = $dbh->prepare($following_sql);
    $following_stmt->execute($following_data);

    $following = array();

    while (true) {
      $following_record = $following_stmt->fetch(PDO::FETCH_ASSOC);

      if ($following_record == false) {
        break;
      }

      $following[] = $following_record;
    }

    $follower_sql = "SELECT `fw`.*,`u`.`name`,`u`.`img_name`,`u`.`created` FROM `followers` AS `fw` LEFT JOIN `users` AS `u` ON `fw`.`user_id` = `u`.`id` WHERE `follower_id` =?";

    $follower_data = array($user_id);
    $follower_stmt = $dbh->prepare($follower_sql);
    $follower_stmt->execute($follower_data);

    $followers = array();

    $Follow_flag = 0;

    while (true) {
      $follower_record = $follower_stmt->fetch(PDO::FETCH_ASSOC);

      if ($follower_record == false) {
        break;
      } 

      if ($follower_record["user_id"] == $_SESSION["id"]) {
        $Follow_flag = 1;
      }

      $followers[] = $follower_record;
    }
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
<body style="margin-top: 60px; background: #E4E6EB;">

  <?php include("navbar.php") ?>

  <div class="container">
    <div class="row">
      <div class="col-xs-3 text-center">
        <img src="user_profile_img/<?php echo $profile_user["img_name"] ?>" class="img-thumbnail" />
        <h2><?php echo $profile_user["name"]  ?></h2>

        <?php if ($user_id != $_SESSION["id"]) { ?>

        <?php if ($Follow_flag == 0) { ?>

        <a href="follow.php?follower_id=<?php echo $profile_user["id"]  ?>"><button class="btn btn-default btn-block">フォローする</button></a>
      <?php }else{ ?>
        <a href="unfollow.php?unfollower_id=<?php echo $profile_user["id"]  ?>"><button class="btn btn-default btn-block">フォロー解除する</button></a>
        <?php } ?>
      <?php } ?>
      </div>
      <div class="col-xs-9">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab1" data-toggle="tab">Followers</a>
          </li>
          <li>
            <a href="#tab2" data-toggle="tab">Following</a>
          </li>
        </ul>

        <div class="tab-content">
          <div id="tab1" class="tab-pane fade in active">

            <?php foreach ($followers as $follower_user) {?>
            <div class="thumbnail">
              <div class="row">
                <div class="col-xs-2">
                  <img src="user_profile_img/<?php echo $follower_user['img_name'] ?>" width="80">
                </div>
                <div class="col-xs-10">
                  <?php echo $follower_user['name'] ?><br>
                  <a href="#" style="color: #7F7F7F;"><?php echo $follower_user['created'] ?>からメンバー</a>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
          <div id="tab2" class="tab-pane fade">
            <?php foreach ($following as $following_user) {?>
            <div class="thumbnail">
              <div class="row">
                <div class="col-xs-2">
                  <img src="user_profile_img/<?php echo $following_user['img_name'] ?>" width="80">
                </div>
                <div class="col-xs-10">
                  <?php echo $following_user['name'] ?><br>
                  <a href="#" style="color: #7F7F7F;"><?php echo $following_user['created'] ?>からメンバー</a>
                </div>
              </div>
            </div>
           <?php } ?>
          </div>
        </div>

      </div>

    </div>
  </div>
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>

