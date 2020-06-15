<?php include 'inc/header.php'; ?>
	<?php if (isset($page)) :?>
		<?php include 'pages/'.$page.'.php'; ?>
	<?php else: ?>
		<?php include 'pages/home.php'; ?>
	<?php endif; ?>
<?php include 'inc/footer.php'; ?>