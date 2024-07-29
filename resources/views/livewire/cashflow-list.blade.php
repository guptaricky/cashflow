<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Cash Flow List</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                        <form wire:submit.prevent="submit">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">From Date</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">To Date</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="input-group input-group-outline mb-3">
                                        <select class="form-control" id="company" wire:model ="company">
                                        <option value=""> -- Select any Company -- </option>
                                        @foreach($companies as $index => $company)
                                            <option value="{{ $company->name }}"> {{ $company->name }} </option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm">
                                <button type="submit" class="btn bg-gradient-dark">Search</button>
                                </div>
                            </div>
                        </form>    
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 ml-20">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            #</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Serial No</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            client Name / Ref</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Department</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Material Price(KWD)</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Other Charges(KWD)</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Freight(KWD)</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Handling cost(KWD)</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Customs 6%(KWD)</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Bank Comm</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total Company Margin(KWD)</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            TOTAL SELLING COST</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataSource as $index => $data)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="#"><span class="badge badge-sm bg-gradient-success">{{ $data->serialNo }}</span></a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->date }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <!-- <div>
                                                    <img src="{{ asset('assets') }}/img/user.jpeg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                                                </div> -->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->clientName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $data->clientRef }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->department }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalMaterialPrice }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalOthercharges }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalFreight }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalHandling }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalCustoms }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalBankComm }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalCompanyMargin }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data->totalOthercharges + $data->totalCompanyMargin }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>