<?php
    $dsn = 'mysql:dbname=LAA0951462-9x2l5g;host=mysql128.phy.lolipop.lan';
    $db_user = 'LAA0951462';
    $db_password='YJysCQcQ';
    $dbh = new PDO($dsn, $db_user, $db_password);
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8');
?>
