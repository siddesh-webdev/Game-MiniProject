<?php

class AddGame extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("common");
        $this->load->model("gameListModel");
    }

    public function addGameSubmit()
    {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            // $this->input->post('');

            $this->form_validation->set_rules("gname", "game name", "trim|required");
            $this->form_validation->set_rules("tname", "tname", "trim|required");
            $this->form_validation->set_rules("nteam", "nteam", "trim|required");
            $this->form_validation->set_rules("price", "price", "trim|required");
            $this->form_validation->set_rules("fees", "fees", "trim|required");
            
            $this->form_validation->set_rules("gender", "gender", "required");

            $this->form_validation->set_rules("from_date", "from_date", "trim|required");
            $this->form_validation->set_rules("to_date", "to_date", "trim|required");
            // $this->form_validation->set_rules("profile", "profile", "required");

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array("status" => false, "message" => validation_errors()));
                exit;
            } 

            if(isset($_POST["game_id"]))
            {
                $game_id=$this->input->post("game_id");
            
                $data = array();
             
                $data["gname"] = $this->input->post("gname");
                $data["tname"] = $this->input->post("tname");
                $data["nteam"] = $this->input->post("nteam");
                $data["gender"] = $this->input->post("gender");
                $data["price"] = $this->input->post("price");
                $data["fees"] = $this->input->post("fees");
                $data["from_date"] = $this->input->post("from_date");
                $data["to_date"] = $this->input->post("to_date");
                $data["user_id"] = $_SESSION["id"];
    
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
    
                $game_table = "game_dtl";
    
                $data["profile"] = $img_path;
    
                $result = $this->common->updateData($game_id,$game_table, $data);
    
                if ($result) {
                    // $this->load->view("user/gameList");
                    // $this->load->view("user/dashboard");
                    // $data["game_dtl"] = $this->gameListModel->get_all_games();
                    // $this->load->view("user/gameList",$data);
                    // $this->load->view("user/footer.php");
                    echo json_encode(array('status' => true, 'message' => "Game edited Successfully"));
                } else {
                    echo json_encode(array('status' => false, 'message' => "Can't update the Game"));
                }
            }else{
                // $game=$this->input->post("gname");
                // $tournament=$this->input->post("tname");
                // $number_team =$this->input->post("nteam");
                // $gender= $this->input->post("gender");
                // echo"<pre>";
                // print_r($this->input->post("from_date"));
                // print_r($this->input->post("to_date"));
                // exit;
                $data = array();
                $data["gname"] = $this->input->post("gname");
                $data["tname"] = $this->input->post("tname");
                $data["nteam"] = $this->input->post("nteam");
                $data["gender"] = $this->input->post("gender");
                $data["price"] = $this->input->post("price");
                $data["fees"] = $this->input->post("fees");
                $data["from_date"] = $this->input->post("from_date");
                $data["to_date"] = $this->input->post("to_date");
                $data["user_id"] = $_SESSION["id"];

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

                $game_table = "game_dtl";

                $data["profile"] = $img_path;

                $result = $this->common->insertData($game_table, $data);

                if ($result) {
                    echo json_encode(array('status' => true, 'message' => "Game added Successfully"));
                } else {
                    echo json_encode(array('status' => false, 'message' => "Can't add the Game"));
                }
            }


        }
    }













}




?>