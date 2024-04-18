<?php

class dashboard extends CI_Controller{

    public function __construct(){  
        parent::__construct();
        $this->load->model("common");
        $this->load->model('gameListModel');
        $this->load->model('teamListModel');
        checklogin();
    }


    public function index(){

        // $this->load->view("header");
        $this->load->view("user/dashboard");
        $data["game_dtl"] = $this->common->fetch_totalgames();
        $data["team_dtl"]=$this->common->fetch_totalteam();
        $data["player_dtl"]=$this->common->fetch_totalplayer();
        $data["total_fee"]= $this->common->fetch_fee();
        $data["total_price"]=$this->common->fetch_price();
        $this->load->view("user/home",$data);
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

        if(isset($_POST["game_id"]))
        {
             $data["game_dtl"] = $this->gameListModel->get_games($_POST["game_id"]);
             $this->load->view("user/addGame",$data);
        }
        else
        {
            $this->load->view("user/addGame");
        }
        $this->load->view("user/footer.php");
    }

    // public function editGame(){
    //     $this->load->view("user/dashboard");
    //     $data["game_dtl"] = $this->gameListModel->get_games($_POST["game_id"]);
    //     $this->load->view("user/addGame",$data);
    //     $this->load->view("user/footer.php");
    // }

    public function teamList(){
        $this->load->view("user/dashboard");
       
        $data["team_dtl"] = $this->teamListModel->get_all_teams();
        $this->load->view("user/teamList",$data);
        $this->load->view("user/footer.php");
    }
    public function addTeam(){
        
        $this->load->view("user/dashboard");

        $data["game_dtl"] = $this->common->fetch_game();

        if(isset($_POST["team_id"]))
        {
            
             $data["team_dtl"] = $this->teamListModel->get_teams($_POST["team_id"]);
             $this->load->view("user/addTeam",$data);
        }
        else
        {
            $this->load->view('user/addTeam', $data);
        }
       
        // $data["team_dtl"] = $this->teamModel->();
       
       
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

    public function fetch_date(){
        if($this->input->post('game_id')) {

            echo json_encode($this->common->fetch_date($this->input->post('game_id')));
        }
    }
}