<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
  $poll = new \MyApp\Poll();
} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $poll->post();
}

$err = $poll->getError();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Election</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
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

    <div id="contents">
      
        <?php if (isset($err)) : ?>
        <div class="error"><?= h($err); ?></div>
        <?php endif; ?>
        <div class="maintitle">
          <h1>プログラミング言語総選挙</h1>
          <h2>どの言語が好きですか?</h2>
        </div>
         <div class="row">
          <form action="" method="post">
            <div class="row">
              <div class="<col-md-12>">
                <div class="box" id="box_0" data-id="0"></div>
                <div class="box" id="box_1" data-id="1"></div>
                <div class="box" id="box_2" data-id="2"></div>
                <div class="box" id="box_3" data-id="3"></div>
              </div>
              <div class="col-md-12">
                <div class="box" id="box_4" data-id="4"></div>
                <div class="box" id="box_5" data-id="5"></div>
                <div class="box" id="box_6" data-id="6"></div>
                <div class="box" id="box_7" data-id="7"></div>               
              </div>
              <input type="hidden" id="answer" name="answer" value="">
              <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
            </div>
            <div id="btn">投票する</div>
           </form>
         </div>
    </div>
  </div>

  <footer id="footer">
    <div class="container">
      <div class="footer-body">
        <p>Copyright - Election, 2018 All Rights Reserved.</p>
      </div>
    </div>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
  $(function() {
    'use strict';

    $('.box').on('click', function() {
      $('.box').removeClass('selected');
      $(this).addClass('selected');
      $('#answer').val($(this).data('id'));
    });

    $('#btn').on('click', function() {
      if ($('#answer').val() === '') {
        alert('Choose One!');
      } else {
        $('form').submit();
      }
    });

    $('.error').fadeOut(3000);
  });
  </script>
</body>
</html>