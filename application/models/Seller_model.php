<?php
 class Seller_model extends CI_Model
 {
   public function login()
  	{
  		# code...
  			$data = [
 		 		'seller_mobile'=>$_POST['mobile'],
 		 		'seller_current_password'=>$_POST['password']
 		 	];
 		 //data checked here
 		  $q  = $this->db->select('*')->from('seller_info')->where('seller_mobile',$data['seller_mobile'])->get()->row();
 		    if($q == "" || $q->seller_current_password != $data['seller_current_password']){
             return '204';
         	}else{
 	        $this->session->set_userdata('sname',$q->seller_name);
          $this->session->set_userdata('s_id',$q->seller_id);
         	$this->session->set_userdata('a','a');
         }
  	}
 	public function slogin()
 	{
 		# code...
 			$data = [
		 		'seller_mobile'=>$_POST['mobile'],
		 		'seller_current_password'=>$_POST['password']
		 	];
		 //data checked here
		  $q  = $this->db->select('*')->from('seller_info')->where('seller_mobile',$data['seller_mobile'])->get()->row();
		    if($q == "" || $q->seller_current_password != $data['seller_current_password']){
            return '204';
        	}else{
	        $this->session->set_userdata('sname',$q->seller_name);
        	$this->session->set_userdata('s_id',$q->seller_id);
        }
 	}

 	public function shop_setup($data)
 	{
 		$s_details = [
 			'shop_image'=>$data['shop_image'],
		 	'shop_name'=>$data['shop_name'],
		 	'seller_id'=> $this->session->userdata('sid'),
		 	'shop_address'=>$data['shop_address'],
		 	'shop_pin_code'=>$data['shop_pin_code'],
		 	'shop_delivery_time'=>$data['shop_delivery_time']
 		];
 		//data will be inserted here
		$this->db->insert('shop_info',$s_details);
		// code to create sesion for shop info
		 $q  = $this->db->select('*')->from('shop_info')->where('seller_id',$this->session->userdata('sid'))->get()->row();

		    $this->session->set_userdata('shop_id',$q->seller_name);
        	$this->session->set_userdata('shop_pin_code',$data['shop_pin_code']);

 	}
 	public function add_product_to_shop()
 	{
		$data1 = [
			's_p'=>$this->input->post('price'),
			'sub_cat_id'=>$this->input->post('sub_category_id')
			];

		$product_id=$this->input->post('product_id');

		 $this->db->where('product_id', $product_id);
 	    $this->db->update('products',$data1);
		return true;

 	}

 	public function remove_product_from_shop($q)
 	{
 		# code...
 		if($this->db->delete('products', array('product_id' => $q)))
 		return true;
 		else
 		return false;
 	}


 }
