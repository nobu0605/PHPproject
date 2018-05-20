<?php

require_once(__DIR__ . '/config.php');

$quiz = new MyApp\Quiz();

if (!$quiz->isFinished()) {
  $data = $quiz->getCurrentQuiz();
  shuffle($data['a']);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Quiz</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="wrapper">
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


  <?php if ($quiz->isFinished()) : ?>
    <div id="container">
        <?php if(h($quiz->getScore()) == 100):?>
          <img src="image/689075.jpg" alt="">
        <?php endif ;?>
      <div id="result">
        あなたは鈴木孝伸について
        <div><?= h($quiz->getScore()); ?> %</div>
        知っています。
      </div>
      <a href=""><div id="btn">Retry?</div></a>
    </div>
    <?php $quiz->reset(); ?>
  <?php else : ?>
    <div id="container">
      <h2>Suzuki Quiz！</h2>
      <img src="<?= h($data['i']); ?>">
      <h1>Q. <?= h($data['q']); ?></h1>
      <ul>
        <?php foreach ($data['a'] as $a) : ?>
          <li class="answer"><?= h($a); ?></li>
        <?php endforeach; ?>
      </ul>
      <div id="btn" class="disabled"><?= $quiz->isLast() ? 'Show Result' : 'Next Question'; ?></div>
      <input type="hidden" id="token" value="<?= h($_SESSION['token']); ?>">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="quiz.js"></script>
  <?php endif; ?>
</div>

  <footer id="footer">
    <div class="container">
      <div class="footer-body">
        <p>Copyright - Quiz, 2018 All Rights Reserved.</p>
      </div>
    </div>
  </footer>

</body>
</html>