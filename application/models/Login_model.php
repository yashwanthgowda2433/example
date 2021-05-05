<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($email,$password){
        $query=$this->db->query("select user_id, user_name, email from users where email=? and password=?", array($email, $password));
        $result=$query->row_array();
        // print_r($result)

        if($result){

          //set Session
          $this->session->set_userdata($result);

        //   print_r($result);die;
        //   print_r($this->session->userdata('user_id'));die;

          return true;

        } else {

          return false;

        }
    }

    public function get_products()
    {
      $query=$this->db->query("select u.*,users.* from product u join users ON users.user_id = u.user_id");
        $results=$query->result_array();

        $data['records']=$results;
        return $data;
    }

    public function fetch_product($pid)
    {
      $query=$this->db->query("select u.*,users.* from product u join users ON users.user_id = u.user_id where u.product_id=?", array($pid));
        $result=$query->row_array();

        return $result;
    }

    public function update()
    {
      $p_id = $this->input->post('pid');
      $filename = $_FILES['files']['name'];
        $file_tmp = $_FILES['files']['tmp_name'];
        $dir = 'image/';
        // $location = $dir.''.$path;
        // $imagepath = $path.'/'.$filename;
        
        if (move_uploaded_file($file_tmp, $dir.$filename)) {
            $location = $dir.''.$filename;

		        $data = array(
				      'user_id' => $this->session->userdata('user_id'),
				      'p_name' => $this->input->post('name'),
				      'p_description' => $this->input->post('description'),
				      'p_img' => $location

			      );
          }else{
          $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'p_name' => $this->input->post('name'),
            'p_description' => $this->input->post('description')

          );
         }
         if($this->db->update("product", $data, array("product_id"=>$p_id)))
         {
        return true;
  
         }
    }
}?>