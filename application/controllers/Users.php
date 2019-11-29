<?php 
  /**
   * 
   */
  class Users extends CI_Controller
  {
		public function Login()
		 {
		 	if ($_SERVER['REQUEST_METHOD']=='POST') {
		 			# process form 		
		 	  }else{
		 	  	//load the form
		 	  	$data = [
		 	  		'mobile'=>'',
		 	  		'password'=>''
		 	  	];

		 	  }
		 } 
		 	public function register()
			{
				//$this->userModel = $this->model('User');
		   if ($_SERVER['REQUEST_METHOD']=='POST') {
		# process form 		
		   	$data = [
              'name' => trim($_POST['name']),
              'mobile' => trim($_POST['mobile']),
              'password' => trim($_POST['password']),
              'name_err' => '',
              'mobile_err' => '',
              'password_err' => ''
		 	];
	// Validation

      	if (empty($data['name'])) {
      		$data['name_err'] = "Please Enter your Name ";
      	}
		if (empty($data['mobile'])) {
      		$data['mobile_err'] = "Please Enter your mobile number ";
      	} elseif (!strlen($data['mobile'])==10) {
      		$data['mobile_err'] = "Check Re-check your given Mobile Number ";
      	}
      	if (empty($data['password'])) {
      		$data['password_err'] = "Please Enter your password ";
      	} elseif (strlen($data['password'])<6  || strlen($data['password'])>32) {
      		$data['password_err'] = "Password must be between 7 to 31 digits ";
      	}      
    	// Make sure all errors are empty   
      	if (empty($data['name_err']) && empty($data['password_err']) && empty($data['mobile_err'])) {
      		die("next page");
      	}else{
      		 $this->load->view("templates/header"); 
		 	 $this->load->view("users/register",$data);
		 	  $this->load->view("templates/footer");
      	}  	




      
		   }else{
		 	//load form
		 	$data = [
		 		'name'=> '',
		 		'mobile'=>'',
		 		'password'=>'',
		 		'name_err'=> '',
		 		'mobile_err'=>'',
		 		'password_err'=>''		 		
		 	];
		 	 $this->load->view("templates/header"); 
		 	 $this->load->view("users/register",$data);
		 	  $this->load->view("templates/footer");
		 	}
		}

  }