<?php
	session_start();

	require_once 'database.php';

	$user = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
	$pass = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

	$sql = "SELECT * FROM users WHERE login='$user' AND password='$pass'";

	$answer = queryDatabase($sql);
	
	if($answer->num_rows > 0)
	{
		$row = $answer->fetch_assoc();
		$answer->free_result();
		$_SESSION['log'] = 1;

		header('Location: index.php');
	}
	else
	{
		unset($_SESSION['log']);
		header('Location: index.php'); 
	}
?>