<?php

class Common extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function fetch_date($game_id)
    {
        $id = $game_id;
        $this->db->select("from_date, to_date");
        $this->db->from("game_dtl");
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_country()
    {
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("countries");
        return $query->result();

    }

    function fetch_state($country_id, $state_id = null)
    {

        $this->db->where("country_id", $country_id);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("states");
        $output = '<option value="">Select State</option>';
        foreach ($query->result() as $row) {
            $sel = '';
            if (!empty($state_id) && isset($state_id)) {
                $sel = ($row->id == $state_id) ? 'selected' : '';
            }
            $output .= '<option value ="' . $row->id . '" ' . $sel . '>' . $row->name . '</option>';
        }
        return $output;
    }

    function fetch_city($state_id, $city_id = null)
    {
        $this->db->where("state_id", $state_id);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("cities");
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $row) {
            $sel = '';
            if (!empty($city_id) && isset($city_id)) {
                $sel = ($row->id == $city_id) ? 'selected' : '';
            }
            $output .= '<option value ="' . $row->id . '" ' . $sel . '>' . $row->name . '</option>';
        }
        return $output;
    }

    function fetch_game()
    {
        // $this->db->select("to_date","from_date","gname");

        $this->db->order_by("gname", "ASC");

        $query = $this->db->where("shutdown", 0)->get("game_dtl");
        return $query->result();
    }


    function insertData($tbl_name, $data_array)
    {

        $result_id = "";
        $this->db->insert($tbl_name, $data_array);
        $result_id = $this->db->insert_id();
        if ($result_id > 0) {

            return $result_id;
        } else {
            return false;
        }
    }

    function updateData($game_id, $tbl_name, $data_array)
    {
        // $result_id = "";
        $this->db->where("id", $game_id);
        $q = $this->db->update($tbl_name, $data_array);

        if ($q) {
            return true;
        } else {
            return false;
        }

    }

    function fetch_totalplayer()
    {
        return $this->db->count_all('player_dtl');
    }

    function fetch_totalteam()
    {
        return $this->db->count_all('team_dtl');
    }

    function fetch_totalgames()
    {
        return $this->db->count_all('game_dtl');
    }

    function fetch_fee()
    {
        $this->db->select_sum('pay');
        $query = $this->db->get('team_dtl');
        $result = $query->row();
        $total_sum = $result->pay;
        return $total_sum;
    }

    function fetch_price()
    {
        $this->db->select_sum('price');
        $query = $this->db->get('game_dtl');
        $result = $query->row();
        $total_sum = $result->price;
        return $total_sum;

    }
}





