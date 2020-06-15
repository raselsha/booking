<div class="row">
	<div class="col-12">
		<?php $row = $mov->show_movie($_GET['id']);?>
		<h2><?= $row['mov_name'] ?></h2>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-8">
		
		<div style="padding:0 10px">
			<?php if($row['mov_trailer']): ?>
				<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $row['mov_trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			<?php else: ?>
				<p class="error">video not available</p>
			<?php endif; ?>
			<h3>Description</h3>
			<div><?= $row['mov_description'] ?></div>
		</div>
	</div>
	<div class="col-4">
		<p>
			<img src="assets/public/images/<?= $row['mov_image'] ?>" width="100%">
		</p>
	</div>
</div>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>