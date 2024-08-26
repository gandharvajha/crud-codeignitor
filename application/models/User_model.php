<?php 
class User_model extends CI_model {
    function create($formArray){
        $this->db->insert('users',$formArray);
        // INSERT INTO users(name,email, created) values (?, ?,?);
    }

    function all(){
        return $users =$this->db->get('users')->result_array(); //select * from users
    }

    function getUser($userid){
        $this->db->where('user_id',$userid);
    return  $user=$this->db->get('users')->row_array(); //Select * from users where user_id=? 
    }

    function updateUser($userId,$formArray){
        $this->db->where('user_id',$userId);
        $this->db->update('users',$formArray); // update user set name=?, email=?, where user_id=?
    }

    function deleteUser($userId){
        $this->db->where('user_id',$userId);
        $this->db->delete('users');  // DELETE from users where user_id=?
    }
}
?>