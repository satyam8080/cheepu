<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
		public function basket($value='')
		{
			# code.. 
			$data = [
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'email'=>'',
		 		'email_err'=>'',
		 		'name_err'=> '', 
		 		'mobile_err'=>'',
		 		'password_err'=>''		 		
		 	];

			$this->load->view("templates/header",$data);			
			$this->load->view("templates/cdnhead");
			$data =  [
				'cartpro'=>$this->pages_model->product_from_cart()
			 		];
			$this->load->view("cart/basket",$data);
			$this->load->view("templates/footer");

		}
	public function removeFromCart($cart_id)
		{
			# code...
			$result = $this->pages_model->removeFromCart($cart_id);

			echo json_encode(array('status'=>$cart_id));
			
		}
	public function checkout()
			{			$data = [
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'email'=>'',
		 		'email_err'=>'',
		 		'name_err'=> '',
		 		'mobile_err'=>'',
		 		'password_err'=>'',
		 		'product'=>$this->pages_model->load_banner(),
		 		'offer'=>$this->admin_model->load_offer()		 		
		 	];
				# code...
				$this->load->view('templates/header',$data);
				$data = [
					'user'=>$this->pages_model->get_user_info(),
					'products'=>$this->pages_model->product_from_cart()
						] ;


				$this->load->view("cart/checkout",$data);
				$this->load->view('templates/footer');

			}

	public function checkout_payment()
			{			$data = [
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'email'=>'',
		 		'email_err'=>'',
		 		'name_err'=> '',
		 		'mobile_err'=>'',
		 		'password_err'=>'',
		 		'product'=>$this->pages_model->load_banner(),
		 		'offer'=>$this->admin_model->load_offer()		 		
		 	];
				# code...
				$this->load->view('templates/header',$data);
				$data = [
					'user'=>$this->pages_model->get_user_info(),
					'products'=>$this->pages_model->product_from_cart()
						] ;


				$this->load->view("cart/checkout_payment",$data);
				$this->load->view('templates/footer');

			}		
	public function order_address()
					{
						# code...
				$result = $this->cart_model->add_order_address();	
					echo json_encode(array('status'=>true));

					}
	public function order_confirm()
						{
										# code...
						}	

	public function pay() 
						{




$product_name = "Test shopping on cheepu";//$_POST["product_name"];
$price =$_POST["totalPrice"];
$name = $_POST["user_name"];
$phone = $_POST["user_mobile"];
$email = $_POST["user_email"];


include 'assets/instapay/src/instamojo.php';

$api = new Instamojo\Instamojo('5733aedc66832b31b0c224804c39a9cf', '5a81719a7b2e9d78c03d4f711e7e784c','https://www.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => base_url()."Pages/thankyou"
       // "webhook" => "http://demo.coregenie.com/instamojo/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page
    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  

	
	} 
	}
?>
