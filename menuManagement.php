<?php
	session_start();

	if(!isset($_SESSION['log']))
	{
		header("Location: index.php");
	}
?>

<!DOCTYPE html>

<html>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="fontello\css\fontello.css" />
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,600&subset=latin-ext" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script type="text/javascript" src="angular.js"></script>
	<script src="main.js" type="text/javascript"></script>

	<title>Blog</title>
</html>

<div id="container" ng-app="myApp">
	<?php include 'header.php'; ?>

	<div id="content" ng-controller="headerCtrl">

		<?php
			if(isset($_SESSION['message']))
			{
				echo 
				'<p id="message">'.$_SESSION['message'].'</p>';
				unset($_SESSION['message']);
			}	
		?>

		<h1>Edytowanie kategorii</h1>
		<form id="add-post" action="editMenuItems.php" method="post">
			<input type="hidden" name="queryType" value="update" />
			<input type="hidden" name="table" value="categories" />
			<select name="selected">
				<option ng-repeat="x in categories" Value={{x.category_id}} > {{x.category_name}} </option>
			</select>
			Zmień nazwę wybranej kategorii:
			<input type="text" name="name" ng-readonly="remove" />
			<input type="checkbox" name="remove" value="true" ng-model="remove"/>Zaznacz, aby usunąć wybraną kategorię
			<input type="submit" value="Edytuj"/>
		</form>

		<h1>Dodawanie kategorii</h1>
		<form id="add-post" action="editMenuItems.php" method="post">
			<input type="hidden" name="queryType" value="insert" />
			<input type="hidden" name="table" value="categories" />

			Wpisz nazwę nowej kategorii:
			<input type="text" name="name"/>
			<input type="submit" value="Dodaj kategorię"/>
		</form>

		<h1>Edytowanie autorów</h1>
		<form id="add-post" action="editMenuItems.php" method="post">
			<input type="hidden" name="queryType" value="update" />
			<input type="hidden" name="table" value="authors" />
			<select name="selected">
				<option ng-repeat="x in authors" Value={{x.author_id}} > {{x.author_name}} </option>
			</select>
			Zmień imię autora:
			<input type="text" name="name" ng-readonly="remove" />
			<input type="checkbox" name="remove" value="true" ng-model="remove"/>Zaznacz, aby usunąć wybranego autora
			<input type="submit" value="Edytuj" />
		</form>

		<h1>Dodawanie autora</h1>
		<form id="add-post" action="editMenuItems.php" method="post">
			<input type="hidden" name="queryType" value="insert" />
			<input type="hidden" name="table" value="authors" />

			Wpisz imię autora:
			<input type="text" name="name"/>
			<input type="submit" value="Dodaj autora" />
		</form>

	</div>

	<?php include 'logpanel.php'; ?>

	<?php include 'footer.php'; ?>
</div>
	
</body>