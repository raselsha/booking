<h2>New movie</h2>
<hr>

<?php 
	$er_mov_name = '';
	$er_mov_cat_id = '';
	$message = '';
	$er=0;

	if (isset($_POST['submit'])) {
		$_POST['mov_image']=$_FILES['mov_image'];
		if (empty($_POST['mov_name'])) {
			$er_mov_name =  '<span class="red">required!</span>';
			$er++;
		}
		if (empty($_POST['mov_cat_id'])) {
			$er_mov_cat_id =  '<span class="red">required!</span>';
			$er++;
		}

		if ($er==0) {
			$result=$mov->new_movie($_POST);
			if ($result) {
				$message = '<p class="green">Data has been saved!</p>';
			}
		}
		
	}
 ?>
<form method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>| |</legend>
		<?= $message; ?>
		<label>Movie Name</label><br>
		<input type="text" name="mov_name"><br>
		<?= $er_mov_name; ?><br>
		<label>Category</label><br>
		
		<select name="mov_cat_id">
			<?php 
				$result=$cat->all_category();
				while ($row = mysqli_fetch_array($result)){
					echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
				}
			 ?>
		</select><br>
		<?= $er_mov_cat_id; ?><br>
		<label>Description</label><br>
		<textarea name="mov_description" rows="5"></textarea><br>
		<label>Youtube (watch?v=<span style="color:green">CKFtNsQ78oI</span>)</label><br>
		<input type="text" name="mov_trailer"><br>
		<label>Cast</label><br>
		<textarea name="mov_cast" rows="5"></textarea><br>
		<label>Language</label><br>
		<select name="mov_lang_id">
			<?php 
				$result=$lang->all_language();
				while ($lang = mysqli_fetch_array($result)){
					echo '<option value="'.$lang['lang_id'].'">'.$lang['language'].'</option>';
				}
			 ?>
		</select><br>
		<label>Director</label><br>
		<input type="text" name="mov_director"><br>
		<label>Image</label><br>
		<input type="file" name="mov_image" ><br><br>
		<input type="submit" name="submit" value="Save">
	</fieldset>
</form>