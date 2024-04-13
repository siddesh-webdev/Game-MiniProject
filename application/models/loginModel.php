<?php
class LoginModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function userExistCheck($email) {
        $q = $this->db->where(['email' => $email])->get('user_dtl');
        if ($q->num_rows()) {
            $user = $q->row();
            return ['id' => $user->id, 'name' => $user->name,'password'=> $user->password];
        }
    }

    
}