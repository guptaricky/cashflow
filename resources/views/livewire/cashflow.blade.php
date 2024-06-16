
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
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
                                <button class="btn btn-outline-primary btn-sm mb-0"><a href="{{ route('cashflow-list') }}">View Cashflow</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                         @endif
                        <form wire:submit.prevent="submit">
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Serial Number</label>
                                    <input id="serialNo" wire:model="serialNo" type="text" class="form-control border border-2 p-2">
                                    @error('serialNo') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Client Name</label>
                                    <input id="clientName" wire:model="clientName" type="text" class="form-control border border-2 p-2">
                                    @error('clientName') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Client Reference</label>
                                    <input id="clientRef" wire:model="clientRef" type="text" class="form-control border border-2 p-2">
                                    @error('clientRef') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date</label>
                                    <input id="date" wire:model="date" type="date" class="form-control border border-2 p-2">
                                    @error('date') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Company</label>
                                    <select class="form-control border border-2 p-2" id="company" wire:model ="company">
                                        <option value="Integra Medical"> Integra Medical </option>
                                        <option value="Intra Trading & Contracting">Intra Trading & Contracting</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Department</label>
                                    <select class="form-control border border-2 p-2" id="department" wire:model="department">
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
                                    <input id="description" wire:model="description" type="text" class="form-control border border-2 p-2">
                                    @error('description') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Country of Origin</label>
                                    <input id="countryOrigin" wire:model="countryOrigin" type="text" class="form-control border border-2 p-2">
                                    @error('countryOrigin') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit of Measurement</label>
                                    <input id="uom" wire:model="uom" type="text" class="form-control border border-2 p-2">
                                    @error('uom') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Packaging Information</label>
                                    <input id="packagingInfo" wire:model="packagingInfo" type="text" class="form-control border border-2 p-2">
                                    @error('packagingInfo') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Mode of Shipment</label>
                                    <select class="form-control border border-2 p-2" id="modeofshipment" wire:model="modeofshipment">
                                        <option value="Air Freight">Air Freight</option>
                                        <option value="Sea Freight">Sea Freight</option>
                                        <option value="Land Freight">Land Freight</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Production/Availability from Supplier (in Days)</label>
                                    <input id="availability" wire:model="availability" type="text" class="form-control border border-2 p-2">
                                    @error('availability') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Travel of Goods (in Days)</label>
                                    <input id="goodsTravel" wire:model="goodsTravel" type="text" class="form-control border border-2 p-2">
                                    @error('goodsTravel') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input id="quantity" wire:model="quantity" type="text" class="form-control border border-2 p-2">
                                    @error('quantity') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">INCOTERMS</label>
                                    <select id="incoterms" wire:model="incoterms" class="form-control border border-2 p-2" id="modeofshipment">
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
                                    <input id="unitPrice" wire:model="unitPrice" type="text" class="form-control border border-2 p-2" >
                                    @error('unitPrice') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Material Price KD</label>
                                    <input id="unitMaterialPrice" wire:model="unitMaterialPrice" type="text" class="form-control border border-2 p-2 "  >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Other Charges per Unit (KWD)</label>
                                    <input id="unitOtherCharges" wire:model="unitOtherCharges" type="text" class="form-control border border-2 p-2" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Freight Per Unit (KWD)</label>
                                    <input id="freight" wire:model="freight" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Unit Local handling Charges & Clearance (KWD)</label>
                                    <input id="unitLocalHandling" wire:model="unitLocalHandling" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Customs Duty 6%</label>
                                    <input id="customDuty" wire:model="customDuty" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Bank Charges: LC CHARGE/DIRECT TRANSFER</label>
                                    <input id="bankCharges" wire:model="bankCharges" type="text" class="form-control border border-2 p-2" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Landed Cost per Unit (KWD)</label>
                                    <input id="landedCost" wire:model="landedCost" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Company Profit Margin per Unit  in %</label>
                                    <input id="companyProfileMargin" wire:model="companyProfileMargin" type="text" class="form-control border border-2 p-2">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Profit Margin per unit KD</label>
                                    <input id="profitMargin" wire:model="profitMargin" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Target Price</label>
                                    <input id="targetPrice" wire:model="targetPrice" type="text" class="form-control border border-2 p-2">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Calculated Selling Unit Price KD</label>
                                    <input id="sellingPrice" wire:model="sellingPrice" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Selling KD</label>
                                    <input id="totalSelling" wire:model="totalSelling" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">QTY</label>
                                    <input id="qty" wire:model="qty" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Material Price Price KWD</label>
                                    <input id="totalMaterialPrice" wire:model="totalMaterialPrice" type="text" class="form-control border border-2 p-2" >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Other Charges (KWD)</label>
                                    <input id="totalOthercharges" wire:model="totalOthercharges" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Freight  (KWD)</label>
                                    <input id="totalFreight" wire:model="totalFreight" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Handling cost (KWD)</label>
                                    <input id="totalHandling" wire:model="totalHandling" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Customs 6% (KWD)</label>
                                    <input id="totalCustoms" wire:model="totalCustoms" type="text" class="form-control border border-2 p-2" >
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Bank Comm</label>
                                    <input id="totalBankComm" wire:model="totalBankComm" type="text" class="form-control border border-2 p-2" >
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Total Company Margin (KWD)</label>
                                    <input id="totalCompanyMargin" wire:model="totalCompanyMargin" type="text" class="form-control border border-2 p-2" >
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
   
