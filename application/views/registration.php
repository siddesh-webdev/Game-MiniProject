<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

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
    </style>
</head>

<body class="bg-light">


    <!-- Container-fluid starts-->
    <div class="container px-1 py-5 mx-auto">
        <div class="card p-4" style="">
            <h5 class="card-title mb-3"> User Details</h5>
            <div class="row d-flex justify-content-center">

                <?php $attributes = array('class' => 'theme-form', 'id' => 'add-form', 'name' => 'add-form', 'enctype' => 'multipart/form-data');
                echo form_open(base_url("registration/submitForm"), $attributes); ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control shadow-none" required>
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
                                <option selected>Select Gender </option>
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

                                    <textarea id="address_1" name="address_1" class="form-control shadow-none" rows="1"
                                        required></textarea>
                                </div>
                                <div class="col-md-4 mb-3 mt-2">
                                    <label class="form-label">Country</label>
                                    <?php
                                    $options = array('' => 'Select Country');
                                    foreach ($countries as $row) {
                                        $options[$row->id] = $row->name;
                                    }
                                    echo form_dropdown('country_1', $options, '', 'id="country_1" class="form-select country" aria-label="Default select example" row_count="1"');
                                    ?>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">State</label>
                                    <select id="state_1" name="state_1" class="form-select state"
                                        aria-label="Default select example" row_count="1">
                                        <option value="">Select state</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">City</label>
                                    <select id="city_1" name="city_1" class="form-select"
                                        aria-label="Default select example" row_count="1">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
    integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"
    integrity="sha512-7+hQkXGIswtBWoGbyajZqqrC8sa3OYW+gJw5FzW/XzU/lq6kScphPSlj4AyJb91MjPkQc+mPQ3bZ90c/dcUO5w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"
    integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/localization/messages_ar.min.js"
    integrity="sha512-rLFPpaF3u7n96Yj1paoZ5GBSAGR1ETxKo0T+kD8XHlyj1dDSMBwC7EPavNWpHUTqVKMI2F8yc9mlDSUCWaztRQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var Vrules = {
        name: {
            required: true,
            lettersonly: true
        },
        email: {
            required: true,
            email: true
        },
        contact: {
            required: true,
            maxlenght: 10
        },
        picture: {
            required: true,
            extension: "png|jpeg|jpg"
        },
        gender: {
            required: true
        },
        password: {
            required: true
        }
    };
    var msg = {
        name: { required: "Please  name." },
        email: { required: "Please enter the email" },
        contact: { required: "Please enter the contact " },
        picture: {
            required: "Please enter the profile picture"
        },
        gender: {
            required: "please select the gender"
        },
        password: {
            required: "please enter the password"
        }
    };


    $("#add-form").validate({
        ignore: [],
        rules: Vrules,
        messages: msg,
        errorPlacement: function (error, element) {
            console.log(error);
            console.log(element);
            alert("before");
            // if (element.hasClass('select2') || element.next('.select2-container').length) {
            //     // alert("Asds");
            //     error.insertAfter(element.next('.select2-container'));
            // } else if (element.parent('.input-group').length) {
            //     error.insertAfter(element.parent());
            // }
            // else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
            //     error.insertAfter(element.parent().parent());
            // }
            // else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            //     error.appendTo(element.parent().parent());
            // }
            // else {
            //     error.insertAfter(element);
            // }
            if (element.attr("name") == "usage_terms") {
                error.appendTo(element.parent("div").next("div"));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {

            $("#add-form").ajaxSubmit({
                url: "<?php echo base_url() ?>registration/submitForm",
                type: 'post',
                cache: false,
                dataType: 'json',
                clearForm: false,
                success: function (response) {
                    if (response.status) {
                        alert("hello");
                        setTimeout(function () {
                            window.location = "<?php echo base_url('registration') ?>";

                        }, 500);
                        alert("hello");
                    } else {

                        alert("failed to register");
                    }
                },
                error: function (response) {
                    // $(".loader-wrapper").fadeOut();
                    // customtoater('error', "OOPS Something Went Wrong !!");
                    // $(".save").attr("disabled", false);
                    // return false;
                    alert("nhi gel");
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
            alert("Please Enter the address first!");
            return false;
        }
        if (!$("#country_" + row_count).val()) {
            alert("please select the country");
            return false;
        }
        if (!$("#state_" + row_count).val()) {
            alert("please select the state");
            return false;

        }
        if (!$("#city_" + row_count).val()) {
            alert("please select the city ")
            return false;
        }
        row_count++;

        var html = '<div class="row mb-3 addaddressrow" id="addressdivrow_' + row_count + '" row_count="' + row_count + '">' +
            '<div class="col-md-12">' +
            '<label class="form-label">Address line</label>' +
            '<textarea id="address_' + row_count + '" name="address_' + row_count + '" class="form-control shadow-none" rows="1" row_count="' + row_count + '" required></textarea>' +
            '</div>' +
            '<div class="col-md-4 mb-3 mt-2">' +
            '<label class="form-label">Country</label>' +
            '<select id="country_' + row_count + '" name="country_' + row_count + '" class="form-select country"  aria-label="Default select example" row_count="' + row_count + '">' +
            '<option>Select Country</option>' +

            '<?php foreach ($countries as $row) { ?>' +

                "<option value='<?= $row->id ?>'><?= $row->name ?> </option>" +

                '<?php } ?>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-4 mb-3 mt-2">' +
            '<label class="form-label">State</label>' +
            '<select id="state_' + row_count + '" name="state_' + row_count + '" class="form-select state" aria-label="Default select example" row_count="' + row_count + '">' +
            '<option value="">Select state</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-4 mb-3 mt-2">' +
            ' <label class="form-label">City</label>' +
            '<select id="city_' + row_count + '" name="city_' + row_count + '" class="form-select" aria-label="Default select example" row_count="' + row_count + '">' +
            '<option value="">Select city</option>' +
            '</select>' +
            '</div>' +
            ' </div > ';


        $('#addressFields').append(html);

    });

    $(document).on("click",".removeaddressrow" ,function(){

        var div_row_count = $(".addaddressrow").length;
        var row_count = $(this).attr("row_count");

       
        if(div_row_count=='1')
        {
            alert("you have reached the limits");
        }
        else{
          
          
            if($("#addressdivrow_"+row_count).remove()){
                alert("done");
            }
            else
            {
                alert("somewent wrongh")
            }
        }

    });

</script>