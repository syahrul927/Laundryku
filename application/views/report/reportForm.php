<div class="col col-content">
    <div class="row content-header">
        <div class="col-sm">
            <span class="page-title">Report Page</span>
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
                <div class="col title-content"><span>Report Form</span></div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="">
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
                                    <button type="button" class="btn btn-primary my-btn" id="buttonPdf">Export to Pdf</button>
                                    <button type="button" class="btn btn-primary my-btn" id="buttonExcel">Export to Excel</button>
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
    
    $(document).ready(function(){
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
    $('button').click(function() {
        var dateFrom = $('#dateFrom').val()
        var dateTo = $('#dateTo').val()
        var customerId = $('#customerId').val()
        var urlExportToPdf = "<?php echo base_url("transaction/exportpdf") ?>";
        var data = {
            customerId: customerId,
            dateTo: dateTo,
            dateFrom: dateFrom
        }
        console.log(data)
        $.post(urlExportToPdf, JSON.stringify(data), null, "json").done((result) => {
            console.log(result)

        })

    })
</script>