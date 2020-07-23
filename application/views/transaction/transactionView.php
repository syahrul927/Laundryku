<div class="col col-content">
    <div class="row content-header" >
        <div class="col-sm">
            <span class="page-title">Transaction Page</span>
        </div>
        <div class="col-sm-3" style="padding-bottom: 30px;">
            <div class="username" style="display: inline-block;">
                <?php echo $_SESSION['username'] ?>
            </div>
            <a  style="display: inline-block; padding: 0px;" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item dropdown-menu-left" href="#">Logout</a>
            </div>
        </div>
    </div>
    <div class="row content-body">
        <div class="col-sm">
            <div class="row ">
                <div class="col-sm title-content"><span>Data Transaction</span></div>
                <div class="col-sm-5">
                    <button class="btn btn-primary btn-sm my-btn add-btn" data-toggle="modal" data-target="#modalTransaction">Add New</button>
                </div>
            </div>
            <div class="row">
                <table class="table my-table">
                    <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Delivery</th>
                            <th scope="col">Tanggal Order</th>
                            <th scope="col">Status</th>
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
                            <div class="sub-menu">
                                <span class="title">Ongoing</span>
                            </div>
                            <div class="sub-menu">
                                <span class="title">History</span>
                            </div>
                        </div>
                        <div class="col-sm4">
                            <button class="btn btn-primary btn-sm my-btn">&nbsp; + &nbsp;</button>
                        </div>
                    </div>

                    <div class="row">
                        <!-- dummy list, it will change when hit api get result -->
                        <div class="detail-content" id="detail-ongoing-container">
                            <div class="ongoing-content" id="ongoing-content">
                                <!-- one day one record -->
                                <div class="row">
                                    <div class="history-header" id="ongoing-header">
                                        <span id="title-header-ongoing">13 Jun 2020</span>
                                    </div>
                                </div>
                                <div class="row trans-detail">
                                    <div class="col-md1">
                                        <span class="fa" id="status-code-icon-ongoing"></span>
                                    </div>
                                    <div class="col-md4">
                                        <div class="package">
                                            PAKET ANJING
                                        </div>
                                        <div class="date-time">
                                            13 Jun 2020 at 10:40
                                        </div>
                                    </div>
                                    <div class="col-md3 history-delivery">
                                        <span id="ongoing-delivery">Not Delivery</span>
                                    </div>
                                    <div class="col-md1" id="qty">
                                        x1
                                    </div>
                                    <div class="col-md1 cash">
                                        Rp 15.000
                                    </div>
                                    <div class="col-md2">
                                        <div class="action-ongoing">
                                            <div class="action-ongoing-menu">
                                                <a href="#">Done</a>
                                                <a href="#">Delivery</a>
                                                <a href="#">Finish</a>
                                            </div>
                                            <span class="fa fa-ellipsis-v"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="detail-content" id="detail-history">
                            <div class="history-content">
                                <!-- one day one record -->
                                <div class="row">
                                    <div class="history-header" id="history-header">
                                        <span class="title-header-history">13 Jun 2020</span>
                                    </div>
                                </div>
                                <div class="row trans-detail">
                                    <div class="col-md1">
                                        <span class="fa" id="status-code-icon-history"></span>
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

                            <!-- <div class="history-content">
                                <div class="row">
                                    <div class="history-header">
                                        <span>01 Jun 2020</span>
                                    </div>
                                </div>
                                <div class="row trans-detail">
                                    <div class="col-md1">
                                        <span class="fa fa-flag-checkered"></span>
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
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var listCustomerGlobal = null
    var listPackageGlobal = null

    function actionStatus(e) {
        var urlUpdateStatus = "<?php echo base_url("transaction/update/status") ?>"
        var data = {
            orderId: $(e).data('orderid'),
            statusCode: $(e).data('status')
        }
        swal({
                title: "Anda yakin ingin mengupdate status menjadi " + $(e).text() + "?",
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
                    $.post(urlUpdateStatus, JSON.stringify(data), null, "json").done((res) => {
                        swal.stopLoading()
                        if (res) {
                            if (res.success) {
                                swal("Berhasil Mengupdate", {
                                    icon: "success",
                                });
                                loadListTable()
                            } else {
                                swal("Failed", res.responseJSON.nessage, "error");
                            }

                        }
                    })
                } else {
                    swal("Batal menghapus");
                }
            });

    }
    $(document).ready(function() {
        loadListTable()
        var idx = 1
        $('.detail-content').eq(idx).show()
        $(".sub-menu").eq(idx).addClass('active')
        $('.detail-content').not(':eq(' + idx + ')').hide()
        $(".sub-menu").not(':eq(' + idx + ')').removeClass('active')
    });

    $('.sub-menu').click(function() {
        var idx = $(this).index()
        $(".sub-menu").not(':eq(' + idx + ')').removeClass('active')
        $('.detail-content').not(':eq(' + idx + ')').hide()
        $(this).addClass('active')
        $('.detail-content').eq(idx).show()

    })

    function afterSave(res) {
        loadListTable();
    }

    function appentToTable(i, o) {
        var listContent = $('<tr></tr>');
        var orderId = $('<td></td>').append(o.orderId);
        var name = $('<td></td>').append(o.name);
        var packageName = $('<td></td>').append(o.packageName);
        var delivery = $('<td></td>').append(parseInt(o.delivery) === 1 ? "Diantar" : "Ambil Sendiri");
        var createtm = $('<td></td>').append(o.createtm);
        var iconStatus = $('<span class="fa"></span>').addClass(getIconStatusCode(parseInt(o.statusCode)))
        var statusCode = $('<td></td>').append(iconStatus);
        listContent.append(orderId);
        listContent.append(name);
        listContent.append(packageName);
        listContent.append(delivery);
        listContent.append(createtm);
        listContent.append(statusCode);
        var s = parseInt(o.statusCode);
        var isDelivery = parseInt(o.delivery) === 1 ? '<a data-orderid=' + o.orderId + ' data-status="30" class="dropdown-item actionStatusTrans statusDelivery" href="#"  onclick="actionStatus(this)">Delivery</a>' : ''
        if (s === 10 || s === 20 || s === 30) {
            listContent.append(
                '<td class="tools">' +
                '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                '<i class="fa  fa-fw"></i>' +
                '</a>' +
                '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">' +
                '<a data-orderid=' + o.orderId + ' data-status="20" class="dropdown-item actionStatusTrans statusDone" href="#"  onclick="actionStatus(this)">Done</a>' +
                isDelivery +
                '<a data-orderid=' + o.orderId + ' data-status="40" class="dropdown-item actionStatusTrans statusFinish" href="#" onclick="actionStatus(this)">Finish</a>' +
                '</div>' +
                '</td>')
        } else {
            listContent.append('<td>Completed</td>')
        }
        return listContent
    }

    function getIconStatusCode(sc) {
        var icon = ""
        switch (sc) {
            case 10:
                icon = "fa-hourglass-start";
                break;
            case 20:
                icon = "fa-check";
                break;
            case 30:
                icon = "fa-bicycle";
                break;
            case 40:
                icon = "fa-flag-checkered";
                break;
            default:
                icon = "fa-ban";
                break;
        }
        return icon
    }

    function setupDetailCustomer(customerId = null) {
        var urlHistoryTransaction = "<?php echo base_url("transaction/history/") ?>";
        if (customerId !== null) {
            $.get(urlHistoryTransaction + customerId, function(result) {
                var ongoingParent = $('#detail-ongoing-container')
                if (result.content.length > 0) {
                    $('#ongoing-content').attr('style', 'display: block !important');
                    var listHistory = result.content
                    var ongoingHeader = $('#ongoing-header')
                    var ongoingQty = $('#qty')
                    var ongoingCash = $('.cash')
                    var ongoingStatus = $('#status-code-icon-ongoing')
                    var ongoingPackage = $('.package')
                    var ongoingdateTime = $('.date-time')
                    var ongoingDeliv = $('#ongoing-delivery')
                    var ongoingTitle = []

                    var listComponent = []
                    $.each(listHistory, (i, o) => {
                        var d = new Date(o.modifiedtm);
                        var str = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear()
                        if (!ongoingTitle.includes(str)) {
                            var dateHeader = $('#title-header-ongoing').empty().append(str)
                            ongoingHeader.prepend(dateHeader)
                            ongoingTitle.push(str)
                        } else {
                            ongoingHeader.empty()
                        }
                        var str2 = getStringDate(o.createtm)
                        var icon = ""
                        switch (parseInt(o.statusCode)) {
                            case 10:
                                icon = "fa-hourglass-start";
                                break;
                            case 20:
                                icon = "fa-check";
                                break;
                            case 30:
                                icon = "fa-bicycle";
                                break;
                            case 40:
                                icon = "fa-flag-checkered";
                                break;
                            default:
                                icon = "fa-ban";
                                break;
                        }
                        ongoingStatus.removeClass().addClass("fa").addClass(icon)
                        ongoingPackage.empty().append(o.packageName)
                        ongoingQty.empty().append('x').append(o.qty)
                        ongoingCash.empty().append('Rp ').append(o.total)
                        ongoingdateTime.empty().append(str2)
                        ongoingDeliv.empty().append(o.delivery == 0 ? "Not Delivery" : "Delivery")
                        var ongoingContent = $('#ongoing-content').clone()
                        listComponent.push(ongoingContent)
                    })
                    ongoingParent.empty()
                    $.each(listComponent, (i, o) => {
                        ongoingParent.append(o)
                    })

                } else {
                    $('.title-nothing').empty()
                    $('.ongoing-content').each(function(index, element) {
                        $(element).attr('style', 'display: none !important');
                    })
                    ongoingParent.append("<h3 class='title-nothing'><center> Belum Ada apa apa :( </center></h3>")
                }

            })
        }

    }

    function getStringDate(date) {
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var j = new Date();
        var str2 = j.getDate() + " " + month[j.getMonth()] + " " + j.getFullYear() + " at " + j.getHours() + ":" + j.getMinutes()
        return str2
    }

    function loadListTable() {
        var urlListCustomer = "<?php echo base_url("transaction/show") ?>";
        $.get(urlListCustomer, function(result) {
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
                var customerId = $(this).data('id')
                var pat = $('.detail-customer')
                // $('.detail-customer').append("<h1>" + customerId + "</h1>").slideToggle("slow");
                if (pat.is(":visible")) {
                    pat.slideToggle("slow")
                    if ($(this).data('id') === pat.data("id")) {
                        pat.data("id", null)
                    } else {
                        setupDetailCustomer(($(this).data("id")))
                        console.log($(this).data("id"))
                        pat.data("id", $(this).data("id"))
                        pat.slideToggle("slow");
                    }
                } else {
                    // pat.empty()
                    setupDetailCustomer(($(this).data("id")))
                    console.log($(this).data("id"))
                    pat.data("id", $(this).data("id"))
                    pat.slideToggle("slow");
                }
            });
            $('.btn-delete a').click(function() {
                var p = $(this).data('id')
                var urlDelete = "<?php echo base_url("customer/delete") ?>"
                var data = {
                    customerId: p
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
                $.get(urlListCustomer + "/detail/" + p, function(result) {
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
</script>