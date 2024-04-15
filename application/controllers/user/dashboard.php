<?php

class dashboard extends CI_Controller{

    public function __construct(){  
        parent::__construct();
        $this->load->model("common");
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

    public function addGame(){   
        $this->load->view("user/dashboard");
        $this->load->view("user/addGame");
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