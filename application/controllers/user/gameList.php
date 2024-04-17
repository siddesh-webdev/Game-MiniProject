<?php
class GameList extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gameListModel');
    }

    function shutdown()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            $status = $this->gameListModel->findGameS($_POST["game_id"]);

        
            if($status == 1 )
            {

                $this->gameListModel->shutdown(0,$_POST['game_id']);

                echo json_encode(array('status'=>true,'message'=> "Game Active"));
                exit;
            }
            else
            {
                $this->gameListModel->shutdown(1,$_POST['game_id']);
                echo json_encode(array("status"=>true,'message'=> "Game Inactive"));
                exit;
            }
           
            
     
        }
    }

}
?>