<div class="container">

    <div class="card p-4" style="">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title mb-3"> Game Details</h5>
            </div>
          
        </div>

        <div class="row d-flex justify-content-center">

            <form id="add-form" class="theme-form" name="add-form" enctype="multipart/form-data">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Game Name</label>
                            <input name="gname" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-4  mb-3">
                            <label class="form-label">Tournament name</label>
                            <input name="tname" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Total Teams</label>
                            <input name="nteam" id="nteam" type="number" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Baner</label>
                            <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp"
                                class="form-control shadow-none" required>

                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" aria-label="Default select example">
                                <option value="">Select Gender </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Winning Price</label>
                            <input name="price" id="price" type="number" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Entry Fees</label>
                            <input name="fees" id="fees" type="number" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Start Date</label>
                            <input name="from_date" id="from_date" type="date"
                                class="form-control shadow-none digits fromdate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">End Date</label>
                            <input name="to_date" id="to_date" type="date"
                                class="form-control shadow-none  digits todate" required>
                        </div>

                    </div>
                </div>
                <div class="text-center mt-2 my-1">
                    <button type="submit" class="btn btn-dark shodow-none">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- show model  -->






<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>

<script>


    var Vrules = {
        //debug: true,
        // ignore: [],
        gname: {
            required: true,
            // lettersonly: true
        },
        tname: {
            required: true,

        },
        nteam: {
            required: true,
        },
        profile: {
            required: true,
            // extension: "png|jpeg|jpg",
        },
        gender: {
            required: true,
        },
        price: {
            required: true,
        },
        fees: {
            required: true,
        },
        from_date: {
            required: true,
            digits: false
        },
        to_date: {
            required: true,
            digits: false
        }

    };
    var msg = {

        gname: { required: "Please enter name." },
        tname: { required: "Please enter tournament name." },
        nteam: { required: "Please enter the total no of team can take part" },
        profile: { required: "Please upload banner" },
        gender: { required: "please select the gender" },
        price: { required: "please enter the price" },
        fees: { required: "please enter the Entry fees" },
        from_date: { required: "please enter the start date" },
        to_date: { required: "please enter the End date" },
    };

    $("#to_date").change(function () {
        var startDate = document.getElementById("from_date").value;
        var endDate = document.getElementById("to_date").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alerts("error", "End date should be greater than Start date");
            document.getElementById("to_date").value = "";
        }
    });
    $("#from_date").change(function () {
        var startDate = document.getElementById("from_date").value;
        var endDate = document.getElementById("to_date").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alerts("error", "Start date should be less than Start date");
            document.getElementById("from_date").value = "";
        }
    });

    $("#add-form").validate({

        rules: Vrules,
        messages: msg,

        submitHandler: function (form) {
            var act = "<?php echo base_url() ?>user/addGame/addGameSubmit";
            $("#add-form").ajaxSubmit({
                url: act,
                type: 'POST',
                cache: false,
                dataType: 'json',
                clearForm: false,
                success: function (response) {
                    if (response.status) {
                        alerts('success', response.message);

                        setTimeout(function () {

                            window.location = "<?php echo base_url('user/dashboard/gameList') ?>";

                        }, 1000);

                    } else {

                        alerts('error', "Server Down");
                    }

                },
                error: function (response) {
                    alerts("error", response);
                    console.log(response);
                },
            });
        }
    });



</script>