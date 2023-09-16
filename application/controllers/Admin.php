<?php
class Admin extends CI_controller{
    public function intro(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname','userName','required|alpha');
        $this->form_validation->set_rules('email','userEmail','required');
        $this->form_validation->set_rules('pass','password','required');
        if($this->form_validation->run()){
          $a = $this->input->post('uname');
          $b =$this->input->post('email');
          $c =  $this->input->post('pass');
          $this->load->model('LoginModel');
          if($this->LoginModel->dataMatching($a,$b,$c)){
            echo 'details matched';
          }
          else{
            echo 'details not match';
          }
        }
        else{
          $this->load->view('User/form.php');
        }
    }
}
?>