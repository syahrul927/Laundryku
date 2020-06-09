<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?php echo base_url('assets/css/style-v1.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/a076d05399.js') ?>"></script>

    <title>Home Page LaundryKu</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row my-container">
            <div class="col-2 col-sidebar">
                <nav class="sidebar">
                    <div class="title-sidebar">LaundryKu</div>
                    <ul>
                        <li><a href="#"><span class="fa fa-home "></span>Home</a></li>
                        <li><a href="#" class="feat-btn"><span class="fa fa-database "></span>Master</a>
                            <ul class="feat-show">
                                <li><a href="#">Customer</a></li>
                                <li><a href="#">Kasir</a></li>
                                <li><a href="#">Paket</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="fa fa-shopping-cart "></span>Transaksi</a></li>
                        <li><a href="#"><span class="fa fa-book "></span>Laporan</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col col-content">
                <div class="row content-header">
                    <div class="col-sm">
                        <span class="page-title">Master Page</span>
                    </div>
                    <div class="col-sm-3">
                        <a href="#">
                            <span class="user-acc"><?php echo $_SESSION['username'] ?></span>&nbsp;
                            <span class="fas fa-caret-down first"></span>
                        </a>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="col-sm">
                        <div class="row ">
                            <div class="col-sm"><span class="title-content">Data Customer</span></div>
                            <div class="col-sm-5"><input type="text" name="" id="" placeholder="Search..." class="form-search"> <button class="btn btn-primary">+</button></div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead >
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    <script>
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass("show");
        });
    </script>
</body>

</html>