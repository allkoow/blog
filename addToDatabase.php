<?php
	

	include 'database.php';

	$title = addslashes($_POST['title']);
	$date = $_POST['date'];
	$category = $_POST['category'];
	$author = $_POST['author'];
	$content = addslashes($_POST['content']);

	$sql = 'INSERT INTO posts (title,date,category,author,content)
			VALUES (\''.$title.'\','.'\''.$date.'\','.$category.','.$author.','.'\''.$content.'\')';

	//echo $sql;

	$answer = queryDatabase($sql);

	//echo $answer;

	header('Location: index.php');
?>