<div class="row">
	<div class="col-12">
		<h2>Check your booking!</h2>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<?php 
			$result='';
			if (isset($_POST['submit'])) {
				if (!empty($_POST['invoice'])) {
					$result=$pay->get_invoice($_POST['invoice']);
				}
			}
		?>
		<form method="post" action="" class="">
			<p>
				<label>Invoice no</label><br>
				<input type="text" name="invoice" required=""> <input type="submit" name="submit" value="Check in">
			</p>
		</form>
	</div>
</div>
<?php if ($result): ?>
<div class="row">
	<div class="col-12">
		<div class="row" id="DivIdToPrint">
			<div class="col-12">
				<h2>Invoice No: <?= $result['data']['invoice_id']; ?></h2>
				
				<p><b>Date:</b> <?= date("d-M-Y", strtotime($result['data']['order']['created_at']));  ?></p>
				<p><b>Gateway:</b> <?= $result['data']['billing']['gateway']['network']; ?></p>
			
				<p><b>Name:</b> <?= $result['data']['billing']['customer']['name']; ?></p>
				<p><b>Email:</b> <?= $result['data']['billing']['customer']['email']; ?></p>
				<p><b>Mobile:</b> <?= $result['data']['billing']['customer']['phone']; ?></p>

				<div class="show_movie_table">
					<table border="1" class="" width="100%">
						<tr>
							<th>Booking Date</th>
							<th>Show time</th>
							<th>Total Seats</th>
							<th>Total amount</th>
						</tr>
						<tr>
							<td class="text-center" align="center">
								<?= date("d-M-Y", strtotime($result['data']['customs'][1]['book_date']));  ?>
							</td>
							<td class="text-center" align="center"><?php print($result['data']['customs'][2]['book_show_time']); ?></td>
							<td class="text-center" align="center"><?php print($result['data']['customs'][0]['book_seats']); ?></td>
							<td class="text-center" align="center"><?php print($result['data']['order']['amount']); ?></td>
						</tr>
					</table>
				</div>	
			</div>	
		</div>
		<button class="book_mov_ticket" onclick='printDiv();'>Print invoice</button>
	</div>
</div>
<?php endif; ?>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>