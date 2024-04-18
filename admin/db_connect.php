<?php 
$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db($db, "my_site");
mysqli_query($db, "SET NAMES UTF-8");
session_start();
?>