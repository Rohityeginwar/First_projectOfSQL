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

    public function articallist($limit,$offset){
        $name=$this->session->userdata('name');
        $q = $this->db->from('articles')
                    ->where(['username'=>$name])
                    // ->limit($limit,$offset)
                  ->get();
        return $q->result_array();
    }

    public function add_articles($array){
       return $this->db->insert('articles',$array);
    }

    public function del($id){
        return $this->db->delete('articles',['username'=>$id]);
    }

    public function num_rows(){
        $id = $this->session->userdata('name');
        $this->db->from('articles')
                ->where(['username'=>$id])
                ->get();
    }

    public function findArticle($name){
        $q = $this->db->select(['article_title','article_body','username'])
                ->where('username',$name)
                ->get('articles');
                return $q->row();
    }

    public function updateArticle($id,Array $article){
        return $this->db->where('name',$id)
               ->update('articles',$article);
    }
}
?>