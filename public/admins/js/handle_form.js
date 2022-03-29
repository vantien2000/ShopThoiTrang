$(document).ready(function() {
    $('.table-categiories .delete-btn').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).data('delete-url'),
            success: function(res) {
                if(res.deleted == 1) {
                    Swal.fire({
                        title: 'Bạn có chắc chắn?',
                        text: "Bạn muốn xóa cái thông tin này không!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xóa'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire(
                            res.message
                          )
                        }
                    })
                }
                location.reload();
            }
        })
    });
});