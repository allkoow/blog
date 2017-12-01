<?php
	session_start();

	if(!isset($_SESSION['log']))
	{
		header("Location: index.php");
	}
	else
	{
		include 'database.php';

		$title = addslashes($_POST['title']);
		$date = $_POST['date'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$post_id = $_POST['id'];
		$content = addslashes($_POST['content']);

		//echo $category."<br />";

		if(isset($_POST['remove']))
		{
			$sql = "DELETE FROM posts
					WHERE id=$post_id";

			$answer = queryDatabase($sql);
		}
		else
		{
			$sql = "UPDATE posts 
					SET title='$title', 
						date='$date', 
						category='$category',
						author='$author',
						content='$content'
					WHERE id='$post_id'";

			$answer = queryDatabase($sql);		
		}

		//echo $sql;		
		
		header('Location: index.php');
	}
?>