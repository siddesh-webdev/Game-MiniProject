<div class="container">
    <div class="card p-4" style="">
        <h5 class="card-title mb-3"> Team Details</h5>
        <div class="row d-flex justify-content-center">
            <?php
            if (!empty($team_dtl) && isset($team_dtl)) {

                foreach ($team_dtl as $rows) {
                    ?>
                    <form id="add-form" class="theme-form" name="add-form" enctype="multipart/form-data">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                <input type="hidden" name ="team_id" id="team_id" value="<?= $rows->id ?>">
                                    <label class="form-label">Team Name</label>
                                    <input name="name" id="name" type="text" value="<?= $rows->tname?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Team Captain</label>
                                    <input name="capname" id="capname" type="text" value="<?= $rows->cname?>" class="form-control shadow-none" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Team Banner</label>
                                    <br>
                                    <img src="<?= $rows->profile ?>" name="image" width='100px' class=" img-fluid">
                                    <br>
                                    <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp"
                                        class="form-control shadow-none" required>

                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Game</label>
                                    <select name="game" class="form-select game" id="game" aria-label="Default select example">
                                          <option value="">Select Game </option>
                                          <option value="<?= $rows->game_id ?> " selected><?= $rows->game_name ?></option>
                                          <?php
                                            foreach ($game_dtl as $row) {?>
                                             <option value='<?= $row->id ?>'><?= $row->gname ?></option>;
                                           <?php }
                                          ?>
                                           <!-- <option value="Male">Cricket</option>
                                          <option value="Female">Football</option>
                                          <option value="Others">chesss</option> -->
                                    </select>
                                  

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Start Date</label>
                                    <input name="from_date" readonly id="from_date" type="date" class="form-control shadow-none"
                                        required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">End Date</label>
                                    <input name="to_date" readonly id="to_date" type="date" class="form-control shadow-none"
                                        required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Pay Fees</label>
                                    <input name="fees" id="fees" type="number" value="<?= $rows->pay?>"  class="form-control shadow-none" required>
                                </div>

                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shodow-none">Edit </button>
                        </div>
                    </form>
                    <?php
                }
            } else { ?>
                <form id="add-form" class="theme-form" name="add-form" enctype="multipart/form-data">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Team Name</label>
                                <input name="name" id="name" type="text" class="form-control shadow-none" required>
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
                                <label class="form-label">Start Date</label>
                                <input name="from_date" readonly id="from_date" type="date" class="form-control shadow-none"
                                    required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">End Date</label>
                                <input name="to_date" readonly id="to_date" type="date" class="form-control shadow-none"
                                    required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Pay Fees</label>
                                <input name="fees" id="fees" type="number" class="form-control shadow-none" required>
                            </div>

                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shodow-none">Add </button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script>



    $(document).on("change", ".game", function () {
        var game_id = $(this).val();
        var startDate, endDate;
        $.ajax({
            url: "<?php echo base_url(); ?>user/dashboard/fetch_date",
            type: "post",
            data: { "game_id": game_id },
            dataType: 'json',
            success: function (data) {
                endDate = data[0].to_date;
                startDate = data[0].from_date;
                $("#from_date").val(startDate);
                $("#to_date").val(endDate);
            }

        })
    });

    $(document).ready(".game", function () {
        var game_id = $(this).val();
        var startDate, endDate;
        $.ajax({
            url: "<?php echo base_url(); ?>user/dashboard/fetch_date",
            type: "post",
            data: { "game_id": game_id },
            dataType: 'json',
            success: function (data) {
                endDate = data[0].to_date;
                startDate = data[0].from_date;
                $("#from_date").val(startDate);
                $("#to_date").val(endDate);
            }

        })
    });



    var Vrule =
    {
        name: {
            required: true,
        },
        capname: {
            required: true,
        },
        profile: {
            required: true,
        },
        game: {
            required: true,
        },
        from_date: {
            required: true,

        },
        to_date: {
            required: true,

        },
        fees: {
            required: true
        }
    };
    var msg = {

        name: {
            required: "Please enter name",
        },
        capname: {
            required: "Please enter Captain name",
        },
        profile: {
            required: "Please upload baner",
        },
        game: {
            required: "please select game",
        },
        from_date: {
            required: "Please enter date ",
            readonly: "Please enter name"
        },
        to_date: {
            required: "Please enter date ",
            readonly: "Please enter name"
        },
        fees: {
            required: "Please pay fees"
        }
    };

    $("#add-form").validate({
        rules: Vrule,
        message: msg,

        submitHandler: function (form) {

            $("#add-form").ajaxSubmit({
                url: "<?php echo base_url() ?>user/addTeam/addTeamSubmit",
                type: 'POST',
                dataType: 'json',
                clearForm: false,

                success: function (response) {
                    if (response.status) {
                        alerts('success', response.message);

                        setTimeout(function () {

                            window.location = "<?php echo base_url('user/dashboard/teamList') ?>";

                        }, 1000);

                    } else {

                        alerts('error', "Server Down");
                    }
                },
                error: function (response) {
                    alerts("error", "Server went done try again later");
                }
            });
        }


    });


</script>