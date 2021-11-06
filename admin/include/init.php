<?php 

ob_start();
session_start();

include 'config.php';
include 'helper_function.php';





spl_autoload_register(function($className){
	include 'classes/' . $className . '.php';
});










 ?>