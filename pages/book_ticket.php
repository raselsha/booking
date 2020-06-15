<div class="row">
	<div class="col-12">
		<h2>Book ticket</h2>
		<hr>
	</div>
</div>
<div class="row">
	<?php 
		$result = $mov->all_movies();
		while ($row = mysqli_fetch_assoc($result)): ?>
			<div class="col-2">
				<div class="book_movie_box">
					<a href="show_movie.php?id=<?= $row['mov_id']; ?>"><img class="book_mov_image" src="assets/public/images/<?= $row['mov_image'];?>" alt="no image"></a>
					<a class="book_mov_ticket" href="checkout.php?id=<?= $row['mov_id']; ?>">Book a Ticket</a>
				</div>
			</div>
	<?php endwhile;?>	
</div>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>