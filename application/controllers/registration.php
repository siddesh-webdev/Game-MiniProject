<?php

class registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->load->helper(array('form', 'url'));
		// $this->load->library('password');

	}

	public function index()
	{

		$this->load->view("header");
		$data["countries"] = $this->common->fetch_country();
		$this->load->view('registration', $data);
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
	public function submitForm()
	{
		// echo"<pre>";
		// 	print_r($_POST);
		// 	print_r($_FILES);
		// 	exit;
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {


			$this->form_validation->set_rules("name", "name", "trim|required");
			$this->form_validation->set_rules("email", "email", "trim|required");
			$this->form_validation->set_rules("contact", "contact", "trim|required|max_length[10]");

			$this->form_validation->set_rules("gender", "gender", "required");
			$this->form_validation->set_rules("password", "Password", "required");
			$this->form_validation->set_rules("address[]", "Address", "required");
			$this->form_validation->set_rules("country[]", "Country", "required");
			$this->form_validation->set_rules("state[]", "State", "required");
			$this->form_validation->set_rules("city[]", "city", "required");
			// $this->form_validation->set_rules("profile","profile picture","required|mimes:jpeg,jpg,png,gif");

			// $name = $this->input->post("name");

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(array("error" => $this->form_validation->error_array()));
				exit;
			} 
			else {
				// echo "<pre>";
				// print_r($_POST["city"]);
				// print_r($_POST["country"]);
				// print_r($_POST["state"]);
				// print_r($_FILES);
				// exit;
				$data = array();
				
				$data["name"] = $this->input->post("name");
				$data["email"] = $this->input->post("email");
				$data["phone"] = $this->input->post("contact");
				$hash_pass = password_hash($this->input->post("password"), PASSWORD_BCRYPT);
				// echo "<pre>";
				// print_r($hash_pass);
				// exit;

				$data["password"] = $hash_pass;
				$data["gender"] = $this->input->post("gender");
				// $address_data["address"] = $this->input->post("address");
				// $address_data["city"] = $this->input->post("city");
				// $address_data["country"] = $this->input->post("country");
				// $address_data["state"] = $this->input->post("state");

				$config["upload_path"] = "./upload/";
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

				$user_id = $this->common->insertData($user_table, $data);

				// $address_data['user_id'] = $user_id;
				// echo "<pre>";
				// print_r($);
				// exit;
				foreach ($_POST['address'] as $key => $value) {

					$address_data = array();
					$address_data['user_id'] = $user_id;
					$address_data['address'] = $value;
					$address_data['country_id'] = $_POST['country'][$key];
					$address_data['state_id'] = $_POST['country'][$key];
					$address_data['city_id'] = $_POST['city'][$key];

					$this->common->insertData($address_table, $address_data);

				}
				
				echo json_encode(array('status' => true,'message' =>"Registeration Successfully"));

			}
			
		}
	}
}