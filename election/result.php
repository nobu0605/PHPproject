<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
  $poll = new \MyApp\Poll();
} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

$results = $poll->getResults();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Election Result</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="container">
  <header id="header">
    <div class="container">
      <div class="header">
        <div class="left-header">
          <div class="title">Home</div>
        </div>
        <div class="right-header" >
          <a href="#features"></a>
          <a href="#order"></a>
          <a href="#contact"></a>
        </div>
      </div>
    </div>
  </header>


  <h1>投票結果</h1>
  <h2>合計投票数が下記に反映されています。</h2>
    <div class="row">
      <!-- $iの数字を変える -->
      <?php for ($i = 0; $i < 8; $i++) : ?>
      <div class="box" id="box_<?= h($i); ?>"><?= h($results[$i]); ?></div>
      <?php if($i == 3): ?>
        <br>
        <br>
        <br>
      <?php endif; ?>
      <?php endfor; ?>
    </div>
    <a href="index.php"><div id="btn">戻る</div></a>
</div>

  <footer id="footer">
    <div class="container">
      <div class="footer-body">
        <p>Copyright - Election, 2018 All Rights Reserved.</p>
      </div>
    </div>
  </footer>


</body>
</html>
