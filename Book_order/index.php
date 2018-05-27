	<?php 
require_once('data.php');
require_once('menu.php');


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Book order</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>

<body>

	<header id="header">
		<div class="container">
			<div class="header">
				<div class="left-header">
					<div class="title">Home</div>
				</div>
				<div class="right-header" >
					<a href="#features">Features</a>
					<a href="#order">Order</a>
					<a href="#contact">Contact</a>
				</div>
			</div>
		</div>
	</header>

	<div class="top-wrapper">
		<div class="container">
			<h1>No book<br>No life</h1>
		</div>
	</div>

	<div id="features" class="features">
      <div class="container">
        <div class="feature-title">
          <h3>Features</h3>
        </div>
        <div id="feature-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#feature-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#feature-carousel" data-slide-to="1"></li>
            <li data-target="#feature-carousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="feature-box item active">
              <img src="image/PAK76_chikyuugitobin20130804_TP_V.jpg" width="500">
              <p>Global</p>
              <p>-You can order everywhere</p>
            </div>
            <div class="feature-box item">
              <img src="image/PCIMGL9892_TP_V.jpg"  width="500">
              <p>Efficient</p>
              <p>-You can order quickly</p>
            </div>
            <div class="feature-box item">
              <img src="image/BITCOINIMGL1761_TP_V.jpg" width="500">
              <p>Lowest Price</p>
              <p>-You can buy Lowest price</p>
            </div>
          </div>
        </div>
      </div>
    </div>


	  <div id="order" class="menu-wrapper container">
	    <h1 class="logo">Book order</h1>
	    	<form method="post" action="confirm.php">
			    <div class="menu-items">
					    <?php foreach ($menus as $menu)  :?>
					    	<div class="menu-item">
								<img src="<?php echo $menu->getImage() ?>" >
							    <p class="bookName"><?php echo $menu->getName() ?></p>
								<p><?php echo $menu->getPrice()."$" ?></p>
								<span>Quantity</span>
								<input type="text" value="0" name="<?php echo $menu->getName() ?>">
								
						    </div>
						<?php endforeach ?>
				</div>
				<input type="submit" value="Order">
			</form>
	  </div>


	 <div id="contact" class="contact-wrapper">
	 	
	      <div class="container">
	        <div class="contact-form">
	          <div class="section-title-contact">
	          <h2>Contact us</h2>
	          
	          
	        </div>
	          <form method="post" action="receive.php">
	              <input type="text" name="name" placeholder="Name" class="contact-email">
	              <input type="text" name="subject" placeholder="Subject" class="contact-subject">
	              <textarea name="message" class="contact-form-control" placeholder="Message"></textarea>
	              <button type="submit" class="btn btn-contact">Submit</button>
	          </form>
	          
	        </div>
	        <div class="description">
	          <p>If you want to contact us,<br>plaese fill the form!</p>
	        </div>
	      </div>
      
    </div>


	  <footer>
	  	<div class="container">
	  		<div class="footer-body">
				<p>Copyright - Suzuki Takanobu, 2018 All Rights Reserved.</p>
			</div>
	  	</div>
	  </footer>

	  <script type="text/javascript" src="script.js"></script>
</body>

</html>
