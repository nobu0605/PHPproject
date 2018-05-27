<?php 
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Complete</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
  <div class="order-wrapper">
    <div class="thank">
      <h1>Thank you for your message！</h1>
      <div >
        <h3 style="font-size: 40px;">Confirm</h3>
        <p style="font-size: 35px;">Nickname：<?php echo $name; ?></p>
        <?php echo "<br>"; ?>
        <p style="font-size: 35px;">Subject：<?php echo $subject; ?></p>
        <?php echo "<br>"; ?>
        <p style="font-size: 35px;">Message：<?php echo $message ; ?></p>
        
      </div>
    </div>

<?php
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
      $to = "blacknobu555@gmail.com";
      $title = $subject;
      $content = $message."<br>"."From ".$name;
      if(mb_send_mail($to, $title, $content)){
        echo "<br>"."Send message!";
        var_dump($content);
      } else {
        echo "Failed";
      };
    ?>

    </div>
  </body>
</html>
