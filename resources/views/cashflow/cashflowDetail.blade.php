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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cashflow List</a></li>
                    <li class="breadcrumb-item active">Cashflow Details</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<style>
    .text-right {
        text-align: right;
        /* font-weight: bold; */
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <div class="card-body">
                <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                    <button onclick="printDiv()" type="button" style="float: right;" class="btn btn-success btn-label waves-effect waves-light w-lg "><i class="ri-printer-line label-icon align-middle fs-16 me-2"></i> Print</button>
                    <div class="gridjs-wrapper" id="print" style="height: auto;">
                        <table role="grid" class="gridjs-table table" style="height: auto;" id="results">
                            <thead class="gridjs-thead">
                                <tr class="gridjs-tr">
                                    <th class="gridjs-th" style="width: 50%;text-align:center;text-transform: uppercase;" colspan="2"><u>{{ $cashflowDetail->description }}</u></th>
                                </tr>
                                <tr class="gridjs-tr">
                                    <th class="gridjs-th text-center" style="width: 50%">INTEGRA REFERENCE <span style="color: red;"> ({{ $cashflowDetail->clientRef }})</span></th>
                                    <th class="gridjs-th text-center" style="width: 50%;">{{ number_format($cashflowDetail->totalSelling, 2, '.', ',') }} </th>
                                </tr>
                                <tr class="gridjs-tr">
                                    <th class="gridjs-th text-center" style="width: 50%">{{ $cashflowDetail->date }}</th>
                                    <th class="gridjs-th text-center" style="width: 50%;">TULES MEDIKAL</th>
                                </tr>
                                <tr class="gridjs-tr">
                                    <th class="gridjs-th text-center" style="width: 50%">Description</th>
                                    <th class="gridjs-th text-center" style="width: 50%;">EXW-TURKEY</th>
                                </tr>
                            </thead>
                            <tbody class="gridjs-tbody">
                                <tr>
                                    <td class="gridjs-td">Cost of goods or Purchase price</td>
                                    <td class="gridjs-td text-right">{{ number_format($cashflowDetail->totalMaterialPrice, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Freight or Shipment Charges</td>
                                    <td class="gridjs-td text-right">{{ number_format($cashflowDetail->totalFreight, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Custom Duties 6%</td>
                                    <td class="gridjs-td text-right">{{ number_format($cashflowDetail->totalCustoms, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Local handling Charges & Clearance</td>
                                    <td class="gridjs-td text-right"><span style="color: red;">{{ number_format($cashflowDetail->totalHandling, 2, '.', ',') }}</span></td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Other Charges</td>
                                    <td class="gridjs-td text-right">{{ number_format($cashflowDetail->totalOthercharges, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Bank Comm. Etc. Below 10K; 7%; Above 10K 9%; TT: 3%</td>
                                    <td class="gridjs-td text-right">{{ number_format($cashflowDetail->totalBankComm, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Bid bond / LG charges</td>
                                    <td class="gridjs-td text-right">0.000</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Performance Bond / LG charges</td>
                                    <td class="gridjs-td text-right">0.000</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Total cost</td>
                                    <td class="gridjs-td text-right"><span style="color: blue;">{{ number_format(($cashflowDetail->totalSelling - $cashflowDetail->totalCompanyMargin), 2, '.', ',') }}</span></td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">Company Margin:</td>
                                    <td class="gridjs-td text-right"><span style="color: red;text-align: right;">{{ number_format($cashflowDetail->totalCompanyMargin, 2, '.', ',') }}</span></td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td" colspan="2"><b>Notes:</b></td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">1) Bid Bond / LG Amount 0.00%</td>
                                    <td class="gridjs-td text-right"></td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">2) Performance Bond / LG Amount 0.00%</td>
                                    <td class="gridjs-td text-right"></td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">3) Manufacturing period 40 DAYS</td>
                                    <td class="gridjs-td text-right">40 DAYS</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">4) Freight or Shipment period 30 DAYS</td>
                                    <td class="gridjs-td text-right">{{ $cashflowDetail->availability }} DAYS</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">5) Supplier payment method 90 DAYS CREDIT</td>
                                    <td class="gridjs-td text-right">90 DAYS CREDIT</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">6) Clients Payment method TT</td>
                                    <td class="gridjs-td text-right">TT</td>
                                </tr>
                                <tr>
                                    <td class="gridjs-td">7) ROI 3 months</td>
                                    <td class="gridjs-td text-right">3 months</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row" style="margin-left: 10px;margin-top: 10px;">
                            <b>Warning:</b><br>
                            <b>LG progressing time </b><br>
                            <span>Self finance 1 to 2 days before closing time</span><br>
                            <span>Mourabha Dept. 3 to 5 days before closing time</span><br><br>

                            <b>Name: ………………………</b><br><br>

                            <b>Signature: ………………………</b> <br><br>

                            <b>Accounts: ………………………</b><br><br>

                            <b>MD: ………………………</b><br><br>
                        </div>
                    </div>
                    <div id="gridjs-temp" class="gridjs-temp"></div>
                </div>
            </div><!-- end card-body -->
        </div>
    </div>
    <!--end col-->
</div>

<!--end row-->
@endsection
<script>
    function printDiv() {

        var divToPrint = document.getElementById('print');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table {' +
                'border-collapse:collapse;' +
            '}' +
            'table th, table td {' +
                'border:1px solid #000;' +
                'padding;0.5em;' +
            '}' +
            '.text-right {' +
                'text-align: right;' +
            '}' +
            '.text-center {' +
                'text-align: center;' +
            '}' +
            '</style>';
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write("<h3 align='left'>INTEGRA MEDICAL</h3>");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }
</script>