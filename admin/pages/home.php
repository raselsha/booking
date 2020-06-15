<h2>Dashboard</h2>
<table width="100%">
	<tr>
		<td align="center" bgcolor="Tomato">
			<?php $result = $cust->all_customer(); ?>
			<?php $customer=mysqli_num_rows($result); ?>
			<h1><?= $customer; ?></h1>
			<h2>Total Customer</h2>
		</td>
		<td align="center" bgcolor="Orange">
			<?php $result = $book->all_booking(); ?>
			<?php $booking=mysqli_num_rows($result); ?>
			<h1><?= $booking; ?></h1>
			<h2>Total Booking</h2>
		</td>
		<td align="center" bgcolor="DodgerBlue">
			<?php $result = $mov->all_movies(); ?>
			<?php $mov=mysqli_num_rows($result); ?>
			<h1><?= $mov; ?></h1>
			<h2>Total Movies</h2>
		</td>
	</tr>
</table>