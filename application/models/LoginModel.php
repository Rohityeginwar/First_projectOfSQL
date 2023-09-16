<?php
class LoginModel extends CI_model{
    public function dataMatching($uname,$email,$password){
       $out = $this->db->where(['name'=>$uname,'email'=>$email,'password'=>$password])
                       ->get('data1');
        // echo '<pre>';
        //     print_r($out);
        if($out->num_rows()){
            return true;
        }
        else{
            return false;
        }
    }
}
?>