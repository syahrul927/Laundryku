<div class="col col-content">
    <div class="row content-header">
        <div class="col-sm">
            <span class="page-title">Master Page</span>
        </div>
        <div class="col-sm-3" style="padding-bottom: 30px;">
            <div class="username" style="display: inline-block;">
                <?php echo $_SESSION['username'] ?>
            </div>
            <a style="display: inline-block; padding: 0px;" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item dropdown-menu-left" href="<?= base_url('account/logout')?>">Logout</a>
            </div>
        </div>
    </div>
    <div class="row content-body">
        <div class="col-sm card-container">
            <div class="row ">
                <div class="col-sm title-content"><span>Data Customer</span></div>
                <div class="col-sm-5">
                    <button class="btn btn-primary btn-sm my-btn add-btn" data-toggle="modal" data-target="#exampleModal">Add New</button>
                </div>
            </div>
            <div class="row">
                <table class="table my-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Address</th>
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
                            <button class="btn btn-primary btn-sm my-btn" data-toggle="modal" data-target="#modalTransaction">&nbsp; + &nbsp;</button>
                        </div>
                    </div>

                    <div class="row">
                        <!-- dummy list, it will change when hit api get result -->
                        <div class="detail-content" id="detail-ongoing-container">
                            <div class="ongoing-content" id="ongoing-content">
                                <!-- one day one record -->
                                <div class="row">
                                    <div class="history-header" id="ongoing-header">
                                        <span id="title-header-ongoing">20 Jun 2020</span>
                                    </div>
                                </div>
                                <div class="row trans-detail">
                                    <div class="col">
                                        <span class="fa" id="status-code-icon-ongoing"></span>
                                    </div>
                                    <div class="col">
                                        <div class="package">
                                            PAKET NYUCI
                                        </div>
                                        <div class="date-time">
                                            05 Jun 2020 at 10:40
                                        </div>
                                    </div>
                                    <div class="col history-delivery">
                                        <span id="ongoing-delivery">Not Delivery</span>
                                    </div>
                                    <div class="col" id="qty">
                                        x1
                                    </div>
                                    <div class="col cash">
                                        Rp 15.000
                                    </div>
                                    <div class="col-md1 " id="option-order">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa  fa-fw"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                            <a data-id="" data-status="20" class="dropdown-item actionStatusTrans statusDone" href="#" onclick="actionStatus(this)">Done</a>
                                            <a data-id="" data-status="30" class="dropdown-item actionStatusTrans statusDelivery" href="#" onclick="actionStatus(this)">Delivery</a>
                                            <a data-id="" data-status="40" class="dropdown-item actionStatusTrans statusFinish" href="#" onclick="actionStatus(this)">Finish</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="detail-content" id="detail-history-container">
                            <div class="history-content" id="history-content">
                                <!-- one day one record -->
                                <div class="row">
                                    <div class="history-header" id="history-header">
                                        <span id="title-header-history">13 Jun 2020</span>
                                    </div>
                                </div>
                                <div class="row trans-detail">
                                    <div class="col-md1">
                                        <span class="fa" id="status-code-icon-history"></span>
                                    </div>
                                    <div class="col-md6">
                                        <div class="package">
                                            Paket GOSOK BAJU
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
                                setupDetailCustomer($(e).data('customerid'))
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
    var listCustomerGlobal = null
    var listPackageGlobal = null
    $(document).ready(function() {
        loadListTable()
        var idx = 0
        $('.detail-content').eq(idx).show()
        $('.sub-menu').eq(idx).addClass('active')
        $('.detail-content').not(':eq(' + idx + ')').hide()
        $('.sub-menu').not(':eq(' + idx + ')').removeClass('active')

    });
    $('.sub-menu').click(function() {
        // console.log("orderId")
        var idx = $(this).index()
        $(".sub-menu").not(':eq(' + idx + ')').removeClass('active')
        $('.detail-content').not(':eq(' + idx + ')').hide()
        $(this).addClass('active')
        $('.detail-content').eq(idx).show()

    })


    function afterSave(customerId = null) {
        if (customerId !== null) {
            setupDetailCustomer(customerId);
        } else {

            loadListTable();
        }
    }

    function appentToTable(i, o) {
        var listContent = $('<tr></tr>');
        var number = $('<td></td>').append(i + 1);
        var name = $('<td></td>').append(o.name);
        var telp = $('<td></td>').append(o.telp);
        var address = $('<td></td>').append(o.address);
        listContent.append(number);
        listContent.append(name);
        listContent.append(telp);
        listContent.append(address);
        listContent.append(
            '<td class="tools">' +
            '<div class="btn-tools btn-edit"><a href="#" data-id=' + o.customerId + ' data-toggle="modal" data-target="#exampleModal"><span class="fa fa-pencil-square-o"></span></a></div>&nbsp;' +
            '<div class="btn-tools btn-delete"><a href="#" data-id=' + o.customerId + '><span class="fa fa-trash"></span></a>' +
            '</div>' +
            '<div class="btn-tools btn-view"><a href="#" data-customerName=' + o.name + ' data-id=' + o.customerId + '><span class="fa fa-eye"></span></a></div>' +
            '</td>'
        )
        return listContent
    }

    function setupDetailCustomer(customerId = null) {
        var urlHistoryTransaction = "<?php echo base_url("transaction/history/") ?>";
        if (customerId !== null) {
            $.get(urlHistoryTransaction + customerId, function(result) {
                var ongoingParent = $('#detail-ongoing-container')
                var historyParent = $('#detail-history-container')
                if (result.content.length > 0) {
                    $('#ongoing-content').attr('style', 'display: block !important');
                    var listHistory = result.content
                    console.log(listHistory)
                    var ongoingHeader = $('#ongoing-header')
                    var ongoingTitleDate = $('#title-header-ongoing').empty()
                    var ongoingQty = $('#qty')
                    var ongoingCash = $('.cash')
                    var ongoingStatus = $('#status-code-icon-ongoing')
                    var ongoingPackage = $('.package')
                    var ongoingdateTime = $('.date-time')
                    var actionStatusTrans = $('.actionStatusTrans')
                    var ongoingDeliv = $('#ongoing-delivery')
                    var ongoingTitle2 = []
                    var ongoingTitle = []

                    var listComponent2 = []
                    var listComponent = []
                    $.each(listHistory, (i, o) => {
                        var str = getStringDate(o.modifiedtm)
                        var sc = parseInt(o.statusCode)
                        if (sc === 10 || sc === 20 || sc === 30) {
                            $('#option-order').show()
                            removeDuplicateHeaderDate(str, ongoingTitle, ongoingHeader, ongoingTitleDate)
                        } else {
                            $('#option-order').hide()
                            removeDuplicateHeaderDate(str, ongoingTitle2, ongoingHeader, ongoingTitleDate)
                        }
                        var str2 = getStringDate(o.createtm)
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
                        ongoingStatus.removeClass().addClass("fa").addClass(icon)
                        ongoingPackage.empty().append(o.packageName)
                        ongoingQty.empty().append('x').append(o.qty)
                        ongoingCash.empty().append('Rp ').append(o.total)
                        ongoingdateTime.empty().append("Created at " + str2)

                        var del = ""
                        if (o.delivery == 0) {
                            del = "Ambil Sendiri"
                            $(".statusDelivery").hide()
                        } else {
                            del = "Diantar"
                            $(".statusDelivery").show()
                        }
                        ongoingDeliv.empty().append(del)
                        var ongoingContent = $('#ongoing-content').clone()
                        if (sc === 10 || sc === 20 || sc === 30) {
                            // console.log(ongoingContent.find(actionStatusTrans))
                            ongoingContent.find(".actionStatusTrans").data('orderid', o.orderId)
                            ongoingContent.find(".actionStatusTrans").data('customerid', o.customerId)
                            listComponent.push(ongoingContent)
                        } else {
                            listComponent2.push(ongoingContent)
                        }

                    })
                    ongoingParent.empty()
                    if (listComponent.length > 0) {
                        $.each(listComponent, (i, o) => {
                            ongoingParent.append(o)

                        })
                    } else {
                        clearOngoingContent(ongoingParent)
                    }
                    historyParent.empty()
                    if (listComponent2.length > 0) {
                        $.each(listComponent2, (i, o) => {
                            historyParent.append(o)

                        })
                    } else {
                        clearHistoryContent(historyParent)
                    }

                } else {
                    clearOngoingContent(ongoingParent)
                    clearHistoryContent(historyParent)
                }

            })
        }

    }

    function removeDuplicateHeaderDate(str, titleList, headerComponent, titleComponent) {
        if (!titleList.includes(str)) {
            var dateHeader = titleComponent.empty().append(str)
            headerComponent.append(dateHeader)
            titleList.push(str)
        } else {
            headerComponent.empty()
        }

    }

    function clearHistoryContent(historyParent) {

        $('.title-nothing-history').empty()
        $('.history-content').each(function(index, element) {
            $(element).attr('style', 'display: none !important');
        })
        historyParent.append("<h3 class='title-nothing-history'><center> Belum Ada apa apa :( </center></h3>")
    }

    function clearOngoingContent(ongoingParent) {

        $('.title-nothing-ongoing').empty()
        $('.ongoing-content').each(function(index, element) {
            $(element).attr('style', 'display: none !important');
        })
        ongoingParent.append("<h3 class='title-nothing-ongoing'><center> Belum Ada apa apa :( </center></h3>")
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
        var j = new Date(date);
        var str2 = j.getDate() + " " + month[j.getMonth()] + " " + j.getFullYear()

        return str2
    }

    function loadListTable() {
        var urlListCustomer = "<?php echo base_url("customer/show") ?>";
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
                var customerName = $(this).data('customername')
                var pat = $('.detail-customer')
                console.log($(this).data())
                $('.detail-title').empty().prepend(customerName + '\'s Transaction')
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
                            $.post(urlDelete, JSON.stringify(data), null, "json").done((res) => {
                                swal.stopLoading()
                                if (res) {
                                    if (res.success) {
                                        swal("Berhasil Menghapus", {
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