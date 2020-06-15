<?php 

/**
 * 
 */
class Customer extends Connection
{
	public function new_customer($data){
		$con = $this->connect();
		$exist_cust=$this->exist_customer($data['email']);
		if ($exist_cust['cust_email']!=$data['email']) {
			$sql = "INSERT into customer(cust_name,cust_email,cust_mobile)values('$data[name]','$data[email]','$data[phone]')";
			if (mysqli_query($con,$sql)) {
				return mysqli_insert_id($con);
			}
			else{
				echo mysqli_error($con);
			}
		}
		else{
			return $exist_cust['cust_id'];
		}
		
	}

	public function all_customer(){
		$con = $this->connect();
		$sql="SELECT * FROM customer";
		$result = mysqli_query($con,$sql);
		return $result;
	}
	public function show_customer($id){
		$con = $this->connect();
		$sql="SELECT * FROM customer WHERE cust_id = '$id'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	public function exist_customer($email){
		$con = $this->connect();
		$sql="SELECT * FROM customer WHERE cust_email = '$email'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

}

 ?>