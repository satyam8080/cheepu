<?php 
	/**
	 *  
	 */
	class Pages extends CI_Controller
	{
		public function __construct(){
		parent::__construct();
		$this->load->model('Pages_model','pages_model'); 
	}
	public function view($page = 'home'){
		if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
	} 
			$data = [
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'email'=>'',
		 		'email_err'=>'',
		 		'name_err'=> '',
		 		'mobile_err'=>'',
		 		'password_err'=>'',
            'cat_name'=> $this->admin_model->load_category(''),
			'sub_cat_name'=> $this->admin_model->load_sub_category(),
			'products'=> $this->pages_model->load_product(),
		 	'offer'=>$this->admin_model->load_offer()		 		
		 	];
			$this->load->view("templates/header",$data);
			$this->load->view('pages/'.$page,$data);
			$this->load->view("templates/footer");			
	}
		public function apiregister(){
			$data = [
						'social_id'=>$this->input->post('s_id'),
						'user_name'=>$this->input->post('name'),
						'user_email'=>$this->input->post('email')
					//	'type'=>$this->input->post('type')
					];
					$this->pages_model->register($data);
			echo json_encode(array('status'=>$this->input->post('type')));
		}
		public function register(){
			if ($this->input->post('type') == 'users') {
				# code...
			
			$data = [
				'user_name'=>$this->input->post('name'),
				'user_mobile'=>$this->input->post('mobile'),
				'user_current_password'=>$this->input->post('password'),
				'user_email'=>$this->input->post('email')
				];
			$password = $this->input->post('password');
		    $hashed_password = md5($password);
            $password = crypt($password,$hashed_password);
            $data['user_current_password']  = $password;	
				$signup = $this->pages_model->register($data);
				if($signup)
	 			echo json_encode(array('status'=>true));
				else
				echo json_encode(array('status'=>false));	
		}elseif ($this->input->post('type') == 'seller_info') {
			$data = [
				'seller_name'=>$this->input->post('name'),
				'seller_mobile'=>$this->input->post('mobile'),
				'seller_current_password'=>$this->input->post('password'),
				'latitude'=>$this->input->post('latitude'),
				'longitude'=>$this->input->post('longitude')
				];
			$password = $this->input->post('password');
		    $hashed_password = md5($password);
            $password = crypt($password,$hashed_password);
            $data['seller_current_password']  = $password;
            $signup = $this->pages_model->register($data);
				if($signup)
	 			echo json_encode(array('status'=>true));
				else
				echo json_encode(array('status'=>false));	
		}

	}
		public function check_availability($mobile){
			$result = $this->pages_model->findUserById($mobile);				
			if($result)			    
		    echo json_encode(array('status'=>true));
			else
			echo json_encode(array('status'=>false));
		}
		public function login(){
				$signin = $this->pages_model->login(); 
				if($signin) 
					echo json_encode(array('status'=>$signin));
					else
					echo json_encode(array('status'=>"false"));
		}
		public function logout(){
				$this->session->unset_userdata('name');
				session_destroy();				
				redirect(base_url());
			}
		public function get_user_info($id)
			{
				return $this->pages_model->get_user_info();
				
			}	
		public function product_description($p_id){
				$data = [
				'p_id'=>$p_id,	
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'email'=>'',
		 		'email_err'=>'',
		 		'name_err'=> '',
		 		'mobile_err'=>'',
		 		'password_err'=>'',
		 		'product'=>$this->pages_model->load_product(),
		 		'offer'=>$this->admin_model->load_offer()		 		
		 	];	
			$this->load->view('templates/header',$data);
			$pro_data = $this->pages_model->load_product_info($p_id);
			if ($pro_data) {				

			}else
			  die("Some Technical Issue");				
			$this->load->view('pages/product_info',$pro_data);
			$this->load->view('templates/footer');
		}
		public function products_in_cart()
		{
		$result = 	$this->pages_model->products_in_cart();
		echo json_encode(array('status'=>$result));
		}
		public function add_to_cart($id)
			{								
				$a=  strrpos($id,"-");
				$quantity=  substr($id,$a+1); 
				$product_id =  substr($id,0,$a);
				$data = [
  					'product_id'=>$product_id,
  					'quantity'=>$quantity,
  					'user_id'=>$this->session->userdata('id')
				];

				$result = $this->pages_model->addToCart($data);
				if ($result) {
					# code...
						echo json_encode(array('status'=>$result));
				}
		   }
		public function search()
			{								
				$item=$this->input->get('item');
								$data = [
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
				$this->load->view('templates/header',$data);
				$result = $this->pages_model->search($item);
				$data = [
					"result"=>$result,
					"item"=>$item,
					"no"=>$this->pages_model->result_count($item)
					];					

				$this->load->view('pages/result',$data);
				$this->load->view('templates/footer');	

		   }

		   public function account()
		   		  	{
		   		  		$this->load->view('templates/header');
		   		  		$this->load->view('pages/account');
		   		  		$this->load->view('templates/footer');
		   		   		# code...
 					}	

 					public function photos($p_id)
 						   	{
 						   		$pro_data = $this->pages_model->load_product_info($p_id);
 						   	 	$this->load->view('templates/header');
 						   	 	$this->load->view('pages/photos',$pro_data);
 						   	 	$this->load->view('templates/footer');
 						   	}	   	
 			public function thankyou()
 							{

include 'assets/instapay/src/instamojo.php';

$api = new Instamojo\Instamojo('5733aedc66832b31b0c224804c39a9cf', '5a81719a7b2e9d78c03d4f711e7e784c','https://www.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];


try {
    $response = $api->paymentRequestStatus($payid);
		}
		catch (Exception $e) {
    print('Error: ' . $e->getMessage());
	}

		$data = [
		"response"=> $response,
		"payid"=> $payid
		];
 			$this->load->view('templates/header');
 			$this->load->view('cart/thankyou',$data);
 			$this->load->view('templates/footer'); 		
 		}


 		public function contactus()
 						{
 			$this->load->view('templates/header');
 			$this->load->view('pages/contactus');
 			$this->load->view('templates/footer');
 						}			

 		public function developers()
 			{
 			$this->load->view('templates/header');
 			$this->load->view('pages/developers');
 			$this->load->view('templates/footer');
 			}

 		public function about()
 			{
 			$this->load->view('templates/header');
 			$this->load->view('pages/about');
 			$this->load->view('templates/footer');
 			}

 		public function faq()
 			{
 			$this->load->view('templates/header');
 			$this->load->view('pages/faq');
 			$this->load->view('templates/footer');
 			}
 		public function more($id)
 						{
			$data = [
				'id_cat'=>$id,
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'email'=>'',
		 		'email_err'=>'',
		 		'name_err'=> '',
		 		'mobile_err'=>'',
		 		'password_err'=>'',
            'cat_name'=> $this->admin_model->load_category(''),
			'sub_cat_name'=> $this->admin_model->load_sub_category(),
			'products'=> $this->pages_model->load_product(),
		 	'offer'=>$this->admin_model->load_offer()		 		
		 	];
 			$this->load->view('templates/header');
 			$this->load->view('pages/more',$data);
 			$this->load->view('templates/footer');
 						}			
	}
  