<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center ">
        <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
            <h2 class="text-center mb-4 text-primary">Form Lupa Password</h2>
            <div class="alert alert-danger d-none"></div>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control border border-primary" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                    <input type="password" class="form-control border border-primary" id="password" name="password" required>
                </div>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <p class="small"><a class="text-primary" href="<?php echo site_url('login') ?>">Login</a></p>
                <div class=" d-grid">
                    <!-- <a href="dashboard">Login</a> -->
                    <!-- <a href="Dashboard.php"><button class="btn btn-primary" type="submit">Login</button></a> -->
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script>
        $('form').validate({
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                username: {
                    required: 'Email belum dimasukkan',
                },
                password: {
                    required: 'Password belum dimasukkan',
                },
            },
            errorElement: 'em',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');

                if (element.prop('type') === 'checkbox') {
                    error.insertAfter(element.next('label'));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
            // errorElement: 'span',
            // errorPlacement: (error, element) => {
            //     error.addClass('invalid-feedback')
            //     element.closest('.input-group').append(error)
            // },
            submitHandler: () => {
                $.ajax({
                    url: '<?php echo site_url('Login_controller/lupapass') ?>',
                    type: 'post',
                    dataType: 'json',
                    data: $('form').serialize(),
                    success: res => {
                        $('.alert').html('Sukses')
                        $('.alert').addClass('alert-success')
                        $('.alert').removeClass('d-none alert-danger')
                        setTimeout(function() {
                            window.location.reload()
                        }, 1000);
                    },
                    error: err => {
                        console.log(err);
                    }
                })
            }
        })
    </script>
</body>

</html>