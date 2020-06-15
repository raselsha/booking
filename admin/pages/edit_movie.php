<h2>Edit movie</h2>
<hr>

<?php 
	$er_mov_name = '';
	$er_mov_cat_id = '';
	$message = '';
	$er=0;

	if (isset($_POST['submit'])) {
		$_POST['mov_new_image'] = $_FILES['mov_new_image'];
		if (empty($_POST['mov_name'])) {
			$er_mov_name =  '<span class="red">required!</span>';
			$er++;
		}
		if (empty($_POST['mov_cat_id'])) {
			$er_mov_cat_id =  '<span class="red">required!</span>';
			$er++;
		}

		if ($er==0) {
			$result=$mov->update_movie($_POST);
			if ($result) {
				$message = '<p class="green">Data has been updated!</p>';
			}
		}
		
	}
	$row = $mov->show_movie($_GET['id']);
 ?>
<form method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>| |</legend>
		<?= $message; ?>
		<label>Movie Name</label><br>
		<input type="hidden" name="mov_id" value="<?= $row['mov_id']; ?>"><br>
		<input type="text" name="mov_name" value="<?= $row['mov_name']; ?>"><br>
		<?= $er_mov_name; ?><br>
		<label>Category</label><br>
		
		<select name="mov_cat_id">
			<option value="">Select category</option>
			<?php 
				$result=$cat->all_category();
				while ($cat = mysqli_fetch_array($result)){
					if ($row['mov_cat_id']==$cat['cat_id']) {
						echo '<option value="'.$cat['cat_id'].'" selected>'.$cat['cat_name'].'</option>';
					}
					else{
						echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
					}
				}
			 ?>
		</select><br>
		<?= $er_mov_cat_id; ?><br>
		<label>Description</label><br>
		<textarea name="mov_description" rows="5"><?= $row['mov_description']; ?></textarea><br>
		<label>Youtube (watch?v=<span style="color:green">CKFtNsQ78oI</span>)</label><br>
		<input type="text" name="mov_trailer" value="<?= $row['mov_trailer']; ?>"><br>
		<label>Cast</label><br>
		<textarea name="mov_cast" rows="5"><?= $row['mov_cast']; ?></textarea><br>
		<label>Language</label><br>
		<select name="mov_lang_id">
			<option value="">Select language</option>
			<?php 
				$result=$lang->all_language();
				while ($lang = mysqli_fetch_array($result)){
					if ($row['mov_lang_id']==$lang['lang_id']) {
						echo '<option value="'.$lang['lang_id'].'" selected>'.$lang['language'].'</option>';
					}
					else{
						echo '<option value="'.$lang['lang_id'].'">'.$lang['language'].'</option>';
					}
				}
				
			 ?>
		</select><br>
		<label>Director</label><br>
		<input type="text" name="mov_director" value="<?= $row['mov_director']; ?>"><br>
		<label>Image</label><br>
		<input type="hidden" name="mov_image" value="<?= $row['mov_image']; ?>"><br>
		<input type="file" name="mov_new_image" ><br><br>
		<input type="submit" name="submit" value="Save">
	</fieldset>
</form>