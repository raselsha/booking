<?php 

/**
 * 
 */
class Payment extends Connection
{
	
	public function gen_invoice($data)
{
    ini_set('display_errors', 1); 
    error_reporting(E_ALL);
    
    $mode = "sandbox"; // Can be "live" or "sandbox"
    $config_data = [
        'sandbox' => [
            'invoice_endpoint' => 'https://api-sandbox.portpos.com/payment/v2/invoice/',
            'ipn_endpoint' => 'https://api-sandbox.portpos.com/payment/v2/invoice/ipn/',
            'app_key' => '4a6436b9a990b18bc831d4338b97e35d',
            'secret_key' => 'b5f0bd50437f20c36bb2697fe981ca3e'
        ],
        'live' => [
            'invoice_endpoint' => 'https://api.portpos.com/payment/v2/invoice/',
            'ipn_endpoint' => 'https://api.portpos.com/payment/v2/invoice/ipn',
            'app_key' => '4a6436b9a990b18bc831d4338b97e35d',
            'secret_key' => 'b5f0bd50437f20c36bb2697fe981ca3e'
        ]
    ];

    // Prepare the data
    $data = [
        'order' => [
            'amount' => $data['amount'],
            'currency' => 'BDT',
            'redirect_url' => "http://myshahadat.com/demo/booking/success.php",
            'ipn_url' => "http://myshahadat.com/demo/booking/success.php",
            'reference' => '123',
        ],
        'product' => [
            'name' => 'Movie ticket',
            'description' => 'Movie description',
        ],
        'billing' => [
            'customer' => [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => [
                    'street' => 'unknown',
                    'city' => 'unknown',
                    'state' => 'unknown',
                    'zipcode' => 'unknown',
                    'country' => 'BD'
                ]
            ]
        ],
        'customs' => [
            'book_seats' => $data['book_seats'],
            'book_date' => $data['book_date'],
            'book_show_time' => $data['book_show_time'],
            'book_mov_id' => $data['book_mov_id']
        ]
    ];

    // Set up headers for the API request
    $headers = [
        'Authorization: ' . 'Bearer ' . base64_encode($config_data[$mode]['app_key'] . ":" . md5($config_data[$mode]['secret_key'] . time())),
        'Content-Type: application/json'
    ];

    // Encode the data into JSON format
    $data = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $config_data[$mode]['invoice_endpoint']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    
    if (curl_errno($ch)) {
        // Handle curl errors
        echo 'Curl error: ' . curl_error($ch);
        curl_close($ch);
        return;
    }
    
    curl_close($ch);

    // Check for successful HTTP response
    if (substr($info['http_code'], 0, 2) == 20 && !empty($response)) {
        $response = json_decode($response);
        
        // Verify the structure of the response
        if (isset($response->data->action->url)) {
            $url = $response->data->action->url;
            header("Location: $url"); // Redirect browser
            exit();
        } else {
            echo "Error: Missing expected URL in response";
        }
    } else {
        echo "Error: Failed to generate invoice or API response error";
    }
}


	public function get_invoice($invoice)
	{	
		ini_set('display_errors',1); 
		error_reporting(E_ALL);
		$mode = "sandbox";
		$config_data=[
		            'sandbox'=>[
		                'invoice_endpoint'  => 'https://api-sandbox.portpos.com/payment/v2/invoice',
		                'ipn_endpoint'      => 'https://api-sandbox.portpos.com/payment/v2/invoice/ipn',
		                'app_key' => '4a6436b9a990b18bc831d4338b97e35d',
            			'secret_key' => 'b5f0bd50437f20c36bb2697fe981ca3e'
		            ],
		            'live'=>[
		                'invoice_endpoint'  => 'https://api.portpos.com/payment/v2/invoice',
		                'ipn_endpoint'      => 'https://api.portpos.com/payment/v2/invoice/ipn',
						'app_key' => '4a6436b9a990b18bc831d4338b97e35d',
            			'secret_key' => 'b5f0bd50437f20c36bb2697fe981ca3e'
		            ]
		        ];
		
		$headers[] = 'Authorization: ' . 'Bearer ' . base64_encode($config_data[$mode]['app_key'] . ":" . md5($config_data[$mode]['secret_key'] . time()));
		$headers[] = 'Content-Type: ' . 'application/json';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $config_data[$mode]['invoice_endpoint']);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$info = curl_getinfo($ch);
		$error = curl_error($ch);
		curl_close($ch);
		if (substr($info['http_code'],0,2) == 20 && !empty($response)) {
		    $data = json_decode($response);
		    $data = json_decode(json_encode($data), true);
		    return $data;
		}
	}

	public function get_ipn($data)
	{	
		ini_set('display_errors',1); 
		error_reporting(E_ALL);
		$mode = "sandbox";
		$config_data=[
		            'sandbox'=>[
		                'invoice_endpoint'  => 'https://api-sandbox.portpos.com/payment/v2/invoice',
		                'ipn_endpoint'      => 'https://api-sandbox.portpos.com/payment/v2/invoice/ipn',
		                'app_key' => '4a6436b9a990b18bc831d4338b97e35d',
            			'secret_key' => 'b5f0bd50437f20c36bb2697fe981ca3e'
		            ],
		            'live'=>[
		                'invoice_endpoint'  => 'https://api.portpos.com/payment/v2/invoice',
		                'ipn_endpoint'      => 'https://api.portpos.com/payment/v2/invoice/ipn',
		                'app_key' => '4a6436b9a990b18bc831d4338b97e35d',
            			'secret_key' => 'b5f0bd50437f20c36bb2697fe981ca3e'
		            ]
		        ];
		
		$headers[] = 'Authorization: ' . 'Bearer ' . base64_encode($config_data[$mode]['app_key'] . ":" . md5($config_data[$mode]['secret_key'] . time()));
		$headers[] = 'Content-Type: ' . 'application/json';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $config_data[$mode]['ipn_endpoint']);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$info = curl_getinfo($ch);
		$error = curl_error($ch);
		curl_close($ch);
		if (substr($info['http_code'],0,2) == 20 && !empty($response)) {
		    $data = json_decode($response);
		    $data = json_decode(json_encode($data), true);
		    return $data;
		}
	}

	public function new_payment($data){
		$con = $this->connect();
		$exist_pay=$this->exist_payment($data['pay_invoice']);	
		if ($exist_pay['pay_invoice']!=$data['pay_invoice']) {	
			$sql = "INSERT into payment(pay_cust_id,pay_invoice,pay_price,pay_created_at)
			values('$data[pay_cust_id]','$data[pay_invoice]','$data[pay_price]','$data[pay_created_at]')";
			if (mysqli_query($con,$sql)) {
				return true;
			}
			else{
				echo mysqli_error($con);
			}
		}
	}

	public function exist_payment($invoice){
		$con = $this->connect();
		$sql="SELECT * FROM payment WHERE pay_invoice = '$invoice'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
}


?>