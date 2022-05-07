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
        console.log(res);
        if(res.err) {
          Swal.fire({
            icon: 'error',
            text: res.err,
          })
        } else {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Thêm thành công',
            showConfirmButton: false,
            timer: 1500
          });
          $('.cart-count').text(res.cart_count);
        }
      }
    });
  });

  $('.table-cart #quantity').on('change', function(e) {
    e.preventDefault();
    var product_id = $(this).data('product-id');
    var quantity = $(this).val();
    var size = $(this).data('size');
    $.ajax({
      type: 'POST',
      url: location.origin + '/cart/update-cart',
      data: {
        'product_id' : product_id,
        'quantity' : quantity,
        'size' : size
      },
      success: function(res) {
        if(res.err) {
          Swal.fire(
            res.message
          )
        } else {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Sửa thành công',
            showConfirmButton: false,
            timer: 1500
          });
          let totalElement = 0;
          let subtotal = 0;
          let total = 0;
          let price = res[product_id + '-' +size]['products']['price'];
          let sale = res[product_id + '-' +size]['products']['sale'];
          for (let ele of Object.entries(res)) {
            totalElement = res[product_id + '-' +size]['quantity'] * price * (1 - sale/100);
            subtotal += ele[1]['quantity'] * ele[1]['products']['price'] * (1 - ele[1]['products']['sale']/100);
          }
          let shipCost = subtotal > 190000 ? 0 : 40000;
          total = subtotal + shipCost;
          $('.total-' + product_id + '-' + size).text(totalElement.toLocaleString('it-IT'));
          $('.subtotal span').html(subtotal.toLocaleString('it-IT') + '<sup>vnđ</sup>');
          $('.total span').html((subtotal + shipCost).toLocaleString('it-IT') + '<sup>vnđ</sup>');
        }
      }
    });
  });

  $('.table-cart .remove_btn').on('click', function(e) {
    e.preventDefault();
    var cart_key = $(this).data('key');
    Swal.fire({
      title: 'Bạn có chắc chắn?',
      text: "Bạn muốn xóa giỏ hàng này không!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: location.origin + '/cart/delete-cart',
          data: {
            key: cart_key,
          },
          success: function(res) {
            if(res.err) {
              Swal.fire(
                res.message
              )
            } else {
              let count = 0;
              let subtotal = 0;
              let total = 0;
              $('.cart-' + cart_key).remove();
              for (let ele of Object.entries(res)) {
                count++;
                subtotal += ele[1]['quantity'] * ele[1]['products']['price'] * (1 - ele[1]['products']['sale']/100);
              }
              let shipCost = subtotal > 190000 ? 0 : 40000;
              total = subtotal + shipCost;
              $('.subtotal span').html(subtotal.toLocaleString('it-IT') + '<sup>vnđ</sup>');
              $('.total span').html((subtotal + shipCost).toLocaleString('it-IT') + '<sup>vnđ</sup>');
              $('.cart-count').text(count);
            }
          }
        });
      }
    });
  });

  $('#form-detail').on('submit', function(e) {
    e.preventDefault();
    var _form = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: location.origin + '/cart/add-to-cart',
      data: _form,
      success: function(res) {
        if(res.err) {
          Swal.fire(
            res.message
          )
        } else {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Thêm thành công',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            $('.cart-count').text(res.cart_count);
            location.href = location.origin + '/cart';
          });
        }
      }
    });
  });

  $('.sort-category > #category_filter_sort , #category_filter, #category_filter').on('change', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    var _data = $(this).serialize();
    ajaxFilter(action, _data);
  });
  $('#category_filter > .btn-reset').on('click', function(e) {
    var action = $('#category_filter').attr('action');
    var _data = 'all';
    ajaxFilter(action, _data);
  });

  function ajaxFilter(action, _data) {
    $.ajax({
      type: "POST",
      url: action,
      data: _data,
      success: function(res) {
        $('.product-wrapper-category').html(res);
      }
    })
  };
  function formatDate ($time) {
    var date = new Date();
    var dateStr = ("00" + date.getHours()).slice(-2) + ":" +
      ("00" + date.getMinutes()).slice(-2) + " " +
      ("00" + (date.getMonth() + 1)).slice(-2) + "/" +
      ("00" + date.getDate()).slice(-2) + "/" +
      date.getFullYear();
    return dateStr;
  }

  $('#districts').html('<option hidden value="">Huyện (*)</option>');
  $('#wards').html('<option hidden value="">Xã/Phường (*)</option>');
  $('#provinces').on('change', function(e) {
    let province_id = $(this).val();
    let html = '<option hidden value="">Huyện (*)</option>';
    $.get(location.origin + '/api/provinces/' + province_id, function(res) {
      for (let districst of res) {
        html += '<option value="'+ districst['code'] + '">'+ districst['name'] + '</option>';
      }
      $('#districts').html(html);
    })
  });
  $('#districts').on('change', function(e) {
    let province_id = $('#provinces').val();
    let districts_id = $(this).val();
    let html = '<option hidden value="">Xã/Phường (*)</option>';
    $.get(location.origin + '/api/districts/' + province_id + '/' + districts_id, function(res) {
      for (let ward of res) {
        html += '<option value="'+ ward['code'] + '">'+ ward['name'] + '</option>';
      }
      $('#wards').html(html);
    })
  });
  $('#order_custom').on('submit', function(e) {
    e.preventDefault();
    $.post(location.origin + '/postCheckout', $(this).serialize(), function(res) {
      if (res.error !== undefined) {
        Swal.fire({
          title: res.error,
          showCancelButton: true,
          confirmButtonText: 'Register',
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = res.url;
          } 
        })
      }

      if (res.data != undefined) {
        location.href = res.data;
      }
    })
  });
  $('.btn-remove-invoice .remove-invoice').on('click', function(e) {
    e.preventDefault();
    var order_id = $(this).data('order-id');
    Swal.fire({
      title: 'Bạn có chắc chắn?',
      text: "Bạn muốn xóa đơn hàng này không!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: location.origin + '/remove-invoices',
          data: {
            id: order_id,
          },
          success: function(res) {
            if(res.isDelete) {
              location.href = location.origin + '/invoices';
            }
          }
        });
      }
    });
  });
});