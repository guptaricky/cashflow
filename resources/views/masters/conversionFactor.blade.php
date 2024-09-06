@extends('layouts.auth')

@extends('layouts.sidebar')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Currency Conversion</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Currency Conversion</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-6">
        <div class="card">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <div class="card-body">
                <div class="live-preview">
                    <form method="POST" action="{{ route('conversionFactor.store') }}">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label for="fromCurrency" class="@error('fromCurrency') is-invalid @enderror form-label">From Currency</label>
                                    <select id="fromCurrency" name="fromCurrency" class="form-select" data-choices="" data-choices-sorting="true" >
                                        @foreach($currencies as $index => $currency)
                                        @if($currency->isDefault == 1)
                                        <option value="{{ $currency->name }}" 
                                            {{ old('fromCurrency') == $currency->name ? 'selected' : '' }}>
                                            {{ $currency->name }} ({{ $currency->code }})
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </select>
                                    @error('fromCurrency') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label for="toCurrency" class="@error('toCurrency') is-invalid @enderror form-label">To Currency</label>
                                    <select id="toCurrency" name="toCurrency" class="form-select" data-choices="" data-choices-sorting="true" >
                                        <option value=""> Choose... </option>
                                        @foreach($currencies as $index => $currency)
                                        @if($currency->isDefault != 1)
                                        <option value="{{ $currency->name }}" 
                                            {{ old('toCurrency') == $currency->name ? 'selected' : '' }}>
                                            {{ $currency->name }} ({{ $currency->code }})
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </select>
                                    @error('toCurrency') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label for="conversion_factor" class="@error('conversion_factor') is-invalid @enderror form-label">Conversion Factor</label>
                                    <input type="number" step="any" class="form-control" id="conversion_factor" name="conversion_factor" value="{{ old('conversion_factor') }}">
                                    @error('conversion_factor') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                                
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div class="d-flex align-items-start gap-3 mt-4" >
                                <div class="ms-auto">
                                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light w-lg"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Submit</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    <!--end row-->
                </div>
            </div><!-- end card-body -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <div class="card-body">
                <div id="table-pagination">
                    <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                        
                        <div class="gridjs-head mt-4"></div>
                        {{-- <div class="gridjs-wrapper" style="height: auto;"> --}}
                            {{-- <table role="grid" class="gridjs-table" style="height: auto;" id="results">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th data-column-id="serialno" class="gridjs-th" style="width: 120px;">Currency Conversions</th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @foreach($conversions as $index => $conversion)
                                    <tr class="gridjs-tr" >
                                        <td data-column-id="serialno" class="gridjs-td fs-4">
                                            <b>One</b> <span class="badge text-bg-info">{{ $conversion->fromCurrency }}</span> equals to <b>{{ $conversion->cf_value }}</b> <span class="badge text-bg-danger">{{ $conversion->toCurrency }}</span>
                                        </td></tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                            @foreach($conversions as $index => $conversion)
                            <blockquote class="blockquote custom-blockquote blockquote-info rounded mb-0">
                                <p class="text-dark mb-2 fs-5"><b>One</b> <span class="badge text-bg-info">{{ $conversion->fromCurrency }}</span> equals to <b>{{ $conversion->cf_value }}</b> <span class="badge text-bg-danger">{{ $conversion->toCurrency }}</span>
                                </p>
                            </blockquote></br>
                            @endforeach
                        {{-- </div> --}}
                        <div id="gridjs-temp" class="gridjs-temp"></div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div>
    </div>
    <!--end col-->
</div>
<script>
   

    // Handling toggle switch for Active Status
    document.querySelectorAll('.active-switch').forEach(function(switchBtn) {
        switchBtn.addEventListener('change', function() {
            let companyId = this.getAttribute('data-id');
            let isActive = this.checked ? 1 : 0;

            fetch(`/company/${companyId}/updateActive`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ isActive: isActive })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Active status updated:', data);
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
<!--end row-->
@endsection