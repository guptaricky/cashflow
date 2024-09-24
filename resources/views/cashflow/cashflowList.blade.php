@extends('layouts.auth')

@extends('layouts.sidebar')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Cashflow Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Cashflow Details</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <div class="card-body">
                <div id="table-pagination">
                    <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                        <form action="javascript:void(0);">
                            <div class="row row-cols-lg-auto g-5 align-items-center">
                            <div class="col-lg-2">
                                    <label class="visually-hidden" for="serialNo">Serial No.</label>
                                    <div class="input-group">
                                        <!-- <div class="input-group-text">Serial No.</div> -->
                                        <input type="text" class="form-control" id="serialNo" placeholder="Serial Number">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-3">
                                    <label class="visually-hidden" for="fromDate">From Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text">From Date</div>
                                        <input type="date" class="form-control" id="fromDate">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-3">
                                    <label class="visually-hidden" for="toDate">To Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text">To Date</div>
                                        <input type="date" class="form-control" id="toDate">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-2">
                                    <label class="visually-hidden" for="comapny">Company</label>
                                    <select class="form-select" id="company" >
                                        <option selected value="">Company</option>
                                        @foreach($companies as $index => $company)
                                        <option value="{{ $company->name }}"> {{ $company->name }} </option>
                                        @endforeach
                                    </select>
                                </div><!--end col-->
                                <div class="col-lg-2">
                                    <label class="visually-hidden" for="department">Department</label>
                                    <select class="form-select" id="department">
                                        <option selected value="">Department</option>
                                        <option value="Division 1">Division 1</option>
                                        <option value="Division 2">Division 2</option>
                                        <option value="Central 1">Central 1</option>
                                        <option value="Central 2">Central 2</option>
                                    </select>
                                </div><!--end col-->
                                <div class="col-12">
                                    <button onclick="searchContent()" type="button" class="btn btn-success btn-label waves-effect waves-light w-lg "><i class="ri-search-2-line label-icon align-middle fs-16 me-2"></i> Search</button>
                                    <button onclick="resetContent()" type="button" class="btn btn-danger waves-effect waves-light  "> Reset</button>
                                    <button id="exportBtn" type="button" class="btn btn-warning waves-effect waves-light ">Export</button> {{---<a href="{{ route('cashflow.export' )}}"> Export </a>--}}
                                    <button id="exportBtnXero" type="button" class="btn btn-warning waves-effect waves-light "> Export as XERO Report</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                        <div class="gridjs-head mt-4"></div>
                        <div class="gridjs-wrapper" style="height: auto;">
                            <table role="grid" class="gridjs-table" style="height: auto;" id="results">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th data-column-id="id" class="gridjs-th" style="width: 50px;">#</th>
                                        <th data-column-id="serialno" class="gridjs-th" style="width: 120px;">Serial No</th>
                                        <th data-column-id="product" class="gridjs-th" style="width: 120px;">Product</th>
                                        <th data-column-id="date" class="gridjs-th" style="width: 130px;">Date</th>
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
                                    @foreach($cashflows as $index => $cashflow)
                                    <tr class="gridjs-tr">
                                        <td data-column-id="sno" class="gridjs-td"><span><a href="" class="fw-medium">{{ $index + 1 }}</a></span></td>
                                        <td data-column-id="serialno" class="gridjs-td"><a href="{{ route('cashflow.detail', ['id' => $cashflow->cashflow_items_id] ) }}"><span class="badge text-bg-secondary">{{ $cashflow->serialNo }}</span></a></td>
                                        <td data-column-id="date" class="gridjs-td">{{ $cashflow->product_name }}</td>
                                        <td data-column-id="date" class="gridjs-td">{{ date("d-m-Y",strtotime($cashflow->date)) }}</td>
                                        <td data-column-id="clientname" class="gridjs-td">{{ $cashflow->customer_name }}<p class="text-muted">{{ $cashflow->ref_no }}</p></td>
                                        <td data-column-id="department" class="gridjs-td">{{ $cashflow->department }}</td>
                                        <td data-column-id="materialprice" class="gridjs-td">{{ $cashflow->totalMaterialPrice }}</td>
                                        <td data-column-id="othercharges" class="gridjs-td">{{ $cashflow->totalOtherCharges }}</td>
                                        <td data-column-id="freight" class="gridjs-td">{{ $cashflow->totalFreight }}</td>
                                        <td data-column-id="handling" class="gridjs-td"> {{ $cashflow->totalHandling }}</td>
                                        <td data-column-id="customs" class="gridjs-td">{{ $cashflow->totalCustoms }}</td>
                                        <td data-column-id="bankcomm" class="gridjs-td">{{ $cashflow->totalBankComm }}</td>
                                        <td data-column-id="companymargin" class="gridjs-td">{{ $cashflow->totalCompanyMargin }}</td>
                                        <td data-column-id="sellingcost" class="gridjs-td">{{ $cashflow->totalSelling }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="gridjs-footer">
                            <div class="gridjs-pagination">
                                <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing <b>1</b> to <b>5</b> of <b>10</b> results</div>
                                <div class="gridjs-pages"><button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="">Previous</button><button tabindex="0" role="button" class="gridjs-currentPage" title="Page 1" aria-label="Page 1">1</button><button tabindex="0" role="button" class="" title="Page 2" aria-label="Page 2">2</button><button tabindex="0" role="button" title="Next" aria-label="Next" class="">Next</button></div>
                            </div>
                        </div> --}}
                        <div id="gridjs-temp" class="gridjs-temp"></div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div>
    </div>
    <!--end col-->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function searchContent() {
    var serialNo = $('#serialNo').val();
    var company = $('#company').val();
    var department = $('#department').val();
    var fromDate = $('#fromDate').val();
    var toDate = $('#toDate').val();
   
    $.ajax({
        url: "{{ route('cashflow.search') }}", // Backend script to handle the search query
        type: 'GET',
        data: { serialNo: serialNo,company: company,department: department, fromDate: fromDate, toDate: toDate },
        success: function(data) {
            $('#results').html(data);
        },
        error: function() {
            $('#results').html('<p>An error has occurred</p>');
        }
    });
}
$('#exportBtn').on('click', function() {
    var serialNo = $('#serialNo').val();
    var company = $('#company').val();
    var department = $('#department').val();
    var fromDate = $('#fromDate').val();
    var toDate = $('#toDate').val();

    var queryParams = `serialNo=${serialNo}&company=${company}&department=${department}&fromDate=${fromDate}&toDate=${toDate}`;
    
    $.ajax({
        url: '/cashflow/export?' + queryParams,
        type: 'GET',
        xhrFields: {
            responseType: 'blob' // Expecting a blob response (Excel file)
        },
        success: function(data, status, xhr) {
            var blob = new Blob([data], { type: 'application/vnd.ms-excel' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'filtered_cashflow.xlsx';

            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        },
        error: function(xhr, status, error) {
            console.error('Failed to export data:', error);
        }
    });
});
$('#exportBtnXero').on('click', function() {
    var serialNo = $('#serialNo').val();
    var company = $('#company').val();
    var department = $('#department').val();
    var fromDate = $('#fromDate').val();
    var toDate = $('#toDate').val();

    var queryParams = `serialNo=${serialNo}&company=${company}&department=${department}&fromDate=${fromDate}&toDate=${toDate}`;
    // alert(queryParams)
    $.ajax({
        url: '/cashflow/exportXero?' + queryParams,
        type: 'GET',
        xhrFields: {
            responseType: 'blob' // Expecting a blob response (Excel file)
        },
        success: function(data, status, xhr) {
            var blob = new Blob([data], { type: 'application/vnd.ms-excel' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'filtered_cashflow.xlsx';

            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        },
        error: function(xhr, status, error) {
            console.error('Failed to export data:', error);
        }
    });
});

function resetContent() {
    $('#serialNo').val('');
    $('#company').val('');
    $('#department').val('');
    $('#fromDate').val('');
    $('#toDate').val('');
    searchContent();
}
</script>

<!--end row-->
@endsection