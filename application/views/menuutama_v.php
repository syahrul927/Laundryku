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
            <div class="col col-content">
                <div class="row content-header">
                    <div class="col-sm">
                        <span class="page-title">Master Page</span>
                    </div>
                    <div class="col-sm-3">
                        <a href="#">
                            <span class="user-acc"><?php echo $_SESSION['username'] ?></span>&nbsp;
                            <span class="fa fa-caret-down first"></span>
                        </a>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="col-sm">
                        <div class="row ">
                            <div class="col-sm"><span class="title-content">Data Customer</span></div>
                            <div class="col-sm-5"><input type="text" name="" id="" placeholder="Search..." class="form-search">
                                <button class="btn btn-primary btn-sm my-btn" data-toggle="modal" data-target="#exampleModal">Add New</button>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table my-table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                        <th scope="col">Tools</th>
                                    </tr>
                                </thead>
                                <tbody class="my-tools">
                                    <tr>
                                        <td scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>
                                            <div class="btn-tools"><a href="#"><span class="fa fa-pencil-square-o"></span></a></div>&nbsp;<div class="btn-tools"><a href="#"><span class="fa fa-trash"></span></a>
                                            </div>
                                            <div class="btn-tools"><a href="#" data-id="1"><span class="fa fa-eye"></span></a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>
                                            <div class="btn-tools"><a href="#"><span class="fa fa-pencil-square-o"></span></a></div>&nbsp;<div class="btn-tools"><a href="#"><span class="fa fa-trash"></span></a>
                                            </div>
                                            <div class="btn-tools"><a href="#" data-id="3"><span class="fa fa-eye"></span></a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>
                                            <div class="btn-tools"><a href="#"><span class="fa fa-pencil-square-o"></span></a></div>&nbsp;<div class="btn-tools"><a href="#"><span class="fa fa-trash"></span></a>
                                            </div>
                                            <div class="btn-tools"><a href="#" data-id="3"><span class="fa fa-eye"></span></a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="detail-customer">
                                <hr />
                                <div class="row">
                                    <span class="detail-title">Transaction</span>
                                </div>
                                <div class="row">
                                    <div class="col-sm4">
                                        <div class="sub-menu active">
                                            <span class="title">History</span>
                                        </div>
                                    </div>
                                    <div class="col-sm4">
                                        <div class="sub-menu">
                                            <span class="title">Ongoing</span>
                                        </div>
                                    </div>
                                    <div class="col-sm4">
                                        <button class="btn btn-primary btn-sm my-btn">&nbsp; + &nbsp;</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="history-content">
                                        <!-- one day one record -->
                                        <div class="row">
                                            <div class="history-header">
                                                <span>13 Jun 2020</span>
                                            </div>
                                        </div>
                                        <div class="row trans-detail">
                                            <div class="col-md1">
                                                <span class="fa fa-hourglass-start"></span>
                                            </div>
                                            <div class="col-md6">
                                                <div class="package">
                                                    Paket Baju Ringan
                                                </div>
                                                <div class="date-time">
                                                    13 Jun 2020 at 10:40
                                                </div>
                                            </div>
                                            <div class="col-md3 history-delivery">
                                                <span>Not Delivery</span>
                                            </div>
                                            <div class="col-md1">
                                                x1
                                            </div>
                                            <div class="col-md1 cash">
                                                Rp 15.000
                                            </div>
                                        </div>
                                    </div>

                                    <div class="history-content">
                                        <!-- one day two record -->
                                        <div class="row">
                                            <div class="history-header">
                                                <span>01 Jun 2020</span>
                                            </div>
                                        </div>
                                        <div class="row trans-detail">
                                            <div class="col-md1">
                                                <span class="fa fa-hourglass-start"></span>
                                            </div>
                                            <div class="col-md6">
                                                <div class="package">
                                                    Kain Besar
                                                </div>
                                                <div class="date-time">
                                                    01 Jun 2020 at 10:40
                                                </div>
                                            </div>
                                            <div class="col-md3 history-delivery">
                                                <span>Not Delivery</span>
                                            </div>
                                            <div class="col-md1">
                                                x1
                                            </div>
                                            <div class="col-md1 cash">
                                                Rp 24.000
                                            </div>
                                        </div>
                                        <div class="row trans-detail">
                                            <div class="col-md1">
                                                <span class="fa fa-hourglass-start"></span>
                                            </div>
                                            <div class="col-md6">
                                                <div class="package">
                                                    Pakaian Biasa
                                                </div>
                                                <div class="date-time">
                                                    01 Jun 2020 at 15:45
                                                </div>
                                            </div>
                                            <div class="col-md3 history-delivery">
                                                <span>Not Delivery</span>
                                            </div>
                                            <div class="col-md1">
                                                x2
                                            </div>
                                            <div class="col-md1 cash">
                                                Rp 30.000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <span>Name</span>
                            <input type="text" value="" id="name-field" name="name-field" placeholder="name" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary my-btn">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.btn-tools').click(function() {
                $('.detail-customer').slideToggle("slow");
            });
        $('#btn-table-rows').click(function(event) {
            console.log();
            var values = [];
            $('table #row-selector:checked').each(function() {
                var rowValue = $(this).closest('tr').find('td.row-value').text();
                values.push(rowValue)
            });

            var json = JSON.stringify(values);

            alert(json);
        });
        $(document).on("click", ".modifyRecord", function() {
            var myBookId = $(this).data('id');
            console.log(myBookId);
            $("#name-field").val(myBookId);
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggle("slow");
        });
    </script>
