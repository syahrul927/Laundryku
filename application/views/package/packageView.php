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
                <div class="col-sm title-content"><span>Data Paket</span></div>
                <div class="col-sm-5">
                    <button class="btn btn-primary btn-sm my-btn add-btn" data-toggle="modal" data-target="#exampleModal">Add New</button>
                </div>
            </div>
            <div class="row">
                <table class="table my-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody class="my-tools">
                        <!-- <tr class="list-content"> -->
                        <!-- <td scope="row" class="no">1</td>
                            <td class="packageName">Mark</td>
                            <td class="price">Otto</td>
                            <td cllass="description">@mdo</td> -->
                        <!-- </tr> -->
                    </tbody>
                </table>
                <div class="detail-customer">
                    <hr />
                    <div class="row">
                        <span class="detail-title">Transaction</span>
                    </div>
                    <div class="row">
                        <div class="col-sm8">
                            <div class="sub-menu active">
                                <span class="title">History</span>
                            </div>
                            <div class="sub-menu">
                                <span class="title">Ongoing</span>
                            </div>
                        </div>
                        <div class="col-sm4">
                            <button class="btn btn-primary btn-sm my-btn">&nbsp; + &nbsp;</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="detail-content">
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

                        </div>
                        
                        <div class="detail-content">
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

<script>
    $(document).ready(function() {
        loadListTable()
    });

    function afterSave(res) {
        console.log(res)
        loadListTable();
    }

    function appentToTable(i, o) {
        var listContent = $('<tr></tr>');
        var number = $('<td></td>').append(i + 1);
        var name = $('<td></td>').append(o.packageName);
        var price = $('<td></td>').append(o.price);
        var description = $('<td></td>').append(o.description);
        listContent.append(number);
        listContent.append(name);
        listContent.append(price);
        listContent.append(description);
        listContent.append(
            '<td class="tools">' +
            '<div class="btn-tools btn-edit"><a href="#" data-id=' + o.packageId + ' data-toggle="modal" data-target="#exampleModal"><span class="fa fa-pencil-square-o"></span></a></div>&nbsp;' +
            '<div class="btn-tools btn-delete"><a href="#" data-id=' + o.packageId + '><span class="fa fa-trash"></span></a>' +
            '</div>' +
            '<div class="btn-tools btn-view"><a href="#" data-id=' + o.packageId + '><span class="fa fa-eye"></span></a></div>' +
            '</td>'
        )
        return listContent
    }

    function loadListTable() {
        var urlListPackage = "<?php echo base_url("package/show") ?>";
        $.get(urlListPackage, function(result) {
            // console.log(result.content)  
            var data = result.content;
            var tbody = $('.my-tools');
            $(".my-tools tr").remove();
            $.each(data, (i, o) => {
                var listContent = appentToTable(i, o)

                tbody.append(listContent);
            })

        }).done(() => {
            $('.my-table').DataTable();
            $('.btn-view a').click(function() {
                var packageId = $(this).data('id')
                    $('.detail-customer').append("<h1>" + packageId + "</h1>").slideToggle("slow");
                
            });
            $('.btn-delete a').click(function() {
                var p = $(this).data('id')
                var urlDelete = "<?php echo base_url("package/delete") ?>"
                var data = {
                    packageId: p
                }
                swal({
                        title: "Anda yakin ingin menghapus?",
                        text: "Sekali dihapus tidak dapat di kembalikan",
                        icon: "warning",
                        buttons: true,
                        showLoaderOnConfirm: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'Silahkan tunggu..!',
                                allowOutsideClick: false,
                                closeOnEsc: false,
                                allowEnterKey: false,
                                timerProgressBar: true,
                                button: false,
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                            $.post(urlDelete, data).done((res) => {
                                swal.stopLoading()
                                if (res) {
                                    if (res.success) {
                                        swal("Berhasil Menghapus", {
                                            icon: "success",
                                        });
                                        loadListTable()
                                    } else {
                                        swal("Failed", res.message, "error");
                                    }

                                }
                            })
                        } else {
                            swal("Batal menghapus");
                        }
                    });

                closeForm()

            })
            $('.btn-edit a').click(function() {
                var p = $(this).data('id')
                $.get(urlListPackage + "/detail/" + p, function(result) {
                    if (result.status === 200) {
                        setupForm(result.content);
                    } else {
                        swal("Error", "Oops Something is wrong, please reload the page!", "error").then((e) => {
                            location.reload()
                        })

                    }
                })

            })
        })
    }

    $('#btn-table-rows').click(function(event) {
        // console.log();
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