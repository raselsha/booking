<?php
	$message='';
	if (isset($_GET['action']) and $_GET['action']=='delete') {
		$result=$mov->delete_movie($_GET['id']);
		if ($result) {
			$message= '<p class="green">Movie Deleted!</p>';
		}
	}
?>

<h2>Movies</h2>
<a href="new_movie.php">New movie</a>
<hr>
<?= $message; ?>
<table width="100%" align="left">
	<th>Thumbnail</th>
	<th colspan="2">Info</th>
	<th>Description</th>
	<th>Action</th>

<?php 
	$result = $mov->all_movies();
	while ($row = mysqli_fetch_assoc($result)){
		echo '<tr valign="top">';
			echo '<td>';
				echo '<img src="../assets/public/images/'.$row['mov_image'].'" alt="no image" width="100">';
			echo '</td>';
			echo '<td>';
				echo '<p>Name:'.$row['mov_name'].'</p>';
				echo '<p>Category:'.$row['cat_name'].'</p>';
				echo '<p>Language:'.$row['language'].'</p>';
			echo '</td>';
			echo '<td>';
				echo '<p>Cast:'.$row['mov_cast'].'</p>';
				echo '<p>Director:'.$row['mov_director'].'</p>';

			echo '</td>';
			echo '<td>';
				echo $row['mov_description'];
			echo '</td>';
			echo '<td>';
				echo '<p><a href="edit_movie.php?id='.$row['mov_id'].'">Edit</a> | <a href="?action=delete&id='.$row['mov_id'].'" onclick="return confirm(\'do you want to delete movie\')">Delete</a></p>';
			echo '</td>';
		echo '</tr>';
		
	}
?>
</table>