$(document).ready(function() {

    let deleteCate = $('.table-categiories .delete-btn');
    let deleteType = $('.table-types .delete-btn');
    let deleteProduct = $('.table-products .delete-btn');
    let deleteReview = $('.table-reviews .delete-btn');
    let deleteInvoice = $('.table-invoice .delete-btn');

    handleDelete(deleteCate);
    handleDelete(deleteType);
    handleDelete(deleteProduct);
    handleDelete(deleteReview);
    handleDelete(deleteInvoice);

    function handleDelete(selector) {
      selector.on('click', function(e) {
        e.preventDefault();
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
            $.ajax({
                type: "GET",
                url: $(this).data('delete-url'),
                success: function(res) {
                  if(res.deleted == 1) {
                    Swal.fire(
                      res.message
                    )
                  }
                  location.reload();
                }
            })
          }
        });
      })
    };
    let active_btn = '.table-users .active-btn';
    handleActive(active_btn);
  
    function handleActive(selector) {
      $(document).on('click', selector , function(e) {
        e.preventDefault();
        var id = $(this).data('user-id');
        var active_btn = $(this);
        $.ajax({
            type: 'GET',
            url: active_btn.data('url'),
            success: function(res) {
              let value_btn = res.isActive == 1 ? "Khóa" : "Hoạt động";
              let value = res.isActive == 1 ? "Hoạt động" : "Khóa";
              let active = res.isActive == 1 ? 0 : 1;
              let bg_btn = res.isActive == 1 ? "bg-danger" : "bg-success";
              let html = '<a data-user-id="'+id+'" data-url="'+location.origin + '/admin/edit-user/'+id+'/'+active+'" class="active-btn ' + bg_btn + ' p-2 text-white rounded cursor-pointer" data-toggle="tooltip" data-placement="top" title="Close">'+value_btn+'</a>';
              $('.table-users .active-value-'+ id).text(value);
              active_btn.replaceWith(html);
            }
        });
      });
    }
    $('.table-products .detail-btn').on('click', function(e) {
      e.preventDefault();
      $.ajax({
          type: 'GET',
          url: $(this).data('url'),
          success: function(res) {
            let price_old = res.price * (1- res.sale/100);
            $('.product_image').attr('src', location.origin + '/userfiles/images/products/' + res.image);
            $('.product-name').text(res.product_name);
            $('.product-description').html(res.description);
            $('.price').text(price_old);
            $('.price-old').text(res.price);
            $('.size').text(res.size);
            $('.quantity').text(res.quantity);
            $('.add-infor-product').html(res.add_infor);
          }
      });
      $('#detail-product').addClass('d-flex');
    });

    $('#detail-product .close-detail-block').on('click', function() {
        $('#detail-product').removeClass('d-flex');
        $('#detail-product').addClass('d-none');
    });
});