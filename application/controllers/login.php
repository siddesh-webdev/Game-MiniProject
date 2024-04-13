<?php

class login extends CI_Controller {
    
	public function __construct() {	

		parent::__construct();	
		$this->load->model("loginModel");
	}

	public function loginPage()
	{
		$this->load->view('login');
		
	}

	public function loginSubmit()
	{
	 if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
	 {
		$this->form_validation->set_rules('email','email','required|trim');
		$this->form_validation->set_rules('password','password','required|trim');
		
		if($this->form_validation->run() == FALSE)
		{
			echo json_encode(array("error" => $this->form_validation->error_array()));
			exit;
		}

		// $data = array();
		// $data["email"] = $this->input->post("email");
		// $data["password"] = $this->input->post("password");

		$user_exist = $this->loginModel->userExistCheck($this->input->post("email"));

		// $user_exist['password'];

		// echo "<pre>";
		// print_r($user_exist);
		// exit;
		if(!$user_exist)
		{
			echo json_encode(array("status" =>false,"message"=>"user doesnt exist"));
			exit;
		}
		
		if(!password_verify($this->input->post('password'), $user_exist['password']))
        {
			echo json_encode(array('status'=>false,"message"=>"Wrong password"));
			exit;
            // $this->session->set_flashdata("login_failure_activation", "Your account has not been activated yet.");
        }
        else
        {
			// echo "<pre>";
			// print_r("password matched success");
			// exit;
			$link = base_url('dashboard');
			echo json_encode(array('status' => true,'message' =>"success",'link'=> $link));
			exit;
        }




		
	 }
	}
}