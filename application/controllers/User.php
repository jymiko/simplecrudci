<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('userModel');
    $this->msg = $this->session->flashdata('message');

    $this->username = $this->session->userdata('username');		
    
    if (empty($this->username)){
        $this->session->set_flashdata('message','Login dulu');
        redirect('Login');			
    }
  }
  
  public function index(){
    $data['username'] = $this->session->userdata('username');
    $data['users'] = $this->userModel->view();
    $this->load->view('user/index', $data);
  }
  
  public function do_upload()
  {
          $data = array(
            "username" => $this->input->post('input_username'),
            "name" => $this->input->post('input_nama'),
            "email" => $this->input->post('input_email'),
            "password" => $this->input->post('input_password'),
            "address" => $this->input->post('input_alamat'),
            "phone_number" => $this->input->post('input_telp'),
            "photo" => $_FILES['upload_foto']['name'],
            "role" => $this->input->post('dropdown_role')
          );
          $config['upload_path']          = './uploads/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 400;
          $config['max_width']            = 1024;
          $config['max_height']           = 768;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('upload_foto'))
          {
                  $error = array('error' => $this->upload->display_errors());

                  $this->load->view('user/form_tambah', $error);
          }
          else
          {
                  $upload_data = $this->upload->data();
                  $data['photo'] = $upload_data['file_name'];

                  $this->load->view('user/index', $data);
          }
          $this->userModel->save($data);
  }

  public function do_upload_edit()
  {
          $data = array(
            "username" => $this->input->post('input_username'),
            "name" => $this->input->post('input_nama'),
            "email" => $this->input->post('input_email'),
            "password" => md5($this->input->post('input_password')),
            "address" => $this->input->post('input_alamat'),
            "phone_number" => $this->input->post('input_telp'),
            "photo" => $_FILES['upload_foto']['name'],
            "role" => $this->input->post('dropdown_role')
          );
          $config['upload_path']          = './uploads/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 400;
          $config['max_width']            = 1024;
          $config['max_height']           = 768;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('upload_foto'))
          {
                  $error = array('error' => $this->upload->display_errors());

                  $this->load->view('user/form_ubah', $error);
          }
          else
          {
                  $upload_data = $this->upload->data();
                  $data['photo'] = $upload_data['file_name'];

                  $this->load->view('user/index', $data);
          }
          $this->userModel->edit($data['username'],$data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){
      if($this->userModel->validation("save")){ 
        $this->do_upload();
        redirect('user');
      }
    }
    
    $this->load->view('user/form_tambah');
  }
  
  public function ubah($id){
    if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      if($this->userModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->do_upload_edit();
        redirect('user');
      }
    }
    
    $data['users'] = $this->userModel->view_by($id);
    $this->load->view('user/form_ubah', $data);
  }
  
  public function hapus($nis){
    $this->userModel->delete($nis); // Panggil fungsi delete() yang ada di SiswaModel.php
    redirect('user');
  }

  public function tester(){
    $this->load->view('tester');
  }
}