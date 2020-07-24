<div class="col col-content">
    <div class="row content-header">
        <div class="col-sm">
            <span class="page-title">Report Page</span>
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
        <div class="col-sm">
            <div class="row ">
                <div class="col title-content"><span>Report Form</span></div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="<?php echo base_url("transaction/exportReport") ?>" method="post" target="_blank">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Dari Tanggal</label>
                                    <input type="Date" name="dateFrom" id="dateFrom" placeholder="Dari Tanggal" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hingga Tanggal</label>
                                    <input type="date" name="dateTo" id="dateTo" placeholder="Hingga Tanggal" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col order-2">
                                <div class="form-group">
                                    <label for="">Export type</label><br>
                                    <button type="submit" class="btn btn-primary my-btn" name="exportpdf" id="buttonPdf" onclick="exportPdf()">Export to Pdf</button>
                                    <button type="submit" class="btn btn-primary my-btn" name="exportexcel" id="buttonExcel">Export to Excel</button>
                                </div>
                            </div>
                            <div class="col order-1">
                                <div class="form-group">
                                    <label for="">Nama Customer</label>
                                    <select name="customerId" id="customerId" class="form-control js-example-basic-single" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var listCustomerGlobal
        swal({
            text: 'Silahkan tunggu..!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            timerProgressBar: true,
            button: false,
            onOpen: () => {
                swal.showLoading()
            }
        })
        var urlListCustomer = "<?php echo base_url("customer/show") ?>";
        $.get(urlListCustomer, function(result) {
            listCustomerGlobal = result.content;
        }).then(function() {
            swal.close()
            //saat customer sudah ditemukan
            customerOption = $.map(listCustomerGlobal, function(o) {
                return {
                    id: o.customerId,
                    text: o.name
                }
            })


            customerOption.unshift({
                id: '',
                text: 'Pilih Customer'
            })

            $('#customerId').select2({
                data: customerOption
            })
        })
    })

    function exportPdf() {
        // var dateFrom = $('#dateFrom').val()
        // var dateTo = $('#dateTo').val()
        // var customerId = $('#customerId').val()
        // var urlExportToPdf = "<?php echo base_url("transaction/exportpdf") ?>";
        // var data = {
        //     customerId: customerId,
        //     dateTo: dateTo,
        //     dateFrom: dateFrom
        // }
        // console.log(data)
        // $.post(urlExportToPdf, JSON.stringify(data), window.open(urlExportToPdf), "json")

    }
</script>