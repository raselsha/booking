<?php 
	session_start();

	require 'classes/Connection.php';
	$con = new connection();
	require 'classes/Category.php';
	$cat = new category();
	require 'classes/Movies.php';
	$mov = new movies();
	require 'classes/Language.php';
	$lang = new language();
	require 'classes/Customer.php';
	$cust = new customer();
	require 'classes/Booking.php';
	$book = new booking();
	require 'classes/Payment.php';
	$pay = new payment();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cineplex <?php if(isset($title)){ echo '- '.$title;} ?></title>
	<link rel="stylesheet" href="assets/public/css/jquery.bxslider.css">
	<link rel="stylesheet" href="assets/public/css/style.css" media="all">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="assets/public/js/jquery.bxslider.min.js"></script>
	<script src="assets/public/js/jquery.bxslider.js"></script>
	<script>
	  $(document).ready(function(){
	    $('.slider').bxSlider();
	    
	  });
	</script>

</head>
<body>
<div id="overlay"></div>
	<main class="container">
		<header>
			<div class="row">
				<div class="col-4">
					<div class="logo">
						<a href="./"><img src="assets/public/images/logo.png" width="250"></a>
					</div>
				</div>
				<div class="col-8">
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<nav style="background:#333;">
						<p>
							<a href="./">Home</a>
							<a href="movies.php">All Movies</a>
							<?php  $cat_m=$cat->all_category(); ?>
							<?php while ($row = mysqli_fetch_assoc($cat_m)) :?>
								<a href="category.php?id=<?= $row['cat_id']; ?>"><?= $row['cat_name']; ?></a> 
							<?php endwhile; ?>  
							<a href="book_ticket.php">Book Ticket</a>  
							<a href="check_in.php">Check In</a>
							<a href="cinepelex.php">Cinepelex</a>
							<a href="contact.php">Contact</a>
							<a href="./admin/index.php">Admin</a>
						</p>
					</nav>
				</div>
			</div>
		</header>
		
