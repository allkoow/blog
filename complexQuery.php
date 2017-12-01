<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include 'database.php';

	$table = $_GET['table'];
	$column = $_GET['column'];
	$value = $_GET['value'];

	$sql = 'SELECT 
				posts.id,
				categories.category_id,
				categories.category_name,
				authors.author_id,
				authors.author_name,
				posts.date,
				posts.title,
				posts.content 
			FROM posts, categories, authors
			WHERE posts.category=categories.category_id AND posts.author=authors.author_id';

	if($table == 'undefined')
	{
		
	}
	else
	{
		$sql = $sql.' AND '.$table.'.'.$column.'='.$value;
	}

    //echo $sql;

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