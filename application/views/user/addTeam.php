<div class="container">
    <div class="card p-4" style="">
        <h5 class="card-title mb-3"> Team Details</h5>
        <div class="row d-flex justify-content-center">


            <form id="add-form" class="theme-form" name="add-form" enctype="multipart/form-data">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Team Name</label>
                            <input name="name" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Team Captain</label>
                            <input name="capname" id="capname" type="text" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Team Banner</label>
                            <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp"
                                class="form-control shadow-none" required>

                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Game</label>
                            <!-- <select name="gender" class="form-select" aria-label="Default select example">
                                <option value="">Select Game </option>
                                <option value="Male">Cricket</option>
                                <option value="Female">Football</option>
                                <option value="Others">chesss</option>
                            </select> -->
                            <?php
                            $options = array('' => 'Select Game');
                            foreach ($game_dtl as $row) {
                                $options[$row->id] = $row->gname;
                            }
                            echo form_dropdown('game', $options, '', 'id="game" class="form-select game" aria-label="Default select example" row_count="1" required');
                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Enter Fees</label>
                            <input name="fees" type="number" class="form-control shadow-none" required>
                        </div>
                       
                    </div>
                </div>
                <div class="text-center my-1">
                    <button type="submit" class="btn btn-dark shodow-none">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on("change", ".country", function () {
        var country_id = $(this).val();
        var row_count = $(this).attr("row_count");
        if (country_id) {
            $.ajax({
                url: "<?php echo base_url(); ?>user/dashboard/fetch_state",
                type: 'post',
                data: { "country_id": country_id },
                success: function (data) {
                    $("#state_" + row_count).html(data);
                    $("#city_" + row_count).html("<option>Select City</option>")
                }

            });
        }
        else {

            $("#state_" + row_count).html('<option>Select country first</option>');
            $("#city_" + row_count).html('<option>Select state first</option>');

        }
    });


</script>