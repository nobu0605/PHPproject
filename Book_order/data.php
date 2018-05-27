<?php
require_once('menu.php');

$book1 = new Menu('Harry_Potter', 9, 'image/harry.jpg');
$book2 = new Menu('How_to_Stop_Worrying_and_Start_Living', 10, 'image/how to.jpg');
$book3 = new Menu('Think_and_Grow_Rich', 9, 'image/think and grow.jpg');
$book4 = new Menu('Rich_Dad_Poor_Dad', 12, 'image/rich dad.jpg');

$menus = array($book1,$book2,$book3,$book4);
?>