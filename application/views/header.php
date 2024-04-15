
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="<?= base_url("registration");?>">
                Dream12
            </a>
            <!-- <button class="navbar-toggler shadow-none " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2 fw-bold" href="">Welcome to Dream12</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="<?php echo base_url();?>login" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Login</a>
                    <a href="<?php echo base_url();?>registration" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Sign Up</a>
                    <!-- <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                        data-bs-target="#RegisterModel">
                        Register
                    </button> -->
                </div>
            </div>
        </div>
    </nav>

    <script>
         function alerts(type, msg, position = 'body') {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
            <strong>${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

        if (position == 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');

        }
        else {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(remAlert, 3000);

    }
    function remAlert() {
        document.getElementsByClassName('alert')[0].remove();
    }
        </script>

