<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	public function slogin()
	{
			if($this->session->userdata('sname')){
							redirect('seller/seller_dashboard');
			}else{ 
				# code...
				if ($_SERVER['REQUEST_METHOD']=='POST') {
				$data = [
						'mobile'=>$_POST['mobile'],
						'password'=>$_POST['password'],
						'mobile_err'=>'',
						'password_err'=>''
					];
					$signin = $this->seller_model->slogin();
					if($signin=='204'){
				//	 		die("not found");
						$data['mobile_err'] = "User Not Found";
					}elseif ($signin=='203'){
				// 		die("wrong password");
						$data['mobile_err'] ="wrong password";
					}else{
					//	die("works");
						redirect(base_url().'seller/seller_dashboard');
					}

				$this->load->view('templates/cdnhead');
				$this->load->view('seller/slogin',$data);
				$this->load->view('templates/footer');
					}else{
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
				$this->load->view('templates/cdnhead');
				$this->load->view('seller/slogin',$data);
				$this->load->view('templates/footer');
			  }
			}
	}
	public function login()
	{
			if($this->session->userdata('sname')){
							redirect('seller/seller_dashboard');
			}else{
				# code...
				if ($_SERVER['REQUEST_METHOD']=='POST') {
				$data = [
						'mobile'=>$_POST['mobile'],
						'password'=>$_POST['password'],
						'mobile_err'=>'',
						'password_err'=>''
					];
					$signin = $this->seller_model->login();
					if($signin=='204'){
				//	 		die("not found");
						$data['mobile_err'] = "User Not Found";
					}elseif ($signin=='203'){
				// 		die("wrong password");
						$data['mobile_err'] ="wrong password";
					}else{
					//	die("works");
						redirect(base_url().'seller/seller_dashboard');
					}

				$this->load->view('templates/cdnhead');
				$this->load->view('seller/login',$data);
				$this->load->view('templates/footer');
					}else{
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
				$this->load->view('templates/cdnhead');
				$this->load->view('seller/login',$data);
				$this->load->view('templates/footer');
				}
			}
	}
	public function shop(){
		$this->load->view('templates/sheader');
		$this->load->view('seller/shop');
		$this->load->view('templates/footer');
	}
	public function seller_dashboard(){
		if($this->session->userdata('sname')){

		$this->load->view('templates/sheader');
		$this->load->view('seller/seller_dashboard');
		$this->load->view('templates/footer');
	}else
			redirect('seller/slogin');
	}
	public function asdb(){
		if($this->session->userdata('sname')){

		$this->load->view('templates/sheader');
		$this->load->view('seller/seller_dashboard');
		$this->load->view('templates/footer');
	}else
			redirect('seller/login');
	}
		public function shop_setup(){
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$data= [
				'shop_image'=>$_FILES['userfile']['name'],
		 		'shop_name'=>trim($_POST['shop_name']),
		 		'shop_address'=>trim($_POST['shop_address']),
		 		'shop_pin_code'=>trim($_POST['shop_pin_code']),
		 		'shop_delivery_time'=> trim($_POST['shop_delivery_time']),
		 		'shop_image_err'=> '',
		 		'shop_name_err'=>'',
		 		'shop_address_err'=>'',
		 		'shop_pin_code_err'=>'',
		 		'shop_delivery_time_err'=> ''
				];
				# validation goes here
				if (empty($data['shop_name'])) {
					$data['shop_name_err'] = "Please Enter valid Shop Name ";
				}

				if (empty($data['shop_address'])) {
					$data['shop_address_err'] = "Please Enter valid Shop Name ";
				}

				if (empty($data['shop_pin_code'])  ||  strlen($data['shop_pin_code']) != 6 ) {
					$data['shop_pin_code_err'] = "Please Enter vaild Pin Code";
				}

				if (empty($data['shop_delivery_time'])) {
					$data['shop_delivery_time_err'] = "Please Enter valid Delivery time ";
				}
				# calling the model
				if (empty($data['shop_name_err']) && empty($data['shop_address_err']) && empty($data['shop_pin_code_err']) && empty($data['shop_delivery_time_err'])) {
					#configiring the image
					if($_FILES['userfile']['name']){
		$config['upload_path']='./assets/img/seller/shop_image/';
        $config['allowed_types'] = 'gif|jpg|png|mkv|flv|mp4';
        $config['max_size'] = '99000';
        $config['max_width'] = '9500';
        $config['max_height'] = '9500';
        $config['file_name'] = $_FILES['userfile']['name'];
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload()){
            $errors = array('error'=> $this->upload->display_errors());
            $post_image = 'noimage.jpg';
           die(print_r($errors));
          }else{

          }


					}


					# code...
				$this->seller_model->shop_setup($data);
				redirect('seller/shop_products');
			}else{
				#load with errors

		$this->load->view('templates/sheader');
		$this->load->view('seller/shop_setup',$data);
		$this->load->view('templates/footer');
			}

			}else{

			$data = [
		 		'shop_image'=> '',
		 		'shop_name'=>'',
		 		'shop_address'=>'',
		 		'shop_pin_code'=>'',
		 		'shop_delivery_time'=>'',
		 		'shop_image_err'=> '',
		 		'shop_name_err'=>'',
		 		'shop_address_err'=>'',
		 		'shop_pin_code_err'=>'',
		 		'shop_delivery_time_err'=>''
		 	];
		$this->load->view('templates/sheader');
		$this->load->view('seller/shop_setup',$data); 
		$this->load->view('templates/footer');
		}
	}
	public function shop_products($value='')
	{
		$data = [
//			'cat_name'=> $this->admin_model->load_category($this->session->userdata('s_id')),
            'cat_name'=> $this->admin_model->load_category(''),
			'sub_cat_name'=> $this->admin_model->load_sub_category(),
			'products'=> $this->admin_model->load_products()
			];
		# code...

		$this->load->view('templates/sheader');
		$this->load->view('seller/shop_products',$data);
		$this->load->view('templates/footer');
			}
	 public function add_product_to_shop()
	{
			$add_pro  = $this->seller_model->add_product_to_shop();
			echo json_encode(array('status'=>$add_pro));
	}
	public function remove_product_from_shop($id)
			{
		  	$res  = $this->seller_model->remove_product_from_shop($id);
		  		echo json_encode(array('status'=>$id));
			}
}
