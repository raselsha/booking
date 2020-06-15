<?php

	class Category extends Connection
	{
		public function all_category(){
			$con = $this->connect();
			$sql="SELECT * FROM category";
			$result = mysqli_query($con,$sql);
			return $result;
		}

		public function show_category($id){
			$con = $this->connect();
			$sql="SELECT * FROM category WHERE cat_id = '$id'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			return $row;
		}

		public function new_category($data){
			$con = $this->connect();		
			$sql = "INSERT into category(cat_name,cat_image)values('$data[cat_name]','$data[cat_image]')";
			
			if (mysqli_query($con,$sql)) {
				return true;
			}
			else{
				echo mysqli_error($con);
			}

		}

		public function update_category($data){
			$con = $this->connect();		
			$sql = "UPDATE category SET cat_name = '$data[cat_name]', cat_image = '$data[cat_image]' WHERE cat_id = '$data[cat_id]'";
			if (mysqli_query($con,$sql)) {
				return true;
			}
			else{
				echo mysqli_error($con);
			}

		}

		public function delete_category($id)
		{
			$con = $this->connect();
			$sql = "DELETE FROM category WHERE cat_id = '$id' ";
			if (mysqli_query($con,$sql)) {
				return true;
			}
		}

	}