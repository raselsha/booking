<?php
	$message='';
?>

<h2>Booking</h2>
<!-- <a href="new_booking.php">New booking</a>
 --><hr>
<?= $message; ?>
<table width="100%" align="left">
	<th align="left">Id</th>
	<th align="left">Customer name</th>
	<th align="left">Booking date</th>
	<th align="left">Show time</th>
	<th align="left">Seats</th>
	<th align="left">Movie</th>
	<th align="left">Invoice</th>

<?php 
	$result = $book->all_booking();
	while ($row = mysqli_fetch_array($result)):?>
	<tr>
		<td><?= $row['book_id'] ?></td>
		<td><?= $row['cust_name'] ?></td>
		<td><?= $row['book_date'] ?></td>
		<td><?= $row['book_show_time'] ?></td>
		<td><?= $row['book_seats'] ?></td>
		<td><?= $row['mov_name'] ?></td>
		<td><?= $row['book_pay_invoice'] ?></td>
	</tr>	
<?php endwhile; ?>

</table>