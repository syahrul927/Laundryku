<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
                <form action="<?php echo base_url();?>Login/ceklogin" method="POST">
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