@extends('layouts.auth')

@extends('layouts.sidebar')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Cashflow</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Cashflow</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
           
            <div class="card-body">
                <form method="POST" action="{{ route('cashflow.store') }}" class="form-steps" autocomplete="off">
                    @csrf
                    <div class="step-arrow-nav mb-4">

                        <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab" aria-controls="steparrow-gen-info" aria-selected="true">Customer Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link done active" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab" aria-controls="steparrow-description-info" aria-selected="false">Product Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience" type="button" role="tab" aria-controls="pills-experience" aria-selected="false">Finish</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
                            <div class="row gy-4">
                                <div class="col-xxl-2 col-md-6">
                                    <div>
                                        <label for="serialNo" class="@error('serialNo') is-invalid @enderror form-label">Serial Number</label>
                                        <input type="text" class="form-control" id="serialNo" name="serialNo" value="{{ old('serialNo') }}">
                                        @error('serialNo') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="clientName" class="@error('clientName') is-invalid @enderror form-label">Client Name</label>
                                        <select id="clientName" name="clientName" class="form-select" data-choices="" data-choices-sorting="true" >
                                        <option selected="">Choose...</option>
                                        @foreach($customers as $index => $customer)
                                            <option value="{{ $customer->id }}" {{ old('clientName') == $customer->name ? 'selected' : '' }}> {{ $customer->name }} </option>
                                            @endforeach
                                        </select>    
                                        @error('clientName') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="date" class="@error('date') is-invalid @enderror form-label">Date</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                                        @error('date') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
    
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="Company" class="@error('serialNo') is-invalid @enderror form-label">Company</label>
                                        <select id="company" name="company" class="form-select" data-choices="" data-choices-sorting="true" >
                                            <option selected="">Choose...</option>
                                            @foreach($companies as $index => $company)
                                            <option value="{{ $company->name }}" {{ old('company') == $company->name ? 'selected' : '' }}> {{ $company->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('company') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="department" class="@error('department') is-invalid @enderror form-label">Department</label>
                                        <select id="department" name="department" class="form-select" data-choices="" data-choices-sorting="true">
                                            <option selected="">Choose...</option>
                                            <option value="Division 1" {{ old('department') == 'Division 1' ? 'selected' : '' }} >Division 1</option>
                                            <option value="Division 2" {{ old('department') == 'Division 2' ? 'selected' : '' }} >Division 2</option>
                                            <option value="Central 1" {{ old('department') == 'Central 1' ? 'selected' : '' }} >Central 1</option>
                                            <option value="Central 2" {{ old('department') == 'Central 2' ? 'selected' : '' }} >Central 2</option>
                                        </select>
                                        @error('department') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="countryOrigin" class="@error('countryOrigin') is-invalid @enderror form-label">Country of Origin</label>
                                        <input type="text" class="form-control" id="countryOrigin" name="countryOrigin" value="{{ old('countryOrigin') }}">
                                        @error('countryOrigin') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
    
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="modeofshipment" class="@error('modeofshipment') is-invalid @enderror form-label">Mode of Shipment</label>
                                        <select id="modeofshipment" name="modeofshipment" class="form-select" data-choices="" data-choices-sorting="true" value="{{ old('modeofshipment') }}">
                                            <option value="Air Freight" {{ old('modeofshipment') == 'Air Freight' ? 'selected' : '' }} >Air Freight</option>
                                            <option value="Sea Freight" {{ old('modeofshipment') == 'Sea Freight' ? 'selected' : '' }} >Sea Freight</option>
                                            <option value="Land Freight" {{ old('modeofshipment') == 'Land Freight' ? 'selected' : '' }} >Land Freight</option>
                                        </select>
                                        @error('modeofshipment') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="availability" class="@error('availability') is-invalid @enderror form-label">Availability from Supplier (in Days)</label>
                                        <input type="text" class="form-control" id="availability" name="availability" value="{{ old('availability') }}">
                                        @error('availability') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
    
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="goodsTravel" class="@error('goodsTravel') is-invalid @enderror form-label">Travel of Goods (in Days)</label>
                                        <input type="text" class="form-control" id="goodsTravel" name="goodsTravel" value="{{ old('goodsTravel') }}">
                                        @error('goodsTravel') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="incoterms" class="@error('incoterms') is-invalid @enderror form-label">INCOTERMS</label>
                                        <select id="incoterms" name="incoterms" class="form-select" data-choices="" data-choices-sorting="true" value="{{ old('incoterms') }}">
                                            <option value="EXW" {{ old('incoterms') == 'EXW' ? 'selected' : '' }} >EXW</option>
                                            <option value="FOB" {{ old('incoterms') == 'FOB' ? 'selected' : '' }} >FOB</option>
                                            <option value="C&P" {{ old('incoterms') == 'C&P' ? 'selected' : '' }} >C&P</option>
                                            <option value="CIF" {{ old('incoterms') == 'CIF' ? 'selected' : '' }} >CIF</option>
                                            <option value="CIP" {{ old('incoterms') == 'CIP' ? 'selected' : '' }} >CIP</option>
                                            <option value="DAP" {{ old('incoterms') == 'DAP' ? 'selected' : '' }} >DAP</option>
                                            <option value="DPT" {{ old('incoterms') == 'DPT' ? 'selected' : '' }} >DPT</option>
                                        </select>
                                        @error('incoterms') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="profitMargin" class="@error('profitMargin') is-invalid @enderror form-label">Profit Margin per unit (%)</label>
                                        <input type="text" class="form-control" id="profitMargin" name="profitMargin" value="25">
                                        @error('profitMargin') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="targetPrice" class="@error('targetPrice') is-invalid @enderror form-label">Target Price</label>
                                        <input type="text" class="form-control" id="targetPrice" name="targetPrice" value="{{ old('targetPrice') }}">
                                        @error('targetPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="currency" class="@error('currency') is-invalid @enderror form-label">Currency 
                                            <button type="button" class="btn rounded-pill" style="border 1px solid;padding:0px" 
                                                    id="persistentTooltip"
                                                    data-bs-toggle="tooltip" data-bs-html="true" 
                                                    title="<em>Add New</em> <b>Currency Conversion</b> <a href='{{ route('conversion.create') }}' style='color:#fff'>Click here</a>">
                                                <i class="ri-question-line label-icon align-middle fs-16 me-2"></i>
                                            </button>
                                        </label>
                                        <select id="currency" name="currency" class="form-select" data-choices="" data-choices-sorting="true" >
                                            <option value=""> Choose... </option>
                                            @foreach($currencies as $index => $currency)
                                            <option value="{{ $currency->name }}" 
                                                {{ old('currency') == $currency->name ? 'selected' : '' }}>
                                                {{ $currency->name }} ({{ $currency->code }})
                                            </option>
                                            @endforeach
                                        </select>
                                        <p class='text-info inputerror' id="currency_conversion1"></p>
                                        @error('currency') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 d-none">
                                    <div>
                                        <label for="conversion_factor" class="@error('conversion_factor') is-invalid @enderror form-label">KWD Equivalent</label>
                                        <input type="text" class="form-control" id="conversion_factor" name="conversion_factor" value="{{ old('conversion_factor') }}">
                                        @error('conversion_factor') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                
                                
                               
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="steparrow-description-info-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Product Details</button>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade show active" id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
                            <div>
                                <div class="row g-3">
                                    
                                    <div class="col-md-2">
                                        <label for="country" class="form-label">Product</label>
                                        <select id="product" name="product" class="form-select" data-choices="" data-choices-sorting="true" >
                                            <option selected="">Choose...</option>
                                            @foreach($products as $index => $product)
                                                <option value="{{ $product->id }}" {{ old('product') == $product->name ? 'selected' : '' }}> {{ $product->name }} </option>
                                                @endforeach
                                            </select>    
                                            @error('product') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                        <div class="invalid-feedback">Please select a country</div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="unitPrice" class="@error('unitPrice') is-invalid @enderror form-label">Unit Price <span id="currency_label" class="font-weight-bold"> (in Dealing Currency)</span></label>
                                            <input type="text" class="form-control" id="unitPrice" name="unitPrice">
                                            <p class='text-info inputerror' id="currency_conversion2"></p>
                                            @error('unitPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-1 col-md-6">
                                        <div>
                                            <label for="quantity" class="@error('quantity') is-invalid @enderror form-label">Quantity </label>
                                            <input type="number" steps="1" class="form-control" id="quantity" name="quantity">
                                            @error('quantity') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="packagingInfo" class="@error('packagingInfo') is-invalid @enderror form-label">Packaging Info </label>
                                            <input type="text" class="form-control" id="packagingInfo" name="packagingInfo">
                                            @error('packagingInfo') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                           
                                            <button type="button" id="add-item" class="btn btn-success btn-label right ms-auto nexttab nexttab mt-4" data-nexttab="pills-experience-tab"><i class=" ri-add-line label-icon align-middle fs-16 ms-2"></i>Add Product</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mt-5">
                                        <div class="card">
                                            <!-- Hoverable Rows -->
                                            <table class="table table-hover table-nowrap mb-0" id="items-table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">S No.</th>
                                                        <th scope="col">Material Price</th>
                                                        <th scope="col">Other Charges</th>
                                                        <th scope="col">Freight</th>
                                                        <th scope="col">Handling & Clearance</th>
                                                        <th scope="col">Customs Duty</th>
                                                        <th scope="col">Bank Charges</th>
                                                        <th scope="col">Landed Cost</th>
                                                        <th scope="col">Profit Margin</th>
                                                        <th scope="col">Calculated Selling Price</th>
                                                        <th scope="col">View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4 text-muted">

                               
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-light btn-label previestab" data-previous="steparrow-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to Customer Info</button>
                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="steparrow-description-info-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="pills-experience" role="tabpanel">
                            <div class="text-center">

                                <div class="avatar-md mt-5 mb-4 mx-auto">
                                    <div class="avatar-title bg-light text-success display-4 rounded-circle">
                                        <i class="ri-checkbox-circle-fill"></i>
                                    </div>
                                </div>
                                <h5>Well Done !</h5>
                                <p class="text-muted">You have Successfully Signed Up</p>
                            </div>
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </form>
                
            </div>
            
            <!-- end card body -->
        </div>
        <!-- end card -->
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Total Charges</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form class="tablelist-form" autocomplete="off">
                        <div class="modal-body">
                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Selling KD</h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalSelling2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Quantity</h5>
                                                <p class="fs-12 mb-0 text-muted"></p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="qty2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Material Price Price </h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalMaterialPrice2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Other Charges</h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalOthercharges2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Freight</h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalFreight2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Handling cost</h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
        
                                        <td>
                                            <h6 class="mb-0" id="totalHandling2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Customs 6%</h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalCustoms2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Bank Comm</h5>
                                                <p class="fs-12 mb-0 text-muted"></p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalBankComm2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td class="d-flex">
                                            <!-- <img src="http://[::1]:5173/resources/assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-3 me-2"> -->
                                            <div>
                                                <h5 class="fs-13 mb-0">Total Company Margin</h5>
                                                <p class="fs-12 mb-0 text-muted">in KWD</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0" id="totalCompanyMargin2">- </h6>
                                        </td>
                                    </tr><!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        
        <!--end modal -->
    </div>
    <!-- end col -->
</div>

<!--end row-->
<script>
    // document.getElementById('next-step').addEventListener('click', function () {
    //     document.querySelector('.step-1').style.display = 'none';
    //     document.querySelector('.step-2').style.display = 'block';
    // });
    
    document.getElementById('add-item').addEventListener('click', function () {
        const tableBody = document.querySelector('#items-table tbody');
        const rowCount = tableBody.rows.length + 1;
        // alert(rowCount)
        var quantity = document.getElementById(`quantity`).value || 0;
        // alert("quantity"+quantity)
        if (quantity > 0) {
        const newRow = `
            <tr>
                <td scope="col">${rowCount}</td>
                <td scope="col">
                    <span id="label_items_${rowCount}_unitMaterialPrice"></span>
                    <input type="hidden" id="items_${rowCount}_unitMaterialPrice" name="items[${rowCount}][unitMaterialPrice]"/>
                    <input type="hidden" name="items[${rowCount}][product]" id="items_${rowCount}_product" />
                    <input type="hidden" name="items[${rowCount}][unitPrice]" id="items_${rowCount}_unitPrice" />
                    <input type="hidden" name="items[${rowCount}][quantity]" id="items_${rowCount}_quantity" />
                    <input type="hidden" name="items[${rowCount}][packagingInfo]" id="items_${rowCount}_packagingInfo" />

                    <input type="hidden" id="items_${rowCount}_totalSelling" name="items[${rowCount}][totalSelling]"/>
                    <input type="hidden" id="items_${rowCount}_totalMaterialPrice" name="items[${rowCount}][totalMaterialPrice]"/>
                    <input type="hidden" id="items_${rowCount}_totalOthercharges" name="items[${rowCount}][totalOthercharges]"/>
                    <input type="hidden" id="items_${rowCount}_totalFreight" name="items[${rowCount}][totalFreight]"/>
                    <input type="hidden" id="items_${rowCount}_totalHandling" name="items[${rowCount}][totalHandling]"/>
                    <input type="hidden" id="items_${rowCount}_totalCustoms" name="items[${rowCount}][totalCustoms]"/>
                    <input type="hidden" id="items_${rowCount}_totalBankComm" name="items[${rowCount}][totalBankComm]"/>
                    <input type="hidden" id="items_${rowCount}_totalCompanyMargin" name="items[${rowCount}][totalCompanyMargin]"/>

                </td>
                <td scope="col"><span id="label_items_${rowCount}_unitOtherCharges"></span><input type="hidden" id="items_${rowCount}_unitOtherCharges" name="items[${rowCount}][unitOtherCharges]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_freight"></span><input type="hidden" id="items_${rowCount}_freight" name="items[${rowCount}][freight]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_unitLocalHandling"></span><input type="hidden" id="items_${rowCount}_unitLocalHandling" name="items[${rowCount}][unitLocalHandling]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_customDuty"></span><input type="hidden" id="items_${rowCount}_customDuty" name="items[${rowCount}][customDuty]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_bankCharges"></span><input type="hidden" id="items_${rowCount}_bankCharges" name="items[${rowCount}][bankCharges]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_landedCost"></span><input type="hidden" id="items_${rowCount}_landedCost" name="items[${rowCount}][landedCost]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_profitMargin"></span><input type="hidden" id="items_${rowCount}_profitMargin" name="items[${rowCount}][profitMargin]"/></td>
                <td scope="col"><span id="label_items_${rowCount}_sellingPrice"></span><input type="hidden" id="items_${rowCount}_sellingPrice" name="items[${rowCount}][sellingPrice]"/></td>
                <td scope="col"><div class="edit">
                    <button type="button" class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">View More</button>
                </div>
                <div class="remove">
                    <button type="button" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-2-line"></i></button>
                </div></td>
            </tr>`;

            
        tableBody.insertAdjacentHTML('beforeend', newRow);
        conversion_calculation(rowCount);
        }else if (quantity == 0) {
            alert("quantity cannot be empty");
        }
        
        
    });

    document.getElementById('items-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item-btn')) {
            e.target.closest('tr').remove();
        }
    });
    function conversion_calculation(rowCount){
        let ManualPrice = 250;
        let CostManual = 530;
        let quantity = document.getElementById(`quantity`).value;
        let conversion_factor = document.getElementById("conversion_factor").value;
        let unitPrice = document.getElementById(`unitPrice`).value;
        let profitMargin_percent = document.getElementById(`profitMargin`).value;
        let modeofshipment = document.getElementById(`modeofshipment`).value;

        document.getElementById(`items_${rowCount}_product`).value = document.getElementById(`product`).value;
        document.getElementById(`items_${rowCount}_unitPrice`).value = unitPrice;
        document.getElementById(`items_${rowCount}_quantity`).value = quantity;
        document.getElementById(`items_${rowCount}_packagingInfo`).value = document.getElementById(`packagingInfo`).value;
        
        let unitMaterialPrice = (unitPrice / conversion_factor).toFixed(2);
        document.getElementById(`items_${rowCount}_unitMaterialPrice`).value = unitMaterialPrice;
        document.getElementById(`label_items_${rowCount}_unitMaterialPrice`).innerHTML = unitMaterialPrice;
      

            let unitOtherCharges = (ManualPrice / quantity).toFixed(2);
            let freight = (CostManual / quantity).toFixed(2);
            if(modeofshipment == 'Air Freight'){
                var freight_percent = 0.03;
            }else if(modeofshipment == 'Sea Freight'){
                var freight_percent = 0.04;
            }
            let unitLocalHandling = (unitMaterialPrice * parseFloat(freight_percent)).toFixed(2);
            let customDuty = (unitMaterialPrice * 0.06).toFixed(2);
            let bankCharges = (unitMaterialPrice * 0.09).toFixed(2);
            let landedCost = (unitOtherCharges * 0.09).toFixed(2);
            
            let profitMargin = ((unitMaterialPrice * (profitMargin_percent/100))).toFixed(2);
            let sellingPrice = (parseFloat(landedCost) + parseFloat(profitMargin)).toFixed(2);
            
            document.getElementById(`items_${rowCount}_unitOtherCharges`).value = unitOtherCharges;
            document.getElementById(`items_${rowCount}_freight`).value = freight;
            document.getElementById(`items_${rowCount}_unitLocalHandling`).value = unitLocalHandling;
            document.getElementById(`items_${rowCount}_customDuty`).value = customDuty;
            document.getElementById(`items_${rowCount}_bankCharges`).value = bankCharges;
            document.getElementById(`items_${rowCount}_landedCost`).value = landedCost;
            document.getElementById(`items_${rowCount}_profitMargin`).value = profitMargin;
            document.getElementById(`items_${rowCount}_sellingPrice`).value = sellingPrice;
            
            document.getElementById(`label_items_${rowCount}_unitOtherCharges`).innerHTML = unitOtherCharges;
            document.getElementById(`label_items_${rowCount}_freight`).innerHTML = freight;
            document.getElementById(`label_items_${rowCount}_unitLocalHandling`).innerHTML = unitLocalHandling;
            document.getElementById(`label_items_${rowCount}_customDuty`).innerHTML = customDuty;
            document.getElementById(`label_items_${rowCount}_bankCharges`).innerHTML = bankCharges;
            document.getElementById(`label_items_${rowCount}_landedCost`).innerHTML = landedCost;
            document.getElementById(`label_items_${rowCount}_profitMargin`).innerHTML = profitMargin;
            document.getElementById(`label_items_${rowCount}_sellingPrice`).innerHTML = sellingPrice;
            
            let totalSelling = (parseFloat(sellingPrice) * parseFloat(quantity)).toFixed(2); 
            let totalMaterialPrice = (parseFloat(unitMaterialPrice) * parseFloat(quantity)).toFixed(2);
            let totalOthercharges = (parseFloat(unitOtherCharges) * parseFloat(quantity)).toFixed(2);
            let totalFreight = (parseFloat(freight) * parseFloat(quantity)).toFixed(2);
            let totalHandling = (parseFloat(unitLocalHandling) * parseFloat(quantity)).toFixed(2);
            let totalCustoms = (parseFloat(customDuty) * parseFloat(quantity)).toFixed(2); // Corrected totalCustoms calculation
            let totalBankComm = (parseFloat(bankCharges) * parseFloat(quantity)).toFixed(2);
            let totalCompanyMargin = (parseFloat(profitMargin) * parseFloat(quantity)).toFixed(2);

            document.getElementById(`items_${rowCount}_totalSelling`).value = totalSelling;
            document.getElementById(`items_${rowCount}_totalMaterialPrice`).value = totalMaterialPrice;
            document.getElementById(`items_${rowCount}_totalOthercharges`).value = totalOthercharges;
            document.getElementById(`items_${rowCount}_totalFreight`).value = totalFreight;
            document.getElementById(`items_${rowCount}_totalHandling`).value = totalHandling;
            document.getElementById(`items_${rowCount}_totalCustoms`).value = totalCustoms;
            document.getElementById(`items_${rowCount}_totalBankComm`).value = totalBankComm;
            document.getElementById(`items_${rowCount}_totalCompanyMargin`).value = totalCompanyMargin;
            
        
    }

</script>
<script>
      
    document.addEventListener('DOMContentLoaded', function() {
        var currency = document.getElementById('currency');

        currency.addEventListener('change', function() {
                var selectedcurrency = this.value;
                // alert('Selected value: ' + selectedcurrency);
                fetch(`/conversion/getConversion/${selectedcurrency}`, {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(data => {
                    var cf_value= 0;
                    if (data.length > 0) {
                        var cf_value = data[0].cf_value;
                        var conversion_text = `1 KWD = ${cf_value} ${selectedcurrency}`;
                        document.getElementById("currency_conversion1").innerHTML = conversion_text;
                        document.getElementById("currency_conversion2").innerHTML = conversion_text;
                        // alert(cf_value)
                        document.getElementById("conversion_factor").value = cf_value;
                        document.getElementById('currency_label').innerHTML = `(in ${selectedcurrency})`;
                        // conversion_calculation();
                    } else {
                        alert('No Conversion Factor found for the selected Currency');
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        var tooltipTriggerEl = document.getElementById('persistentTooltip');
        var tooltip = new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'manual' // Disable automatic trigger
        });
        var tooltipTimeout;
        // Show tooltip on mouseenter
        tooltipTriggerEl.addEventListener('mouseenter', function () {
            tooltip.show();
            clearTimeout(tooltipTimeout); // Cancel any previous timeout
        });

        // Prevent tooltip from closing on mouseleave
        tooltipTriggerEl.addEventListener('mouseleave', function () {
            // Optionally, keep the tooltip open for a period or add a condition to close it
            setTimeout(function () {
                tooltip.hide();
            }, 5000); // Keep it open for 5 seconds after mouse leaves
        });
        // Hide tooltip if clicked outside
        document.addEventListener('click', function (event) {
            var isClickInside = tooltipTriggerEl.contains(event.target);

            if (!isClickInside) {
                tooltip.hide();
                clearTimeout(tooltipTimeout); // Cancel any pending timeout if clicked outside
            }
        });
                                        
    })
 

    // document.addEventListener('DOMContentLoaded', function() {
    // document.getElementById('add-item').addEventListener('click', function() {
    //     conversion_calculation();
    // });

  
    // });

    
</script>
@endsection


@extends('layouts.footer')