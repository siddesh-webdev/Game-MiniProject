
</div>
    </div>
</body>

</html>

<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
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
