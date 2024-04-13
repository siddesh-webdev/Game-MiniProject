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

        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;

        }

        :root {
            --teel: #2ec1ac;
            --teal_hover: #279e8c;

        }

        .custom-bg {
            background-color: var(--teel);
            border: 1px solid var(--teel);
        }

        .custom-bg:hover {
            background-color: var(--teal_hover);
            border-color: var(--teal_hover);
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
    <?php
    require ("header.php");
    ?>

    <!-- Container-fluid starts-->
    <div class="container px-1 py-5 mx-auto ">
        <div class="card p-4 login-form ">
            <h5 class="card-title mb-3"> Login Here </h5>
            <div class="row d-flex justify-content-center">
                <!-- <form id="add-form" enctype="multipart/form-data" method="post" action=""> -->
                <form id="login-form">
                    <div class="col-md-12 ">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control shadow-none" required>

                    </div>
                    <div class="col-md-12">
                        <label class="form-label mt-2">Password</label>
                        <input name="password" type="password" class="form-control shadow-none" required>
                    </div>
                    <div class="col-md-12 ">
                        <a href="<?php echo base_url(); ?>registration" class="shadow-none mt-3"
                            style="text-decoration:none">Sign Up,New here?</a>
                    </div>
                    <div class="col-md-12 text-center">

                        <button type="submit" class="btn text-white  custom-bg shodow-none mt-3">Login</button>
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
    var Vrule =
    {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        }
    };
    var msg = {
        email: { reqiured: "Please enter Email" },
        password: { required: "Please enter password." }
    };

    $("#login-form").validate({
        rules: Vrule,
        message: msg,

        submitHandler: function (form) {

            $("#login-form").ajaxSubmit({
                url: "<?php echo base_url() ?>login/loginSubmit",
                type: 'POST',
                dataType: 'json',
                clearForm: true,

                success: function (response) {
                    if (response.status) {
                        setTimeout(function () {
                            window.location = response.link;
                        }, 1000);
                    }
                    else{
                        alerts("error",response.message);
                    }
                },
                error: function (response) {
                    alert("not done");
                }
            });
        }


    });

</script>