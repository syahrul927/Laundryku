<div class="modal fade" id="modalTransaction" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="my-form-trans" role="form">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="text" value="" id="customerId-field" name="customerId-field" hidden>
                    <div class="form-group">
                        <span>Customer Name</span>
                        <!-- <input type="text" value="" id="name-field" name="name-field" placeholder="nama" class="form-control" required> -->
                        <select name="customerId" id="field-customer" class="form-control js-example-basic-single " style="width: 100%" required>

                        </select>
                    </div>
                    <div class="form-group">
                        <span>Paket </span>
                        <select name="paketId" id="field-paket" class=" form-control js-example-basic-single" style="width: 100%" required>

                        </select>
                    </div>
                    <div class="form-group">
                        <span>Jumlah</span>
                        <div class="invalid-feedback" style="display: inline-block;">*Atau dalam satuan KG </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </span>
                            <input type="text" id="qty" name="quant[1]" class="form-control input-number" value="1" min="1" max='100'>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <span>Delivery ?</span>
                        <input type="checkbox" class="form-control" style="width:5%" id="delivery-checkbox">
                    </div>
                    <div class="form-group" id="cost-delivery" style="display: none;">
                        <span>Cost Delivery</span>
                        <input type="number" name="cost" id="extraCost" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary my-btn " id="save-btn-trans">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        var customerOption = []
        var paketOption = []
        $('#modalTransaction').on('show.bs.modal', function(e) {
            customerOption = $.map(listCustomerGlobal, function(o) {
                return {
                    id: o.customerId,
                    text: o.name
                }
            })

            if (listPackageGlobal === null) {
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
                var urlListPackage = "<?php echo base_url("package/show") ?>";
                $.get(urlListPackage, function(result) {
                    listPackageGlobal = result.content;
                }).then(function() {
                    swal.close()
                    paketOption = $.map(listPackageGlobal, function(o) {
                        return {
                            id: o.packageId,
                            text: o.packageName
                        }
                    })


                    paketOption.unshift({
                        id: '',
                        text: 'Pilih Paket'
                    })
                    $('#field-paket').select2({
                        data: paketOption
                    })

                })
            }
            customerOption.unshift({
                id: '',
                text: 'Pilih Customer'
            })

            $('#field-customer').select2({
                data: customerOption
            })

        })

        $('#modalTransaction').on('hide.bs.modal', function(e) {
            $('form').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
            $('#my-form-trans').bootstrapValidator('resetForm', true);
            $('.input-number').val(1);
            $('#delivery-checkbox').prop('checked', false);
            $('#cost-delivery').hide()
        })

    })
    $('#save-btn-trans').click(function() {
        if ($("#my-form-trans")[0].checkValidity()) {
            //loading
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
            var customerId = $('#field-customer').val()
            var packageId = $('#field-paket').val()
            var delivery = $('#delivery-checkbox').val() ? 1 : 0
            var qty = Number($('.input-number').val())
            var extraCost = Number(delivery == 0 ? 0 : $('#extraCost').val())
            var pricePackage = listPackageGlobal.find(p => p.packageId === packageId)
            var price = Number(pricePackage.price)
            var total = (price * qty) + extraCost
            var urlSaveTransaction = '';
            urlSaveTransaction = "<?php echo base_url("transaction/save") ?>"
            var data = {
                customerId: customerId,
                packageId: packageId,
                qty: qty,
                delivery: delivery,
                extraCost: extraCost,
                total: total
            }
            $.post(urlSaveTransaction, JSON.stringify(data), null, "json").done((res) => {
                // console.log(res)
                if (res.status === 200) {
                    swal("Success", "Berhasil Menambahkan Data", "success");
                    $('#modalTransaction').modal('hide')
                    afterSave(customerId)
                } else {
                    swal("Oops!!", "Terjadi kesalahan pada server", "error");
                }
            }).done(() => {
                swal.close()
            })
        } else {
            $("#my-form")[0].reportValidity();
        }
    })

    $("#delivery-checkbox").change(function() {
        if (this.checked) {
            $("#cost-delivery").show()
        } else {

            $("#cost-delivery").hide()
        }
    });



    ///plus minus button
    $('.btn-number').click(function(e) {
        // e.preventDefault();
        // console.log($('#field-paket').find(':selected').val())
        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {
                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>