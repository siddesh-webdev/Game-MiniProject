<div class="container">
    <div class="card p-4" style="">
        <h5 class="card-title mb-3"> Game Details</h5>
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
                    
                    </div>
                </div>
                <div class="text-center mt-2 my-1">
                    <button type="submit" class="btn btn-dark shodow-none">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>
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
            required: true
        }
       
     
    };
    var msg = {
     
        gname: { required: "Please enter name." },
        tname: { required: "Please enter tournament name."},
        nteam: { required: "Please enter the total no of team can take part" },
        profile: { required: "Please upload banner" },
        gender: { required: "please select the gender" }
       
        
    };

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

                        // setTimeout(function () {

                        //     // window.location = "<?php echo base_url('') ?>";

                        // }, 1000);

                    } else {

                        alerts('error', "Server Down");
                    }

                },
                error: function (response) {
                    alerts("error",response);
                    console.log(response);
                },
            });
        }
    });




    // $(document).on("change", ".country", function () {
    //     var country_id = $(this).val();
    //     var row_count = $(this).attr("row_count");
    //     if (country_id) {
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>user/dashboard/fetch_state",
    //             type: 'post',
    //             data: { "country_id": country_id },
    //             success: function (data) {
    //                 $("#state_" + row_count).html(data);
    //                 $("#city_" + row_count).html("<option>Select City</option>")
    //             }

    //         });
    //     }
    //     else {

    //         $("#state_" + row_count).html('<option>Select country first</option>');
    //         $("#city_" + row_count).html('<option>Select state first</option>');

    //     }
    // });


    // $(document).on("change", ".state", function () {
    //     var row_count = $(this).attr("row_count");
    //     var state_id = $(this).val();
    //     var country_id = $("#country_" + row_count).val();
    //     if (state_id) {
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>user/dashboard/fetch_city",
    //             type: 'post',
    //             data: {
    //                 'country_id': country_id,
    //                 'state_id': state_id
    //             },
    //             success: function (data) {
    //                 $("#city_" + row_count).html(data);
    //             }
    //         });
    //     }
    //     else {
    //         $("#state_" + row_count).html('<option>Select country first</option>');
    //         $("#city_" + row_count).html('<option>Select state first</option>');

    //     }
    // });

    // $(document).on("click", ".addAddressline", function () {

    //     var row_count = $(".addaddressrow:last-child").attr('row_count')

    //     if (!$("#address_" + row_count).val()) {
    //         alerts("error","Please Enter the address first!");
    //         return false;
    //     }
    //     if (!$("#country_" + row_count).val()) {
    //         alerts("error","Please select country first!");
    //         return false;
    //     }

    //     if (!$("#state_" + row_count).val()) {
    //         alerts("error", "please select the state");
    //         return false;

    //     }
    //     if (!$("#city_" + row_count).val()) {
    //         alerts("error", "please select the city ")
    //         return false;
    //     }
    //     row_count++;

    //     var html = '<div class="row mb-3 addaddressrow" id="addressdivrow_' + row_count + '" row_count="' + row_count + '">' +
    //         '<div class="col-md-12">' +
    //         '<label class="form-label">Address line</label>' +
    //         '<textarea id="address_' + row_count + '" name="address[' + row_count + ']" class="form-control shadow-none" rows="1" row_count="' + row_count + '" required></textarea>' +
    //         '</div>' +
    //         '<div class="col-md-4 mb-3 mt-2">' +
    //         '<label class="form-label">Country</label>' +
    //         '<select id="country_' + row_count + '" name="country[' + row_count + ']" class="form-select country"  aria-label="Default select example" row_count="' + row_count + '" required>' +
    //         '<option value="">Select Country</option>' +

    //  
    //         '</select>' +
    //         '</div>' +
    //         '<div class="col-md-4 mb-3 mt-2">' +
    //         '<label class="form-label">State</label>' +
    //         '<select id="state_' + row_count + '" name="state[' + row_count + ']" class="form-select state" aria-label="Default select example" row_count="' + row_count + '" required>' +
    //         '<option value="">Select state</option>' +
    //         '</select>' +
    //         '</div>' +
    //         '<div class="col-md-4 mb-3 mt-2">' +
    //         ' <label class="form-label">City</label>' +
    //         '<select id="city_' + row_count + '" name="city[' + row_count + ']" class="form-select" aria-label="Default select example" row_count="' + row_count + '" required>' +
    //         '<option value="">Select city</option>' +
    //         '</select>' +
    //         '</div>' +
    //         ' </div > ';


    //     $('#addressFields').append(html);
    // });

    // $(document).on("click",".removeaddressrow",function(){
    //     var div_row_count = $(".addaddressrow").length;
   
    //         var row_count = $(this).attr("row_count");


    //         if (div_row_count == '1') {
    //             alerts("error","you have reached the limits");
    //         }
    //         else {

    //             $(".addaddressrow:last-child").last().remove();

    //         }
    // });
</script>