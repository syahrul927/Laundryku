<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="my-form" role="form">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="text" value="" id="packageId-field" name="packageId-field" hidden>
                    <div class="form-group">
                        <span>Name</span>
                        <input type="text" value="" id="name-field" name="name-field" placeholder="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>Price</span>
                        <input type="number" value="" id="price-field" name="price-field" placeholder="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>Description</span>
                        <textarea name="description-field" id="description-field" cols="30" class="form-control" placeholder="description" rows="10" required></textarea>
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
            var id = $('#packageId-field').val()
            var urlSavePackage = '';
            if (id !== null && id !== '') {
                urlSavePackage = "<?php echo base_url("package/update") ?>"
            } else {
                urlSavePackage = "<?php echo base_url("package/save") ?>"
            }
            var data = {
                packageId: id,
                name: $('#name-field').val(),
                price: $('#price-field').val(),
                description: $('#description-field').val()
            }
            $.post(urlSavePackage, data).done((res) => {
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
        $('#packageId-field').val(content.packageId)
        $('#name-field').val(content.packageName)
        $('#price-field').val(content.price)
        $('#description-field').val(content.description)
    }
</script>