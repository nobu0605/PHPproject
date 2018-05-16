<?php

ini_set('display_errors', 1);
// あなたのDB名、ユーザーネーム、パスワードを入力してください。
define('DSN', 'mysql:dbname=');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');


session_start();

require_once(__DIR__ . '/functions.php');
