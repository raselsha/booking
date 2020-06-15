<?php
	$message='';
?>

<h2>Customer</h2>
<!-- <a href="new_booking.php">New booking</a>
 --><hr>
<?= $message; ?>
<table width="100%" align="left">
	<th align="left">Id</th>
	<th align="left">Customer name</th>
	<th align="left">Email</th>
	<th align="left">Mobile</th>

<?php 
	$result = $cust->all_customer();
	while ($row = mysqli_fetch_array($result)):?>
	<tr>
		<td><?= $row['cust_id'] ?></td>
		<td><?= $row['cust_name'] ?></td>
		<td><?= $row['cust_email'] ?></td>
		<td><?= $row['cust_mobile'] ?></td>
	</tr>	
<?php endwhile; ?>

</table>