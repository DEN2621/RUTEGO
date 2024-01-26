$(document).ready(function() {
  $('.orderBtn').on('click', function() {
    var product = $(this).data('product');
    $('#product').val(product);
    $('#orderModal').show();
  });
  
  $('#orderForm').submit(function(e) {
    e.preventDefault();
    
    var fullName = $('#fullName').val();
    var email = $('#email').val();
    var product = $('#product').val();
    
    $.ajax({
      type: 'POST',
      url: 'order.php',
      data: {fullName: fullName, email: email, product: product},
      dataType: 'json',
      success: function(response) {
        $('#response').text(response.message);
      },
      error: function() {
        $('#response').text('Произошла ошибка при оформлении заказа.');
      }
    });
  });
});