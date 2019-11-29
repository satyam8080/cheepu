 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_zone extends CI_Controller {

	public function dboard(){
		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/dboard");
		$this->load->view("templates/footer");
	}
	public function add_catogory(){
		if($this->session->userdata('sname')){
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$data = [
			'cat_name'=>trim($_POST['cat_name']),
			'cat_name_err'=>''
				];
		if ($this->admin_model->add_category($data)) {
			# code...
		}
					redirect('admin_zone/add_catogory');

		}else{

		$data = [
			'cat_name'=>'',
			'cat_name_err'=>''
				];
		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/add_catogory",$data);
		$this->load->view("templates/footer");
		}

		}else{
			redirect('seller/slogin');
		} 

	}
	public function add_sub_catogory()
	{
	if($this->session->userdata('sname')){
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			# code...
			$data = [
		 		'sub_category_name'=>trim($_POST['sub_category_name']),
				'cat_id'=>$_POST['cat_id'],
				'sub_category_err'=>'',
				'cat_id_err'=>'',
				'sub_category_img'=>url_title($_FILES['userfile']['name']),
				'product_image_err'=>'',
				'cat_name'=> $this->admin_model->load_category(0)
		 	];
		 		//after all vaidatiom
		 	 $new_name = time();
	 		 $a= strrpos($_FILES['userfile']['name'],".");
             $q=substr($_FILES['userfile']['name'],$a);
             $post_image =  $new_name.".".$q;
		$config['upload_path']='./assets/img/seller/subCat/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '99000';
        $config['max_width'] = '9500';
        $config['max_height'] = '9500';
        $a=  strrpos($_FILES['userfile']['name'],".");
             $q=  substr($_FILES['userfile']['name'],$a);
             $a = strrev($_FILES['userfile']['name']);
             $b = strrpos($_FILES['userfile']['name'],".");
             $p = substr($a,strlen($b)+1);
             $o = url_title(strrev($p));

             $post_image =	$o.$q;

        $config['file_name'] = $post_image;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload()){
            $errors = array('error'=> $this->upload->display_errors());
            $post_image = 'noimage.jpg';
           die(print_r($errors));

          }else{
          		$this->admin_model->add_sub_category($data);
		 	$data = [
		 		'sub_category_name'=>'',
				'cat_id'=>'',
				'sub_category_err'=>'',
				'cat_id_err'=>'',
				'product_image_err'=>'',
				'cat_name'=> $this->admin_model->load_category(0)
		 		];
          }
		 		redirect('admin_zone/add_sub_catogory');
		}else{
			#load the form normally blank
		 $data = [
		 		'sub_category_name'=>'',
				'cat_id'=>'',
				'sub_category_err'=>'',
				'cat_id_err'=>'',
				'product_image_err'=>'',
				'cat_name'=> $this->admin_model->load_category(0)
		 	];
		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/add_sub_catogory",$data);
		$this->load->view("templates/footer");
		}
				}else{
			redirect('seller/slogin');
		}
	}
	public function add_product()
		{
	if($this->session->userdata('sname')){
		if($_SERVER['REQUEST_METHOD']=='POST') {
				$data = [
				'product_name'=>trim($_POST['product_name']),
				'sub_cat_id'=>trim($_POST['sub_cat_id']),
				'sku'=>	trim($_POST['sku']),

				'isbn'=>trim($_POST['isbn']),
				'type'=>trim($_POST['type']),
				's_p'=>$_POST['s_p'],
				'm_r_p'=>$_POST['m_r_p'],
				'description'=>$_POST['description'],
				'edition'=>$_POST['edition'],
				'language'=>$_POST['language'],
				'author'=>$_POST['author'],
				'product_name_err'=>'',
				'sub_cat_id_err'=>'',
				'product_image_err'=>'',
				'isbn_err'=>'',
				'sku_err'=>'',
				'sub_cat_name'=> $this->admin_model->load_sub_category(0),
				'cat_name'=> $this->admin_model->load_category(0)
				];
		//data is coming
	$this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['userfile']['name']= $this->admin_model->imgname($files['userfile']['name'][$i]);
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        if(!$this->upload->do_upload()){
            $errors = array('error'=> $this->upload->display_errors());
            $post_image = 'noimage.jpg';
           die(print_r($errors));
          }
        $dataInfo[] = $this->upload->data();
    }
      $data = array( 
        'userfile' => $dataInfo[0]['file_name'],
        'userfile2' => $dataInfo[1]['file_name'],
        'userfile3' => $dataInfo[2]['file_name'],
        'userfile4' => $dataInfo[3]['file_name'],
        'userfile5' => $dataInfo[4]['file_name']
     ); 	

          //calling model after validation of data
		$this->admin_model->add_product($data);
		redirect("admin_zone/add_product");        
          //after valid	

           	

		}else{
			//load the form
			$data = [
				'isbn'=>'',
				'sku'=>	'',
				'product_name'=>'',
				'sub_cat_id'=>'',
				'product_image'=>'',
				'product_name_err'=>'',
				'cat_id_err'=>'',
				'product_image_err'=>'',
				'edition'=>'',
				'language'=>'',
				'author'=>'',				
				'sub_cat_name'=> $this->admin_model->load_sub_category(0),
				'cat_name'=> $this->admin_model->load_category(0)
				];

		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/add_product",$data);
		$this->load->view("templates/footer");
		}
				}else{
			redirect('seller/slogin');
		}
	}
