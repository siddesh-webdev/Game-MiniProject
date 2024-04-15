<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

        .error {
            color: #F00;
            text-decoration-color: : #FFF;
        }

        .custom-alert {
            position: fixed;
            top: 80px;
            right: 25px;
        }
    </style>
</head>

<body class="bg-light">


    <!-- Container-fluid starts-->
    <div class="container px-1 py-5 mx-auto">
        <div class="card p-4" style="">
            <h5 class="card-title mb-3"> User Details</h5>
            <div class="row d-flex justify-content-center">


                <form id="add-form" class="theme-form" name="add-form" enctype="multipart/form-data">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" id="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4  mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="contact" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Picture</label>
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
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control shadow-none" required>

                            </div>

                            <h5 class="modal-title d-flex mb-3"><i class="bi bi-geo-alt-fill me-2 "></i> Address
                                Details
                            </h5>



                            <!-- Address details -->

                            <div id="addressFields" class="addressFields">
                                <div class="row mb-3 addaddressrow" id="addressdivrow_1" row_count="1">
                                    <div class="col-md-12">
                                        <label class="form-label">Address line</label>

                                        <textarea id="address_1" name="address[1]" class="form-control shadow-none"
                                            rows="1" required></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-2">
                                        <label class="form-label">Country</label>
                                        <?php
                                        $options = array('' => 'Select Country');
                                        foreach ($countries as $row) {
                                            $options[$row->id] = $row->name;
                                        }
                                        echo form_dropdown('country[1]', $options, '', 'id="country_1" class="form-select country" aria-label="Default select example" row_count="1" required');
                                        ?>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="form-label">State</label>
                                        <select id="state_1" name="state[1]" class="form-select state"
                                            aria-label="Default select example" row_count="1" required>
                                            <option value="">Select state</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="form-label">City</label>
                                        <select id="city_1" name="city[1]" class="form-select"
                                            aria-label="Default select example" row_count="1" required>
                                            <option value="">Select city</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Button to add more address fields -->
                            <div class="col-md-4 mb-3 ">
                                <button type="button" class="btn btn-outline-dark shadow-none addAddressline"
                                    row_count="1">Add
                                    more</button>
                                <button name="remove" type="button"
                                    class="btn btn-outline-dark shadow-none removeaddressrow" row_count="1">Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shodow-none">Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>



<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>

