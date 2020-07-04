<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="my-form" role="form">
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
                        <span>Name</span>
                        <input type="text" value="" id="name-field" name="name-field" placeholder="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>Address</span>
                        <textarea name="address-field" id="address-field" cols="30" class="form-control" placeholder="alamat" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <span>Address</span>
                        <input type="text" value="" id="telp-field" name="telp-field" placeholder="telp" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary my-btn " id="save-btn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>

$(document).ready(function(){
        $('#exampleModal').on('hide.bs.modal', function(e) {
            $('form').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
            $('#my-form').bootstrapValidator('resetForm', true);
        })
    })
$('#save-btn').click(function() {
        if ($("#my-form")[0].checkValidity()) {
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
            var id = $('#customerId-field').val()
            var urlSaveCustomer = '';
            if (id !== null && id !== '') {
                urlSaveCustomer = "<?php echo base_url("customer/update") ?>"
            } else {
                urlSaveCustomer = "<?php echo base_url("customer/save") ?>"
            }
            var data = {
                customerId: id,
                name: $('#name-field').val(),
                address: $('#address-field').val(),
                telp: $('#telp-field').val()
            }
            $.post(urlSaveCustomer, data).done((res) => {
                // console.log(res)
                if (res.status === 200) {
                    swal("Success", "Berhasil Menambahkan Data", "success");
                    $('#exampleModal').modal('hide')
                    afterSave(res.content)
                } else {
                    swal("Oops!!", "Terjadi kesalahan pada server", "error");
                }
            }).done(() => {
                swal.stopLoading()
                closeForm()
            })
        } else {
            $("#my-form")[0].reportValidity();
        }
    })


    function setupForm(content) {
        // console.log(content.name)
        $('#customerId-field').val(content.customerId)
        $('#name-field').val(content.name)
        $('#address-field').val(content.address)
        $('#telp-field').val(content.telp)
    }
</script>