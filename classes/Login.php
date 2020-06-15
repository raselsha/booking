<?php
    require 'Connection.php';
	class Login extends Connection
	{
		public function auth($data)
		{	
			$connect = new connection();
			$connect = $connect->connect();
			$sql = "SELECT * FROM user WHERE email = '$data[email]' and password = md5('$data[password]')";
			if (mysqli_query($connect,$sql)) {
				$result = mysqli_query($connect,$sql);
				$row = mysqli_fetch_assoc($result);
				if ($row['email']==$data['email'] and $row['password']==md5($data['password'])) {
					return $row;
				}
				else{
					return 0;
				}
			}
			else{
				mysqli_error($connect);
			}

		}

	}