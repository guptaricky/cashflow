
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Cashflow</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <form wire:submit='update'>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Serial Number</label>
                                    <input id="serialNo" name="serialNo" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Client Name</label>
                                    <input id="clientName" name="" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Client Reference</label>
                                    <input id="clientRef" name="clientRef" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date</label>
                                    <input id="date" name="date" type="date" class="form-control border border-2 p-2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Company</label>
                                    <select class="form-control border border-2 p-2" id="company" name ="company">
                                        <option value="Integra Medical"> Integra Medical </option>
                                        <option value="Intra Trading & Contracting">Intra Trading & Contracting</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Department</label>
                                    <select class="form-control border border-2 p-2" id="department" name="department">
                                        <option value="Division 1"> Division 1 </option>
                                        <option value="Division 2">Division 2</option>
                                        <option value="Central 1">Central 1</option>
                                        <option value="Central 2">Central 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Description</label>
                                    <input id="description" name="description" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Country of Origin</label>
                                    <input id="countryOrigin" name="countryOrigin" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit of Measurement</label>
                                    <input id="uom" name="uom" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Packaging Information</label>
                                    <input id="packagingInfo" name="packagingInfo" type="text" class="form-control border border-2 p-2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Mode of Shipment</label>
                                    <select class="form-control border border-2 p-2" id="modeofshipment" name="modeofshipment">
                                        <option value="Air Freight">Air Freight</option>
                                        <option value="Sea Freight">Sea Freight</option>
                                        <option value="Land Freight">Land Freight</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Production/Availability from Supplier (in Days)</label>
                                    <input id="availability" name="availability" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Travel of Goods (in Days)</label>
                                    <input id="goodsTravel" name="goodsTravel" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input id="quantity" name="quantity" type="text" class="form-control border border-2 p-2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">INCOTERMS</label>
                                    <select id="incoterms" name="incoterms" class="form-control border border-2 p-2" id="modeofshipment">
                                        <option value="EXW">EXW</option>
                                        <option value="FOB">FOB</option>
                                        <option value="C&P">C&P</option>
                                        <option value="CIF">CIF</option>
                                        <option value="CIP">CIP</option>
                                        <option value="DAP">DAP</option>
                                        <option value="DPT">DPT</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Price in Different Currency in USD</label>
                                    <input id="unitPrice" name="unitPrice" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Material Price KD</label>
                                    <input id="unitMaterialPrice" name="unitMaterialPrice" type="text" class="form-control border border-2 p-2 " disabled >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Other Charges per Unit (KWD)</label>
                                    <input id="unitOtherCharges" name="unitOtherCharges" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Freight Per Unit (KWD)</label>
                                    <input id="freight" name="freight" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Local handling Charges & Clearance (KWD)</label>
                                    <input id="unitLocalHandling" name="unitLocalHandling" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Customs Duty 6%</label>
                                    <input id="customDuty" name="customDuty" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Bank Charges: LC CHARGE/DIRECT TRANSFER</label>
                                    <input id="bankCharges" name="bankCharges" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Landed Cost per Unit (KWD)</label>
                                    <input id="landedCost" name="landedCost" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Company Profit Margin per Unit  in %</label>
                                    <input id="companyProfileMargin" name="companyProfileMargin" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Profit Margin per unit KD</label>
                                    <input id="profitMargin" name="profitMargin" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Target Price</label>
                                    <input id="targetPrice" name="targetPrice" type="text" class="form-control border border-2 p-2">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Calculated Selling Unit Price KD</label>
                                    <input id="sellingPrice" name="sellingPrice" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Selling KD</label>
                                    <input id="totalSelling" name="totalSelling" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">QTY</label>
                                    <input id="qty" name="qty" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Material Price Price KWD</label>
                                    <input id="totalMaterialPrice" name="totalMaterialPrice" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Other Charges (KWD)</label>
                                    <input id="totalOthercharges" name="totalOthercharges" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Freight  (KWD)</label>
                                    <input id="totalFreight" name="totalFreight" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Handling cost (KWD)</label>
                                    <input id="totalHandling" name="totalHandling" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Customs 6% (KWD)</label>
                                    <input id="totalCustoms" name="totalCustoms" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Bank Comm</label>
                                    <input id="totalBankComm" name="totalBankComm" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Company Margin (KWD)</label>
                                    <input id="totalCompanyMargin" name="totalCompanyMargin" type="text" class="form-control border border-2 p-2" disabled>
                                </div>
                               
                            </div>
                            
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
   
$(document).ready(function(){
    $('#unitPrice').on('blur', function(){
        let unitPrice = $(this).val();
        let quantity = $('#quantity').val();
        
        let unitMaterialPrice = unitPrice * 0.31;
        $('#unitMaterialPrice').val(unitMaterialPrice);

        if(quantity > 0){
            let unitOtherCharges = 250/quantity;
            let freight = 530/quantity;
            let unitLocalHandling = unitMaterialPrice * 0.03;
            let customDuty = unitMaterialPrice * 0.06;
            let bankCharges = unitMaterialPrice * 0.09;
            let landedCost = unitOtherCharges * 0.09;
            let profitMargin = unitMaterialPrice * 0.25;
            let sellingPrice = parseFloat(landedCost) + parseFloat(profitMargin);
            let totalSelling = parseFloat(sellingPrice) * parseFloat(quantity);
            let qty = parseFloat(quantity);
            let totalMaterialPrice = parseFloat(unitMaterialPrice) * parseFloat(qty);
            let totalOthercharges = parseFloat(unitOtherCharges) * parseFloat(qty);
            let totalFreight = parseFloat(freight) * parseFloat(qty);
            let totalHandling = parseFloat(unitLocalHandling) * parseFloat(qty);
            let totalCustoms = parseFloat(unitLocalHandling) * parseFloat(qty);
            let totalBankComm = parseFloat(bankCharges) * parseFloat(qty);
            let totalCompanyMargin = parseFloat(profitMargin) * parseFloat(qty);
            $('#unitOtherCharges').val(unitOtherCharges);
            $('#freight').val(freight);
            $('#unitLocalHandling').val(unitLocalHandling);
            $('#customDuty').val(customDuty);
            $('#bankCharges').val(bankCharges);
            $('#landedCost').val(landedCost);
            $('#profitMargin').val(profitMargin);
            $('#sellingPrice').val(sellingPrice);
            $('#totalSelling').val(totalSelling);
            $('#totalSelling').val(totalSelling);
            $('#totalMaterialPrice').val(totalMaterialPrice);
            $('#totalOthercharges').val(totalOthercharges);
            $('#totalFreight').val(totalFreight);
            $('#totalHandling').val(totalHandling);
            $('#totalCustoms').val(totalCustoms);
            $('#totalBankComm').val(totalBankComm);
            $('#totalCompanyMargin').val(totalCompanyMargin);
        }
        else if(quantity == null || quantity == ''){
            alert("quantity cannot be empty")
        }
        
        
       
        
    });
});

</script>    