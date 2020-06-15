<div class="row">
	<?php $row = $mov->show_movie($_GET['id']);?>

	<div class="col-5 text-center">
		<h2>Details of the movie</h2>
		<a href="#"><img class="show_mov_image" src="assets/public/images/<?= $row['mov_image'];?>" alt="no image" ></a>
		
	</div>
	<div class="col-7 text-left show_movie_table">
		<table>
			<tr>
				<th valign="top" width="30%">Name</th>
				<td valign="top"><?= $row['mov_name']; ?> <a href="trailer.php?id=<?= $row['mov_id']; ?>">View trailer</a></td>
			</tr>
			<tr>
				<th valign="top">Category</th>
				<td valign="top"><?= $row['cat_name']; ?></td>
			</tr>
			<tr>
				<th valign="top">Language</th>
				<td valign="top"><?= $row['language']; ?></td>
			</tr>
			<tr>
				<th valign="top">Director</th>
				<td valign="top"><?= $row['mov_director']; ?></td>
			</tr>
			<tr>
				<th valign="top">Cast</th>
				<td valign="top"><?= $row['mov_cast']; ?></td>
			</tr>
			<tr>
				<th valign="top">Description</th>
				<td valign="top"><?= $row['mov_description']; ?></td>
			</tr>


		</table>
		<div class="book_ticke_box text-center">
			<a class="book_ticket" href="checkout.php?id=<?= $row['mov_id']; ?>">Book a Ticket</a>
		</div>
	</div>
</div>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>