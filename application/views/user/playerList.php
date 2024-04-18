<!-- table of employee -->
<div class="container" id="main-content">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-2">Player</h3>
        </div>
        <div class="col-md-6">
            <a href="<?php echo base_url(); ?>user/dashboard/addTeam"
                class="btn btn-outline-dark shadow-none me-lg-3 me-2" style="float:right;"> Add Player</a>
        </div>
        <div class="col">

            <div class="card border-0 shadow mb-4">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover border" style="min-width: 1200px;">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                   <!-- pic ,tournament name, -->
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Gender</th>
                                


                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="table-data">
                            <?php
                            $i = 1;
                            foreach ($player_dtl as $row) {
                                ?>
                                                <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                     <b><?= $row->name ?></b>
                                                </td>
                                                <td>
                                                <img src='<?= $row->profile ?>' width='55px'>
                                                <br>
                                                    <b>Captain:</b><?= $row->cname ?>
                                                </td>
                                                <td>
                                                <b><?= $row->game_name?></b>
                                                </td>
                                              
                             
                                                <td>
                                                    <form method="post" action="<?php echo base_url();?>user/dashboard/addTeam">
                                                        <input type="hidden" name="team_id" value="<?= $row->id ?>" id="team_id">
                                                        <button type='submit' class='btn mb-2 text-white btn-sm fw-bold btn-primary shadow-none' >
                                                            <i class='bi bi-pencil-square'></i> Edit
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>    
                                                    <div class='form-check form-switch'>
                                               
                                                        <form>
                                                    <!-- <input onchange='upd_shutdown(this.value,)' class='form-check-input' type='checkbox' id='shutdown-toggle'> -->
                                                        <input name="shutdown" <?php if($row->shutdown ==1){echo "checked"; }?> class='form-check-input' type='checkbox' id='shutdown' game="<?= $row->id ?>" >
                                                    </form>
                                              
                                                    </div>
                                                <td>
                                            </tr>
                                            <?php
                                            $i++;
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>

                    <nav>
                        <ul class="pagination mt-3" id="table-pagination">

                        </ul>
                    </nav>

                </div>
            </div>

        </div>
    </div>
</div>


<script>

$(document).on("change","#shutdown",function(){

    var team_id =  $(this).attr("game");
   
    // var value= $('input[name="shutdown"]:checked').val();
    $.ajax({
      url:"<?php echo base_url(); ?>user/teamList/shutdown",
      type:"post",
      data:{
        "team_id":team_id,
           },
      dataType:'json',
        success: function(response){
            console.log(response);
            alerts('success',response.message);
            
        }

    });
});


// function edit_game(id){

//     $.ajax({
//         url:"<?php echo base_url();?>user/dashboard/editGame",
//         type:'post',
//         data:{'game_id':id},
//         success:function(){
//             window.location ="<?php echo base_url('user/dashboard/editGame') ?>";
//         }
//     });
  
// }







    // $(document).ready(function () {

    //     $.ajax({
    //         url: "<?php echo base_url(); ?>user/gameList",
    //         type: "post",
    //         success: function (response) {

    //             let data = JSON.parse(response);
    //             document.getElementById('table-data').innerHTML = data.table_data;

    //             let shutdown_toggle =document.getElementById("shutdown-toggle");

    //             if(data.shutdown == 0)
    //             {
    //             alert("off");
    //             shutdown_toggle.checked = false;
    //             shutdown_toggle.value = 0;
    //             }
    //             else{
    //              alert("onn");   
    //             shutdown_toggle.checked = true;
    //             shutdown_toggle.value = 1;
    //             }
    //         }

    //     })

    // });

    // function upd_shutdown(val,id) {

    //     // let ids = document.getElementById("shutdown-toggle");

    //     $.ajax({
    //         url:"<?php echo base_url(); ?>user/gameList/shutdown",
    //         type:'post',
    //         data: {"val":val,"id":id},
    //         success: function()
    //         {
    //             // let general_data = JSON.parse(this.responseText); 

    //             // if(this.responseText == 1 && general_data.shutdown==0)
    //             // {
    //             // alerts('success','Sites has been shutdown!');
                
    //             // }
    //             // else
    //             // {
    //             // alerts('success','Shutdown mode is off..!');
    //             // }
    //         }
    //     });
    // }


    // $("#add-form").validate({

    //     rules: Vrules,
    //     messages: msg,

    //     submitHandler: function (form) {
    //         var act = "<?php echo base_url() ?>user/addGame/addGameSubmit";
    //         $("#add-form").ajaxSubmit({
    //             url: act,
    //             type: 'POST',
    //             cache: false,
    //             dataType: 'json',
    //             clearForm: false,
    //             success: function (response) {
    //                 if (response.status) {
    //                     alerts('success', response.message);

    //                     setTimeout(function () {

    //                         window.location = "<?php echo base_url('user/dashboard') ?>";

    //                     }, 1000);

    //                 } else {

    //                     alerts('error', "Server Down");
    //                 }

    //             },
    //             error: function (response) {
    //                 alerts("error", response);
    //                 console.log(response);
    //             },
    //         });
    //     }
    // });



</script>