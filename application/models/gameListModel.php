<?php

class GameListModel extends CI_Model{

    public function __construct(){  
        parent::__construct();
    }


    public function get_all_games(){
        $query = $this->db->select('*')
        ->from("game_dtl")
        ->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
}