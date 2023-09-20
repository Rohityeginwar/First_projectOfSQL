<?php
class LoginModel extends CI_model{
    public function dataMatching($email,$password){
       $out = $this->db->where(['email'=>$email,'password'=>$password])
                       ->get('data1');
         
        if($out->num_rows()){
            return $out->row()->name;
        }
        else{
            return false;
        }
    }

    public function articallist(){
        $name=$this->session->userdata('name');
        $q = $this->db->from('articles')
                  ->where(['username'=>$name])
                  ->get();
        return $q->result_array();
    }
}
?>