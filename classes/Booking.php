<?php 

class Booking extends Connection
	{
		public function all_booking(){
			$con = $this->connect();
			$sql="SELECT booking.*,customer.cust_name, movies.mov_name FROM booking LEFT JOIN customer ON booking.book_cust_id = customer.cust_id LEFT JOIN movies ON booking.book_mov_id = movies.mov_id";
			$result = mysqli_query($con,$sql);
			return $result;
		}

		public function new_booking($data){
			$con = $this->connect();
			$exist_book=$this->exist_booking($data['book_pay_invoice']);
			if ($exist_book['book_pay_invoice']!=$data['book_pay_invoice']) {		
				$sql = "INSERT into booking(book_cust_id,book_seats,book_date,book_show_time,book_mov_id,book_pay_invoice)values('$data[book_cust_id]','$data[book_seats]','$data[book_date]','$data[book_show_time]','$data[book_mov_id]','$data[book_pay_invoice]')";
				if (mysqli_query($con,$sql)) {
					return true;
				}
				else{
					echo mysqli_error($con);
				}
			}
		}

		public function exist_booking($invoice){
			$con = $this->connect();
			$sql="SELECT * FROM booking WHERE book_pay_invoice = '$invoice'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}