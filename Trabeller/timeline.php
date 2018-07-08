<?php
  // timeline.phpの処理を記載
	  session_start();
    require('dbconnect.php');
    require('function.php');

    check_signin($_SESSION["id"]);


    $signin_user = get_signin_user($dbh,$_SESSION["id"]);
     // $id = $_SESSION['id'];

    // データベースとの照合処理
    $sql = 'SELECT * FROM `users` WHERE `id`=?';
    $data = array($_SESSION['id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $signin_user = $stmt->fetch(PDO::FETCH_ASSOC);

    $users_sql = 'SELECT * FROM `users` WHERE 1';
    $users_data = array();
    $users_stmt = $dbh->prepare($users_sql);
    $users_stmt->execute($users_data);

      while (true) {
    $members = $users_stmt->fetch(PDO::FETCH_ASSOC);

    if ($members == false) {
      break;
    }

    $members_all[] = $members;
  }



        // 初期化
    $errors = array();

    // ユーザーが投稿ボタンを押したら発動
    if (!empty($_POST)) {

        // バリデーション
        $feed = $_POST['feed']; // 投稿データ

        // 投稿の空チェック
        if ($feed != '') {
            // 投稿処理
            $sql = 'INSERT INTO `feeds` SET `feed`=?, `user_id`=?, `created`=NOW()';
            $data = array($feed, $signin_user['id']);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);
            
            // POSTを空にする。URLで読み込み直す。
            header('Location: timeline.php');
            // 処理をここで終わらせるという意味。処理が重くなるから一回終了させる。
            exit();


        } else {
            $errors['feed'] = 'blank';
        }

    }

    $page = '';
    $page_row_number = 10;

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }else{
      $page = 1;
    }

    $page = max($page,1);

    $sql_count = "SELECT COUNT(*) AS `cnt` FROM `feeds` ";

    $stmt_count = $dbh->prepare($sql_count);
    $stmt_count->execute();

    $record_cnt = $stmt_count->fetch(PDO::FETCH_ASSOC);

    // ceilは小数点の切り上げ
    $all_page_number = ceil($record_cnt['cnt'] / $page_row_number);

    $page = min($page,$all_page_number);


    $start = ($page -1)*$page_row_number;

    if (isset($_GET['search_word']) == true){
      // あいまい検索用SQL
      $sql = 'SELECT f.*,`u`.`name`,`u`.`img_name` FROM `feeds` AS `f` LEFT JOIN `users` AS `u` ON `f`.`user_id`=`u`.`id` WHERE `f`.`feed` LIKE "%'.$_GET['search_word'].'%"';
    }else{
    // 通常は全件取得
    // LEFT JOINで全件取得
    $sql = "SELECT f.*,`u`.`name`,`u`.`img_name` FROM `feeds` AS `f` LEFT JOIN `users` AS `u` ON `f`.`user_id`=`u`.`id` WHERE 1 ORDER BY `created` DESC LIMIT $start,$page_row_number";
    }

    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    // 表示用の配列を初期化
    $feeds = array();

    while (true) {
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($record == false) {
            break;
        }


        $comment_sql = "SELECT `c`.*,`u`.`name`,`u`.`img_name` FROM `comments` AS `c` LEFT JOIN `users` AS `u` ON `c`.`user_id` = `u`.id WHERE `feed_id` =?";

        $comment_data = array($record["id"]);

        // SQL文を実行
        $comment_stmt = $dbh->prepare($comment_sql);
        $comment_stmt->execute($comment_data);

        $comments_array = array();

        while (true) {
          $comment_record = $comment_stmt->fetch(PDO::FETCH_ASSOC);

          if ($comment_record == false) {
            break;
          }

          $comments_array[] = $comment_record;
        }

        $record["comments"] = $comments_array;


        // like数を取得するSQL文を作成
        $like_sql = "SELECT COUNT(*) AS `like_cnt` FROM `likes` WHERE `feed_id` = ?";
        $like_data = array($record["id"]);

        // SQL文を実行
        $like_stmt = $dbh->prepare($like_sql);
        $like_stmt->execute($like_data);
        // like数を取得
        $like = $like_stmt->fetch(PDO::FETCH_ASSOC);

        $record["like_cnt"] = $like["like_cnt"];

        //like済みか判断するSQlを作成
        $like_flag_sql = "SELECT COUNT(*) as `like_flag` FROM `likes` WHERE `user_id` =? AND `feed_id` =?";

        $like_flag_data = array($_SESSION["id"],$record["id"]);

        //SQL実行
        $like_flag_stmt = $dbh->prepare($like_flag_sql);
        $like_flag_stmt->execute($like_flag_data);

        //likeしてる数を取得
        $like_flag = $like_flag_stmt->fetch(PDO::FETCH_ASSOC);

        if ($like_flag["like_flag"] > 0 ){
          $record["like_flag"] = 1;
        }else{
          $record["like_flag"] = 0;
        }

        if (isset($_GET["feed_select"]) && ($_GET["feed_select"] == "likes") && ($record["like_flag"] == 1)) {
          $feeds[] = $record;          
        }

        //feed_selectが指定されてないときは全件表示
        if (!isset($_GET["feed_select"])) {
          $feeds[] = $record;
        }

        if (isset($_GET["feed_select"]) && ($_GET["feed_select"] == "news") ) {
          $feeds[] = $record;          
        }
    }

        $ranking_sql = 'SELECT `feeds`.*, COUNT(`feed_id`) AS total FROM `likes` LEFT JOIN `feeds` ON `feeds`.`id` = `likes`.`feed_id` GROUP BY `feed_id` ORDER BY `total` DESC';
        $ranking_data = array();
        $ranking_stmt = $dbh->prepare($ranking_sql);
        $ranking_stmt->execute($ranking_data);

        while (true) {
            $record = $ranking_stmt->fetch(PDO::FETCH_ASSOC);

            if ($record == false) {
                break;
            }
            $rankings[] = $record;
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
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body style="margin-top: 60px; background: #E4E6EB;">

<?php include("navbar.php") ?>

  
  <div class="container">
    <div class="row">
      <div class="col-xs-3 col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <?php if (isset($_GET["feed_select"]) && ($_GET["feed_select"] == "likes")) { ?>
          <li><a href="timeline.php?feed_select=news">Newer</a></li>
          <li class="active"><a href="timeline.php?feed_select=likes">Liked</a></li>
          <!-- <li><a href="timeline.php?feed_select=follows">フォロー</a></li> -->
        <?php } else{ ?>
          <li class="active"><a href="timeline.php?feed_select=news">Newer</a></li>
          <li><a href="timeline.php?feed_select=likes">いいね！済み</a></li>
        <?php } ?>
        </ul>
      </div>
      <div class="col-xs-9 col-md-6 post-row">
        <div class="feed_form thumbnail post-form">
          <form method="POST" action="">
            <div class="form-group">
              <textarea name="feed" class="form-control" rows="3" placeholder="Post" style="font-size: 24px;"></textarea><br>
              <?php if(isset($errors['feed']) && $errors['feed'] == 'blank') { ?>
                <p class="alert alert-danger">投稿データを入力してください</p>
              <?php } ?>

            </div>
            <input type="submit" value="Post" class="btn btn-primary">
          </form>
        </div>
        <?php foreach($feeds as $feed){ ?>
            <div class="thumbnail">
              <div class="row">
                <div class="col-xs-1">
                  <img src="user_profile_img/<?php echo $feed['img_name'];?>"" width="40">
                </div>
                <div class="col-xs-11">
                  <?php echo $feed['name'];  ?>
                  <a href="#" style="color: #7F7F7F;margin-left: 10px;">   <?php echo $feed['created'];  ?></a>
                </div>
              </div>
              <div class="row feed_content">
                <div class="col-xs-12" >
                  <span style="font-size: 24px;"><?php echo $feed['feed'];  ?></span>
                </div>
              </div>
              <div class="row feed_sub">
                <div class="col-xs-12">
                  <?php if ($feed["like_flag"] == 0) { ?>
                    <a href="like.php?feed_id=<?php echo $feed["id"] ?>">
                        <button type="submit" class="btn btn-default btn-xs like"><i class="fa fa-thumbs-up" aria-hidden="true"></i>いいね！</button>
                    </a>
                  <?php }else{ ?>
                    <a href="unlike.php?feed_id=<?php echo $feed["id"] ?>">
                        <button class="btn btn-default btn-xs like"><i class="fa fa-thumbs-up" aria-hidden="true"></i>いいね！済み</button>
                    </a>
                  <?php } ?>
                  <?php if($feed["like_cnt"] > 0) {?>
                  <span class="like_count"> <i class="fa fa-thumbs-up"></i> <?php echo $feed["like_cnt"]; ?></span>
                  <?php  }?>
                  <a href="#collapseComment<?php echo $feed["id"] ?>" data-toggle="collapse" aria-expanded="false">

                    <?php if ($feed["comment_count"] == 0 ) { ?>
                    <span class="comment_count"><i class="fa fa-comment" style=" color: black;"></i></span></a>
                    <?php }else{ ?>
                    <span class="comment_count"><i class="fa fa-comment" style=" color: black;"></i><?php echo $feed["comment_count"]?> </span>
                    <?php } ?> </a>

                    <?php if($feed["user_id"] == $_SESSION["id"]) {?>

                    <a href="edit.php?feed_id=<?php echo $feed["id"] ?>" class="btn btn-success btn-xs">edit</a>
                    <a onclick="return confirm('ほんとに消すの？');" href="delete.php?feed_id=<?php echo $feed["id"] ?>" class="delete btn btn-danger btn-xs">delete</a>

                    <?php } ?>

                </div>

                <!-- コメントが押されたら表示される領域 --><!-- 
                <div class="collapse" id="collapseComment"> -->
                  <?php include("comment_view.php"); ?>
                </div>
            </div>
          <?php } ?>
        <div aria-label="Page navigation">
          <ul class="pager">
          <?php if ($page == 1) { ?>
          <?php }else{ ?>
            <li class="previous "><a href="timeline.php?page=<?php echo $page-1; ?>"><span aria-hidden="true">&larr;</span> Newer</a></li>
          <?php } ?>
          <?php if ($page == $all_page_number) { ?>
          <?php }else{ ?>
            <li class="next"><a href="timeline.php?page=<?php echo $page+1; ?>">Older <span aria-hidden="true">&rarr;</span></a></li>
          <?php } ?>
          </ul>
        </div>
      </div>
    <div class="blank col-md-0  col-xs-3">
      
    </div>
    <div class="ranking-wrapper col-md-3  col-xs-9 ">
      <div class="ranking_title ">
      <h2>Ranking</h2>
      </div>
      <?php for ($i = 0 ; $i < 3; $i++) {  ?>  
      <?php $post_user_id = $rankings[$i]["user_id"] - 1;  ?>
        <div class=" ranking-card">
          <div class="card">
            <a href="#" class="noline">
              <h4>第<?php echo $i +1 ?>位</h4>
              <div class="card_item">
                <p>名前: <?php echo  $members_all[$post_user_id]['name']  ?></p>
                <img src="user_profile_img/<?php echo $members_all[$post_user_id]['img_name']; ?>" style="width: 100%">
                <h4><?php echo $rankings[$i]["title"]; ?></h4>
                <h4><?php echo $rankings[$i]["feed"]; ?></h4>
                <h4 class="cost"><?php echo $rankings[$i]["price"]; ?></h4>
                <h4 class="like" style="text-align: center;">いいね数<?php echo $rankings[$i]["total"]; ?></h4>  

              </div><!-- /card_item -->
            </a>
          </div><!-- card1 -->
        </div>
      <?php } ?>
    </div>
    </div>
  </div>
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/sns.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>
