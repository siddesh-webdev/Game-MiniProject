<?php
class AddPLayer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("common");
    }

    public function addPlayerSub(){

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
        
            $this->form_validation->set_rules("name", "name", "trim|required");
			$this->form_validation->set_rules("email", "email", "trim|required|is_unique[user_dtl.email]");
			$this->form_validation->set_rules("contact", "contact", "trim|required|max_length[10]");

			$this->form_validation->set_rules("gender", "gender", "required");
			
			$this->form_validation->set_rules("address[]", "Address", "required");
			$this->form_validation->set_rules("country[]", "Country", "required");
			$this->form_validation->set_rules("state[]", "State", "required");
			$this->form_validation->set_rules("city[]", "city", "required");

            if ($this->form_validation->run() == FALSE) {
				echo json_encode(array("error" => $this->form_validation->error_array()));
				exit;
			} 

                $data = array();
				$data["name"] = $this->input->post("name");
				$data["email"] = $this->input->post("email");
				$data["phone"] = $this->input->post("contact");
				
			
				$data["gender"] = $this->input->post("gender");
		

				$config["upload_path"] = "./upload/playeruploads/";
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

				$player_table = "player_dtl";

                $player_address = "player_address";
				
				$data["picture"] = $img_path;

				$user_id = $this->common->insertData($player_table, $data);

                foreach ($_POST['address'] as $key => $value) {

					$address_data = array();
					$address_data['player_id'] = $user_id;
					$address_data['address'] = $value;
					$address_data['country_id'] = $_POST['country'][$key];
					$address_data['state_id'] = $_POST['country'][$key];
					$address_data['city_id'] = $_POST['city'][$key];

					$this->common->insertData($player_address, $address_data);

				}
				
				echo json_encode(array('status' => true,'message' =>"Player Added Successfully"));

        }
    }
}
?>