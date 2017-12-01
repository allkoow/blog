<?php
	echo 
	'<div id="log-panel">
		<div id="log-box">
			<div id="exit">
				<i class="icon-cancel"></i>
			</div>
			<form action="login.php" method="post">
				<span>Login</span><input type="text" name="login" />
				<span>Hasło</span><input type="password" name="password"/>
				<input type="submit" value="Zaloguj"/>
			</form>
		</div>
	</div>';
?>