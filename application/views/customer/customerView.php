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
                            <button class="btn btn-primary btn-sm my-btn">&nbsp; + &nbsp;</button>
                        </div>
                    </div>

                    <div class="row">
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
                                        <span class="fa" id="status-code-icon"></span>
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
                                    <div class="history-header">
                                        <span class="">13 Jun 2020</span>
                                    </div>
                                </div>
                                <div class="row trans-detail">
                                    <div class="col-md1">
                                        <span class="fa fa-check"></span>
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
        console.log(res)
        loadListTable();
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
            '<div class="btn-tools btn-view"><a href="#" data-id=' + o.customerId + '><span class="fa fa-eye"></span></a></div>' +
            '</td>'
        )
        return listContent
    }

    function setupDetailCustomer(customerId = null) {
        var urlHistoryTransaction = "<?php echo base_url("transaction/history/") ?>";
        if (customerId !== null) {
            $.get(urlHistoryTransaction + customerId, function(result) {
                console.log(result)
                var parent = $('#detail-ongoing-container')
                if (result.content.length > 0) {
                    $('#ongoing-content').attr('style', 'display: block !important');
                    console.log("sini")
                    var listHistory = result.content
                    var historyHeader = $('#ongoing-header')
                    var qty = $('#qty')
                    var cash = $('.cash')
                    var status = $('#status-code-icon')
                    var package = $('.package')
                    var dateTime = $('.date-time')
                    var deliv = $('#ongoing-delivery')
                    var title = []

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
                    var listComponent = []
                    $.each(listHistory, (i, o) => {
                        var d = new Date(o.modifiedtm);
                        var str = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear()
                        if (!title.includes(str)) {
                            var dateHeader = $('#title-header-ongoing').empty().append(str)
                            historyHeader.prepend(dateHeader)
                            title.push(str)
                        } else {
                            historyHeader.empty()
                        }
                        var j = new Date(o.createtm);
                        var str2 = j.getDate() + " " + month[j.getMonth()] + " " + j.getFullYear() + " at " + j.getHours() + ":" + j.getMinutes()
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
                        console.log(icon)
                        status.removeClass().addClass("fa").addClass(icon)
                        package.empty().append(o.packageName)
                        qty.empty().append('x').append(o.qty)
                        cash.empty().append('Rp ').append(o.total)
                        dateTime.empty().append(str2)
                        deliv.empty().append(o.delivery == 0 ? "Not Delivery" : "Delivery")
                        var ongoingContent = $('#ongoing-content').clone()
                        listComponent.push(ongoingContent)
                    })
                    parent.empty()
                    $.each(listComponent, (i, o) => {
                        console.log("LIST COMPONENT")
                        parent.append(o)
                    })

                } else {
                    $('.ongoing-content').each(function (index, element) {
                      $(element).attr('style', 'display: none !important');
                    })
                    parent.append("<h3><center> Belum Ada apa apa :( </center></h3>")
                }

            })
        }

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
    $('.feat-btn').click(function() {
        $('nav ul .feat-show').toggle("slow");
    });
</script>