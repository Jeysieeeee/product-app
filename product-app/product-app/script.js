$(document).ready(function() {
  // Load product list on page load
  loadProducts();

  // Submit form using AJAX
  $('#productForm').on('submit', function(e) {
    e.preventDefault();
	console.log("data ", new FormData(this))
	
	var formData = new FormData(this);
	
    $.ajax({
      url: 'save_product.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#productForm')[0].reset();
        loadProducts();
		
		console.log("Success ")
      }
    });
  });

  // Load products using AJAX
  function loadProducts() {
    $.ajax({
      url: 'get_products.php',
      type: 'GET',
      success: function(response) {
        $('#productList tbody').html(response);
      }
    });
  }

  // Delete product using AJAX
  $(document).on('click', '.delete-product', function() {
    if (confirm('Are you sure you want to delete this product?')) {
      var id = $(this).data('id');
      var element = this;
      $.ajax({
        url: 'delete_product.php',
        type: 'POST',
        data: { id: id },
        success: function(response) {
          $(element).closest('tr').fadeOut('slow', function() {
            loadProducts();
          });
        }
      });
    }
  });
});
