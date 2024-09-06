@extends('layouts.auth')

@extends('layouts.sidebar')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Currency Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Currency Master</li>
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
                    <form method="POST" action="{{ route('currency.store') }}">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label for="name" class="@error('name') is-invalid @enderror form-label">Currency Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                    @error('name') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label for="symbol" class="@error('symbol') is-invalid @enderror form-label">Symbol</label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
                                    @error('code') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                                </div>
                            </div>

                            <div class="col-xxl-4 col-md-6">
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
                        <div class="gridjs-wrapper" style="height: auto;">
                            <table role="grid" class="gridjs-table" style="height: auto;" id="results">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th data-column-id="id" class="gridjs-th" style="width: 50px;">#</th>
                                        <th data-column-id="serialno" class="gridjs-th" style="width: 120px;">Currency</th>
                                        <th data-column-id="date" class="gridjs-th" style="width: 120px;">Symbol</th>
                                        {{-- <th data-column-id="date" class="gridjs-th" style="width: 120px;">Default</th> --}}
                                        <th data-column-id="date" class="gridjs-th" style="width: 120px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @foreach($currencies as $index => $currency)
                                    <tr class="gridjs-tr" >
                                        <td data-column-id="sno" class="gridjs-td"><span><a href="" class="fw-medium">{{ $index + 1 }}</a></span></td>
                                        <td data-column-id="serialno" class="gridjs-td">{{ $currency->name }}</td>
                                        <td data-column-id="date" class="gridjs-td">{{ $currency->code }}</td>
                                        {{-- <td data-column-id="isDefault" class="gridjs-td">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input default-switch" type="checkbox" role="switch" id="defaultSwitch_{{ $currency->id }}" data-id="{{ $currency->id }}" {{ $currency->isDefault ? 'checked' : '' }}>
                                            </div>
                                        </td> --}}
                                        <td data-column-id="isActive" class="gridjs-td">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input active-switch" type="checkbox" role="switch" id="activeSwitch_{{ $currency->id }}" data-id="{{ $currency->id }}" {{ $currency->isActive ? 'checked' : '' }}>
                                            </div>    
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="gridjs-temp" class="gridjs-temp"></div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div>
    </div>
    <!--end col-->
</div>
<script>
    // Handling toggle switch for Default Status
    // document.querySelectorAll('.default-switch').forEach(function(switchBtn) {
    //     switchBtn.addEventListener('change', function() {
    //         let currencyId = this.getAttribute('data-id');
    //         let isDefault = this.checked ? 1 : 0;

    //         fetch(`/currency/${currencyId}/setDefault`, {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({ isDefault: isDefault })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.success) {
    //             // Reset all other switches to inactive
    //             document.querySelectorAll('.default-switch').forEach(function(btn) {
    //                 if (btn.getAttribute('data-id') !== currencyId) {
    //                     btn.checked = false;
    //                 }
    //             });
    //         } else {
    //             console.error('Error setting active currency:', data.message);
    //         }
    //         })
    //         .catch(error => console.error('Error:', error));
    //     });
    // });

    // Handling toggle switch for Active Status
    document.querySelectorAll('.active-switch').forEach(function(switchBtn) {
        switchBtn.addEventListener('change', function() {
            let currencyId = this.getAttribute('data-id');
            let isActive = this.checked ? 1 : 0;

            fetch(`/currency/${currencyId}/updateActive`, {
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