private function set_upload_options()
{   
    //upload an image options
    $config = array();
    $config['upload_path'] = './assets/img/products';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
}

	/*edit product*/	
	public function edit_product($pro_id)
	{
	if($this->session->userdata('sname')){
	 $pro = $this->admin_model->load_product_By_Id($pro_id);
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$data = [
				'product_name'=>trim($_POST['product_name']),
				'sub_cat_id'=>trim($_POST['sub_cat_id']),
				'sku'=>	trim($_POST['sku']),
				'product_image'=>url_title($_FILES['userfile']['name']),
				'type'=>trim($_POST['type']),
				's_p'=>$_POST['s_p'],
				'm_r_p'=>$_POST['m_r_p'],
				'isbn'=>$_POST['isbn'],				
				'edition'=>$_POST['edition'],
				'language'=>$_POST['language'],
				'author'=>$_POST['author'],				
				'description'=>$_POST['description'],
				'product_name_err'=>'',
				'sub_cat_id_err'=>'',
				'product_image_err'=>'',
				'sub_cat_name'=> $this->admin_model->load_sub_category(0),
				'cat_name'=> $this->admin_model->load_category(0)
				];
	$this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['userfile']['name']= $this->admin_model->imgname($files['userfile']['name'][$i]);
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        if(!$this->upload->do_upload()){
            $errors = array('error'=> $this->upload->display_errors());
            $post_image = 'noimage.jpg';
           die(print_r($errors));
          }
        $dataInfo[] = $this->upload->data();
    }
      $data = array(
 
        'userfile' => $dataInfo[0]['file_name'],
        'userfile2' => $dataInfo[1]['file_name'],
        'userfile3' => $dataInfo[2]['file_name'],
        'userfile4' => $dataInfo[3]['file_name'],
        'userfile5' => $dataInfo[4]['file_name']
     ); 	

          //calling model after validation of data
		$this->admin_model->edit_product($pro_id,$data);
		redirect("admin_zone/add_product");        
      
			}else{
			$data = [
				'product_id'=>$pro->product_id,
				'sku'=>$pro->sku,
				'product_name'=>$pro->product_name,
				'sub_cat_id'=>'',
				'product_image'=>$pro->product_image,
				'product_name_err'=>'',
				'cat_id_err'=>'',
				's_p'=>$pro->s_p,
				'm_r_p'=>$pro->m_r_p,
				'description'=>$pro->description,
				'isbn'=>$pro->isbn,				
				'edition'=>$pro->edition,
				'language'=>$pro->language,
				'author'=>$pro->author,				
				'product_image_err'=>'',
				'sub_cat_name'=> $this->admin_model->load_sub_category(0),
				'cat_name'=> $this->admin_model->load_category(0)
				];
				
				$this->load->view("templates/sheader");
				$this->load->view("admin_zone/edit_product",$data);
				$this->load->view("templates/footer");
			}

	}else{
			redirect('seller/slogin');
		}
	}
	public function add_offer()
	{
		if ($_SERVER['REQUEST_METHOD']=='POST') {
		$data = [
					'offer_image' => base_url().'assets/img/offer/'.$_FILES['userfile']['name'],
					'offer_image_err'=>''
				];
			if (!empty($data['offer_image'] )) {

			 $new_name = time();
	 		 $a= strrpos($_FILES['userfile']['name'],".");
             $q=substr($_FILES['userfile']['name'],$a);
             $post_image =  $new_name.".".$q;
		$config['upload_path']='./assets/img/offer/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '99000';
        $config['max_width'] = '9500';
        $config['max_height'] = '9500';
        $a=  strrpos($_FILES['userfile']['name'],".");
             $q=  substr($_FILES['userfile']['name'],$a);
             $a = strrev($_FILES['userfile']['name']);
             $b = strrpos($_FILES['userfile']['name'],".");
             $p = substr($a,strlen($b)+1);
             $o = url_title(strrev($p));

             $post_image =	$o.$q;

        $config['file_name'] = $post_image;


        $this->load->library('upload',$config);
        if(!$this->upload->do_upload()){
            $errors = array('error'=> $this->upload->display_errors());
            $post_image = 'noimage.jpg';
           die(print_r($errors));
       }else{
			$this->admin_model->add_offer();      
			redirect('admin_zone/add_offer'); 	
       	}
			}else
			 {
			 	$data['offer_image_'] = "NO image selected";
			 	$this->load->view("templates/sheader");
				$this->load->view("admin_zone/add_offer",$data);
				$this->load->view("templates/footer");
			 }
	}else{
		$data = [
					'offer_image' => '',
					'offer_image_err'=>''
				];
		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/add_offer",$data);
		$this->load->view("templates/footer");
		}
	}
	 public function load_offer()
	{
		return load_offer();
	}
	public function delete_product($value)
	{	
		$this->admin_model->delete_product($value);
		redirect('seller/shop_products');
	}
	public function Your_Order(){
		$order = $this->admin_model->your_order();

		if ($order < 1) {
			
			$this->load->view("templates/sheader");
		$this->load->view("seller/no_order");
		$this->load->view("templates/footer");

		}
		else {
		$data = [
			'order'=>$order
			];

		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/your_order",$data);
		$this->load->view("templates/footer");
	}
	}

	public function dispatch($id)
	{
		# code...
		/* $data = [
		    	'user_id'=>$user_id,
		    	'product_id'=> $product_id, 
		    	'quantity'=>$quantity
		    	] ; 	*/
		       	
		$q = $this->admin_model->update_order_status($id);		
				
        
		$this->load->view("templates/sheader");
		$this->load->view("admin_zone/dispatch");
		$this->load->view("templates/footer");
	}

	public function order_proceed()
	{
		$order = $this->admin_model->order_proceed();

		if ($order < 1 ) {
		$this->load->view("templates/sheader");
		$this->load->view("seller/no_order");
		$this->load->view("templates/footer");
		}
		else {
		$data = [
			'order'=>$order
			];

		$this->load->view("templates/sheader");
		$this->load->view("seller/order_proceed",$data);
		$this->load->view("templates/footer");
		}
	}
}



         