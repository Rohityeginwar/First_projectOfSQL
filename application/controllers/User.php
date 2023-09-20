<?php 
class User extends CI_controller{

    public function _construct(){
        parent:: _construct();
        if($this->session->userdata('name'));
        return redirect('Admin/intro');
    }

    public function home(){
        $this->load->view('User/form.php');
    }
    public function Signup(){
        $this->load->view('/User/Signup');

    }
    

}
?>