<script>

    var Vrules = {
        //debug: true,
        ignore: [],
        name: {
            required: true,
            // lettersonly: true
        },
        email: {
            required: true,
            email: true,
            remote:{
                url:"<?= base_url('registration/checkEmailExist')?>",
                type: 'post',
                data:{
                    email_id:function(){
                        return $("#email").val();
                    }
                }
            
            },
            
        },
        contact: {
            required: true,
            maxlength: 10
        },
        profile: {
            required: true,
            extension: "png|jpeg|jpg"
        },
        gender: {
            required: true
        },
        password: {
            required: true
        },
        'address[]': {
            required: true
        },
        'country[]': {
            reqiured: true
        },
        'state[]': {
            required: true
        },
        'city[]': {
            required: true
        }
    };
    var msg = {
        ignore: [],
        name: { required: "Please  enter name." },
        email: { required: "Please enter email",
            remote: "This email address already exists. <a style='color:blue !important; text-decoration:none;' href='<?= base_url('login')?>'><b> click here to login </b> </a>"
        },
        contact: { required: "Please enter the contact " },
        profile: { required: "Please enter the profile picture" },
        gender: { required: "please select the gender" },
        password: { required: "please enter the password" },
        'address[]': { required: "please enter the address" },
        'country[]': { required: "please select the country" },
        'state[]': { required: "please select the state" },
        'city[]': { required: "please select the city" }

    };

    // console.log(Vrules);
    // console.log(msg);
    
    $("#add-form").validate({
        ignore: [],
        rules: Vrules,
        messages: msg,

        submitHandler: function (form) {
            var act = "<?php echo base_url() ?>registration/submitForm";
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

                            window.location = "<?php echo base_url('registration') ?>";

                        }, 1000);

                    } else {

                        alerts('error', "Server Down");
                    }

                },
                error: function (response) {
                    alert(response);
                    console.log(response);
                },
            });
        }
    });

    $(document).on("change", ".country", function () {

        var countryid = $(this).val();
        var row_count = $(this).attr("row_count");

        if (countryid) {
            $.ajax({
                url: '<?php echo base_url(); ?>registration/fetch_state',
                method: 'POST',
                async: true,
                data: { 'country_id': countryid },
                success: function (data) {
                    $("#state_" + row_count).html(data);
                    $("#city_" + row_count).html('<option>Select city</option>');
                }
            });
        }
        else {
            $("#state_" + row_count).html('<option>Select country first</option>');
            $("#city_" + row_count).html('<option>Select state first</option>');

        }

    });


    $(document).on("change", ".state", function () {

        var row_count = $(this).attr("row_count");
        var state_id = $(this).val();
        var country_id = $("#country_" + row_count).val();

        if (state_id != '') {
            $.ajax({
                url: '<?= base_url(); ?>registration/fetch_city',
                method: 'POST',
                async: true,
                data: {
                    "state_id": state_id,
                    "country_id": country_id
                },
                success: function (data) {
                    $("#city_" + row_count).html(data);
                }

            });
        }
        else {

            $("#state_" + row_count).html('<option>Select country first</option>');
            $("#city_" + row_count).html('<option>Select state first</option>');
        }



    });

    $(document).on("click", ".addAddressline", function () {

        var row_count = $(".addaddressrow:last-child").attr('row_count');

        //?add-form?var total_row_count =$(this).value();
        if (!$("#address_" + row_count).val()) {
            alerts("error","Please Enter the address first!");
            return false;
        }
        if (!$("#country_" + row_count).val()) {
            alerts("error","please select the country");
            return false;
        }
        if (!$("#state_" + row_count).val()) {
            alerts("error","please select the state");
            return false;

        }
        if (!$("#city_" + row_count).val()) {
            alerts("error","please select the city ")
            return false;
        }
        row_count++;

        var html = '<div class="row mb-3 addaddressrow" id="addressdivrow_' + row_count + '" row_count="' + row_count + '">' +
            '<div class="col-md-12">' +
            '<label class="form-label">Address line</label>' +
            '<textarea id="address_' + row_count + '" name="address[' + row_count + ']" class="form-control shadow-none" rows="1" row_count="' + row_count + '" required></textarea>' +
            '</div>' +
            '<div class="col-md-4 mb-3 mt-2">' +
            '<label class="form-label">Country</label>' +
            '<select id="country_' + row_count + '" name="country[' + row_count + ']" class="form-select country"  aria-label="Default select example" row_count="' + row_count + '" required>' +
            '<option value="">Select Country</option>' +

            '<?php foreach ($countries as $row) { ?>' +

                "<option value='<?= $row->id ?>'><?= $row->name ?> </option>" +

                '<?php } ?>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-4 mb-3 mt-2">' +
            '<label class="form-label">State</label>' +
            '<select id="state_' + row_count + '" name="state[' + row_count + ']" class="form-select state" aria-label="Default select example" row_count="' + row_count + '" required>' +
            '<option value="">Select state</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-4 mb-3 mt-2">' +
            ' <label class="form-label">City</label>' +
            '<select id="city_' + row_count + '" name="city[' + row_count + ']" class="form-select" aria-label="Default select example" row_count="' + row_count + '" required>' +
            '<option value="">Select city</option>' +
            '</select>' +
            '</div>' +
            ' </div > ';


        $('#addressFields').append(html);

    });

    $(document).on("click", ".removeaddressrow", function () {

        var div_row_count = $(".addaddressrow").length;
   
        var row_count = $(this).attr("row_count");


        if (div_row_count == '1') {
            alerts("error","you have reached the limits");
        }
        else {

            $(".addaddressrow:last-child").last().remove();

        }

    });

</script>