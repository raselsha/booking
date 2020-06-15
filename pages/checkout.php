
<div class="row">
	<div class="col-12">
		<?php $row = $mov->show_movie($_GET['id']);?>
		<h2>Book movie ticket</h2>
	</div>
</div>
<?php 
	$message = '';
	$er_name = '';
	$er_email = '';
	$er_mobile = '';
	$er_date = '';
	$er_show_time = '';
	$er_seats = '';
	$er=0;
	if (isset($_POST['submit'])) {
		if (empty($_POST['name'])) {
			$er_email = '<span class="error">Required</span>';
			$er++;
		}
		if (empty($_POST['email'])) {
			$er_email = '<span class="error">Required</span>';
			$er++;
		}
		if (empty($_POST['phone'])) {
			$er_mobile = '<span class="error">Required</span>';
			$er++;
		}
		if (empty($_POST['book_date'])) {
			$er_date = '<span class="error">Required</span>';
			$er++;
		}
		if (empty($_POST['book_show_time'])) {
			$er_show_time = '<span class="error">Required</span>';
			$er++;
		}
		if (empty($_POST['book_seats'])) {
			$er_seats = '<span class="error">Required</span>';
			$er++;
		}
		if ($er==0) {
			$_POST['amount'] = intval($_POST['amount']);
			$pay->gen_invoice($_POST);
		}
	}

 ?>
 <?= $message; ?>
<form method="post" action="" class="">
	
	<input type="hidden" name="book_mov_id" value="<?= $_GET['id']; ?>">
	<input type="hidden" name="amount" value="100">
	<div class="row">
		<div class="col-4">
			<h3>Billing info</h3>
				<p>
					<label>Name</label><br>
					<input type="text" name="name" required=""><br>
					<?= $er_name; ?>
				</p>
				<p>
					<label>Email</label><br>
					<input type="text" name="email" required=""><br>
					<?= $er_email; ?>
				</p>
				<p>
					<label>Mobile</label><br>
					<input type="text" name="phone" required=""><br>
					<?= $er_mobile; ?>
				</p>
		</div>
		<div class="col-4">
			<h3>Booking info</h3>
				<p>
					<label>Date</label><br>
					<input type="text" name="book_date" id="datepicker" required=""><br>
					<?= $er_date; ?>
				</p>
				<p>
					<label>Show Time</label><br>
					<select name="book_show_time" style="width:147px;padding:3px;">
						<option value="11am - 02pm">11am - 02pm</option>
						<option value="03pm - 06pm">03pm - 06pm</option>
					</select><br>
					<?= $er_show_time; ?>
				</p>
				<p>
					<label>Number of seats</label><br>
					<select class="book_seats" name="book_seats" style="width:147px;padding:3px;">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select><br>
					<?= $er_seats; ?>
				</p>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			
			<div class="book_ticke_box text-center">
				<h2 class="success">Total amount: <b class="amount">100</b> BDT</h2>
				<input class="book_ticket" type="submit" name="submit" value="Pay Now">
			</div>
		</div>
	</div>
</form>
<div class="row">
	<?php include 'inc/widgets.php'; ?>
</div>