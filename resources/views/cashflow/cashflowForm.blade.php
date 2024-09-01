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
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">
                <div class="live-preview">
                    <form method="POST" action="{{ route('cashflow.store') }}">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="serialNo" class="@error('serialNo') is-invalid @enderror form-label">Serial Number</label>
                                    <input type="text" class="form-control" id="serialNo" name="serialNo" value="{{ old('serialNo') }}">
                                    @error('serialNo') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="clientName" class="@error('clientName') is-invalid @enderror form-label">Client Name</label>
                                    <input type="text" class="form-control" id="clientName" name="clientName" value="{{ old('clientName') }}">
                                    @error('clientName') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="Client Reference" class="@error('clientRef') is-invalid @enderror form-label">Client Reference</label>
                                    <input type="text" class="form-control" id="clientRef" name="clientRef" value="{{ old('clientRef') }}">
                                    @error('clientRef') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
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
                                    <select id="company" name="company" class="form-select" data-choices="" data-choices-sorting="true">
                                        <option selected="">Choose...</option>
                                        @foreach($companies as $index => $company)
                                        <option value="{{ $company->name }}"> {{ $company->name }} </option>
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
                                        <option value="Division 1">Division 1</option>
                                        <option value="Division 2">Division 2</option>
                                        <option value="Central 1">Central 1</option>
                                        <option value="Central 2">Central 2</option>
                                    </select>
                                    @error('department') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="description" class="@error('description') is-invalid @enderror form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                                    @error('description') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
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
                                    <label for="uom" class="@error('uom') is-invalid @enderror form-label">Unit of Measurement</label>
                                    <input type="text" class="form-control" id="uom" name="uom" value="{{ old('uom') }}">
                                    @error('uom') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="packagingInfo" class="@error('packagingInfo') is-invalid @enderror form-label">Packaging Info</label>
                                    <input type="text" class="form-control" id="packagingInfo" name="packagingInfo" value="{{ old('packagingInfo') }}">
                                    @error('packagingInfo') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="modeofshipment" class="@error('modeofshipment') is-invalid @enderror form-label">Mode of Shipment</label>
                                    <select id="modeofshipment" name="modeofshipment" class="form-select" data-choices="" data-choices-sorting="true">
                                        <option value="Air Freight">Air Freight</option>
                                        <option value="Sea Freight">Sea Freight</option>
                                        <option value="Land Freight">Land Freight</option>
                                    </select>
                                    @error('modeofshipment') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="availability" class="@error('availability') is-invalid @enderror form-label">Production/Availability from Supplier (in Days)</label>
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
                                    <label for="quantity" class="@error('quantity') is-invalid @enderror form-label">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                                    @error('quantity') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="incoterms" class="@error('incoterms') is-invalid @enderror form-label">INCOTERMS</label>
                                    <select id="incoterms" name="incoterms" class="form-select" data-choices="" data-choices-sorting="true">
                                        <option value="EXW">EXW</option>
                                        <option value="FOB">FOB</option>
                                        <option value="C&P">C&P</option>
                                        <option value="CIF">CIF</option>
                                        <option value="CIP">CIP</option>
                                        <option value="DAP">DAP</option>
                                        <option value="DPT">DPT</option>
                                    </select>
                                    @error('incoterms') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="currency" class="@error('currency') is-invalid @enderror form-label">Currency</label>
                                    <select id="currency" name="currency" class="form-select" data-choices="" data-choices-sorting="true" onchange="changeCurrencyLabel(this.value)">
                                        <option value=""> Choose... </option>
                                        @foreach($currencies as $index => $currency)
                                            <option value="{{ $currency->name }}-{{ $currency->conversion_factor }}"> {{ $currency->name }} ({{ $currency->code }} ) </option>
                                        @endforeach
                                    </select>
                                    </select>
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
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="unitPrice" class="@error('unitPrice') is-invalid @enderror form-label">Unit Price <span id="currency_label" class="font-weight-bold"> (in Dealing Currency)</label>
                                    <input type="text" class="form-control" id="unitPrice" name="unitPrice" value="{{ old('unitPrice') }}">
                                    @error('unitPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none" >
                                <div>
                                    <label for="unitMaterialPrice" class="@error('unitMaterialPrice') is-invalid @enderror form-label">Unit Material Price KD</label>
                                    <input type="text" class="form-control" id="unitMaterialPrice" name="unitMaterialPrice" value="{{ old('unitMaterialPrice') }}">
                                    @error('unitMaterialPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="unitOtherCharges" class="@error('unitOtherCharges') is-invalid @enderror form-label">Unit Other Charges per Unit (KWD)</label>
                                    <input type="text" class="form-control" id="unitOtherCharges" name="unitOtherCharges" value="{{ old('unitOtherCharges') }}">
                                    @error('unitOtherCharges') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="freight" class="@error('freight') is-invalid @enderror form-label">Freight Per Unit (KWD)</label>
                                    <input type="text" class="form-control" id="freight" name="freight" value="{{ old('freight') }}">
                                    @error('freight') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="unitLocalHandling" class="@error('unitLocalHandling') is-invalid @enderror form-label">Unit Local handling Charges & Clearance (KWD)</label>
                                    <input type="text" class="form-control" id="unitLocalHandling" name="unitLocalHandling" value="{{ old('unitLocalHandling') }}">
                                    @error('unitLocalHandling') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="customDuty" class="@error('customDuty') is-invalid @enderror form-label">Customs Duty 6%</label>
                                    <input type="text" class="form-control" id="customDuty" name="customDuty" value="{{ old('customDuty') }}">
                                    @error('customDuty') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="bankCharges" class="@error('bankCharges') is-invalid @enderror form-label">Bank Charges: LC CHARGE/DIRECT TRANSFER</label>
                                    <input type="text" class="form-control" id="bankCharges" name="bankCharges" value="{{ old('bankCharges') }}">
                                    @error('bankCharges') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="landedCost" class="@error('landedCost') is-invalid @enderror form-label">Landed Cost per Unit (KWD)</label>
                                    <input type="text" class="form-control" id="landedCost" name="landedCost" value="{{ old('landedCost') }}">
                                    @error('landedCost') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="companyProfileMargin" class="@error('companyProfileMargin') is-invalid @enderror form-label">Company Profit Margin per Unit in %</label>
                                    <input type="text" class="form-control" id="companyProfileMargin" name="companyProfileMargin" value="{{ old('companyProfileMargin') }}">
                                    @error('companyProfileMargin') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="profitMargin" class="@error('profitMargin') is-invalid @enderror form-label">Profit Margin per unit KD</label>
                                    <input type="text" class="form-control" id="profitMargin" name="profitMargin" value="{{ old('profitMargin') }}">
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
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="sellingPrice" class="@error('sellingPrice') is-invalid @enderror form-label">Calculated Selling Unit Price KD</label>
                                    <input type="text" class="form-control" id="sellingPrice" name="sellingPrice" value="{{ old('sellingPrice') }}">
                                    @error('sellingPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalSelling" class="@error('totalSelling') is-invalid @enderror form-label">Total Selling KD</label>
                                    <input type="text" class="form-control" id="totalSelling" name="totalSelling" value="{{ old('totalSelling') }}">
                                    @error('totalSelling') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="qty" class="@error('qty') is-invalid @enderror form-label">QTY</label>
                                    <input type="text" class="form-control" id="qty" name="qty" value="{{ old('qty') }}">
                                    @error('qty') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="basiInput" class="@error('totalMaterialPrice') is-invalid @enderror form-label">Total Material Price Price KWD</label>
                                    <input type="text" class="form-control" id="totalMaterialPrice" name="totalMaterialPrice" value="{{ old('totalMaterialPrice') }}">
                                    @error('totalMaterialPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalOthercharges" class="@error('totalOthercharges') is-invalid @enderror form-label">Total Other Charges (KWD)</label>
                                    <input type="text" class="form-control" id="totalOthercharges" name="totalOthercharges" value="{{ old('totalOthercharges') }}">
                                    @error('totalOthercharges') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalFreight" class="@error('totalFreight') is-invalid @enderror form-label">Total Freight (KWD)</label>
                                    <input type="text" class="form-control" id="totalFreight" name="totalFreight" value="{{ old('totalFreight') }}">
                                    @error('totalFreight') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalHandling" class="@error('totalHandling') is-invalid @enderror form-label">Total Handling cost (KWD)</label>
                                    <input type="text" class="form-control" id="totalHandling" name="totalHandling" value="{{ old('totalHandling') }}">
                                    @error('totalHandling') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalCustoms" class="@error('totalCustoms') is-invalid @enderror form-label">Total Customs 6% (KWD)</label>
                                    <input type="text" class="form-control" id="totalCustoms" name="totalCustoms" value="{{ old('totalCustoms') }}">
                                    @error('totalCustoms') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalBankComm" class="@error('totalBankComm') is-invalid @enderror form-label">Total Bank Comm</label>
                                    <input type="text" class="form-control" id="totalBankComm" name="totalBankComm" value="{{ old('totalBankComm') }}">
                                    @error('totalBankComm') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6 d-none">
                                <div>
                                    <label for="totalCompanyMargin" class="@error('totalCompanyMargin') is-invalid @enderror form-label">Total Company Margin (KWD)</label>
                                    <input type="text" class="form-control" id="totalCompanyMargin" name="totalCompanyMargin" value="{{ old('totalCompanyMargin') }}">
                                    @error('totalCompanyMargin') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div class="d-flex align-items-start gap-3 mt-4" >
                                <div class="ms-auto">
                                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light w-lg"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Submit</button>
                                </div>
                                </div>
                            </div>

                           
                    </form>
                    <!--end row-->
                </div>

            </div>
        </div>
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-xxl-5">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Unit Charges</h4>
            </div><!-- end card header -->

            <div class="card-body">

                <div class="table-responsive table-card">
                    <table class="table table-borderless table-nowrap align-middle mb-0">
                        
                        <tbody>
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Unit Material Price</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="unitMaterialPrice2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Unit Other Charges per Unit</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="unitOtherCharges2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-7.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Freight Per Unit</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="freight2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Unit Local handling Charges & Clearance</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="unitLocalHandling2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Customs Duty 6%</h5>
                                        <p class="fs-12 mb-0 text-muted"></p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="customDuty2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-5.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Bank Charges: LC CHARGE/DIRECT TRANSFER</h5>
                                        <p class="fs-12 mb-0 text-muted"></p>
                                    </div>
                                </td>

                                <td>
                                    <h6 class="mb-0" id="bankCharges2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Landed Cost per Unit</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="landedCost2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Profit Margin per unit</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="profitMargin2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Calculated Selling Unit Price</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="sellingPrice2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xxl-5">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Total Charges</h4>
            </div><!-- end card header -->

            <div class="card-body">

                <div class="table-responsive table-card">
                    <table class="table table-borderless table-nowrap align-middle mb-0">
                        
                        <tbody>
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Selling KD</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalSelling2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Quantity</h5>
                                        <p class="fs-12 mb-0 text-muted"></p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="qty2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-7.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Material Price Price </h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalMaterialPrice2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Other Charges</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalOthercharges2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Freight</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalFreight2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-5.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Handling cost</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>

                                <td>
                                    <h6 class="mb-0" id="totalHandling2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Customs 6%</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalCustoms2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Bank Comm</h5>
                                        <p class="fs-12 mb-0 text-muted"></p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalBankComm2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <!-- <img src="{{ Vite::asset('resources/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2"> -->
                                    <div>
                                        <h5 class="fs-13 mb-0">Total Company Margin</h5>
                                        <p class="fs-12 mb-0 text-muted">in KWD</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0" id="totalCompanyMargin2" >- </h6>
                                </td>
                            </tr><!-- end tr -->
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

</div>
<!--end row-->
<script>
    function changeCurrencyLabel(str) {
        parts = str.split("-");
        // let currency = document.getElementById('currency').value;
        // document.getElementById("currency_label").textContent= "(in "+ currency + ")";
        document.getElementById("conversion_factor").value = parts[1];
    }

    // document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('unitPrice').addEventListener('keyup', function() {
        let unitPrice = this.value;
        // let conversion_factor = document.getElementById('conversion_factor').value;
        let conversion_factor = 3.22;
        // alert(unitPrice);
        let quantity = document.getElementById('quantity').value;
        // let currency = document.getElementById('currency').value;

        let unitMaterialPrice = (unitPrice / conversion_factor).toFixed(2);
        // document.getElementById('unitMaterialPrice').value = unitMaterialPrice;
        document.getElementById("unitMaterialPrice").value = unitMaterialPrice;
        document.getElementById("unitMaterialPrice2").innerHTML = unitMaterialPrice;

        // let ManualPrice = document.getElementById('ManualPrice').value;
        // let CostManual = document.getElementById('CostManual').value;
        let ManualPrice = 250;
        let CostManual = 530;

        if (quantity > 0) {
            let unitOtherCharges = (ManualPrice / quantity).toFixed(2);
            let freight = (CostManual / quantity).toFixed(2);
            let unitLocalHandling = (unitMaterialPrice * 0.03).toFixed(2);
            let customDuty = (unitMaterialPrice * 0.06).toFixed(2);
            let bankCharges = (unitMaterialPrice * 0.09).toFixed(2);
            let landedCost = (unitOtherCharges * 0.09).toFixed(2);
            let profitMargin = (unitMaterialPrice * 0.25).toFixed(2);
            let sellingPrice = (parseFloat(landedCost) + parseFloat(profitMargin)).toFixed(2);
            let totalSelling = (parseFloat(sellingPrice) * parseFloat(quantity)).toFixed(2);
            let qty = parseFloat(quantity);
            let totalMaterialPrice = (parseFloat(unitMaterialPrice) * parseFloat(qty)).toFixed(2);
            let totalOthercharges = (parseFloat(unitOtherCharges) * parseFloat(qty)).toFixed(2);
            let totalFreight = (parseFloat(freight) * parseFloat(qty)).toFixed(2);
            let totalHandling = (parseFloat(unitLocalHandling) * parseFloat(qty)).toFixed(2);
            let totalCustoms = (parseFloat(customDuty) * parseFloat(qty)).toFixed(2); // Corrected totalCustoms calculation
            let totalBankComm = (parseFloat(bankCharges) * parseFloat(qty)).toFixed(2);
            let totalCompanyMargin = (parseFloat(profitMargin) * parseFloat(qty)).toFixed(2);
            document.getElementById("qty").value = qty;
            document.getElementById("unitOtherCharges").value = unitOtherCharges;
            document.getElementById("freight").value = freight;
            document.getElementById("unitLocalHandling").value = unitLocalHandling;
            document.getElementById("customDuty").value = customDuty;
            document.getElementById("bankCharges").value = bankCharges;
            document.getElementById("landedCost").value = landedCost;
            document.getElementById("profitMargin").value = profitMargin;
            document.getElementById("sellingPrice").value = sellingPrice;
            document.getElementById("totalSelling").value = totalSelling;
            document.getElementById("totalMaterialPrice").value = totalMaterialPrice;
            document.getElementById("totalOthercharges").value = totalOthercharges;
            document.getElementById("totalFreight").value = totalFreight;
            document.getElementById("totalHandling").value = totalHandling;
            document.getElementById("totalCustoms").value = totalCustoms;
            document.getElementById("totalBankComm").value = totalBankComm;
            document.getElementById("totalCompanyMargin").value = totalCompanyMargin;

            document.getElementById("qty2").innerHTML = qty;
            document.getElementById("unitOtherCharges2").innerHTML = unitOtherCharges;
            document.getElementById("freight2").innerHTML = freight;
            document.getElementById("unitLocalHandling2").innerHTML = unitLocalHandling;
            document.getElementById("customDuty2").innerHTML = customDuty;
            document.getElementById("bankCharges2").innerHTML = bankCharges;
            document.getElementById("landedCost2").innerHTML = landedCost;
            document.getElementById("profitMargin2").innerHTML = profitMargin;
            document.getElementById("sellingPrice2").innerHTML = sellingPrice;
            document.getElementById("totalSelling2").innerHTML = totalSelling;
            document.getElementById("totalMaterialPrice2").innerHTML = totalMaterialPrice;
            document.getElementById("totalOthercharges2").innerHTML = totalOthercharges;
            document.getElementById("totalFreight2").innerHTML = totalFreight;
            document.getElementById("totalHandling2").innerHTML = totalHandling;
            document.getElementById("totalCustoms2").innerHTML = totalCustoms;
            document.getElementById("totalBankComm2").innerHTML = totalBankComm;
            document.getElementById("totalCompanyMargin2").innerHTML = totalCompanyMargin;
        } else if (quantity === null || quantity === '') {
            //alert("quantity cannot be empty");
        }
    });
    // });
</script>
@endsection


@extends('layouts.footer')