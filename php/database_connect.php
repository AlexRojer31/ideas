<?php
require "app_config.php";

$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME) 
  or die("<p> Подключение к базе данных ".DATABASE_NAME." было прервано. <br> Код ошибки: ".mysqli_error($link)."</p>");
  
?>
