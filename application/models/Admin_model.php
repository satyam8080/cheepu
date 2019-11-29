<?php
 /**
  *
  */
 class Admin_model extends CI_Model
 {
	public function add_category($data)
	 	{
	 	 $cat_name	= $data['cat_name'];
	 	 $data = [
	 	 		'cat_name'=>$cat_name,
	 	 		's_id' => $this->session->userdata('s_id')
	 	 	];
     $this->session->set_flashdata('cat_add','Category Added');
	 	 $this->db->insert('catogory',$data);
	 }
	 	public function imgname($image)
	 {
	 		# code...	
	 		 $a=  strrpos($image,".");
             $q=  substr($image,$a);
             $a = strrev($image);
             $b = strrpos($image,".");
             $p = substr($a,strlen($b)+1);
             $o = url_title(strrev($p));

             return $o.$q;

	 	}
	public function add_product($data)
	 {

	 	
	 	$post_image = $data['userfile'];
	 	$post_image2 = $data['userfile2'];
	 	$post_image3 = $data['userfile3'];
	 	$post_image4 = $data['userfile4'];
	 	$post_image5 = $data['userfile5'];

	 	$data = [
	 			's_id'=>$this->session->userdata('s_id'),
				'product_name'=>trim($_POST['product_name']),
				'sub_cat_id'=>trim($_POST['sub_cat_id']),
				'sku'=>	trim($_POST['sku']),
				'product_image'=>base_url().'assets/img/products/'.$post_image,
				'product_image2'=>base_url().'assets/img/products/'.$post_image2,
				'product_image3'=>base_url().'assets/img/products/'.$post_image3,
				'product_image4'=>base_url().'assets/img/products/'.$post_image4,
				'product_image5'=>base_url().'assets/img/products/'.$post_image5,

				'type'=>trim($_POST['type']),
				's_p'=>$_POST['s_p'],
				'm_r_p'=>$_POST['m_r_p'],
				'description'=>$_POST['description'],
		];
		$product = $data;
    $this->session->set_flashdata('pro_add','Product Added');
		$this->db->insert('products',$product);

	 }
	public function edit_product($pro_id , $data)
	 {
	 	$post_image = $data['userfile'];
	 	$post_image2 = $data['userfile2'];
	 	$post_image3 = $data['userfile3'];
	 	$post_image4 = $data['userfile4'];
	 	$post_image5 = $data['userfile5'];

	 	$data = [
	 			's_id'=>$this->session->userdata('s_id'),
				'product_name'=>trim($_POST['product_name']),
				'sub_cat_id'=>trim($_POST['sub_cat_id']),
				'sku'=>	trim($_POST['sku']),
				'product_image'=>base_url().'assets/img/products/'.$post_image,
				'product_image2'=>base_url().'assets/img/products/'.$post_image2,
				'product_image3'=>base_url().'assets/img/products/'.$post_image3,
				'product_image4'=>base_url().'assets/img/products/'.$post_image4,
				'product_image5'=>base_url().'assets/img/products/'.$post_image5,

				'type'=>trim($_POST['type']),
				's_p'=>$_POST['s_p'],
				'm_r_p'=>$_POST['m_r_p'],
				'description'=>$_POST['description'],
		];
		$product = $data;
    $this->session->set_flashdata('pro_add','Product Updated');
    	$this->db->where('product_id', $pro_id);
 	    $this->db->update('products',$product);
	 }	 	 
	 public function add_sub_category()
	 {

	 		 $a=  strrpos($_FILES['userfile']['name'],".");
             $q=  substr($_FILES['userfile']['name'],$a);
             $a = strrev($_FILES['userfile']['name']);
             $b = strrpos($_FILES['userfile']['name'],".");
             $p = substr($a,strlen($b)+1);
             $o = url_title(strrev($p));

             $post_image =	$o.$q;
	 	$data = [
	 			's_id'=>$this->session->userdata('s_id'),
		 		'sub_category_name'=>trim($_POST['sub_category_name']),
				'category_id'=>$_POST['cat_id'],
				'sub_cat_img'=>base_url().'assets/img/seller/subCat/'.$post_image
					];
    $this->session->set_flashdata('sub_cat_add','SubCategory Added');
		$this->db->insert('sub_category',$data);

	 }
	 public function add_offer($data)
	 {
		$offer = [
		'offer_image' => $data['offer_image']
	];
		$this->db->insert('offer',$offer);

	 }

	 public function load_category($value)
	  	{
	  		# load all categories
	  		if($value == ''){
	  		$q  = $this->db->select('*')->from('catogory')->get()->result();
	  		return $q;
	  		}else{
	  			$q  = $this->db->select('*')->from('catogory')->where('s_id',$this->session->userdata('s_id'))->get()->result();
	  			return $q;
	  			}
	  	}
	public function load_sub_category()
	  	{
	  		# load all categories
	  		$q  = $this->db->select('*')->from('sub_category')->get()->result();
	  		return $q;
	  	}
	public function load_products()
	  	{
	  		# load all categories
	  		$q  = $this->db->select('*')->from('products')->where('s_id',$this->session->userdata('s_id'))->get()->result();
	  		return $q;
	  	}
	public function load_product_By_Id($pro_id)
	  	{
	  		# load all categories
	  		$q  = $this->db->select('*')->from('products')->where('product_id',$pro_id)->get()->row();
	  		return $q;
	  	}  	
	public function load_offer()
	  	{
	  		# load all categories
	  		$q  = $this->db->select('*')->from('offer')->get()->result();
	  		return $q;
	  	}
	  	public function delete_product($id)
	  	{
	  		# code...
	  		$data = [
				'product_id'=>$id
				];
				$this->db->where('product_id', $id);
				$this->db->delete('products');
				return 1;	
	  	}

	  	public function your_order()
	  	{
	  		//$sid = $this->session->userdata('s_id');
	  		$sid = [
				's_id'=>$this->session->userdata('s_id')
				];


	  		//$product = $this->db->select('*')->from('order_info')->where('seller_id',$sid)->get()->result();

	  		$product = $this->db->query("select  `order_info`.* , `users`.* , `products`.*
                         from `users`
                         INNER JOIN `order_info`  ON `users`.`user_id` = `order_info`.`user_id` 
                         INNER JOIN `products` ON `order_info`.`product_id`=`products`.`product_id`
                          WHERE `order_info`.`seller_id` = ".$sid['s_id']. " AND `order_info`.`status`= 0 ");

	  		
	  		if($product->num_rows() > 0){
						return $product->result();
					}
				else {
					return 0;
				}
	  	}

	  	public function orders_from_users() 
	{
		# code...
		$data = [
			'seller_id' => $this->session->userdata('s_id'),
			'status' => 0
		];
		$q = $this->db->select('*')->from('order_info')->where($data)->count_all_results();
		return $q;
	}

		public function update_order_status($id)
		{
			# code..
			$data = [
				'status' => 1
			];
			$where = [
                  'id'=>$id
                  ];

                $this->db->where($where)->update('order_info',$data);

                return 1;

		} 

		public function order_proceed()
		{
				$sid = [
				's_id'=>$this->session->userdata('s_id')
				];


	  		//$product = $this->db->select('*')->from('order_info')->where('seller_id',$sid)->get()->result();

	  		$product = $this->db->query("select  `order_info`.* , `users`.* , `products`.*
                         from `users`
                         INNER JOIN `order_info`  ON `users`.`user_id` = `order_info`.`user_id` 
                         INNER JOIN `products` ON `order_info`.`product_id`=`products`.`product_id`
                          WHERE `order_info`.`seller_id` = ".$sid['s_id']. " AND `order_info`.`status`= 1 ");

	  		
	  		if( $product->num_rows() > 0 ) {
						return $product->result();
					}
					else {
						return 0;
					}
		}
}
