<?php
	session_start();

	if(!isset($_SESSION['log']))
	{
		header("Location: index.php");
	}
	else
	{
		include 'database.php';

		$table = $_POST['table'];
		$name = htmlentities($_POST['name']);

		//echo $queryType."<br />";
		//echo $_POST['remove']."<br />";

		if($table == 'categories')
		{
			$column = 'category_name';
			$id = 'category_id';
			$postColumn = 'category';
		}
		else
		{
			$column = 'author_name';
			$id = 'author_id';
			$postColumn = 'author';
		}

		if(isset($_POST['remove']))
		{
			$selected = $_POST['selected'];
			

			$auxSql = "SELECT posts.id 
					   FROM posts,$table
					   WHERE $table.$id=posts.$postColumn
					   AND $table.$id=$selected";

			$result = queryDatabase($auxSql);		   

			if($result->num_rows > 0)
			{
				$_SESSION['message'] = 'Nie można usunąć elementu.';
				header('Location: menuManagement.php');
			}
			else
			{
				$sql = "DELETE FROM $table
						WHERE $id=$selected";

				$answer = queryDatabase($sql);
				$_SESSION['message'] = 'Usunięto element.';
			}

		}
		else
		{
			$queryType = $_POST['queryType'];
			if($queryType == 'insert')
			{
				$sql = "INSERT INTO $table ($column)
						VALUES ('$name')";
				$_SESSION['message'] = 'Dodano element.';
			}
			else
			{
				$selected = $_POST['selected'];
				$sql = "UPDATE $table
						SET $column='$name'
						WHERE $id = $selected";
				$_SESSION['message'] = 'Edytowano element.';
			}

			$answer = queryDatabase($sql);
		}

		header('Location: menuManagement.php');
	}
?>