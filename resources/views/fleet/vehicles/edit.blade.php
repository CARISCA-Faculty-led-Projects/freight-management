<div class="">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Vehicle</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/fleet/vehicles" class="text-muted text-hover-primary">Vehicles</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--begin::Content container-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Form-->
            <div id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row">
                <!--begin::Aside column-->
                <form wire:submit.prevent="general" method="post">
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Vehicle Image</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input placeholder-->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    @if ($image)
                                        <div class="">
                                            <img class="w-150px h-150px" src="{{ $image->temporaryUrl() }}">
                                        </div>
                                    @else
                                        <img class="w-150px h-150px"
                                            src="{{ asset('storage/vehicles/' . $this->vehicle['image']) }}"
                                            alt="image" />
                                    @endif
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--begin::Inputs-->
                                        <input type="file" wire:model="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the vehicle image. Only *.png, *.jpg and *.jpeg image
                                    files are accepted</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Assign Driver</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->

                                <select wire:model="vehicle.driver_id" class="form-control" id="">
                                    <option value="">--select--</option>
                                    @foreach ($this->drivers() as $driver)
                                        <option value="{{ $driver->mask }}">{{ $driver->name }}</option>
                                    @endforeach
                                </select>

                                <!--begin::Description-->
                                <div class="text-muted fs-7 mt-5">Assign available driver to vehicle
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::Template settings-->

                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Load Preferences</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_organization_store_template" class="form-label">Select as
                                    many as
                                    apply</label>
                                <!--end::Select store template-->
                                <div class="" style="height: 45rem; overflow:auto;">
                                    @foreach ($this->loads() as $load)
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8 mt-5">
                                            <!--begin::Bullet-->
                                            @if (in_array($load->name, json_decode($this->vehicle['load_type'])))
                                                <span class="bullet bullet-vertical h-20px bg-primary"></span>
                                            @else
                                                <span class="bullet bullet-vertical h-20px bg-white"></span>
                                            @endif
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" wire:model="load_type"
                                                    wire:key="{{ $load->id }}" type="checkbox"
                                                    value="{{ $load->name }}" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <div class="flex-grow-1">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fw-bold fs-6">{{ $load->name }}</a>
                                            </div>
                                        </div>
                                        <!--end:Item-->
                                    @endforeach
                                </div>


                                <!--begin::Description-->
                                <div class="text-muted fs-7 mt-5">These specify which goods your company can transport
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::Template settings-->

                    </div>
                </form>

                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $general ? 'active' : '' }}"
                                wire:click="activate('general')" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_general">General</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $others ? 'active' : '' }}"
                                wire:click="activate('others')" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_advanced">Others</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $doc_page ? 'active' : '' }}"
                                wire:click="activate('documents')" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_documents">Documents</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <form wire:submit.prevent="general" method="post" class="{{ $general ? '' : 'd-none' }}">
                            <div class="tab-pane fade {{ $general ? 'show active' : '' }}"
                                id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="d-flex flex-wrap gap-5 mb-10 mt-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Vehicle Registration
                                                        number</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <input type="text" wire:model="vehicle.number"
                                                        class="text form-control" placeholder="GT-5466-22">
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter vehicle license plate number
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Vehicle Organization Number</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <input type="text" wire:model="vehicle.org_num"
                                                        class="text form-control" placeholder="V5466">
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter number given to vehicle inside
                                                        organization</div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-wrap gap-5 mb-10 mt-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Vehicle Category</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2" wire:model="vehicle.vehicle_category_id"
                                                        data-hide-search="true" data-placeholder="Select an option">
                                                        <option>--select--</option>
                                                        @foreach ($this->vcat() as $cat)
                                                            <option value="{{ $cat->id }}"
                                                                {{ $vehicle['vehicle_category_id'] == $cat->id ? 'selected' : '' }}>
                                                                {{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">A vehicle category is required and
                                                        recommended to
                                                        describe your vehicle as much as possible</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Vehicle Sub Category</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2"
                                                        wire:model="vehicle.vehicle_subcategory_id" data-hide-search="true"
                                                        data-placeholder="Select an option">
                                                        <option></option>
                                                        @foreach ($this->vsubcat() as $cat)
                                                            <option value="{{ $cat->id }}"
                                                                {{ $vehicle['vehicle_subcategory_id'] == $cat->id ? 'selected' : '' }}>
                                                                {{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">A vehicle sub category is required and
                                                        recommended to
                                                        describe your vehicle as much as possible</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Tax-->
                                            <div class="d-flex flex-wrap gap-5 mb-10">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Make</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <input class="form-control mb-2" wire:model="vehicle.make" />
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the make of the vehicle.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Model</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control mb-2" wire:model="vehicle.model" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the model of the vehicle.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                            </div>
                                            <!--end:Tax-->
                                            <!--begin::Tax-->
                                            <div class="d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Year</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <input type="number" min="1990" max="2024"
                                                        class="form-control mb-2" wire:model="vehicle.year" />
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the year the vehicle was
                                                        manufactured.
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Color</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="color" class="form-control mb-2" wire:model="vehicle.color" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the vehicle current color.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                            </div>
                                            <!--end:Tax-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10 mt-10">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">GPS System?
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Select a discount type that will be applied to this product">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span></label>
                                                <!--End::Label-->
                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9"
                                                    data-kt-buttons="true"
                                                    data-kt-buttons-target="[data-kt-button='true']">
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label
                                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $vehicle['gps'] == 'No' ? 'active' : '' }} d-flex text-start p-6"
                                                            data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span
                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    wire:model="vehicle.gps" value="No"
                                                                    {{ $vehicle['gps'] == 'No' ? 'checked' : '' }} />
                                                            </span>
                                                            <!--end::Radio-->
                                                            <!--begin::Info-->
                                                            <span class="ms-5">
                                                                <span
                                                                    class="fs-4 fw-bold text-gray-800 d-block">No</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label
                                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $vehicle['gps'] == 'Yes' ? 'active' : '' }} d-flex text-start p-6"
                                                            data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span
                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    wire:model="vehicle.gps" value="Yes"
                                                                    {{ $vehicle['gps'] == 'Yes' ? 'checked' : '' }} />
                                                            </span>
                                                            <!--end::Radio-->
                                                            <!--begin::Info-->
                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">Yes
                                                                </span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->


                                    <!--begin::Pricing-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Engine</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Engine Type</label>
                                                <!--end::Label-->
                                                <!--begin::Select2-->
                                                <select class="form-select mb-2" wire:model="vehicle.engine_type"
                                                    data-hide-search="true" data-placeholder="Select an option">
                                                    <option></option>
                                                    <option value="Diesel"
                                                        {{ $vehicle['engine_type'] == 'Diesel' ? 'selected' : '' }}>
                                                        Diesel</option>
                                                    <option value="Petrol"
                                                        {{ $vehicle['engine_type'] == 'Petrol' ? 'selected' : '' }}>
                                                        Petrol</option>
                                                </select>
                                                <!--end::Select2-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Select the engine type.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Transmission Type
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Select a discount type that will be applied to this product">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span></label>
                                                <!--End::Label-->
                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9"
                                                    data-kt-buttons="true"
                                                    data-kt-buttons-target="[data-kt-button='true']">
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label
                                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $vehicle['transmission'] == 'Manual' ? 'active' : '' }} d-flex text-start p-6"
                                                            data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span
                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    wire:model="vehicle.transmission" value="Manual"
                                                                    {{ $vehicle['transmission'] == 'Manual' ? 'checked' : '' }} />
                                                            </span>
                                                            <!--end::Radio-->
                                                            <!--begin::Info-->
                                                            <span class="ms-5">
                                                                <span
                                                                    class="fs-4 fw-bold text-gray-800 d-block">Manual</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label
                                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $vehicle['transmission'] == 'Automatic' ? 'active' : '' }} d-flex text-start p-6"
                                                            data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span
                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    wire:model="vehicle.transmission"
                                                                    value="Automatic"
                                                                    {{ $vehicle['transmission'] == 'Automatic' ? 'checked' : '' }} />
                                                            </span>
                                                            <!--end::Radio-->
                                                            <!--begin::Info-->
                                                            <span class="ms-5">
                                                                <span
                                                                    class="fs-4 fw-bold text-gray-800 d-block">Automatic
                                                                </span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Tax-->
                                            <div class="d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Fuel Consumption</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" wire:model="vehicle.fuel_consumption"
                                                        class="form-control mb-2" value="" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Update vehicle fuel consumption.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Axle Configuration (eg. 6x4)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" wire:model="vehicle.axle_type"
                                                        class="form-control mb-2" value="" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Update vehicle axle type.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end:Tax-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Pricing-->
                                </div>
                            </div>
                            <!--end::Shipping-->
                            <div class="{{ $general ? 'd-flex' : 'd-none' }} justify-content-end mt-5">
                                <!--begin::Button-->
                                <a href="{{ route('vehicles') }}" id="kt_ecommerce_add_organization_cancel"
                                    class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Save Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Tab pane-->
                        </form>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <form wire:submit.prevent="others" method="post" class="{{ $others ? '' : 'd-none' }}">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade {{ $others ? 'show active' : '' }}"
                                id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <!--begin::Inventory-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Owner</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" wire:model="owner.name"
                                                    class="form-control mb-2" placeholder="Name" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter the owner's name.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" wire:model="owner.email"
                                                    class="form-control mb-2" placeholder="Email" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter the owner's email.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Phone</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="d-flex gap-3">
                                                    <input type="tel" wire:model="owner.phone"
                                                        class="form-control mb-2" placeholder="Phone"
                                                        value="" />

                                                    <input type="text" wire:model="owner.address"
                                                        class="form-control mb-2" placeholder="Address" />
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter the owner's phone and address.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label">Same as Organization?</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="form-check form-check-custom form-check-solid mb-2">
                                                    <input class="form-check-input" wire:click="org_owned($event.target.checked)"
                                                        type="checkbox" />
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Inventory-->
                                    <!--begin::Variations-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Route</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                                <!--begin::Label-->
                                                <label class="form-label">Add Route Variations</label>
                                                <!--end::Label-->
                                                <!--begin::Repeater-->
                                                <div id="kt_ecommerce_add_product_options">
                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <div data-repeater-list="kt_ecommerce_add_product_options"
                                                            class="d-flex flex-column gap-3">
                                                            <div
                                                                class="form-group d-flex flex-wrap align-items-center gap-5">
                                                                @for ($i = 0; $i < count($this->veh_routes); $i++)
                                                                    <div data-repeater-item=""
                                                                        class="form-group d-flex flex-wrap align-items-center gap-5">

                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control mw-100 w-300px"
                                                                            wire:model="veh_routes.{{ $i }}.origin"
                                                                            placeholder="From" required />

                                                                        <input type="text"
                                                                            class="form-control mw-100 w-300px"
                                                                            wire:model="veh_routes.{{ $i }}.destination"
                                                                            placeholder="To" required />
                                                                        <!--end::Input-->
                                                                        <button type="button" data-repeater-delete=""
                                                                            wire:click="delRoute({{ $i }})"
                                                                            class="btn btn-sm btn-icon btn-light-danger">
                                                                            <i class="ki-duotone ki-cross fs-1">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                        </button>
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Form group-->
                                                </div>
                                                <!--end::Repeater-->
                                            </div>
                                            <!--end::Form group-->
                                            <!--begin::Form group-->
                                            <div class="form-group mt-5">
                                                <button type="button"
                                                    wire:click="addRoute({{ count($this->veh_routes) + 1 }})"
                                                    class="btn btn-sm btn-light-primary">
                                                    <i class="ki-duotone ki-plus fs-2"></i>Add another
                                                    route</button>
                                            </div>
                                            <!--end::Form group-->
                                        </div>
                                        <!--end::Card body-->
                                        <!--end::Repeater-->
                                    </div>
                                    <!--end::Variations-->
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Variations-->
                            <!--begin::Shipping-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Dimensions & Weight</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Shipping form-->
                                    <div id="kt_ecommerce_add_product_shipping" class="mt-3">
                                        <!--begin::Input group-->
                                        <div class="fv-row">

                                            <!--begin::Input-->
                                            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                <input type="number" wire:model="vehicle.weight"
                                                    class="form-control mb-2" placeholder="Vehicle Weight (KG)"
                                                    value="" />
                                                <input type="number" wire:model="vehicle.max_load_weight"
                                                    class="form-control mb-2" placeholder="Max Load Weight (KG)"
                                                    value="" />

                                            </div>
                                            <!--end::Input-->

                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mt-5">
                                            <!--begin::Input-->
                                            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                <input type="number" wire:model="vehicle.width"
                                                    class="form-control mb-2" placeholder="Width (M)"
                                                    value="" />
                                                <input type="number" wire:model="vehicle.height"
                                                    class="form-control mb-2" placeholder="Height (M)"
                                                    value="" />
                                                <input type="number" wire:model="vehicle.length"
                                                    class="form-control mb-2" placeholder="Length (M)"
                                                    value="" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Shipping form-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Shipping-->
                            <div class="{{ $others ? 'd-flex' : 'd-none' }} justify-content-end mt-5">
                                <!--begin::Button-->
                                <a href="{{ route('vehicles') }}" id="kt_ecommerce_add_organization_cancel"
                                    class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Save Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Tab pane-->
                        </form>
                        <form wire:submit.prevent="documents" method="post"
                            class="{{ $doc_page ? '' : 'd-none' }}">
                            <div class="tab-pane fade {{ $doc_page ? 'show active' : '' }}"
                                id="kt_ecommerce_add_documents" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Vehicle Owners Documents &nbsp;
                                                </h2>
                                                @if ($this->vehicle['owners_documents'])
                                                    <a
                                                        href="{{ asset('storage/vehicles/' . $this->vehicle['owners_documents']) }}">
                                                        <small>View</small> </a>
                                                @endif
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <input type="file" wire:model="owners_documents"
                                                            id="" class="form-control">
                                                        <div wire:loading.remove wire:target="owners_documents"
                                                            class="ms-4">
                                                            <h3 class="fs-7 fw-bold text-gray-900 mt-1">Drop files here
                                                                or
                                                                click
                                                                to upload.</h3>

                                                        </div>
                                                        <div wire:loading wire:target="owners_documents"
                                                            class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mt-3">Uploading...
                                                            </h3>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->
                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Road Worthy Documents
                                                </h2> &nbsp;
                                                @if ($this->vehicle['road_worth_documents'])
                                                    <a
                                                        href="{{ asset('storage/vehicles/' . $this->vehicle['road_worth_documents']) }}">
                                                        <small>View</small> </a>
                                                @endif
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <input type="file"
                                                            wire:model="documents.road_worth_documents" id=""
                                                            class="form-control">
                                                        <div wire:loading.remove wire:target="road_worth_documents"
                                                            class="ms-4">
                                                            <h3 class="fs-7 fw-bold text-gray-900 mt-1">Drop files here
                                                                or
                                                                click
                                                                to upload.</h3>

                                                        </div>
                                                        <div wire:loading wire:target="road_worth_documents"
                                                            class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mt-3">Uploading...
                                                            </h3>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->
                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Insurance Documents
                                                </h2> &nbsp;
                                                @if ($this->vehicle['insurance_documents'])
                                                    <a
                                                        href="{{ asset('storage/vehicles/' . $this->vehicle['insurance_documents']) }}">
                                                        <small>View</small> </a>
                                                @endif
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <input type="file" wire:model="insurance_documents"
                                                            id="" class="form-control">
                                                        <div wire:loading.remove wire:target="insurance_documents"
                                                            class="ms-4">
                                                            <h3 class="fs-7 fw-bold text-gray-900 mt-1">Drop files here
                                                                or
                                                                click
                                                                to upload.</h3>

                                                        </div>
                                                        <div wire:loading wire:target="insurance_documents"
                                                            class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mt-3">Uploading...
                                                            </h3>
                                                        </div>

                                                        <!--end::Info-->
                                                    </div>
                                                </div>

                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->


                                </div>
                            </div>
                            <div class="{{ $doc_page ? 'd-flex' : 'd-none' }} justify-content-end mt-5">
                                <!--begin::Button-->
                                <a href="{{ route('vehicles') }}" id="kt_ecommerce_add_organization_cancel"
                                    class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Save Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </form>
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Main column-->

                <!--end::Form-->
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    <!--end::Chat drawer-->
    <!--end::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
</div>
