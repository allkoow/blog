<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include 'database.php';

	$table = $_GET['table'];

	$sql = 'SELECT * FROM '.$table;
	$result = queryDatabase($sql);

	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$array[] = $row;
		}

		echo json_encode($array);
	}
	else
		echo "0 results";

?>