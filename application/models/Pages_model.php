<?php 
	/**
	 * 
	 */
	class Pages_model extends CI_Model
	{
		
		function __construct() 
		{
			parent::__construct();
		}
		public function register($data){
	
			$this->db->insert($this->input->post('type'),$data);
			return $insert_id = $this->db->insert_id(); 

		}
		function findUserById($mobile){
			$query = $this->db->get_where('users',array('user_mobile'=>$mobile));
 			if($query->row_array()>0){
 			return true;
 			} 
		}
		public function get_user_info()
		{
			# code...
			$query = $this->db->get_where('users',array('user_id'=>$this->session->userdata('id')));
 			
 			}	
		
		public function login(){
			if ($this->input->post('type')=='users') {
				# code...
			$user_mobile = $this->input->post('mobile'); 
			$password = $this->input->post('password');
			$type = $this->input->post('type');
			$hashed_password = md5($password);
			$user_current_password=crypt($password, $hashed_password);
		    $q  = $this->db->select('*')->from($type)->where('user_mobile',$user_mobile)->get()->row();
		if($q=='' || $q->user_current_password != $user_current_password)       
       	 return 103;
        else{
        	$this->session->set_userdata('name',$q->user_name);
        	$this->session->set_userdata('id',$q->user_id);
        	$this->session->set_userdata('type',"user");
        	$this->session->set_userdata('user_pic',$q->user_pic);
        	$this->session->set_userdata('email',$q->user_email);
        	$this->session->set_userdata('mobile',$q->user_mobile);
         	return "users";
        }
			}elseif ($this->input->post('type')=='seller_info') {
			$seller_mobile = $this->input->post('mobile');
			$password = $this->input->post('password');
			$type = $this->input->post('type');
			$hashed_password = md5($password);
			$seller_current_password=crypt($password, $hashed_password);
		    $q  = $this->db->select('*')->from($type)->where('seller_mobile',$seller_mobile)->get()->row();
		if($q=='')       
       	 return false;
        else{
        		$p  = $this->db->select('*')->from('shop_info')->where('seller_id',$q->seller_id)->get()->row();
        		if($p==''){
        						$this->session->set_userdata('new','yes');
        		}else{
        						$this->session->set_userdata('new','no');
        			        	$this->session->set_userdata('shop_pin_code',$p->shop_pin_code);	
        			        	$this->session->set_userdata('shop_id',$p->seller_shop_id);	
        		}

        	$this->session->set_userdata('sname',$q->seller_name);
        	$this->session->set_userdata('sid',$q->seller_id);
        	$this->session->set_userdata('type',"seller");
         	return "seller_info";

        		}
			}
		}

			public function load_banner(){
				$banner = $this->db->select('*')->from('products')->get()->result();
				return $banner;
			}

		public function load_product(){
				$banner = $this->db->select('*')->from('products')->get()->result();
				return $banner;
			}
	    public function load_product_info($id)
		{
			# code...
		$q  = $this->db->select('*')->from("products")->where('product_id',$id)->get()->row();
		if($q=='')       
       	 return false;
       else{

        	return $q;	
 	       }
			
	}
	public function products_in_cart() 
	{
		# code...
		$q = $this->db->select('*')->from('cart_info')->where('user_id',$this->session->userdata('id'))->count_all_results();
		return $q;
	}
	public function addToCart($data)
		{
			# code...
			$check1 = [
				'product_id'=>$data['product_id']
				];
			$s_id = $this->db->select('s_id')->from('products')->where($check1)->get()->row();	
				
				$check = [
				'user_id'=>$data['user_id'],
				'product_id'=>$data['product_id'],
				'seller_id'=>$s_id->s_id
				];

			$q = $this->db->select('*')->from('cart_info')->where($check)->get()->row();
		
			$data['seller_id'] = $s_id->s_id; 
			if ($q) {
				return "001";
			}else{
				$this->db->insert('cart_info',$data);
				return $insert_id = $this->db->insert_id();
			}
			

		}
	public function product_from_cart()
		{
			# code...

			$check = [
				'user_id'=>$this->session->userdata('id')
				];
					$q =$this->db->query("select `products`.*,`cart_info`.*
                         from `products` 
                         INNER JOIN `cart_info`  ON `products`.`product_id` = `cart_info`.`product_id`
                         WHERE `cart_info`.`user_id` = ".$check['user_id']);

			// die(print_r($q->result_array()));
			if($q->num_rows() > 0){
						return $q->result();
					}		
		}	
		public function removeFromCart($cart_id)
		{
			# code...
			$data = [
				'cart_id'=>$cart_id
				];
				$this->db->where('cart_id', $cart_id);
				$this->db->delete('cart_info');
				
			return true;
		}
		public function search($item)
			{
				# code...
					$q =$this->db->query("select `products`.*,`sub_category`.*
                         from `products`
                         INNER JOIN `sub_category`  ON `products`.`sub_cat_id` = `sub_category`.`sub_category_id`
                         WHERE   `sub_category`.`sub_category_name` LIKE '%".$item."%' OR products.product_name LIKE '%".$item."%' ");
                        // die($item);
					//	die(print_r($q->result()));
						return $q->result();
			}
		public function result_count($item)
			{
				# code...
						$q =$this->db->query("select `products`.*,`sub_category`.*
                         from `products`
                         INNER JOIN `sub_category`  ON `products`.`sub_cat_id` = `sub_category`.`sub_category_id`
                         WHERE   `sub_category`.`sub_category_name` LIKE '%".$item."%' OR products.product_name LIKE '%".$item."%' ");
						//die(print_r($q->result()));
						return $q->num_rows();
			}
}	 