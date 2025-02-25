@extends('layouts.auth')

@extends('layouts.sidebar')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-xxl-5">
        <div class="d-flex flex-column h-100">
            <div class="row h-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <!-- <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i>
                                <div class="flex-grow-1 text-truncate">
                                    Your free trial expired in <b>17</b> days.
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="pages-pricing.html" class="text-reset text-decoration-underline"><b>Upgrade</b></a>
                                </div>
                            </div> -->

                            <!-- <div class="row align-items-end">
                                <div class="col-sm-8">
                                    <div class="p-3">
                                        <p class="fs-16 lh-base">Upgrade your plan from a <span class="fw-semibold">Free trial</span>, to ‘Premium Plan’ <i class="mdi mdi-arrow-right"></i></p>
                                        <div class="mt-3">
                                            <a href="pages-pricing.html" class="btn btn-success">Upgrade Account!</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="px-3">
                                        <img src="{{ Vite::asset('resources/assets/images/user-illustarator-2.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div> -->
                        </div> <!-- end card-body-->
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->

        </div>
    </div> <!-- end col-->


</div> <!-- end row-->
@endsection

@extends('layouts.footer')

@extends('layouts.theme-setting')