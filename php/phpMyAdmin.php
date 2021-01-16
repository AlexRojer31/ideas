<head>
	<style>
	table {
		border-collapse: collapse;
	}
	th, td {
		border: 1px solid black;
		padding: 5px 15px;
		text-align: center;
	}
	</style>
</head>

<?php
require_once "database_connect.php";

echo "
<form action=\"create_table\" method=\"post\">
<textarea name=\"db_require\" cols=\"60\" rows=\"15\" ></textarea><br>
<input type=\"submit\" value=\"ACTION\">
</form>
";

echo "<--START TABLE--><br>";
/*
$show_tables = "SHOW TABLES";
$result_show_table = mysqli_query($link, $show_tables)
	or die("error".mysqli_error($link));
while ($row_result_show_table = mysqli_fetch_array($result_show_table)) {
	echo $row_result_show_table[0]."<table>";
	$table_name = $row_result_show_table[0];
	$show_columns = "SHOW COLUMNS FROM $table_name";
	$result_show_columns = mysqli_query($link, $show_columns);
	echo "<tr>";
	while ($row_field = mysqli_fetch_array($result_show_columns)) {
		echo "<td>".$row_field[0]."<hr>";
		$select_field = "SELECT " 
		.$row_field[0].
		" FROM
		$table_name
		;";
		$result_select_field = mysqli_query($link, $select_field);
		while ($row_select = mysqli_fetch_array($result_select_field)) {
			echo "<br>".$row_select[0]."<br>";
		};
		echo "</td>";
	};
	echo "</tr></table><br>";
};


*/

$table_array = [];
$count_table = 0;
$show_tables = "SHOW TABLES";
$result_show_table = mysqli_query($link, $show_tables);
while ($row_result_show_table = mysqli_fetch_array($result_show_table)) {
	$table_array[$count_table] = $row_result_show_table[0];
	$count_table++;
};

for ($i = 0; $i < $count_table; $i++ ) {
	$table_name = $table_array[$i];
	echo "<h2>".$table_name."</h2><table>";
	echo "<tr>";
	$columns_array = [];
	$columns_count = 0;
	$show_columns = "SHOW COLUMNS FROM $table_name";
	$result_show_columns = mysqli_query($link, $show_columns);
	while ($row_field = mysqli_fetch_array($result_show_columns)) {
		$columns_array[$columns_count] = $row_field[0];
		echo "<th>".$row_field[0]."</th>";
		$columns_count++;
	};
	echo "</tr>";
	$sort = $columns_array[0];
	$sql_param = "SELECT*FROM $table_name ORDER BY $sort";
	$result_param = mysqli_query($link, $sql_param);
	while ($row_param = mysqli_fetch_array($result_param)) {
		echo "<tr>";
		for ($j = 0; $j < $columns_count; $j++) {
			echo "<td>".$row_param[$j]."</td>";
		};
		echo "</tr>";
	};
	echo "</table>";
};

echo "<br><--END TABLE-->";
?>



