<?php

class GameListModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_games()
    {
        $query = $this->db->select('*')
            ->from("game_dtl")
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function shutdown($value, $game_id)
    {

        $this->db->where('id', $game_id);
        $this->db->set('shutdown', $value);
        $result = $this->db->update('game_dtl');
        return $result;

    }

    public function findGameS($game_id)
    {

        $query = $this->db->select('shutdown')
            ->from('game_dtl')
            ->where('id', $game_id)
            ->get();

        $result = $query->row();
        return $result->shutdown;

    }

    public function get_games($id)
    {
        $query = $this->db->select('*')
            ->from("game_dtl")
            ->where('id',$id)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}
