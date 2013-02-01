<?php
chdir(dirname(APP_PATH));
// Composer autoloading
if (file_exists(APP_ROOT . DS . 'vendor/autoload.php')) {
	$loader = include APP_ROOT . DS . 'vendor/autoload.php';
}