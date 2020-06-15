<h2>New category</h2>
<hr>

<?php 
	$er_cat_name = '';
	$message = '';
	$er=0;

	if (isset($_POST['submit'])) {
		if (empty($_POST['cat_name'])) {
			$er_cat_name =  '<p class="red">category name required!</p>';
			$er++;
		}
		if ($er==0) {
			$result=$cat->new_category($_POST);
			if ($result) {
				$message = '<p class="green">Data has been saved!</p>';
			}
		}
		
	}
 ?>
<form method="post">
	<fieldset>
		<legend>| |</legend>
		<?= $message; ?>
		<label>Category Name</label><br>
		<input type="text" name="cat_name"><br>
		<input type="hidden" name="cat_image" value="noimage.jpg"><br>
		<?= $er_cat_name; ?>
		<input type="submit" name="submit" value="Save">
	</fieldset>
</form>