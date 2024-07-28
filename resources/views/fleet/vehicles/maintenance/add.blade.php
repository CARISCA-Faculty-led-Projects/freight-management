@extends(auth()->guard()->name == 'drivers' ? 'layout.roles.driver' : 'layout.roles.organization')
@section('content')
    <!--begin::Modal - New Target-->
    <div class="container mt-5 d-flex justify-content-center" id="kt_modal_add_maintenance_schedule" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="card mw-650px">
            <!--begin::Modal content-->
            <div class="card-body">
                <!--begin::Modal body-->
                <div class=" scroll-y px-10 px-lg-15 pt-0">
                    <!--begin:Form-->
                    <form
                        action="{{ route(auth()->guard()->name == 'drivers' ? 'driver.vehicle.maintenance.save' : 'vehicle.maintenance.save', $vehicle) }}"
                        method="POST" id="kt_modal_add_maintenance_schedule_form" class="form">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Add Maintenance Schedule</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">Vehicles undergoing maintenance should be made known to
                                us for planning and load distribution, please check
                                <a href="#" class="fw-bold link-primary">Maintenance Guidelines</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        {{-- <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Status</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select
                                class="form-select {{ $errors->has('status') ? 'border-danger' : '' }} form-select-solid"
                                data-hide-search="true" data-placeholder="Select an organization" name="status" required>
                                <option value=""></option>
                                <option value="Scheduled" selected="selected">Scheduled</option>
                                <option value="In progress">In progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <!--end::Select2-->
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group--> --}}
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Task</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select class="form-select {{ $errors->has('task') ? 'border-danger' : '' }} form-select-solid"
                                data-hide-search="true" data-placeholder="Select a task" name="task" required>
                                <option value="">--select--</option>
                                @foreach ($tasks as $task)
                                    <option value="{{ $task }}">{{ $task }}</option>
                                @endforeach
                            </select>
                            <!--end::Select2-->
                            @error('task')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Select a service provider</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select
                                class="form-select {{ $errors->has('provider') ? 'border-danger' : '' }} form-select-solid"
                                data-hide-search="true" data-placeholder="Select an organization" name="provider" required>
                                <option value="Craftman Mechanics">Craftman Mechanics</option>
                                <option value="AutoPro Services"> AutoPro Services</option>
                            </select>
                            <!--end::Select2-->
                            @error('provider')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Select a frequency</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select
                                class="form-select {{ $errors->has('frequency') ? 'border-danger' : '' }} form-select-solid"
                                data-hide-search="true" data-placeholder="Select an frequency" name="frequency" required>
                                <option value="">Unplanned</option>
                                <option value="1 week" selected="selected">Every week</option>
                                <option value="2 weeks" selected="selected">Every 2 weeks</option>
                                <option value="1 month" selected="selected">Every month</option>
                            </select>
                            <!--end::Select2-->
                            @error('frequency')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Scheduled Date</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Specify the bid amount to place in.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->

                            <input type="date"
                                class="form-control {{ $errors->has('date') ? 'border-danger' : '' }} form-control-solid"
                                name="date" required />
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Due Date</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Specify the date maintenance would be complete.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->

                            <input type="date"
                                class="form-control {{ $errors->has('date') ? 'border-danger' : '' }} form-control-solid"
                                name="due_date" required />
                            @error('due_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--end::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Amount</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Specify the bid amount to place in.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->

                            <input type="text"
                                class="form-control {{ $errors->has('amount') ? 'border-danger' : '' }} form-control-solid"
                                placeholder="2000" name="amount" />
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Notice-->
                        <!-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <i class="ki-duotone ki-wallet fs-2tx text-primary me-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>

                                            <div class="d-flex flex-stack flex-grow-1">
                                                <div class="fw-semibold">
                                                    <h4 class="text-gray-900 fw-bold">Top up funds</h4>
                                                    <div class="fs-6 text-gray-700">Not enough funds in your wallet?
                                                        <a href="/utilities/modals/wizards/top-up-wallet" class="text-bolder">Top up
                                                            wallet</a>.</div>
                                                </div>
                                            </div>
                                        </div> -->
                        <!--end::Notice-->
                        <!--end::Notice-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <a href="{{ route('vehicle.maintenance_list', $vehicle) }}" class="btn btn-light me-3"
                                data-kt-modal-action-type="cancel">Cancel</a>
                            <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->
@endsection
