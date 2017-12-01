<?php
	session_start();
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

<body>

<div id="container" ng-app="myApp" ng-controller="postCtrl">
	<?php include 'header.php'; ?>

	<?php
		if( isset( $_SESSION['log'] ) )
		{
			echo
			'
			<form id="add-post" action="editPost.php" method="post">
				Nr posta:
				<input type="text" name="id" value={{post[0].id}} />
				Tytuł posta: 
				<input type="text" name="title" value={{post[0].title}} />
				Data: 
				<input type="date" name="date" value={{post[0].date}} />
				Kategoria: 
				<select name="category">
					<option ng-repeat="x in categories" Value={{x.category_id}}>{{x.category_name}}</option>
				</select>
				Autor:
				<select name="author" selected={{post[0].author_name}} >
					<option ng-repeat="x in authors" Value={{x.author_id}}>{{x.author_name}}</option>
				</select>
				Treść:
				<textarea name="content">{{post[0].content}}</textarea>
				<input type="checkbox" name="remove" value="true" ng-model="remove"/>Zaznacz, aby usunąć post
				<input type="submit" value="Edytuj"/>
			</form>

			';
		}
		else
		{
			echo
			'<div id="post" >
				<h1>{{post[0].title}}</h1>
				<span>{{post[0].author_name}}</span>
				<span>{{post[0].date}}</span>
				<p>{{post[0].content}}</p>
			</div>';
		}
		
	?>
	
	<?php include 'logpanel.php'; ?>
	<?php include 'footer.php'; ?>
</div>
	
</body>