<?php
    require('dbconnect.php');
    session_start();
    // サインイン処理
    // 初期化
    $errors = array();

    if (!empty($_POST)) {
        // ①
        $email = $_POST['input_email'];
        $password = $_POST['input_password'];

                // メールの空チェック
        if ($email == '') {
            $errors['signin'] = 'blank';
        }

        // パスワードの空チェック
        if ($password == '') {
            $errors['signin'] = 'blank';
        }


        if ($email != '' && $password != '') {
            // データベースとの照合処理
          $sql = 'SELECT * FROM `users` WHERE `email`=?';
          $data = array($email);
          $stmt = $dbh->prepare($sql);
          $stmt->execute($data);
          $record = $stmt->fetch(PDO::FETCH_ASSOC);

        // メールアドレスでの本人確認
        if ($record == false) {
              $errors['signin'] = 'failed';
        } else {
            if (password_verify($password,$record['password'])){
          //認証成功
            
          //※追加部分
          //SESSION変数にIDを保存
              //※追加部分
          //SESSION変数にIDを保存
          $_SESSION['id'] = $record['id'];
          

  
          //timeline.phpに移動
          header("Location:timeline.php");
          exit();

          }
          else{
            $errors['signin'] = 'failed';
          }
       }
    }
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
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 thumbnail">
        <h2 class="text-center content_header">サインイン</h2>
        <form method="POST" action="signin.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="input_email" class="form-control" id="email" placeholder="example@gmail.com">
            <?php if(isset($errors['signin']) && $errors['signin'] == 'blank') { ?>
              <p class="text-danger">メールアドレスとパスワードを正しく入力してください</p>
            <?php } ?>
            <?php if(isset($errors['signin']) && $errors['signin'] == 'failed') { ?>
              <p class="text-danger">サインインに失敗しました</p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="input_password" class="form-control" id="password" placeholder="4 ~ 16文字のパスワード">
          </div>
          <input type="submit" class="btn btn-info" value="サインイン">
        </form>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>
