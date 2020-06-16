<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?php echo base_url('assets/css/style-v1.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>">
    <script src="<?php echo base_url('assets/js/jquery-3.5.1.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">

    <title>Home Page LaundryKu</title>
</head>

<body>
<div class="container-fluid">
        <div class="row my-container">
            <div class="col-2 col-sidebar">
                <nav class="sidebar">
                    <div class="title-sidebar">LaundryKu</div>
                    <ul>
                        <li>
                            <div class="nav-menu"><a href="#"><span class="fa fa-home "></span>Dashboard</a></div>
                        </li>
                        <li>
                            <div class="nav-menu"><a href="#" class="feat-btn"><span class="fa fa-database" aria-hidden="true"></span>Master</a></div>
                            <ul class="feat-show">
                                <li>
                                    <div class="nav-menu"><a href="#">Customer</a></div>
                                </li>
                                <li>
                                    <div class="nav-menu"><a href="#">User</a></div>
                                </li>
                                <li>
                                    <div class="nav-menu"><a href="#">Package</a></div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="nav-menu"><a href="#"><span class="fa fa-shopping-cart "></span>Transaction</a>
                            </div>
                        </li>
                        <li>
                            <div class="nav-menu"><a href="#"><span class="fa fa-book "></span>Report</a></div>
                        </li>
                    </ul>
                    <img src="<?php echo base_url('assets/images/sidebar-icon.png') ?>" alt="" class="sidebar-icon">
                </nav>
            </div>