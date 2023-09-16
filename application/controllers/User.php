<?php 
class User extends CI_controller{

    public function home(){
        $this->load->view('User/form.php');
    }
    public function Signup(){
        $this->load->view('user/Signup');
    }
}
?>