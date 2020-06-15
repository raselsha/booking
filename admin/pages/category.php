<?php
	$message='';
	if (isset($_GET['action']) and $_GET['action']=='delete') {
		$result=$cat->delete_category($_GET['id']);
		if ($result) {
			$message= '<p class="green">Category Deleted!</p>';
		}
	}
?>

<h2>Category</h2>
<a href="new_category.php">New category</a>
<hr>
<?= $message; ?>
<table width="50%" align="left">
	<th>Category</th>
	<th>Image</th>
	<th>Action</th>

<?php 
	$result = $cat->all_category();
	while ($row = mysqli_fetch_array($result)){
		echo '<tr>';
			echo '<td>';
				echo $row['cat_name'];
			echo '</td>';
			echo '<td>';
				echo $row['cat_image'];
			echo '</td>';
			echo '<td>';
				echo '<p><a href="edit_category.php?id='.$row['cat_id'].'">Edit</a> | <a href="?action=delete&id='.$row['cat_id'].'" onclick="return confirm(\'do you want to delete a category\')">Delete</a></p>';
			echo '</td>';
		echo '</tr>';
		
	}
?>
</table>