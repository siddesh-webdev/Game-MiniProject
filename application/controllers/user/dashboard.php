<?php

class dashboard extends CI_Controller{

    public function __construct(){  
        parent::__construct();
        $this->load->model("common");
        $this->load->model('gameListModel');
        checklogin();
    }


    public function index(){

        // $this->load->view("header");
        $this->load->view("user/dashboard");
        // $data["countries"] = $this->common->fetch_country();
        // $this->load->view("user/addPlayer", $data);
        $this->load->view("user/footer.php");
        
    }
    public function addPlayer(){
        //view of page
        $this->load->view("user/dashboard");
        $data["countries"] = $this->common->fetch_country();
        $this->load->view("user/addPlayer", $data);
        $this->load->view("user/footer.php");
    }

    public function gameList(){

        $this->load->view("user/dashboard");
        $data["game_dtl"] = $this->gameListModel->get_all_games();
        $this->load->view("user/gameList",$data);
        $this->load->view("user/footer.php");
    }
    public function addGame(){   
        $this->load->view("user/dashboard");
  
        $this->load->view("user/addGame");
        $this->load->view("user/footer.php");
    }

    public function editGame(){
        $this->load->view("user/dashboard");
        $data["game_dtl"] = $this->gameListModel->get_games($_POST["game_id"]);
        $this->load->view("user/addGame",$data);
        $this->load->view("user/footer.php");
    }
    public function addTeam(){
        $this->load->view("user/dashboard");
        $data["game_dtl"] = $this->common->fetch_game();
        $this->load->view('user/addTeam', $data);
       
        $this->load->view("user/footer.php");
    }

    public function fetch_state()
	{
		if ($this->input->post('country_id')) {
			echo $this->common->fetch_state($this->input->post('country_id'));
		}
	}

	public function fetch_city()
	{

		if ($this->input->post('state_id')) {
			echo $this->common->fetch_city($this->input->post('state_id'));
		}
	}

    // public function addPlayer()
    // {
    //   $data= $this->common->fet

    // }
}