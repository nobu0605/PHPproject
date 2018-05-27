<?php require_once('data.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Book order</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
  
 
  <div class="order-wrapper">
    <h2>Confirm</h2>
    <?php $totalPayment = 0 ?>
    
    <?php foreach ($menus as $menu): ?>
      <?php 
        $orderCount = $_POST[$menu->getName()];
        $menu->setOrderCount($orderCount);
        $totalPayment += $menu->getTotalPrice();
      ?>
      <p class="order-amount">
        <?php echo $menu->getName() ?>
        x
        <?php echo $orderCount ?>
        Quantity
      </p>
      <p class="order-price"><?php echo $menu->getTotalPrice() ?>$</p>
    <?php endforeach ?>
    <h3>Tatal price: <?php echo $totalPayment ?>$</h3>
    <input style="width: 100px;display: inline-block;height: 48px;line-height: 48px;padding: 0 20px;border-radius: 30px;border-style: none;color: white;background-color: rgba(34, 49, 52, 0.9);font-size: 15px;letter-spacing: 0.1em;;" type="button" value="Back" onclick="history.back()">
  </div>

</body>
</html>