<?php

class AddGame extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addGameSubmit()
    {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            // $this->input->post('');

            $this->form_validation->set_rules("gname", "game name", "trim|required");
			$this->form_validation->set_rules("tname", "tname", "trim|required");
			$this->form_validation->set_rules("nteam", "nteam", "trim|required");

			$this->form_validation->set_rules("gender", "gender", "required");
			$this->form_validation->set_rules("profile", "profile", "required");

            if( $this->form_validation->run() == FALSE )
            {
                echo json_encode(array("status"=>false ,"message"=>validation_errors()));
                exit;
            }

            $game=$this->input->post("gname");
            $tournament=$this->input->post("tname");
            $number_team =$this->input->post("nteam");
            $gender= $this->input->post("gender");



        }
    }











}



?>