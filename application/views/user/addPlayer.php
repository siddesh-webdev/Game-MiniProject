<div class="container">
    <div class="card p-4" style="">
        <h5 class="card-title mb-3"> Player Details</h5>
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

                        <h5 class="modal-title d-flex mb-3"><i class="bi bi-geo-alt-fill me-2 "></i> Address
                            Details
                        </h5>
                        <!-- Address details -->

                        <div id="addressFields" class="addressFields">
                            <div class="row mb-3 addaddressrow" id="addressdivrow_1" row_count="1">
                                <div class="col-md-12">
                                    <label class="form-label">Address line</label>

                                    <textarea id="address_1" name="address[1]" class="form-control shadow-none" rows="1"
                                        required></textarea>
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


    $(document).on("change", ".state", function () {
        var row_count = $(this).attr("row_count");
        var state_id = $(this).val();
        var country_id = $("#country_" + row_count).val();
        if (state_id) {
            $.ajax({
                url: "<?php echo base_url(); ?>user/dashboard/fetch_city",
                type: 'post',
                data: {
                    'country_id': country_id,
                    'state_id': state_id
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

        var row_count = $(".addaddressrow:last-child").attr('row_count')

        if (!$("#address_" + row_count).val()) {
            alerts("error","Please Enter the address first!");
            return false;
        }
        if (!$("#country_" + row_count).val()) {
            alerts("error","Please select country first!");
            return false;
        }

        if (!$("#state_" + row_count).val()) {
            alerts("error", "please select the state");
            return false;

        }
        if (!$("#city_" + row_count).val()) {
            alerts("error", "please select the city ")
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

    $(document).on("click",".removeaddressrow",function(){
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