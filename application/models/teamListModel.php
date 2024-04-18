<?php


class TeamListModel extends CI_Model 
{
    public function __construct(){  
        parent::__construct();
     
        
    }

    public function get_all_teams(){

        $id = $this->session->userdata("id");

        $query = $this->db->select('*')
            ->where('user_id', $id)
            ->from("team_dtl")
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function fetch_gamename($id)
    {
        $query = $this->db->select('*')
            ->where('id', $id)
            ->from("game_dtl")
            ->get();
            return $query->row()->gname;
    }

    
    public function shutdown($value, $game_id)
    {

        $this->db->where('id', $game_id);
        $this->db->set('shutdown', $value);
        $result = $this->db->update('team_dtl');
        return $result;

    }

    public function findGameS($game_id)
    {

        $query = $this->db->select('shutdown')
            ->from('team_dtl')
            ->where('id', $game_id)
            ->get();

        $result = $query->row();
        return $result->shutdown;

    }

    public function get_teams($id)
    {
        $query = $this->db->select('*')
            ->from("team_dtl")
            ->where('id', $id)

            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
}


?>