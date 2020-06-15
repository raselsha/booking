<div class="row">
	<div class="col-12">
		<?php $cat_name=$cat->show_category($_GET['id']) ?>
		<h2><?= $cat_name['cat_name']?></h2>
		<hr>
		 <?php 
		 	$result=$mov->cat_movies($_GET['id']);
		 	while ($row = mysqli_fetch_assoc($result)): ?>
		 		<div class="col-3">
		 			<div class="movie_box">
		 				<a href="show_movie.php?id=<?= $row['mov_id']; ?>"><img class="mov_image" src="assets/public/images/<?= $row['mov_image'];?>" alt="no image"></a>
		 			</div>
		 		</div>
		 <?php endwhile;?>
	</div>
</div>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>