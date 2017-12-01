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

<div id="container" ng-app="myApp">
	<?php include 'header.php'; ?>

	<div id="content" ng-controller="mainPageCtrl">

		<?php
			if(isset($_SESSION['log']))
			{
				echo 
					'<div class="article new-post">
						<a href="add_post.php" title="Dodaj nowy post">
							<div class="title">
								Dodaj nowy post
							</div> 
						</a>
					</div>';
			}
		?>

		<div class="article" ng-repeat="x in posts | orderBy: '-date'">
			<a href="posts.php?post={{x.id}}" title="{{x.title}}">
				<div class="category">
					{{x.category_name}}
				</div>
				<div class="date">
					{{x.date}}
				</div> 
				<div class="title">
					{{x.title}}
				</div> 
				<div class="author">
					{{x.author_name}}
				</div>
			</a>
		</div>

	</div>

	<?php include 'logpanel.php'; ?>

	<?php include 'footer.php'; ?>
</div>
	
</body>