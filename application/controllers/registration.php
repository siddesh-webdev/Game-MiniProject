<?php

class registration extends CI_Controller {
	public function __construct() 
	{	
		parent::__construct();
		$this->load->model("common");

	}

    public function index()
	{
	
		$this->load->view("header");
		$data["countries"] = $this->common->fetch_country();
		$this->load->view('registration', $data);
	}

	public function fetch_state()
	{
		if($this->input->post('country_id'))
		{
		 echo $this->common->fetch_state($this->input->post('country_id'));
		} 
	}

	public function fetch_city(){

		if($this->input->post('state_id'))
		{
			echo $this->common->fetch_city($this->input->post('state_id'));
		}
	}
	public function submitForm()
	{
		if(isset($_POST))
		{
			echo"<pre>";
			print_r($_POST);
			print_r($_FILES);
			exit;
		}		
	}
}