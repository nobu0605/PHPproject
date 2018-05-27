<?php 
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Book order</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="confirmation">
		<h2>Confirm</h2>

		<p>・Name</p>
		<?php if($name == ""): ?>
			<p class="error"><?php echo "入力がされてません" ?></p>
		<?php else :?>
			<p><?php echo $name?></p>
		<?php endif ?>

		<p>・Subject</p>
		<?php if($subject == ""): ?>
			<p class="error"><?php echo "入力がされてません" ?></p>
		<?php else :?>
			<p><?php echo $subject?></p>
		<?php endif ?>

		<p>・Content</p>
		<?php if($message == ""): ?>
			<p class="error"><?php echo "入力がされてません" ?></p>
		<?php else :?>
			<p><?php echo $message?></p>
		<?php endif ?>
		<h5>Please check your message</h5>


		<form method="POST" action="thanks.php">
		  <input style="width: 100px;display: inline-block;height: 48px;line-height: 48px;padding: 0 20px;border-radius: 30px;border-style: none;color: white;background-color: rgba(34, 49, 52, 0.9);font-size: 15px;letter-spacing: 0.1em;;" type="button" value="Back" onclick="history.back()">
		  	<?php if ($name != '' && $subject != '' && $message != ''): ?>
			  <input style="width: 100px;" type="submit" value="OK">
			<?php endif; ?>

			<input type="hidden" name="name" value="<?php echo $name; ?>">
			<input type="hidden" name="subject" value="<?php echo $subject; ?>">
			<input type="hidden" name="message" value="<?php echo $message; ?>">
		</form>
	</div>	
</body>