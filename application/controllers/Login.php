<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('userModel');
    }

	public function index()
	{
		$username = $this->session->userdata('username');
		$data['message'] = $this->session->flashdata('message');
		
		if (empty($username)){					
			$this->load->view('login/index',$data);			
		} else {
			redirect('user/index');
		}			
    }
    
    public function validasi(){
		$finduser = $this->input->post('username');
		$password = $this->input->post('password');
		
		$row = $this->userModel->get($finduser);
		if ($row->password == $password){
									
			$this->session->set_userdata('username',$row->username);
			$this->session->set_userdata('role',$row->role);
			if($row->role == 'admin'){
				redirect('user/index');
			}else{			
			redirect('user/tester');
			}
		} else {
			$this->session->set_flashdata('message','Data tidak benar');
			redirect('Login');
		}		
	}
	
	public function logout(){
		$this->session->unset_userdata('username');		
		redirect('Login');
	}
}
