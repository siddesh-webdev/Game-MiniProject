<?php

class TeamList extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('teamListModel');
    }
    function shutdown()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            $status = $this->teamListModel->findGameS($_POST["team_id"]);

        
            if($status == 1 )
            {

                $this->teamListModel->shutdown(0,$_POST['team_id']);

                echo json_encode(array('status'=>true,'message'=> "Game Active"));
                exit;
            }
            else
            {
                $this->teamListModel->shutdown(1,$_POST['team_id']);
                echo json_encode(array("status"=>true,'message'=> "Game Inactive"));
                exit;
            }
           
            
     
        }
    }
}
?>