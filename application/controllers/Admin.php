<?php
class Admin extends CI_controller{
    public function intro(){
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('uname','userName','required|alpha');
        $this->form_validation->set_rules('email','userEmail','required');
        $this->form_validation->set_rules('pass','password','required');
        if($this->form_validation->run()){
          // $a = $this->input->post('uname');
          $b =$this->input->post('email');
          $c =  $this->input->post('pass');
          $this->load->model('LoginModel');
          $id =$this->LoginModel->dataMatching($b,$c);
          if($id){
            $this->load->library('session');
            $this->session->set_userdata('name',$id);
            return redirect('Admin/dashboard');

          }
          else{
            $this->session->set_flashdata('login_failed','invalid password or email');
            redirect('User/home');
          }
        }
        else{
          $this->load->view('User/form.php');
        }
    }


    public function dashboard(){
      $this->load->model('LoginModel');
     $artical['art'] = $this->LoginModel->articallist();
      $this->load->view('Admin/dashboard.php',$artical);
    }

    public function logout(){
      $this->session->unset_userdata('name');
      return redirect('Admin/intro');
    }

    public function _construct(){
      parent:: _construct();
      if(!$this->session->userdata('name'));
      return redirect('Admin/intro');
    }

    public function addArtical(){
      $this->load->view('Admin/Add_artical');
    }

    public function userValidation(){
      $d=$this->form_validation->run('add_article_rules');
      if($d){
        $post = $this->input->post();
        $this->load->model('LoginModel');
        if($this->LoginModel->add_articles($post)){
          echo  'data inserted';
        }
        else{
          echo  'error';
        }
      }
      else{
        $this->load->view('Admin/Add_artical.php');
      }
    }
}
?>