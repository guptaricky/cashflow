<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
        <div class="col-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Add New Company</h6>
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
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Company Name</label>
                                <input id="companyName" wire:model="companyName" type="text" class="form-control border border-2 p-2">
                                @error('companyName') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Currency</label>
                                <input id="currency" wire:model="currency" type="text" class="form-control border border-2 p-2">
                                @error('currency') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <input id="description" wire:model="description" type="text" class="form-control border border-2 p-2">
                                @error('description') <p class='text-danger inputerror'>{{ $message }} </p> @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>
                    </div>

                    


                </div>

            </div>
            <div class="col-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Companies List</h6>
                            </div>
                            @if(!empty($dataSource) && $dataSource->isNotEmpty())
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ml-20">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 align-middle text-center">SN.</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 align-middle text-left">Company</th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 align-middle text-center">Currency</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataSource as $index => $data)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                                            </td>
                                            <td class="align-middle text-left">
                                                <a href="#"><span class="text-secondary text-xs font-weight-bold text-uppercase">{{ $data->name }}</span></a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-uppercase">{{ $data->currency }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="p-3">
                                <p class="text-center text-secondary">No companies available.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    
</div>