<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .user {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .user:hover {
        background-color: #45a049;  
    }
    .custom-dropdown {
        position: relative;
        width: 100%;
    }

    .dropdown-selected {
        padding: 10px;
        border: 1px solid #ccc;
        cursor: pointer;
        background: #fff;
    }

    .dropdown-list {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        border: 1px solid #ccc;
        background: white;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        z-index: 1000;
    }

    .dropdown-list.show {
        display: block;
    }

    .dropdown-search {
        width: 100%;
        box-sizing: border-box;
        padding: 5px 10px;
        border: none;
        border-bottom: 1px solid #ccc;
    }

    .dropdown-item {
        padding: 10px;
        cursor: pointer;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
    }
  
</style>
  </head>
  <body>
    <div class="wrapper">
    @include('adminpages.sidebar')

      <div class="main-panel">
        @include('adminpages.header')

        <div class="container">
          <div class="page-inner">
     
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                        <a class="user" href="/admin/purchase_list" onclick="loadpurchasePage(); return false;">Back</a>
                    </div>
                    <form id="productsssseditform">     
                    <div class="card-body">
                      <div class="row">

                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="defaultSelect">Receiving Location*</label>
                                <select
                                  class="form-select form-control"
                                  id="receiving_location" name="receiving_location"
                                >
                                  <option>Head Office</option>
                                 
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                  <label for="defaultSelect">Vendors</label>
                                  <select class="form-select form-control" id="vendors" name="vendors">
                                    <option value="">Choose Vendor</option>
                                    @foreach($vendors as $vendor)
                                      <option value="{{ $vendor->name }}" {{ $purchase->vendors == $vendor->name ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                      </option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              

                        
                        <div class="col-md-6 col-lg-4">
                          <div class="form-group">
                              <label for="invoice_no">Invoice No</label>
                              <input class="form-control" type="text" id="invoice_no" name="invoice_no" value="{{$purchase->invoice_no}}">
                              <span id="nameError" class="text-danger"></span>
                          </div>
                      </div>

                      
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="invoice_date">Invoice Date</label>
                          <input type="date" id="from_date" name="invoice_date" class="form-control" value="{{ request('from_date') }}">
                          <span id="nameError" class="text-danger"></span>
                        </div>
                    </div>

                            <div class="col-md-12 col-lg-8">
                                <div class="form-group">
                                  <label for="remarks">Remarks</label>
                                  <input class="form-control" type="text" id="remarks" name="remarks" value="{{$purchase->remarks}}">
                                  <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="table-responsive mt-3">
                                @php
                                  $quantities = json_decode($purchase->quantity); 
                                  $amounts = json_decode($purchase->amount); 
                                  $prices = json_decode($purchase->price); 
                                  $retailRates = json_decode($purchase->retail_rate); 
                                  $wholesaleRates = json_decode($purchase->wholesale_rate); 
                                  $miniWholesaleRates = json_decode($purchase->mini_whole_rate); 
                                  $typeARates = json_decode($purchase->type_a_rate); 
                                  $typeBRates = json_decode($purchase->type_b_rate); 
                                  $typeCRates = json_decode($purchase->type_c_rate); 
                                @endphp
                              
                                <table class="table table-bordered" id="productTable">
                                  <thead>
                                    <tr>
                                      <th style="background-color: #FFA500; color: white;">Product</th>
                                      <th style="background-color: #FFA500; color: white;">Qty</th>
                                      <th style="background-color: #FFA500; color: white;">Rate</th>
                                      <th style="background-color: #FFA500; color: white;">Retail</th>
                                      <th style="background-color: #FFA500; color: white;">WS</th>
                                      <th style="background-color: #FFA500; color: white;">MWS</th>
                                      <th style="background-color: #FFA500; color: white;">T A</th>
                                      <th style="background-color: #FFA500; color: white;">T B</th>
                                      <th style="background-color: #FFA500; color: white;">T C</th>
                                      <th style="background-color: #FFA500; color: white;">Amount</th>
                                      <th style="background-color: #FFA500; color: white; text-align: center;">
                                      <button id="addRowBtn" type="button" class="btn btn-sm btn-light" onclick="addRow()">+</button>
                                      </th>
                                    </tr>
                                  </thead>
                              
                                  <tbody id="tableBody">
                                    @foreach($selectedProductIds as $index => $productId)
                                      @php
                                        $product = $products->firstWhere('id', $productId);
                                        $quantity = isset($quantities[$index]) ? $quantities[$index] : 1; 
                                        $amount = isset($amounts[$index]) ? $amounts[$index] : ($product->price * $quantity); 
                                        $price = isset($prices[$index]) ? $prices[$index] : $product->price;
                                        $retailRate = isset($retailRates[$index]) ? $retailRates[$index] : $product->retail_rate;
                                        $wholesaleRate = isset($wholesaleRates[$index]) ? $wholesaleRates[$index] : $product->wholesale_rate;
                                        $miniWholesaleRate = isset($miniWholesaleRates[$index]) ? $miniWholesaleRates[$index] : $product->mini_whole_rate;
                                        $typeARate = isset($typeARates[$index]) ? $typeARates[$index] : $product->type_a_rate;
                                        $typeBRate = isset($typeBRates[$index]) ? $typeBRates[$index] : $product->type_b_rate;
                                        $typeCRate = isset($typeCRates[$index]) ? $typeCRates[$index] : $product->type_c_rate;
                                      @endphp
                                  
                                      @if($product)
                                        <tr>
                                          <td style="min-width: 250px; max-width: 250px;">
                                            <select class="form-select form-control" name="products[]" onchange="updateProductData(this)">
                                              <option value="">Choose Product</option>
                                              @foreach($products as $prod)
                                                <option value="{{ $prod->id }}" 
                                                        data-price="{{ $prod->price }}"
                                                        data-retail-rate="{{ $prod->retail_rate }}"
                                                        data-wholesale-rate="{{ $prod->wholesale_rate }}"
                                                        data-mini-whole-rate="{{ $prod->mini_whole_rate }}"
                                                        data-type-a-rate="{{ $prod->type_a_rate }}"
                                                        data-type-b-rate="{{ $prod->type_b_rate }}"
                                                        data-type-c-rate="{{ $prod->type_c_rate }}"
                                                        {{ $prod->id == $product->id ? 'selected' : '' }}>
                                                  {{ $prod->item_name }}
                                                </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td style="min-width: 110px; max-width: 110px;">
                                            <input type="number" min="1" name="quantity[]" value="{{ $quantity }}" class="form-control quantity-input" data-product-id="{{ $productId }}">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="price[]" value="{{ $price }}" class="form-control price">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="retail_rate[]" value="{{ $retailRate }}" class="form-control retail_rate">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="wholesale_rate[]" value="{{ $wholesaleRate }}" class="form-control wholesale_rate">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="mini_whole_rate[]" value="{{ $miniWholesaleRate }}" class="form-control mini_whole_rate">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="type_a_rate[]" value="{{ $typeARate }}" class="form-control type_a_rate">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="type_b_rate[]" value="{{ $typeBRate }}" class="form-control type_b_rate">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="type_c_rate[]" value="{{ $typeCRate }}" class="form-control type_c_rate">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <input type="number" name="amount[]" value="{{ $amount }}" class="form-control amount">
                                          </td>
                                          <td style="min-width: 120px; max-width: 120px;">
                                            <button type="button" class="btn btn-danger btn-sm remove-row-btn" onclick="removeRow(this)">x</button>
                                          </td>
                                        </tr>
                                      @endif
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                              

                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Total Quantity</label>
                              <input class="form-control" type="number" id="totalQuantity" value="{{$purchase->total_quantity}}" name="total_quantity" disabled>
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Gross Amount</label>
                              <input type="number" name="gross_amount" class="form-control" value="{{$purchase->gross_amount}}" id="grossAmount" disabled>
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Discount</label>
                              <input type="number" name="discount" class="form-control" id="discount" value="{{$purchase->discount}}">
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Net Amount</label>
                              <input type="number" name="net_amount" class="form-control" id="netAmount" value="{{$purchase->net_amount}}" disabled>
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                      
                      </div>
                    </div>
                    <div class="card-action">
                      <a id="submitdata" class="btn btn-success">Submit</a>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>

        @include('adminpages.footer')
      </div>
    </div>


    @include('adminpages.js')
    @include('adminpages.ajax')
    
      <script>
$(document).ready(function () {
    $('#submitdata').on('click', function (e) {
        e.preventDefault();

        let formData = new FormData($('#productsssseditform')[0]);

        $.ajax({
            url: '/api/edit-purchase/{{ $purchase->id }}', // adjust if needed
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Purchase updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    loadpurchasePage(); // Redirect using your JS function
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update purchase. Please check errors.',
                    icon: 'error',
                    confirmButtonText: 'Close'
                });
            }
        });
    });
});
</script>
    
    
    <script>
        $(document).ready(function () {
            function updateTotalQuantity() {
                let total = 0;
                $('.quantity-input').each(function () {
                    const qty = parseFloat($(this).val());
                    if (!isNaN(qty)) total += qty;
                });
                $('#totalQuantity').val(total);
            }
    
            function updateGrossAmount() {
                let gross = 0;
                $('.amount').each(function () {
                    const amt = parseFloat($(this).val());
                    if (!isNaN(amt)) gross += amt;
                });
                $('#grossAmount').val(gross.toFixed(2));
                updateNetAmount(gross);
            }
    
            function updateNetAmount(grossAmount) {
                const discount = parseFloat($('#discount').val()) || 0;
                const netAmount = grossAmount - discount;
                $('#netAmount').val(netAmount.toFixed(2));
            }
    
            function handleQuantityChange() {
                const input = $(this);
                const productId = input.closest('tr').find('select[name="products[]"]').val();
                const quantity = input.val();
    
                updateTotalQuantity();
    
                if (productId) {
                    $.ajax({
                        url: '/products/' + productId + '/price',
                        type: 'GET',
                        data: { quantity: quantity },
                        success: function (response) {
                            if (response.success) {
                                const product = response.product;
                                const row = input.closest('tr');
    
                                row.find('input[name="price[]"]').val(product.price);
                                row.find('input[name="retail_rate[]"]').val(product.retail_rate);
                                row.find('input[name="wholesale_rate[]"]').val(product.wholesale_rate);
                                row.find('input[name="mini_whole_rate[]"]').val(product.mini_whole_rate);
                                row.find('input[name="type_a_rate[]"]').val(product.type_a_rate);
                                row.find('input[name="type_b_rate[]"]').val(product.type_b_rate);
                                row.find('input[name="type_c_rate[]"]').val(product.type_c_rate);
                                row.find('input[name="amount[]"]').val(product.amount);
    
                                updateGrossAmount();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error: ' + error);
                        }
                    });
                }
            }
    
            $('#discount').on('input', function () {
                const grossAmount = parseFloat($('#grossAmount').val()) || 0;
                updateNetAmount(grossAmount);
            });
    
            $(document).on('input', '.amount', function () {
                updateGrossAmount();
            });
    
            function reapplyEventListeners() {
                $('.quantity-input').off('input').on('input', handleQuantityChange);
            }
    
            updateTotalQuantity();
            updateGrossAmount();
            reapplyEventListeners();
    
            $('#addRowBtn').on('click', function () {
                const newRow = `
                    <tr>
                        <td style="min-width: 250px; max-width: 250px;">
                            <select class="form-select form-control product-select" name="products[]">
                                <option value="">Choose Product</option>
                                @foreach($products as $prod)
                                    <option value="{{ $prod->id }}"
                                            data-price="{{ $prod->price }}"
                                            data-retail-rate="{{ $prod->retail_rate }}"
                                            data-wholesale-rate="{{ $prod->wholesale_rate }}"
                                            data-mini-whole-rate="{{ $prod->mini_whole_rate }}"
                                            data-type-a-rate="{{ $prod->type_a_rate }}"
                                            data-type-b-rate="{{ $prod->type_b_rate }}"
                                            data-type-c-rate="{{ $prod->type_c_rate }}">
                                        {{ $prod->item_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td style="min-width: 110px; max-width: 110px;">
                            <input type="number" min="1" name="quantity[]" class="form-control quantity-input" value="1">
                        </td>
                        <td><input type="number" name="price[]" class="form-control price" value="0"></td>
                        <td><input type="number" name="retail_rate[]" class="form-control retail_rate" value="0"></td>
                        <td><input type="number" name="wholesale_rate[]" class="form-control wholesale_rate" value="0"></td>
                        <td><input type="number" name="mini_whole_rate[]" class="form-control mini_whole_rate" value="0"></td>
                        <td><input type="number" name="type_a_rate[]" class="form-control type_a_rate" value="0"></td>
                        <td><input type="number" name="type_b_rate[]" class="form-control type_b_rate" value="0"></td>
                        <td><input type="number" name="type_c_rate[]" class="form-control type_c_rate" value="0"></td>
                        <td><input type="number" name="amount[]" class="form-control amount" value="0"></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row-btn">x</button></td>
                    </tr>
                `;
                $('#tableBody').append(newRow);
                reapplyEventListeners();
            });
    
            $(document).on('click', '.remove-row-btn', function () {
                $(this).closest('tr').remove();
                updateTotalQuantity();
                updateGrossAmount();
            });
    
            $(document).on('change', 'select[name="products[]"]', function () {
                const productId = $(this).val();
                const row = $(this).closest('tr');
    
                if (productId) {
                    $.ajax({
                        url: '/products/' + productId + '/data',
                        type: 'GET',
                        success: function (response) {
                            if (response.success) {
                                row.find('input[name="price[]"]').val(response.product.price);
                                row.find('input[name="retail_rate[]"]').val(response.product.retail_rate);
                                row.find('input[name="wholesale_rate[]"]').val(response.product.wholesale_rate);
                                row.find('input[name="mini_whole_rate[]"]').val(response.product.mini_whole_rate);
                                row.find('input[name="type_a_rate[]"]').val(response.product.type_a_rate);
                                row.find('input[name="type_b_rate[]"]').val(response.product.type_b_rate);
                                row.find('input[name="type_c_rate[]"]').val(response.product.type_c_rate);
    
                                const quantity = row.find('input[name="quantity[]"]').val() || 1;
                                const amount = response.product.price * quantity;
                                row.find('input[name="amount[]"]').val(amount.toFixed(2));
    
                                updateGrossAmount();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error: ' + error);
                        }
                    });
                } else {
                    row.find('input[name="price[]"]').val('0');
                    row.find('input[name="retail_rate[]"]').val('0');
                    row.find('input[name="wholesale_rate[]"]').val('0');
                    row.find('input[name="mini_whole_rate[]"]').val('0');
                    row.find('input[name="type_a_rate[]"]').val('0');
                    row.find('input[name="type_b_rate[]"]').val('0');
                    row.find('input[name="type_c_rate[]"]').val('0');
                    row.find('input[name="amount[]"]').val('0');
                    updateGrossAmount();
                }
            });
        });
    </script>
    
  </body>
</html>