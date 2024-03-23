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
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="/apps/customers/list"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Load Board</a>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="/organization/add" class="btn btn-sm fw-bold btn-primary">Fleet Mangement</a>
                    <!--end::Primary button-->
                    <!--begin::Secondary button-->
                    <a href="/organization/list"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Browse
                        Organizations</a>
                    <!--end::Secondary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--begin::Content container-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Form-->
            <div id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
                data-kt-redirect="/apps/ecommerce/catalog/products">
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
                                        <input type="file" wire:model="vehicle.image" accept=".png, .jpg, .jpeg" />
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
                                <!--begin::Form group-->
                                {{-- <div class="form-group mt-5">
                            <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_add_org_pref">
                                <i class="ki-duotone ki-plus fs-2"></i>Add new preference</button>
                        </div> --}}
                                <!--end::Form group-->
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
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-duotone ki-cheque text-white fs-2x ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                </i>
                                                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                    {{-- {{ $vehicle['make'] . ' ' . $vehicle['model'] }}  --}}
                                                </div>
                                                <div class="fw-semibold text-white">Currently Editing</div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-duotone ki-cheque text-white fs-2x ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                </i>
                                                @if ($vehicle['organization_id'] == null)
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">No organization
                                                        assigned</div>
                                                    <div class="fw-semibold text-white">Details will be populated into
                                                        no organization</div>
                                                @else
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Jess Fleet
                                                        Management Inc</div>
                                                    <div class="fw-semibold text-white">Details will be populated into
                                                        Jess
                                                        Fleet Management Inc</div>
                                                @endif
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>

                                </div>

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
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row mt-5">
                                                <!--begin::Label-->
                                                <label class="required form-label">Vehicle Category</label>
                                                <!--end::Label-->
                                                <!--begin::Select2-->
                                                <select class="form-select mb-2" wire:model="vehicle.category"
                                                    data-control="select2" data-hide-search="true"
                                                    data-placeholder="Select an option">
                                                    <option></option>
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
                                            <div class="mb-10 fv-row mt-5">
                                                <!--begin::Label-->
                                                <label class="required form-label">Vehicle Sub Category</label>
                                                <!--end::Label-->
                                                <!--begin::Select2-->
                                                <select class="form-select mb-2" wire:model="vehicle.sub_category_id"
                                                    data-control="select2" data-hide-search="true"
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
                                                    <input class="form-control mb-2" wire:model="vehicle.color" />
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
                                                    data-control="select2" data-hide-search="true"
                                                    data-placeholder="Select an option">
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
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
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
                                            {{-- <div class="fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label">Same as Organization?</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="form-check form-check-custom form-check-solid mb-2">
                                                    <input class="form-check-input" wire:model="org_owned"
                                                        type="checkbox" value="Yes" />
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <!--end::Input-->
                                            </div> --}}
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
                                                                @for ($i = 0; $i < $routes_counter; $i++)
                                                                    {{-- <div class="form-group d-flex flex-wrap align-items-center gap-5" wire:key="routes-{{ $i }}"> --}}
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control mw-100 w-300px"
                                                                        wire:model="veh_routes.{{ $i }}.origin"
                                                                        placeholder="From" />

                                                                    <input type="text"
                                                                        class="form-control mw-100 w-300px"
                                                                        wire:model="veh_routes.{{ $i }}.destination"
                                                                        placeholder="To" />
                                                                    <!--end::Input-->
                                                                    <button type="button" data-repeater-delete=""
                                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                                        <i class="ki-duotone ki-cross fs-1">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </button>
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
                                                <button type="button" wire:click="addRoute"
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
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Input-->
                                        <div class="form-check form-check-custom form-check-solid mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                id="kt_ecommerce_add_product_shipping_checkbox" value="1" />
                                            <label class="form-check-label">Specify weight & height
                                                dimensions</label>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set if the vehicle can take some weight
                                            Physical products may require shipping.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Shipping form-->
                                    <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label">Weight</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                <input type="number" wire:model="width" class="form-control mb-2"
                                                    placeholder="Vehicle Weight" value="" />
                                                <input type="number" wire:model="height" class="form-control mb-2"
                                                    placeholder="Max Load Weight" value="" />

                                            </div>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Enter the product dimensions in
                                                centimeters
                                                (cm).</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mt-5">
                                            <!--begin::Label-->
                                            <label class="form-label">Dimension</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                <input type="number" wire:model="width" class="form-control mb-2"
                                                    placeholder="Width (w)" value="" />
                                                <input type="number" wire:model="height" class="form-control mb-2"
                                                    placeholder="Height (h)" value="" />
                                                <input type="number" wire:model="length" class="form-control mb-2"
                                                    placeholder="Lengtn (l)" value="" />
                                            </div>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Enter the product dimensions in
                                                centimeters
                                                (cm).</div>
                                            <!--end::Description-->
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
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
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
                                                <h2>Vehicle Owners Documents
                                                    <small>{{ $this->vehicle['owners_documents'] ? 'Uploaded' : 'Unavailable' }}</small>
                                                </h2>
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
                                                        <input type="file" wire:model="documents.owners_documents"
                                                            id="" class="form-control">
                                                            <div wire:loading.remove wire:target="documents.owners_documents" class="ms-4">
                                                                <h3 class="fs-7 fw-bold text-gray-900 mt-1">Drop files here
                                                                    or
                                                                    click
                                                                    to upload.</h3>
    
                                                            </div>
                                                            <div wire:loading wire:target="documents.owners_documents" class="ms-4">
                                                                <h3 class="fs-5 fw-bold text-gray-900 mt-3">Uploading...</h3>
                                                            </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Add owners documents.</div>
                                            <!--end::Description-->
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
                                                    <small>{{ $this->vehicle['road_worth_documents'] ? 'Uploaded' : 'Unavailable' }}</small>
                                                </h2>
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
                                                            <div wire:loading.remove wire:target="documents.road_worth_documents" class="ms-4">
                                                                <h3 class="fs-7 fw-bold text-gray-900 mt-1">Drop files here
                                                                    or
                                                                    click
                                                                    to upload.</h3>
    
                                                            </div>
                                                            <div wire:loading wire:target="documents.road_worth_documents" class="ms-4">
                                                                <h3 class="fs-5 fw-bold text-gray-900 mt-3">Uploading...</h3>
                                                            </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the product media gallery.</div>
                                            <!--end::Description-->
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
                                                    <small>{{ $this->vehicle['insurance_documents'] ? 'Uploaded' : 'Unavailable' }}</small>
                                                </h2>
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
                                                        <input type="file" wire:model="documents.insurance"
                                                            id="" class="form-control">
                                                        <div wire:loading.remove wire:target="documents.insurance" class="ms-4">
                                                            <h3 class="fs-7 fw-bold text-gray-900 mt-1">Drop files here
                                                                or
                                                                click
                                                                to upload.</h3>

                                                        </div>
                                                        <div wire:loading wire:target="documents.insurance" class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mt-3">Uploading...</h3>
                                                        </div>

                                                        <!--end::Info-->
                                                    </div>
                                                </div>

                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the product media gallery.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->


                                </div>
                            </div>
                            <div class="{{ $doc_page ? 'd-flex' : 'd-none' }} justify-content-end mt-5">
                                <!--begin::Button-->
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
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
