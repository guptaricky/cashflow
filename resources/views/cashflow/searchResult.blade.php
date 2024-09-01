@if($results->isEmpty())
    <p>No results found</p>
@else
<thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th data-column-id="id" class="gridjs-th" style="width: 50px;">#</th>
                                        <th data-column-id="serialno" class="gridjs-th" style="width: 120px;">Serial No</th>
                                        <th data-column-id="date" class="gridjs-th" style="width: 120px;">Date</th>
                                        <th data-column-id="clientname" class="gridjs-th" style="width: 200px;">client Name / Ref</th>
                                        <th data-column-id="department" class="gridjs-th" style="width: 200px;">Department</th>
                                        <th data-column-id="materialprice" class="gridjs-th" style="width: 200px;">Total Material Price(KWD)</th>
                                        <th data-column-id="othercharges" class="gridjs-th" style="width: 200px;">Total Other Charges(KWD)</th>
                                        <th data-column-id="freight" class="gridjs-th" style="width: 200px;">Total Freight(KWD)</th>
                                        <th data-column-id="handling" class="gridjs-th" style="width: 200px;">Total Handling cost(KWD)</th>
                                        <th data-column-id="customs" class="gridjs-th" style="width: 200px;">Total Customs 6%(KWD)</th>
                                        <th data-column-id="bankcomm" class="gridjs-th" style="width: 200px;">Total Bank Comm</th>
                                        <th data-column-id="companymargin" class="gridjs-th" style="width: 250px;">Total Company Margin(KWD)</th>
                                        <th data-column-id="sellingcost" class="gridjs-th" style="width: 200px;">TOTAL SELLING COST</th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
@foreach($results as $index => $cashflow)
    <tr class="gridjs-tr" id="results">
        <td data-column-id="sno" class="gridjs-td"><span><a href="" class="fw-medium">{{ $index + 1 }}</a></span></td>
        <td data-column-id="serialno" class="gridjs-td">{{ $cashflow->serialNo }}</td>
        <td data-column-id="date" class="gridjs-td">{{ $cashflow->date }}</td>
        <td data-column-id="clientname" class="gridjs-td">{{ $cashflow->clientName }}</td>
        <td data-column-id="department" class="gridjs-td">{{ $cashflow->department }}</td>
        <td data-column-id="materialprice" class="gridjs-td">{{ $cashflow->totalMaterialPrice }}</td>
        <td data-column-id="othercharges" class="gridjs-td">{{ $cashflow->totalOthercharges }}</td>
        <td data-column-id="freight" class="gridjs-td">{{ $cashflow->totalFreight }}</td>
        <td data-column-id="handling" class="gridjs-td">{{ $cashflow->totalHandlind }}</td>
        <td data-column-id="customs" class="gridjs-td">{{ $cashflow->totalCustoms }}</td>
        <td data-column-id="bankcomm" class="gridjs-td">{{ $cashflow->totalBankComm }}</td>
        <td data-column-id="companymargin" class="gridjs-td">{{ $cashflow->totalCompanyMargin }}</td>
        <td data-column-id="sellingcost" class="gridjs-td">{{ $cashflow->totalOthercharges + $cashflow->totalCompanyMargin }}</td>
    </tr>    
@endforeach
</tbody>
@endif