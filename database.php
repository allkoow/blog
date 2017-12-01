<?php
	function queryDatabase($sql)
	{
		include 'connect.php';

		//Create connection
		$connection = @new mysqli($servername,$username,$password,$dbname);

		// Check connection
		if($connection->connect_error)
			die("connection faild: " . $connection->connect_error);
		else
		{
			$answer = $connection->query($sql);

			$connection->close();
			return $answer;
		}

		return 0;
	}
?>