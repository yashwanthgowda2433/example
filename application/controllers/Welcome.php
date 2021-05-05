<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('user_id')){
			redirect('welcome/dashboard');
		}else{
		$this->load->view('headers/header');
		$this->load->view('login');
		}
	}

	public function signup()
	{
		$this->load->view('headers/header');
		$this->load->view('signup');
	}

	public function create()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array(
			'user_name' => $name,
			'email' => $email,
			'password' => $password
		);
	    if($this->db->insert('users',$data)){
			redirect('welcome/index');
		}

	}

	public function login()
	{
		//load category model
		$this->load->model("Login_model");
		$email = $this->input->post('email');
		$password = $this->input->post('password');
        // print_r($email);
	    if($this->Login_model->login($email,$password)){
			// print_r($password);die;
			redirect('welcome/index');
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('email');

		redirect('welcome/index');
		
	}

	public function dashboard()
	{
		if($this->session->userdata('user_id'))
		{
		//load category model
		$this->load->model("Login_model");

		$result=$this->Login_model->get_products();
		$data['products']=$result['records'];
		$this->load->view('headers/header',$data);
		$this->load->view('dashboard');
		}else{
			redirect('welcome/index');
		}

	}

	public function addproduct(){
		if($this->session->userdata('user_id'))
		{
		    $this->load->view('headers/header');
		    $this->load->view('addproduct');
		}else{
			redirect('welcome/index');
		}
	}

	public function add(){
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
			if($this->db->insert('product',$data))
			{
				redirect('welcome/dashboard');
			}
		}
	}

	public function edit($p_id){
		
		$this->load->model("Login_model");

		$this->load->library("form_validation");
		
		
		$this->form_validation->set_rules("name","Name", "required");
		
		if($this->form_validation->run()){
			
			if($this->Login_model->update())
			{
			    redirect("welcome/dashboard");
			}else{
				
				redirect("welcome/edit/".$p_id);
			}

		} else { 
			
			$data['product']=$this->Login_model->fetch_product($p_id);

			$this->load->view('headers/header',$data);
		    $this->load->view('edit');
		
		}
		

    }

	public function delete($p_id)
	{
		$this->db->where('product_id', $p_id);
        $this->db->delete('product');
		redirect("welcome/dashboard");

	}
}
