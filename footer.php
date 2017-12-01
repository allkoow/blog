<?php
	echo
	'
	<footer>
			<p> Wszelkie prawa zastrzeżone &copy; 2016 Albert Kowalczyk </p>';
				
				if(isset($_SESSION['log']))
				{
					echo 'Witaj Adminie!'."<br />".
					'<a href="logout.php" title="Wyloguj">Wyloguj się</a>';
				}
				else
				{
					echo '<a href="#" id="log-button"> Panel administratora </a>';
				}
	
	echo
	'</footer>';
?>