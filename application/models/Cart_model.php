<?php 
	/**
	 * 
	 */
	class Cart_model extends CI_Model
	{
		public function add_order_address()
		{ 
			# code...
		$q = $this->db->select('*')->from('order_info')->count_all_results();
		$q++;
			$n = $this->pages_model->product_from_cart();
				foreach ($n as $n) {
	 			$data = [
				'product_id'=>$n->product_id,
				'seller_id'=>$n->seller_id,	
				'order_id'=>$q,
				'address'=>$this->input->post('address'),
				'landmark'=>$this->input->post('landmark'),
				'city'=>$this->input->post('city'),
				'pin_code'=>$this->input->post('pin_code'),
				'state'=>$this->input->post('state'),
				'user_id'=>$this->session->userdata('id')
				];
			$this->db->insert('order_info',$data);
			 $order_id = $this->db->insert_id();
			 $this->session->set_userdata('order_id',$order_id);	
			}
			return true;	
		} 
	}
?>