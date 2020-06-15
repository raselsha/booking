<div class="row">
	<div class="col-12">
		<h2 class="success">Thank you! Your booking has been confirmed</h2>
		<?php 
		if (isset($_GET['invoice']) and isset($_GET['amount'])) :
			$result=$pay->get_ipn($_GET);

			$cust_id = $cust->new_customer($result['data']['billing']['customer']);
			
			$py['pay_cust_id'] = $cust_id;
			$py['pay_invoice'] = $result['data']['invoice_id'];
			$py['pay_price'] = $result['data']['order']['amount'];
			$py['pay_created_at'] = $result['data']['order']['created_at'];
			$pay->new_payment($py);

			$bk['book_cust_id']=$cust_id;
			$bk['book_seats']=$result['data']['customs'][0]['book_seats'];
			$bk['book_date']=$result['data']['customs'][1]['book_date'];
			$bk['book_show_time']=$result['data']['customs'][2]['book_show_time'];
			$bk['book_mov_id']=$result['data']['customs'][3]['book_mov_id'];
			$bk['book_pay_invoice']=$result['data']['invoice_id'];
			$book->new_booking($bk);
			?>
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
		<?php endif;?>
	</div>
</div>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>