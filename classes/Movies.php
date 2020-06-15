<?php

	class Movies extends Connection
	{
		public function all_movies(){
			$con = $this->connect();
			$sql="SELECT movies.*, category.cat_name,language.language FROM movies LEFT JOIN category ON movies.mov_cat_id = category.cat_id 
			LEFT JOIN language ON movies.mov_lang_id = language.lang_id;";
			$result = mysqli_query($con,$sql);
			return $result;
		}

		public function cat_movies($id){
			$con = $this->connect();
			$sql="SELECT movies.*, category.cat_name,language.language FROM movies LEFT JOIN category ON movies.mov_cat_id = category.cat_id 
			LEFT JOIN language ON movies.mov_lang_id = language.lang_id WHERE mov_cat_id = '$id'";
			$result = mysqli_query($con,$sql);
			return $result;
		}

		public function show_movie($id){
			$con = $this->connect();
			$sql="SELECT movies.*, category.cat_name,language.language FROM movies LEFT JOIN category ON movies.mov_cat_id = category.cat_id 
			LEFT JOIN language ON movies.mov_lang_id = language.lang_id WHERE mov_id = '$id'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}

		public function new_movie($data){
			$con = $this->connect();
			
			$sql = "INSERT into movies(mov_name,mov_cat_id,mov_description,mov_trailer,mov_cast,mov_lang_id,mov_director,mov_image)values('$data[mov_name]','$data[mov_cat_id]','$data[mov_description]','$data[mov_trailer]','$data[mov_cast]','$data[mov_lang_id]','$data[mov_director]','$data[mov_image]')";
			if (mysqli_query($con,$sql)) {
				if (!empty($image=$data['mov_image']['name'])) {
					$mov_id = mysqli_insert_id($con);
					$image=$data['mov_image']['name'];
					$image_sp=$data['mov_image']['tmp_name'];
					$image_dp='../assets/public/images/'.$mov_id."_".$image;
					move_uploaded_file($image_sp, $image_dp);
					$image=$mov_id."_".$image;
					$sql = "UPDATE movies SET mov_image = '$image' WHERE mov_id = '$mov_id' ";
					mysqli_query($con,$sql);
				}
				return true;
			}
			else{
				echo mysqli_error($con);
			}

		}

		public function update_movie($data){
			$con = $this->connect();
			$sql = "UPDATE movies SET 
			mov_name = '$data[mov_name]', 
			mov_cat_id = '$data[mov_cat_id]', 
			mov_description = '$data[mov_description]',
			mov_trailer = '$data[mov_trailer]',
			mov_cast = '$data[mov_cast]',
			mov_lang_id = '$data[mov_lang_id]',
			mov_director = '$data[mov_director]',
			mov_image = '$data[mov_image]'
			 WHERE mov_id = '$data[mov_id]'";
			if (mysqli_query($con,$sql)) {
				if (!empty($data['mov_new_image']['name'])) {
					$id = $data['mov_id'];
					$this->delete_image($id);
					$image=$data['mov_new_image']['name'];
					$image_sp=$data['mov_new_image']['tmp_name'];
					$image_dp='../assets/public/images/'.$id."_".$image;
					move_uploaded_file($image_sp, $image_dp);
					$image=$id."_".$image;
					$sql = "UPDATE movies SET mov_image = '$image' WHERE mov_id = '$id' ";
					mysqli_query($con,$sql);
				}
				return true;
			}
			else{
				echo mysqli_error($con);
			}

		}	

		public function delete_movie($id)
		{
			$con = $this->connect();
			$this->delete_image($id);
			$sql = "DELETE FROM movies WHERE mov_id = '$id' ";
			if (mysqli_query($con,$sql)) {
				return true;
			}
		}	
		
		public function delete_image($id)
		{
			$row= $this->show_movie($id);	
			$image='../assets/public/images/'.$row['mov_image'];
			if (file_exists($image)) {
				unlink($image);
			}		
		}

	}