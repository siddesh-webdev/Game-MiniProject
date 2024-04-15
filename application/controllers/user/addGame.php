<?php

class AddGame extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addGameSubmit()
    {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            $this->input->post('');
            
        }
    }











}



?>