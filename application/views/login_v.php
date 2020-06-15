<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <meta charset="UTF-8">

    <link href="<?php echo base_url('assets/css/style-v1.css') ?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="container" style="padding-top:10%;">
        <div class="card mx-auto">
            <div class="card-body m-2">
                <h5 class="card-title mb-5 ">Login LaundryKu</h5>
                <form action="<?php echo base_url(); ?>Login/ceklogin" method="POST">
                    <div class="form-group">
                        <input type="text" required name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" required name="password" placeholder="Password" class="form-control">
                    </div>
                    <button class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>