<?php
require_once "database_connect.php";

$db_require = $_POST["db_require"];

$result_db_require = mysqli_query($link, $db_require)
	or die("Error".mysqli_error($link));

echo "Request good <a href=\"phpMyAdmin\">back</a>";

?>
