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
            else{
                // $game=$this->input->post("gname");
            // $tournament=$this->input->post("tname");
            // $number_team =$this->input->post("nteam");
            // $gender= $this->input->post("gender");

            $data= array();
            $data["gname"] = $this->input->post("gname");
            $data["tname"] = $this->input->post("tname");
            $data["nteam"] = $this->input->post("nteam");
            $data["gender"] = $this->input->post("gender");

            $config["upload_path"] = "./upload/gameupload/";
            $config["allowed_types"] = "gif|jpg|jpeg|png";

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('profile')) {

                $error = array('error' => $this->upload->display_errors());
                echo json_encode(array('error' => $error));
                exit;
            }

            $dataa = $this->upload->data();

            $img_path = base_url('upload/' . $dataa['file_name']);

            $user_table = "user_dtl";
            $address_table = "address_dtl";

            $data["picture"] = $img_path;


            }


        }
    }











}



?>