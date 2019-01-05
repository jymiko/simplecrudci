<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class userModel extends CI_Model {

    public function get($username)
	{	
		$this->db->where('username',$username);
		$query = $this->db->get('users');
		return $query->row();		
  }
  
  public function view(){
    return $this->db->get('users')->result();
  }
  
  public function view_by($id){
    $this->db->where('id', $id);
    return $this->db->get('users')->row();
  }

  

  public function validation($mode){
    $this->load->library('form_validation');

    if($mode == "save")
      $this->form_validation->set_rules('input_username', 'Username', 'required');
      $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
      $this->form_validation->set_rules('input_email', 'Email', 'required');
      $this->form_validation->set_rules('input_password', 'Password', 'required');
      $this->form_validation->set_rules('input_telp', 'Telp', 'required|numeric|max_length[15]');
      $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
        
    if($this->form_validation->run()) 
      return TRUE; 
    else 
      return FALSE; 
  }
  
  
  public function save($data){
    
    $this->db->insert('users', $data); 
  }
  

  public function edit($id,$data){
    $row = $this->db->where('username',$id)->get('users')->row();
    unlink('./uploads/'.$row->photo);
    $this->db->where('username', $id);
    $this->db->update('users', $data);
  }
  
  
  public function delete($id){
    $row = $this->db->where('id',$id)->get('users')->row();
    unlink('./uploads/'.$row->photo);
    $this->db->where('id', $id);
    $this->db->delete('users'); 
  }
}