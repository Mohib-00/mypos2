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
                      <div class="card card-round">
                        <div class="card-header">
                          <div class="row">
                            <!-- Clients Form -->
                            <div class="col-12 col-md-2 mb-3">
                              <label for="customerSelect">Clients Form</label>
                              <select class="form-select form-select-sm" id="customerSelect">
                                <option value="1">All</option>
                                <option value="2">Customer 2</option>
                                <option value="3">Customer 3</option>
                              </select>
                            </div>
                  
                            <!-- Choose a Customer -->
                            <div class="col-12 col-md-6 mb-3">
                              <label for="smallSelect">Choose a Customer</label>
                              <select class="form-select form-select-sm" id="smallSelect">
                                <option value="1">Select One</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
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
                                <label for="smallSelect">Search Item</label>
                                <select class="form-select form-select-sm" id="smallSelect">
                                  <option value="1">Select Item</option>
                                  <option value="2">Option 2</option>
                                  <option value="3">Option 3</option>
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
                              <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-end">Quantity</th>
                                    <th scope="col" class="text-end">Rate</th>
                                    <th scope="col" class="text-end">Sub-Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">
                                      <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2"
                                      >
                                        <i class="fa fa-check"></i>
                                      </button>
                                      Payment from #10231
                                    </th>
                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                    <td class="text-end">$250.00</td>
                                    <td class="text-end">
                                      <span class="badge badge-success">Completed</span>
                                    </td>
                                  </tr>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="3" class="text-end font-weight-bold">Total Items</td>
                                    <td class="text-end font-weight-bold">1</td> 
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="text-end font-weight-bold">Total</td>
                                    <td class="text-end font-weight-bold">$250.00</td> 
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      

                  <div class="col-md-3">
                    <div class="card card-round shadow-sm">
                      <div class="card-body">
                  
                        <!-- Sale Type Section -->
                        <div class="card-head-row card-tools-still-right mb-3">
                          <div class="font-weight-bold" style="font-size: 16px;">Sale Type</div>
                          <div class="dropdown ms-auto">
                            <select class="form-select form-select-sm" id="smallSelect" style="width: 150px; border-radius: 8px;">
                              <option value="1">Cash</option>
                              <option value="2">Credit</option>
                            </select>
                          </div>
                        </div>
                  
                        <!-- Payment Type Section -->
                        <div class="card-head-row card-tools-still-right mb-3">
                          <div class="font-weight-bold" style="font-size: 16px;">Payment Type</div>
                          <div class="dropdown ms-auto">
                            <select class="form-select form-select-sm" id="smallSelect" style="width: 150px; border-radius: 8px;">
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
                              <div class="font-weight-bold" style="font-size: 16px;">Discount</div>
                            </div>
                            <input class="form-control form-control-sm ms-auto" type="text" name="discount" id="refInput" style="width: 150px; border-radius: 8px;"/>
                          </div>
                        </div>
                  
                        <!-- Amount After Discount Section -->
                        <div class="card-list py-1">
                          <div class="item-list d-flex align-items-center">
                            <div class="info-user">
                              <div class="font-weight-bold" style="font-size: 16px;">Amount After Discount</div>
                            </div>
                            <input class="form-control form-control-sm ms-auto" type="number" name="amount_after_discount" id="amountafterdiscount" style="width: 120px; border-radius: 8px;"/>
                          </div>
                        </div>
                  
                        <hr>
                  
                        <!-- Fixed Discount Section -->
                        <div class="card-list py-4">
                          <div class="item-list d-flex align-items-center">
                            <div class="info-user">
                              <div class="font-weight-bold" style="font-size: 16px;">Fixed Discount</div>
                            </div>
                            <input class="form-control form-control-sm ms-auto" type="number" name="fixed_discount" id="fixeddiscount" style="width: 150px; border-radius: 8px;"/>
                          </div>
                        </div>
                  
                        <!-- Amount After Fixed Discount Section -->
                        <div class="card-list py-1">
                          <div class="item-list d-flex align-items-center">
                            <div class="info-user">
                              <div class="font-weight-bold" style="font-size: 16px;">Amount After Fix-Discount</div>
                            </div>
                            <input class="form-control form-control-sm ms-auto" type="number" name="amount_after_fix_discount" id="amountafterfixdiscount" style="width: 120px; border-radius: 8px;"/>
                          </div>
                        </div>
                  
                        <hr>
                  
                        <!-- Total Rs Section -->
                        <div class="card-list py-1">
                          <div class="item-list d-flex align-items-center">
                            <div class="info-user">
                              <div class="font-weight-bold" style="font-size: 16px;">Total Rs:</div>
                            </div>
                            <input class="form-control form-control-sm ms-auto" type="number" name="total" id="total" style="width: 150px; border-radius: 8px;"/>
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
              </div>
        </div>

        @include('adminpages.footer')
      </div>
    </div>

    



    @include('adminpages.js')
    @include('adminpages.ajax')

   
  </body>
</html>
