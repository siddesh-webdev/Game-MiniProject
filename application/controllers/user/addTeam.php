<?php

class AddTeam extends  CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("common");
        $this->load->model("teamListModel");
    }

    // public function index()
	// {
	// 	$data["game_dtl"] = $this->common->fetch_game();
	// 	$this->load->view('user/addTeam', $data);
	// }

    public function addTeamSubmit(){
        
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            

            $this->form_validation->set_rules("name", "name", "trim|required");
            $this->form_validation->set_rules("capname", "capname", "trim|required");
            $this->form_validation->set_rules("game", "game", "trim|required");
            
            
            $this->form_validation->set_rules("fees", "fees", "required");

            $this->form_validation->set_rules("from_date", "from_date", "trim|required");
            $this->form_validation->set_rules("to_date", "to_date", "trim|required");
            // $this->form_validation->set_rules("profile", "profile", "required");

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array("status" => false, "message" => validation_errors()));
                exit;
            } 

            if(isset($_POST["team_id"]))
            {
                $team_id=$this->input->post("team_id");
            
                $data = array();
                $data["tname"] = $this->input->post("name");
                $data["cname"] = $this->input->post("capname");
               
                $game_name = $this->teamListModel->fetch_gamename($this->input->post("game"));

                $data["game_id"] = $this->input->post("game");
                
                $data["game_name"]=$game_name;


                $data["pay"] = $this->input->post("fees");
                
                $data["user_id"] = $_SESSION["id"];

                $config["upload_path"] = "./upload/teamupload/";
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

                $team_table = "team_dtl";

                $data["profile"] = $img_path;
    
            
                $result = $this->common->updateData($team_id,$team_table, $data);
    
                if ($result) {
                    // $this->load->view("user/gameList");
                    // $this->load->view("user/dashboard");
                    // $data["game_dtl"] = $this->gameListModel->get_all_games();
                    // $this->load->view("user/gameList",$data);
                    // $this->load->view("user/footer.php");
                    echo json_encode(array('status' => true, 'message' => "team edited Successfully"));
                } else {
                    echo json_encode(array('status' => false, 'message' => "Can't update the team"));
                }
            }else{
             

                $data = array();
                $data["tname"] = $this->input->post("name");
                $data["cname"] = $this->input->post("capname");
               
                $game_name = $this->teamListModel->fetch_gamename($this->input->post("game"));

                $data["game_id"] = $this->input->post("game");
                
                $data["game_name"]=$game_name;


                $data["pay"] = $this->input->post("fees");
                
                $data["user_id"] = $_SESSION["id"];

                $config["upload_path"] = "./upload/teamupload/";
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

                $game_table = "team_dtl";

                $data["profile"] = $img_path;

                $result = $this->common->insertData($game_table, $data);

                if ($result) {
                    echo json_encode(array('status' => true, 'message' => "team added Successfully"));
                } else {
                    echo json_encode(array('status' => false, 'message' => "Can't add the team"));
                }
            }


        }
    }
}
?>