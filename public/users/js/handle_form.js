$(document).ready(function() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#form-review').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: form,
        success: function(res) {
          console.log(res);
          let time_create = formatDate(res.created_at);
          let html = '<div class="rating-ele d-flex mb-3"><div class="rating-left">' +
              '<img class="d-block" src="' + location.origin + '/userfiles/images/users/' + res.avatar + '" alt="customer" width="60" height="60">' +
              '<div class="customer-rate mr-2"><div class="fill-ratings" style="width: ' + res.rate * 100/5+ '%;">'+
              '<span>★★★★★</span></div><div class="empty-ratings"><span>★★★★★</span></div></div>' + 
          '</div><div class="comment"><p class="m-0 f-bolder">'+ res.user_name +'</p><p class="m-0">'+res.review_content+'</p>' +
          '<p class="time-create text-left m-0">' +time_create+ '</p></div></div>';
            $('.rating-list').append(html);
        }
    });
  });
  $('.product').on('click', '.btn-product > .btn-add-cart', function(e) {
    e.preventDefault();
    var product_id = $(this).data('product-id');
    var quantity = $(this).data('quantity');
    $.ajax({
      type: 'POST',
      url: location.origin + '/cart/add-to-cart',
      data: {
        'product_id' : product_id,
        'quantity' : quantity
      },
      success: function(res) {
        if(res.err) {
          Swal.fire(
            res.message
          )
        } else {
          console.log(res.cart_count);
          $('.cart-count').text(res.cart_count);
        }
      }
    });
  });
  function formatDate ($time) {
    var date = new Date();
    var dateStr = ("00" + date.getHours()).slice(-2) + ":" +
      ("00" + date.getMinutes()).slice(-2) + " " +
      ("00" + (date.getMonth() + 1)).slice(-2) + "/" +
      ("00" + date.getDate()).slice(-2) + "/" +
      date.getFullYear();
    return dateStr;
  }
});