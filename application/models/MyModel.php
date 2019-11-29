<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";
    public function varify($id)
    {
      // code...
      $q  = $this->db->select('*')->from('unauth_user')->where('id',$id)->get()->row();
        if ($q) {
          // code...
          return array('status' => 201,'message' => 'User Varified',);
        }else {
          return array('status' => 401,'message' => 'User not Varified',);

        }
    }

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);

        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }
    public function register($email,$password){
            $hashed_password = md5($password);
            $password = crypt($password,$hashed_password);

           $this->db->insert('users',array('user_email' => $email,'user_current_password' => $password)) ;
           return array('status' => 200,'message' => 'Successfully Registered.');
    }

    public function login($email,$password)
    {
        $q  = $this->db->select('*')->from('users')->where('user_email',$email)->get()->row();

        if($q == ""){
            return array('status' => 203,'message' => 'Username not found.');

        } else {
            $hashed_password = $q->user_current_password;
            $id              = $q->user_id;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
               $last_login = date('Y-m-d H:i:s');
               $token = crypt(substr( md5(rand()), 0, 7));
               $expired_at = date("Y-m-d H:i:s", strtotime('+136 hours'));
               $this->db->trans_start();
              // $this->db->where('id',$id)->update('users',array('last_login' => $last_login));
              // $this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id,'auth'=>$q->auth);
               }
            } else {
            return array('status' => 203,'message' => 'wrong password.');
                exit();
            }
        }
    }

    public function logout()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id',$users_id)->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

     public function get_offer()
    {
     return $this->db->select('*')->from('offer')->order_by('offer_id','desc')->get()->result();
    }
    public function get_all_products()
    {
      return $this->db->select('*')->from('products')->get()->result();
    }
    public function search($item)
    {
        $q =$this->db->query("select `products`.*,`sub_category`.*
                         from `products`
                         INNER JOIN `sub_category`  ON `products`.`sub_cat_id` = `sub_category`.`sub_category_id`
                         WHERE   `sub_category`.`sub_category_name` LIKE '%".$item."%' OR products.product_name LIKE '%".$item."%' ");
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

    public function products_in_cart($id) 
    {
        # code..
        $no = $this->db->select('*')->from('cart_info')->where('user_id',$id)->count_all_results();
        $q = $this->db->select('*')->from('cart_info')->where('user_id',$id)->get()->result();
        $data = [
    'no_of_item'=>$no,
    'products'=>$q
        ]; 
        return $data;
    } 
    public function add_to_cart($data)
              {
                # code...
                $q = $this->db->select('*')->from('cart_info')->where($data)->get()->row();
                if ($q) {
                echo "001";

                }else{
                $this->db->insert('cart_info',$data);
                $insert_id = $this->db->insert_id();
                $msg = "Successfully product added";
                $data = [
                      'status'=>'200',
                      'msg' => $msg,
                      'card_id'=> $insert_id

                  ];
                json_output('200',$data);
                }

          }
    public function update_cart($data)
              {
                $where = [
                  'user_id'=>$data['user_id'],
                  'product_id'=>$data['product_id']
                  ];

                $this->db->where($where)->update('cart_info',$data);

                $msg = "Successfully product Updated";
                $data = [
                      'status'=>'200',
                      'msg' => $msg
                  ];
                json_output('200',$data);
          }      
    public function remove_from_cart($data)
              {
                # code...
                $q = $this->db->select('*')->from('cart_info')->where($data)->get()->row();
                if (!$q) {
                $msg = "Product already removed";
                $data = [
                      'status'=>'200',
                      'msg' => $msg

                  ];
                json_output('200',$data);

                }else{

                $this->db->where($data)->delete('cart_info');
                $msg = "Successfully product removed";
                $data = [
                      'status'=>'200',
                      'msg' => $msg

                  ];
                json_output('200',$data);
                }

          }
   public function profile($id)
            {
            $q  = $this->db->select('*')->from('users')->where('user_id',$id)->get()->row();
            return $q;
            }  


      public function profile_update($data)
                           {
                             # code...
                              $where = [
                  'user_id'=>$data['user_id']
                      ];

                $this->db->where($where)->update('users',$data);

                $msg = "Successfully Profile Updated";
                $data = [
                      'status'=>'200',
                      'msg' => $msg
                  ];
                json_output('200',$data);
                           }                     


    






















    //pending......
    public function book_all_data()
    {
        return $this->db->select('id,title,author')->from('books')->order_by('id','desc')->get()->result();
    }

    public function book_detail_data($id)
    {
        return $this->db->select('id,title,author')->from('books')->where('id',$id)->order_by('id','desc')->get()->row();
    }

    public function book_create_data($data)
    {
        $this->db->insert('books',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function book_update_data($id,$data)
    {
        $this->db->where('id',$id)->update('books',$data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function book_delete_data($id)
    {
        $this->db->where('id',$id)->delete('books');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

}
