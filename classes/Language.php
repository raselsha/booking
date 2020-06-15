<?php 

class Language extends Connection
	{
		public function all_language(){
			$con = $this->connect();
			$sql="SELECT * FROM language";
			$result = mysqli_query($con,$sql);
			return $result;
		}
	}