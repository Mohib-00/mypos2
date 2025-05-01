<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        width: 100%;
        max-width: 800px; 
        animation: slideDown 0.5s ease;
    }

    .modal-dialog {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    @media (max-width: 767px) {
        .modal-dialog {
            max-width: 90%; 
        }

        .modal-content {
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        .modal-content {
            padding: 10px;
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  </head>
  <body>
    <div class="wrapper">
    @include('adminpages.sidebar')

      <div class="main-panel">
        @include('adminpages.header')

        <div class="container">
            <div class="page-inner">
             
              <form id="saleformmssubmit">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-round">
                        <div class="card-header">
                          <div class="row">
                            <!-- Clients Form -->
                            <div class="col-12 col-md-2 mb-3">
                              <label for="customerSelect">Choose Employee</label>
                              <select class="form-select form-select-sm" id="customerSelect">
                                <option value="1">All</option>
                                @foreach ($users as $user)
                                  <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                            </div>
                  
                            <!-- Choose a Customer -->
                            <div class="col-12 col-md-6 mb-3">
                              <label for="smallSelect">Choose a Customer</label>
                              <select class="form-select form-select-sm" id="smallSelect">
                                <option value="1">All</option>
                                @foreach ($customers as $customer)
                                  <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                              </select>
                            </div>
                  
                            <!-- Date -->
                            <div class="col-12 col-md-2 mb-3">
                              <label for="dateInput">Date</label>
                              <input class="form-control form-control-sm" type="date" name="created_at" id="dateInput"/>
                            </div>
                  
                            <!-- Ref# -->
                            <div class="col-12 col-md-2 mb-3">
                              <label for="refInput">Ref#</label>
                              <input class="form-control form-control-sm" type="text" name="ref" id="refInput"/>
                            </div>

                            <div class="col-12 col-md-12 mb-3">
                              <label for="productSelect">Search Item</label>
                              <select class="form-select form-select-sm" id="productSelect">
                                <option value="">Select Item</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->item_name }}</option>
                                @endforeach
                            </select>
                            
                            </div>
                          

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                
                  <div class="row">

                    <div class="col-md-9">
                      <div class="card card-round">
                        <div class="card-header">
                          <div class="card-head-row card-tools-still-right">
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="productTable">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Rate</th>
                                  <th scope="col">Sub-Total</th>
                                  <th scope="col">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="3" class="text-end fw-bold">Total Items</td>
                                  <td class=" fw-bold" >
                                    <input type="number" id="totalItems"  name="totalItems" class="form-control form-control-sm text-end fw-bold" style="width: fit-content" disabled>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="3" class="text-end fw-bold">Total</td>
                                  <td class=" fw-bold" >
                                    <input type="number" id="totalAmount" name="totalAmount" class="form-control form-control-sm text-end fw-bold" style="width: fit-content;" disabled>

                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <!-- Right Side Panel -->
                    <div class="col-md-3">
                      <div class="card card-round shadow-sm">
                        <div class="card-body">
                  
                          <!-- Sale Type Section -->
                          <div class="card-head-row card-tools-still-right mb-3">
                            <div class="fw-bold" style="font-size: 16px;">Sale Type</div>
                            <div class="dropdown ms-auto">
                              <select class="form-select form-select-sm" id="saleTypeSelect" style="width: 150px; border-radius: 8px;">
                                <option value="1">Cash</option>
                                <option value="2">Credit</option>
                              </select>
                            </div>
                          </div>
                  
                          <!-- Payment Type Section -->
                          <div class="card-head-row card-tools-still-right mb-3">
                            <div class="fw-bold" style="font-size: 16px;">Payment Type</div>
                            <div class="dropdown ms-auto">
                              <select class="form-select form-select-sm" id="paymentTypeSelect" style="width: 150px; border-radius: 8px;">
                                <option value="1">Cash</option>
                                <option value="2">Bank</option>
                              </select>
                            </div>
                          </div>
                  
                          <hr>
                  
                          <!-- Discount Section -->
                          <div class="card-list py-4">
                            <div class="item-list d-flex align-items-center">
                              <div class="info-user">
                                <div class="fw-bold" style="font-size: 16px;">Discount</div>
                              </div>
                              <input class="form-control form-control-sm ms-auto" type="text" name="discount" id="discount" style="width: 150px; border-radius: 8px;" value="0" />
                            </div>
                          </div>
                  
                          <!-- Amount After Discount Section -->
                          <div class="card-list py-1">
                            <div class="item-list d-flex align-items-center">
                              <div class="info-user">
                                <div class="fw-bold" style="font-size: 16px;">Amount After Discount</div>
                              </div>
                              <input class="form-control form-control-sm ms-auto" type="number" name="amount_after_discount" id="amountafterdiscount" value="0" style="width: 120px; border-radius: 8px;"disabled />
                            </div>
                          </div>
                  
                          <hr>
                  
                          <!-- Fixed Discount Section -->
                          <div class="card-list py-4" id="fixedDiscountSection">
                            <div class="item-list d-flex align-items-center">
                              <div class="info-user">
                                <div class="fw-bold" style="font-size: 16px;">Fixed Discount</div>
                              </div>
                              <input class="form-control form-control-sm ms-auto" type="number" name="fixed_discount" id="fixeddiscount" style="width: 150px; border-radius: 8px;" value="0" disabled/>
                            </div>
                          </div>
                  
                          <!-- Amount After Fixed Discount Section -->
                          <div class="card-list py-1">
                            <div class="item-list d-flex align-items-center">
                              <div class="info-user">
                                <div class="fw-bold" style="font-size: 16px;">Amount After Fix-Discount</div>
                              </div>
                              <input class="form-control form-control-sm ms-auto" type="number" name="amount_after_fix_discount" id="amountafterfixdiscount" style="width: 120px; border-radius: 8px;" value="0" disabled/>
                            </div>
                          </div>
                  
                          <hr>
                  
                          <!-- Total Rs Section -->
                          <div class="card-list py-1">
                            <div class="item-list d-flex align-items-center">
                              <div class="info-user">
                                <div class="fw-bold" style="font-size: 16px;">Total Rs:</div>
                              </div>
                              <input class="form-control form-control-sm ms-auto" value="0" type="number" name="total" id="total" style="width: 150px; border-radius: 8px;" disabled/>
                            </div>
                          </div>
                  
                          <hr>
                  
                          <!-- Submit Button -->
                          <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary" style="width: 100px; border-radius: 8px;">Submit</button>
                          </div>
                  
                        </div>
                      </div>
                    </div>
                  
                  </div>
              </form>
                  
              </div>
        </div>

        @include('adminpages.footer')
      </div>
    </div>

    



    @include('adminpages.js')
    @include('adminpages.ajax')


    <script>
      $('#customerSelect').on('change', function () {
  var userName = $(this).val();

  $.ajax({
    url: '/get-customers-by-username/' + userName,
    type: 'GET',
    success: function (response) {
      var customers = response.customers;

      var $select = $('#smallSelect');
      $select.empty();
      $select.append('<option value="1">All</option>');

      customers.forEach(function (customer) {
        $select.append(`<option value="${customer.id}">${customer.customer_name}</option>`);
      });

      $('#fixeddiscount').val('');
      $('#fixedDiscountSection').hide();
    },
    error: function (xhr) {
      console.error('Error fetching customers:', xhr);
    }
  });
});


$('#smallSelect').on('change', function () {
  var customerId = $(this).val();

  if (customerId !== '1') {
    $.ajax({
      url: '/get-customer-discount/' + customerId,
      type: 'GET',
      success: function (response) {
        if (response.fixed_discount !== null) {
          $('#fixeddiscount').val(response.fixed_discount); 
          $('#fixedDiscountSection').show();
        } else {
          $('#fixeddiscount').val('');
          $('#fixedDiscountSection').hide();
        }

        updateTotals();
      },
      error: function (xhr) {
        console.error('Error fetching discount:', xhr);
      }
    });
  } else {
    $('#fixeddiscount').val('');
    $('#fixedDiscountSection').hide();
    updateTotals(); 
  }
});



function updateTotals() {
      let totalItems = 0;
      let totalAmount = 0;
  
      $('#productTable tbody tr').each(function () {
        const quantity = parseInt($(this).find('.quantity-input').val()) || 0;
        const subtotalText = $(this).find('td').eq(3).text().replace('Rs:', '');
        const subtotal = parseFloat(subtotalText) || 0;
  
        totalItems += quantity;
        totalAmount += subtotal;
      });
  
      $('#totalItems').val(totalItems);
  
      $('#totalAmount').val(totalAmount.toFixed(2));
  
      const discountPercentage = parseFloat($('#discount').val()) || 0;
      const fixedDiscount = parseFloat($('#fixeddiscount').val()) || 0;
  
      const amountAfterDiscount = totalAmount - discountPercentage ;
      $('#amountafterdiscount').val(amountAfterDiscount.toFixed(2));
  
      const amountAfterFixDiscount = amountAfterDiscount - fixedDiscount;
      $('#amountafterfixdiscount').val(amountAfterFixDiscount.toFixed(2));

      $('#total').val(amountAfterFixDiscount.toFixed(2));
    }

    </script>
    


    <script>
      $(document).ready(function() {
          $('#productSelect').select2({
              placeholder: "Search and select an item",
              allowClear: true
          });
      });
  </script>

<script>
  $(document).ready(function () {
    $('#productSelect').on('change', function () {
      var productId = $(this).val();
      if (!productId) return;
  
      $.ajax({
        url: '/get-product-details/' + productId,
        type: 'GET',
        success: function (product) {
          if (product.quantity === 0) {
            Swal.fire({
              icon: 'warning',
              title: 'Out of Stock',
              text: `The item "${product.item_name}" is currently out of stock.`,
              confirmButtonText: 'OK'
            });
            return; 
          }
  
          var quantity = 1;
          var retailRate = parseFloat(product.retail_rate);
          var subtotal = quantity * retailRate;
  
          var existingRow = $('#productTable tbody tr').filter(function () {
            return $(this).find('td').first().text() === product.item_name;
          });
  
          if (existingRow.length > 0) {
            var currentQuantity = parseInt(existingRow.find('.quantity-input').val());
            var newQuantity = currentQuantity + 1;
            existingRow.find('.quantity-input').val(newQuantity);
  
            var newSubtotal = newQuantity * retailRate;
            existingRow.find('td').eq(3).text('Rs:' + newSubtotal.toFixed(2));
  
            updateTotals();
          } else {
            $('#productTable tbody').append(`
              <tr>
                <td>${product.item_name}</td>
                <td class="text-end">
                  <input type="number" class="form-control form-control-sm quantity-input" value="${quantity}" min="1" style="text-align:right;width:40px">
                </td>
                <td>Rs:${retailRate.toFixed(2)}</td>
                <td>Rs:${subtotal.toFixed(2)}</td>
                <td>
                  <button class="btn btn-icon btn-round btn-danger btn-sm delete-row">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            `);
  
            updateTotals();
          }
        },
        error: function (xhr, status, error) {
          console.error('AJAX error:', error);
        }
      });
    });
  
    $(document).on('click', '.delete-row', function () {
      $(this).closest('tr').remove();
      updateTotals();
    });
  
    $(document).on('input', '.quantity-input', function () {
      const $row = $(this).closest('tr');
      let quantity = parseInt($(this).val());
  
      if (quantity < 1 || isNaN(quantity)) {
        quantity = 1;
        $(this).val(quantity);  
      }
  
      const rateText = $row.find('td').eq(2).text().replace('Rs:', '');
      const rate = parseFloat(rateText);
  
      const newSubtotal = quantity * rate;
  
      $row.find('td').eq(3).text('Rs:' + newSubtotal.toFixed(2));
  
      updateTotals();
    });
  
    function updateTotals() {
      let totalItems = 0;
      let totalAmount = 0;
  
      $('#productTable tbody tr').each(function () {
        const quantity = parseInt($(this).find('.quantity-input').val()) || 0;
        const subtotalText = $(this).find('td').eq(3).text().replace('Rs:', '');
        const subtotal = parseFloat(subtotalText) || 0;
  
        totalItems += quantity;
        totalAmount += subtotal;
      });
  
      $('#totalItems').val(totalItems);
  
      $('#totalAmount').val(totalAmount.toFixed(2));
  
      const discountPercentage = parseFloat($('#discount').val()) || 0;
      const fixedDiscount = parseFloat($('#fixeddiscount').val()) || 0;
  
      const amountAfterDiscount = totalAmount - discountPercentage ;
      $('#amountafterdiscount').val(amountAfterDiscount.toFixed(2));
  
      const amountAfterFixDiscount = amountAfterDiscount - fixedDiscount;
      $('#amountafterfixdiscount').val(amountAfterFixDiscount.toFixed(2));

      $('#total').val(amountAfterFixDiscount.toFixed(2));
    }

    $('#discount').on('input', function () {
    updateTotals();
     });

     $('#fixeddiscount').on('input', function () {
      updateTotals();
      });
    });
</script>

  </body>
</html>
