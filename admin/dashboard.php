<?php 
	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location:index.php');
	}
	if (isset($_GET['action']) and $_GET['action']=='logout') {
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['type']);
		header('Location:index.php');
	}

	require '../classes/Connection.php';
	$con = new connection();
	require '../classes/Category.php';
	$cat = new category();
	require '../classes/Movies.php';
	$mov = new movies();
	require '../classes/Language.php';
	$lang = new language();
	require '../classes/Booking.php';
	$book = new booking();
	require '../classes/Customer.php';
	$cust = new customer();

 ?>



<!DOCTYPE html>

<html>

<head>

	<title>Dashboard</title>

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="../assets/admin/css/style.css">

</head>

<body>

	<table width="100%" cellpadding="5">

		<tr bgcolor="#eee" style="border-bottom: 2px solid #D82012;">

			<td>
				<a href="./"><img src="../assets/admin/images/logo.png" alt="Logo" width="100%" align="left" title="logo"></a><br>
			</td>

			<td colspan="" align="right">

				Welcome <strong><?= $_SESSION['name'] ?>!</strong> | 

				Loged as: <strong><?= $_SESSION['type'] ?></strong> | Email: <strong><?= $_SESSION['email'] ?></strong> | 

				<a href="change_password.php">Change password</a> | 

				<a href="?action=logout">Logout</a>

			</td>

		</tr>

		<tr>

			<td width="14%" height="" bgcolor="#eee" valign="top">

				<nav>

					<ul>
						<li><a href="../index.php" style="margin-top:15px;display: block;" target="_blank"><span class="red">&#9784</span> Main Site</a></li>
						<li><a href="category.php"><span class="red">&#9784</span> Category</a></li>
						<li><a href="movies.php"><span class="red">&#9784</span> Movies</a></li>
						<li><a href="customer.php"><span class="red">&#9784</span> Customer</a></li>
						<li><a href="booking.php"><span class="red">&#9784</span> Booking</a></li>
					</ul>

				</nav>

			</td>

			<td width="80%" height="520" valign="top" bgcolor="#fff" >

				<?php

					if (isset($page)) {
						include 'pages/'.$page.'.php';
					}
					else{
						include 'pages/home.php';
					}
				?>
			</td>

		</tr>

	</table>

</body>

</html>