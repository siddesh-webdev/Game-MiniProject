<?php

class AddTeam extends  CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("common");
    }

    // public function index()
	// {
	// 	$data["game_dtl"] = $this->common->fetch_game();
	// 	$this->load->view('user/addTeam', $data);
	// }
}

?>