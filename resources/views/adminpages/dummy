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
                    <form id="grnform">     
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
                                  <label for="defaultSelect">Select PO</label>
                                  <select class="form-select form-control" id="vendorsSelect">
                                    <option value="">Choose One</option>
                                    @foreach($purchases as $purchase)
                                      <option value="{{ $purchase->id }}">
                                        {{ $purchase->id }} - {{ $purchase->vendors }} - {{ $purchase->invoice_no }} - {{ $purchase->created_at }}
                                      </option>
                                    @endforeach
                                  </select>
                                  
                                </div>
                              </div>
                              
                              <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="invoice_no">Vendors</label>
                                    <input class="form-control" type="text" id="vendors" name="vendors" disabled>
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>

                        
                        <div class="col-md-6 col-lg-4">
                          <div class="form-group">
                              <label for="invoice_no">Invoice No</label>
                              <input class="form-control" type="text" id="invoice_no" name="invoice_no" disabled>
                              <span id="nameError" class="text-danger"></span>
                          </div>
                      </div>

                      
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="invoice_date">Invoice Date</label>
                          <input type="date" id="from_date" name="invoice_date" class="form-control" disabled>
                          <span id="nameError" class="text-danger"></span>
                        </div>
                    </div>

                            <div class="col-md-12 col-lg-8">
                                <div class="form-group">
                                  <label for="remarks">Remarks</label>
                                  <input class="form-control" type="text" id="remarks" name="remarks" disabled>
                                  <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="table-responsive mt-3">
                               
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
                                    </tr>
                                  </thead>
                              
                                  <tbody id="tableBody">
                                  </tbody>
                                </table>
                              </div>
                              

                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Total Quantity</label>
                              <input class="form-control" type="number" id="totalQuantity"  name="total_quantity" disabled>
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Gross Amount</label>
                              <input type="number" name="gross_amount" class="form-control"  id="grossAmount" disabled>
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Discount</label>
                              <input type="number" name="discount" class="form-control" id="discount" disabled>
                              <span id="nameError" class="text-danger"></span>
                            </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                              <label for="remarks">Net Amount</label>
                              <input type="number" name="net_amount" class="form-control" id="netAmount"  disabled>
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
        document.getElementById('vendorsSelect').addEventListener('change', function () {
          const purchaseId = this.value;
      
          if (!purchaseId) return;
      
          fetch(`/get-purchase-details/${purchaseId}`)
            .then(response => response.json())
            .then(data => {
              if (data.error) {
                alert(data.error);
                return;
              }
      
              document.getElementById('receiving_location').value = data.receiving_location || '';
              document.getElementById('vendors').value = data.vendors || '';
              document.getElementById('invoice_no').value = data.invoice_no || '';
              document.getElementById('from_date').value = data.created_at ? new Date(data.created_at).toISOString().split('T')[0] : '';
              document.getElementById('remarks').value = data.remarks || '';
              document.getElementById('totalQuantity').value = data.total_quantity || '';
              document.getElementById('grossAmount').value = data.gross_amount || '';
              document.getElementById('discount').value = data.discount || '';
              document.getElementById('netAmount').value = data.net_amount || '';
      
              const products = JSON.parse(data.products || '[]');
              const productNames = data.product_names || {}; 
              const quantities = JSON.parse(data.quantity || '[]');
              const prices = JSON.parse(data.price || '[]');
              const retailRates = JSON.parse(data.retail_rate || '[]');
              const wholesaleRates = JSON.parse(data.wholesale_rate || '[]');
              const miniWholeRates = JSON.parse(data.mini_whole_rate || '[]');
              const typeARates = JSON.parse(data.type_a_rate || '[]');
              const typeBRates = JSON.parse(data.type_b_rate || '[]');
              const typeCRates = JSON.parse(data.type_c_rate || '[]');
              const amounts = JSON.parse(data.amount || '[]');
      
              const tableBody = document.getElementById('tableBody');
              tableBody.innerHTML = ''; 
      
              for (let i = 0; i < products.length; i++) {
                const productId = products[i];
                const productName = productNames[productId] || productId;
      
                const row = `
                  <tr>
                    <td style="min-width: 300px; max-width: 300px;">
                      <input type="text" name="products[]" class="form-control" disabled value="${productName}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="quantity[]" class="form-control" disabled value="${quantities[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="price[]" class="form-control" disabled value="${prices[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="retail_rate[]" class="form-control" disabled value="${retailRates[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="wholesale_rate[]" class="form-control" disabled value="${wholesaleRates[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="mini_whole_rate[]" class="form-control" disabled value="${miniWholeRates[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="type_a_rate[]" class="form-control" disabled value="${typeARates[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="type_b_rate[]" class="form-control" disabled value="${typeBRates[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="type_c_rate[]" class="form-control" disabled value="${typeCRates[i] || ''}">
                    </td>
                    <td style="min-width: 120px; max-width: 120px;">
                      <input type="number" name="amount[]" class="form-control" disabled value="${amounts[i] || ''}">
                    </td>
                  </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
              }
            })
            .catch(error => {
              console.error('Error fetching purchase details:', error);
            });
        });
      </script>
      
      
    
  </body>
</html>