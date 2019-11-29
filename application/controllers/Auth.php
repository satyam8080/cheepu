<?php
/*require(APPPATH.'/libraries/REST_Controller.php');
require(APPPATH.'/libraries/Format.php');
use Restserver\Libraries\REST_Controller;
*/
class Auth extends CI_Controller {
/*use REST_Controller { REST_Controller::__construct as private __resTraitConstruct; }*/
    
    	public function unauth_user()
	{
		// code...
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'POST'){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		$params = $_REQUEST;
				$email = $params['email'];
                	$response = $this->MyModel->unauth_User($email);	
					json_output($response['status'],$response);
					$user_id = $response['user_id'];
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('dixitayush5085@gmail.com', 'Cheepu.in');
				$this->email->to($email);
				$this->email->subject('Email Varification');
				$this->email->message('Click here to varify your account :'."\r\n".'https://cheepu.in/auth/varification/'.$user_id);
                
					if ($this->email->send()) {
					}
	}
}
    public function varification($id)
      {
	    $response = $this->MyModel->auth_User($id);
	    die("Account Varified");
    }
    public function varified($id){
		$response = $this->MyModel->varify($id);
		json_output($response['status'],$response);
}
	public function pro_register(){
		 // $this->response($this->post('email'), 200);
         $params = $_REQUEST;
		 $auth =  $params['AUTH'];
         $client = $params['Client'];
		if($auth == "simplerestapi" && $client == "Cheepu_Client"){ 
		    $params = $_REQUEST;
		 	$email = $params['email'];		        
		 	$password = $params['password'];
                $response = $this->MyModel->register($email,$password);
                $user_id = $response['user_id'];
                $this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('dixitayush5085@gmail.com', 'Cheepu.in');
				$this->email->to($email);
				$this->email->subject('Email Varification');
				$this->email->message('Click here to varify your account :'."\r\n".'https://cheepu.in/auth/varification/'.$user_id);
                
					if ($this->email->send()) {
				

					}
				//echo $response;
				json_output($response['status'],$response);

	        	}else{ // bad request
		json_output(400,array('status' => 400,'message' => 'Bad request.'));    
		}
	}
	
	public function register(){
			$method = $_SERVER['REQUEST_METHOD'];

			if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
			} else {

			$check_auth_client = $this->MyModel->check_auth_client();

			if($check_auth_client == true){
				$params = $_REQUEST;
		        $email = $params['email'];
		        $password = $params['password'];
                $response = $this->MyModel->register($email,$password);
                $user_id = $response['user_id'];
                
                $this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('dixitayush5085@gmail.com', 'Cheepu.in');
				$this->email->to($email);
				$this->email->subject('Email Varification');
				$this->email->message('Click here to varify your account :'."\r\n".'https://cheepu.in/auth/varification/'.$user_id);
                
					if ($this->email->send()) {
				

					}
				//echo $response;
				json_output($response['status'],$response);
			}
		}
	}

	public function login_pro()
	{
		$method = $_SERVER['REQUEST_METHOD'];
            $params = $_REQUEST;
		 $auth =  $params['AUTH'];
         $client = $params['Client'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

		if($auth == "simplerestapi" && $client == "Cheepu_Client"){ 
				$params = $_REQUEST;

		        $email = $params['email'];
		        $password = $params['password'];


		        $response = $this->MyModel->login($email,$password);
				json_output($response['status'],$response);
			}
		}
	}
	public function login()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$check_auth_client = $this->MyModel->check_auth_client();

			if($check_auth_client == true){
				$params = $_REQUEST;

		        $email = $params['email'];
		        $password = $params['password'];


		        $response = $this->MyModel->login($email,$password);
				json_output($response['status'],$response);
			}
		}
	}
	 public function offer()
	{
		# code...
		$method = $_SERVER['REQUEST_METHOD'];
			if ($method!='GET' ) {
				# code...

			json_output(400,array('status' => 400,'message' => 'Bad request.'));	
				}else{
			$status = 200;				
			$offers = 	$this->MyModel->get_offer();
			json_output($status,$offers);			
			}
	}
		
		public function category($value='')
	{
			$cat = $this->MyModel->category();
			json_output(200,$cat);
	}
	 public function products($value='')
	 {
	 	# code...
			$product = $this->MyModel->products();
			json_output(200,$product);
	 }
	public function subCategory($value='')
	 {
	 	# code...
	
			$sub_cat = $this->MyModel->sub_category();
			json_output(200,$sub_cat);
		
	 }
	 

    public function search($value='')
	 {
	 	# code...
	 	$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		        $item = $params['item'];	
		       	$result =  	$this->MyModel->search($item);
		       	$count = $this->MyModel->result_count($item);
		       	$array = [
		       		'results'=>$result,
		       		'results_count'=>$count
		       		] ; 
		       	$status =200;  	        
		       	json_output($status,$array);
		}

	 }
	 public function product_description(){
		
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		        $pro_id = $params['id'];	
		       	$result =  	$this->MyModel->load_product_info($pro_id);
		       	json_output(200,$result);		     	
			}	
		}
		
			public function product_from_cart()
		{
			# code...
			$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		    	$id = $params['user_id'];   
		       	
			$q = $this->MyModel->products_in_cart($id);       
			json_output(200,$q);		     	
			
		
				}
		}
		
		public function add_to_cart()
		{
			# code...
			$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		    	$user_id = $params['user_id'];   
		    	$product_id = $params['product_id'];   
		    	$quantity = $params['quantity'];   
		    $data = [
		    	'user_id'=>$user_id,
		    	'product_id'=> $product_id,
		    	'quantity'=>$quantity
		    	] ; 	
		       	
			$q = $this->MyModel->add_to_cart($data);		
				}
		}
		public function update_cart()
		{
			# code...
			$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		    	$user_id = $params['user_id'];   
		    	$product_id = $params['product_id'];   
		    	$quantity = $params['quantity'];   
		    $data = [
		    	'user_id'=>$user_id,
		    	'product_id'=> $product_id, 
		    	'quantity'=>$quantity
		    	] ; 	
		       	
			$q = $this->MyModel->update_cart($data);		
				}
		}
		public function remove_from_cart()
		{
			# code...
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		    	$user_id = $params['user_id'];   
		    	$product_id = $params['product_id'];   
		    	$quantity = $params['quantity'];   
		    $data = [
		    	'user_id'=>$user_id,
		    	'product_id'=> $product_id,
		    	'quantity'=>$quantity
		    	] ; 	
		       	
			$q = $this->MyModel->remove_from_cart($data);		
				}

		}
	public function profile($id)
		{
			$profile = $this->MyModel->profile($id);
			json_output(200,$profile);
		}
	 public function profile_update()
	{
			$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
				$params = $_REQUEST;
		    	$user_id = $params['user_id'];   
		    	$name = $params['name'];   
		    	$email = $params['email'];
		    	$mobile = $params['mobile'];   
		    $data = [
		    	'user_id'=>$user_id,
		    	'user_name'=> $name,
		    	'user_email'=>$email,
		    	'user_mobile'=>$mobile
		    	] ; 	
		       	
			$q = $this->MyModel->profile_update($data);		
				}
	}	
	  	  
}
