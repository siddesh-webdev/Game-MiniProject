<!-- table of employee -->
<div class="container" id="main-content">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-2">Game</h3>
        </div>
        <div class="col-md-6">
            <a href="<?php echo base_url();?>user/dashboard/addGame" class="btn btn-outline-dark shadow-none me-lg-3 me-2" style="float:right;"> Add Game</a>
        </div>
        <div class="col">

            <div class="card border-0 shadow mb-4">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover border" style="min-width: 1200px;">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Game</th>
                                    <th scope="col">Tournament Name</th> <!-- pic ,tournament name, -->
                                    <th scope="col">Teams</th>
                                    <th scope="col">start date</th>
                                    <th scope="col">end date</th>
                                    <!-- start date end date entry fees price in details gender -->


                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-data">

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


$(document).ready(function(){
    $.ajax({
        url:"<?php echo base_url();?>user/gameList",
        type: "post",
        success:function(response){
            
             let data = JSON.parse(response);
            document.getElementById('table-data').innerHTML = data.table_data;
        }

    })

});

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