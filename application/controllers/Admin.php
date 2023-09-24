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
      $this->load->library('pagination');

      $this->load->model('LoginModel');
      $config =[
        'base_url' => base_url('Admin/dashboard'),
        'per_page'=> 3,
        'total_rows' => $this->LoginModel->num_rows(),
      ];
      $this->pagination->initialize($config);
     $artical['art'] = $this->LoginModel->articallist($config,['per_page'],$this->uri->segment(3));
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
          $this->session->set_flashdata('msg','Article added successfully');
          $this->session->set_flashdata('msg_class','alert-success');
        }
        else{
          $this->session->set_flashdata('msg','Article not added ,please try again ');
          $this->session->set_flashdata('msg_class','alert-danger');
        }
      }
      else{
        $this->load->view('Admin/Add_artical.php');
      }
      return redirect ('Admin/dashboard');
    }

    public function delete(){
      $id=$this->input->post('username');
      $this->load->model('LoginModel');
        if($this->LoginModel->del($id)){
          $this->session->set_flashdata('msg','successfully deleted');
          $this->session->set_flashdata('msg_class','alert-success');
        }
        else{
          $this->session->set_flashdata('msg','please try again');
          $this->session->set_flashdata('msg_class','alert-danger');
        }
        return redirect ('Admin/dashboard');
      }

      public function editArticle(){
        $id=$this->session->userdata('name');
        $this->load->model('LoginModel');
        $rt = $this->LoginModel->findArticle($id);
        $this->load->view('Admin/Edit_Article.php' , ['article'=>$rt]);
      }


      public function Update_article($id){
       
      if( $this->form_validation->run('add_article_rules')){
        $post = $this->input->post();
        // $name= $this->session->userdata('name');
        //        $this->session->unset_userdata( $name);
        $this->load->model('LoginModel');
        if($this->LoginModel->updateArticle($post, $id)){
          $this->session->set_flashdata('msg','Article updated successfully');
          $this->session->set_flashdata('msg_class','alert-success');
        }
        else{
          $this->session->set_flashdata('msg','please try again ');
          $this->session->set_flashdata('msg_class','alert-danger');
        }
      }
      else{
        $this->load->view('Admin/editArticle.php');
      }
      return redirect ('Admin/dashboard');

        }

      }

      

?>