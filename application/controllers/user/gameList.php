<?php 
class GameList extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('gameListModel');
    }

    function index(){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            // echo"<pre>";
            // print_r("sid");
            // exit;

            if($Alldata = $this->gameListModel->get_all_games())
            {
               
                $table_data = "";
                $i = 1;
        
                foreach ($Alldata as $data) {
        
                    $table_data .= "
                            <tr>
                                <td>$i</td>
                                <td>
                                     <b>$data->gname</b>
                                </td>
                                <td>
                                <img src='$data->profile' width='55px'>
                                <br>
                                     $data->tname 
                                </td>
                                <td>
                                    <b>$data->nteam</b>
                                </td>
                                <td>
                                    <b>$data->from_date</b> 
                                <br>
                                </td>
                                <td>
                                    <b>$data->to_date</b> 
                                </td>
                             
                                <td>
                                    <button type='button' onclick='edit_game($data->id)' class='btn mb-2 text-white btn-sm fw-bold btn-primary shadow-none' data-bs-toggle='modal' data-bs-target='#editModel'>
                                        <i class='bi bi-pencil-square'></i> Edit
                                    </button>
                                    <button type='button' onclick='delete_game($data->id)' class='btn mb-2 btn-outline-danger btn-sm fw-bold shadow-none'>
                                        <i class='bi bi-trash'></i> Delete
                                    </button>
                                    <button type='button' onclick='edit_game($data->id)' class='btn mb-2 text-white btn-sm fw-bold btn-primary shadow-none' data-bs-toggle='modal' data-bs-target='#editModel'>
                                    <i class='bi bi-pencil-square'></i> Active
                                    </button>
                                    <form >
                                    <input onchange='upd_shutdown(this.value)' class='form-check-input' type='checkbox' id='shutdown-toggle'>
                                    </form>

                                </td>
                            </tr>
                        ";
                    $i++;
                }
        
                $output = json_encode(["table_data" => $table_data]);
                echo $output;
        
            }
            else{
                
               echo json_encode(array("status" => false,"msg"=> "Doesnt have any data"));
                exit;
                // echo json_encode($result);
                // exit;
            //     echo "<pre>";
            //     print_r("errpr");
            //     exit;

            
         
            }

        
        }
     }
}
?>