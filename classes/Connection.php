<?php

	class Connection
	{
		public $linking;
		public function connect()
		{
			$host_name = 'localhost';
			$user_name = 'root';
			$password = 'one1two2';
			$db_name = 'booking';
			$this->linking = mysqli_connect($host_name,$user_name,$password,$db_name);
			
			$connect = $this->linking;
			mysqli_query($connect,'SET CHARACTER SET utf8');
			mysqli_query($connect,"SET SESSION collation_connection ='utf8_general_ci'");
			
			if (!$this->linking) {
				echo "<h2>Database not connected!</h2>";
				exit();
			}
			return $connect;
		}
	}

?>