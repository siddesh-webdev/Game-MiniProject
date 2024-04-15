<?php


function checklogin(){
    if(empty($_SESSION["name"]) && !isset($_SESSION['email'])){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            echo json_encode(array('success'=>false,'msg'=>'redirect'));
            exit();
        }else{
            redirect('login', 'refresh');
            exit();
        }
    }
}

?>