// $(document).ready(function(){
//     $('#unitPrice').on('blur', function(){
//         let unitPrice = $(this).val();
//         let quantity = $('#quantity').val();
        
//         let unitMaterialPrice = unitPrice * 0.31;
//         $('#unitMaterialPrice').val(unitMaterialPrice);

//         if(quantity > 0){
//             let unitOtherCharges = 250/quantity;
//             let freight = 530/quantity;
//             let unitLocalHandling = unitMaterialPrice * 0.03;
//             let customDuty = unitMaterialPrice * 0.06;
//             let bankCharges = unitMaterialPrice * 0.09;
//             let landedCost = unitOtherCharges * 0.09;
//             let profitMargin = unitMaterialPrice * 0.25;
//             let sellingPrice = parseFloat(landedCost) + parseFloat(profitMargin);
//             let totalSelling = parseFloat(sellingPrice) * parseFloat(quantity);
//             let qty = parseFloat(quantity);
//             let totalMaterialPrice = parseFloat(unitMaterialPrice) * parseFloat(qty);
//             let totalOthercharges = parseFloat(unitOtherCharges) * parseFloat(qty);
//             let totalFreight = parseFloat(freight) * parseFloat(qty);
//             let totalHandling = parseFloat(unitLocalHandling) * parseFloat(qty);
//             let totalCustoms = parseFloat(unitLocalHandling) * parseFloat(qty);
//             let totalBankComm = parseFloat(bankCharges) * parseFloat(qty);
//             let totalCompanyMargin = parseFloat(profitMargin) * parseFloat(qty);
//             $('#qty').val(qty);
//             $('#unitOtherCharges').val(unitOtherCharges);
//             $('#freight').val(freight);
//             $('#unitLocalHandling').val(unitLocalHandling);
//             $('#customDuty').val(customDuty);
//             $('#bankCharges').val(bankCharges);
//             $('#landedCost').val(landedCost);
//             $('#profitMargin').val(profitMargin);
//             $('#sellingPrice').val(sellingPrice);
//             $('#totalSelling').val(totalSelling);
//             $('#totalSelling').val(totalSelling);
//             $('#totalMaterialPrice').val(totalMaterialPrice);
//             $('#totalOthercharges').val(totalOthercharges);
//             $('#totalFreight').val(totalFreight);
//             $('#totalHandling').val(totalHandling);
//             $('#totalCustoms').val(totalCustoms);
//             $('#totalBankComm').val(totalBankComm);
//             $('#totalCompanyMargin').val(totalCompanyMargin);
//         }
//         else if(quantity == null || quantity == ''){
//             alert("quantity cannot be empty")
//         }
        
        
       
        
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('unitPrice').addEventListener('blur', function() {
        let unitPrice = this.value;
        let quantity = document.getElementById('quantity').value;

        let unitMaterialPrice = unitPrice * 0.31;
        // document.getElementById('unitMaterialPrice').value = unitMaterialPrice;
        @this.set('unitMaterialPrice', unitMaterialPrice);

        if (quantity > 0) {
            let unitOtherCharges = 250 / quantity;
            let freight = 530 / quantity;
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
            let totalCustoms = parseFloat(customDuty) * parseFloat(qty); // Corrected totalCustoms calculation
            let totalBankComm = parseFloat(bankCharges) * parseFloat(qty);
            let totalCompanyMargin = parseFloat(profitMargin) * parseFloat(qty);
            
            // document.getElementById('qty').value = qty;
            // document.getElementById('unitOtherCharges').value = unitOtherCharges;
            // document.getElementById('freight').value = freight;
            // document.getElementById('unitLocalHandling').value = unitLocalHandling;
            // document.getElementById('customDuty').value = customDuty;
            // document.getElementById('bankCharges').value = bankCharges;
            // document.getElementById('landedCost').value = landedCost;
            // document.getElementById('profitMargin').value = profitMargin;
            // document.getElementById('sellingPrice').value = sellingPrice;
            // document.getElementById('totalSelling').value = totalSelling;
            // document.getElementById('totalMaterialPrice').value = totalMaterialPrice;
            // document.getElementById('totalOthercharges').value = totalOthercharges;
            // document.getElementById('totalFreight').value = totalFreight;
            // document.getElementById('totalHandling').value = totalHandling;
            // document.getElementById('totalCustoms').value = totalCustoms;
            // document.getElementById('totalBankComm').value = totalBankComm;
            // document.getElementById('totalCompanyMargin').value = totalCompanyMargin;

            @this.set('qty',qty);
            @this.set('unitOtherCharges',unitOtherCharges);
            @this.set('freight',freight);
            @this.set('unitLocalHandling',unitLocalHandling);
            @this.set('customDuty',customDuty);
            @this.set('bankCharges',bankCharges);
            @this.set('landedCost',landedCost);
            @this.set('profitMargin',profitMargin);
            @this.set('sellingPrice',sellingPrice);
            @this.set('totalSelling',totalSelling);
            @this.set('totalMaterialPrice',totalMaterialPrice);
            @this.set('totalOthercharges',totalOthercharges);
            @this.set('totalFreight',totalFreight);
            @this.set('totalHandling',totalHandling);
            @this.set('totalCustoms',totalCustoms);
            @this.set('totalBankComm',totalBankComm);
            @this.set('totalCompanyMargin',totalCompanyMargin);
        } else if (quantity === null || quantity === '') {
            alert("quantity cannot be empty");
        }
    });
});


</script>    