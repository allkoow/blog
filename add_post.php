<?php
	session_start();
?>

<!DOCTYPE html>

<html>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="style.css" />
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,600&subset=latin-ext" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script type="text/javascript" src="angular.js"></script>
	<script src="main.js" type="text/javascript"></script>

	<title>Blog</title>
</html>

<body>

<div id="container" ng-app="myApp">
	<?php include 'header.php' ?>

	<form id="add-post" action="addToDatabase.php" method="post" ng-controller="headerCtrl">
		Tytuł posta: 
		<input type='text' name="title"/>
		Data: 
		<input type='date' name="date"/>
		Kategoria: 
		<select name="category">
			<option ng-repeat="x in categories" Value="{{x.category_id}}">{{x.category_name}}</option>
		</select>
		Autor:
		<select name="author">
			<option ng-repeat="x in authors" Value="{{x.author_id}}">{{x.author_name}}</option>
		</select>
		Treść:
		<textarea name="content"></textarea>
		<input type="submit" value="Opublikuj"/>
	</form>

	<div id="log-panel">
		
	</div>

	<?php include 'footer.php' ?>
</div>
	
</body>