<?php
	echo
	'<header ng-controller="headerCtrl">
		<div id="logo">
			<a href="index.php"> <span id="b-letter">B</span>LOG<span id="excl">!</span> </a>
		</div>

		<nav>
			<ul id="navbar">
				<li>
					<a href="index.php">Strona główna</a>
				</li>
				<li>
					<a href="#">Kategorie</a>
					<ol class="subcat">
						<li ng-repeat="x in categories"> 
							<a href="index.php?categories='."{{x.category_id}}".'">'."{{x.category_name}}".'</a>
						</li>
					</ol>
				</li>
				<li>
					<a href="#">Autorzy</a>
					<ol class="subcat">
						<li ng-repeat="x in authors"> 
							<a href="index.php?authors='."{{x.author_id}}".'">'."{{x.author_name}}".'</a>
						</li>
					</ol>
				</li>';

				if( isset($_SESSION['log']) )
				{
					echo
					'<li>
						<a href="menuManagement.php">Zarządzanie menu</a>
					</li>';
				}

			echo
			'</ul>
		</nav>
		
		<ul id="nav-mini" >
			<li> <a href="index.php">Strona główna</a> </li>
			<li>
				<a href="#">Kategorie</a>
				<ol class="subcat">
					<li ng-repeat="x in categories"> 
						<a href="index.php?categories='."{{x.category_id}}".'">'."{{x.category_name}}".'</a>
					</li>
				</ol>
			</li>
			<li>
				<a href="#">Autorzy</a>
				<ol class="subcat">
					<li ng-repeat="x in authors"> 
						<a href="index.php?authors='."{{x.author_id}}".'">'."{{x.author_name}}".'</a>
					</li>
				</ol>
			</li>';

			if( isset($_SESSION['log']) )
			{
				echo
				'<li>
					<a href="menuManagement.php">Zarządzanie menu</a>
				</li>';
			}

			echo
		'</ul>
		
		<div id="nav-mini-symbol">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</header>';
?>