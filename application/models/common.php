<?php

class Common extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    
    function fetch_country()
    {
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("countries");
        return $query->result();

    }

    function fetch_state($country_id,$state_id=null)
    {
     
        $this->db->where("country_id", $country_id);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("states");
        $output = '<option value="">Select State</option>';
        foreach ($query->result() as $row) {
            $sel = '';
            if(!empty($state_id) && isset($state_id)){
                $sel  = ( $row->id == $state_id ) ?'selected':'';
            }
            $output .= '<option value ="' . $row->id . '" '.$sel.'>' . $row->name . '</option>';
        }
        return $output;
    }

    function fetch_city($state_id,$city_id=null)
    {
        $this->db->where("state_id", $state_id);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("cities");
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $row) {
            $sel = '';
            if(!empty($city_id) && isset($city_id)){
                $sel  = ( $row->id == $city_id ) ?'selected':'';
            }
            $output .= '<option value ="' . $row->id . '" '.$sel.'>' . $row->name . '</option>';
        }
        return $output;
    }

    function fetch_game()
    {
        $this->db->order_by("gname", "ASC");
        $query = $this->db->get("game_dtl");
        return $query->result();
    }


    function insertData($tbl_name, $data_array) {
		
		$result_id = "";
		$this->db->insert($tbl_name, $data_array);
		$result_id = $this->db->insert_id();
		if($result_id > 0) {
			
			return $result_id;
		}else{
			return false;
		}
	}

    
}





