<div class="row">
	<div class="col-12">
		<?php include 'inc/slider.php'; ?>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<h2>Now showing</h2>
		<hr>
	</div>
</div>
<div class="row">
	<?php 
		$result = $mov->cat_movies(2);
		while ($row = mysqli_fetch_assoc($result)): ?>
			<div class="col-3">
				<div class="movie_box">
					<a href="show_movie.php?id=<?= $row['mov_id']; ?>"><img class="mov_image" src="assets/public/images/<?= $row['mov_image'];?>" alt="no image"></a>
				</div>
			</div>
	<?php endwhile;?>

</div>
<div class="row">
	<div class="col-6">
		<h2 class="text-center">Spiderman</h2>
		<img src="assets/public/images/spiderman.jpg" width="100%">
	</div>
	<div class="col-6" style="padding:50px 10px">
		<p><b>Real Name:</b> Peter Parker</p>
		<p><b>Location:</b> New York City</p>
		<p><b>First Appearance:</b>Amazing Fantasy #15 (1962)</p>
		<p><b>Created By:</b> Stan Lee and Steve Ditko</p>
		<p><b>Publisher:</b>  Marvel Comics</p>
		<p><b>Team Affiliations:</b>  New Avengers</p>
		<h2> Spider-Man's Powers</h2>

		<p>Spider-Man has spider-like abilities including superhuman strength and the ability to cling to most surfaces. He is also extremely agile and has amazing reflexes. Spider-Man also has a “spider sense,” that warns him of impending danger.</p>

		<p>Spider-Man has supplemented his powers with technology. Being a brilliant chemist and scientist, Peter has made web-slingers, bracelets that shoot out a sticky webbing, allowing him to swing from building to building and ensnare opponents. He has also developed stingers that shoot powerful energy blasts that can stun foes.</p>

		<p>In the recent storyline, Spider-Man has been reborn with even stronger abilities. He has the ability to see in the dark, enhanced senses, and can feel the vibrations through his webbing. In addition to this, the new, “Iron Spidey,” suit has enhanced his strength further and gives protection from damage. Recently, however, he has gotten rid of the suit and returned to the classic costume.</p>

	</div>

</div>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>