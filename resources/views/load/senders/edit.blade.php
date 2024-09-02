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
                        Edit Load</h1>
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
                            <a href="/load/list" class="text-muted text-hover-primary">Load</a>
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
            <!--begin::Content container-->
        </div>
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{ route('sender.load.update', $this->load['mask']) }}" method="POST"
                class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title required">
                                <h2>Image</h2>
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
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                @if ($this->load['image'])
                                    <img class="image-input-wrapper w-150px h-150px"
                                        src="{{ $this->load['image'] }}" alt=""
                                        srcset="">
                                @else
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                @endif
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the load image. Only *.png, *.jpg and
                                *.jpeg image files are accepted</div>
                            <!--end::Description-->
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title required">
                                <h2>Status</h2>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-hide-search="true" data-placeholder="Select an option"
                                name="status" id="kt_ecommerce_add_category_status_select">
                                <option>--select--</option>
                                <option value="Draft" {{ $this->load['status'] == 'Draft' ? 'selected' : '' }}>Draft
                                </option>
                                <option value="Completed" {{ $this->load['status'] == 'Completed' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
                            <!--end::Select2-->
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the approval status.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Template settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Load Type</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select store template-->
                            <label for="kt_ecommerce_add_category_store_template" class="form-label required">Select a
                                load
                                type</label>
                            <!--end::Select store template-->
                            <!--begin::Select2-->
                            <select class="form-select mb-2" name="load_type" data-placeholder="Select an option"
                                id="kt_ecommerce_add_category_store_template">
                                <option>--select--</option>
                                @foreach ($this->loads() as $load)
                                    <option value="{{ $load->name }}"
                                        {{ $this->load['load_type'] == $load->name ? 'selected' : '' }}>
                                        {{ $load->name }}
                                    </option>
                                @endforeach
                            </select>
                            <!--end::Select2-->
                            @error('load_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Assign a template from your current theme
                                to define how the category products are displayed.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Template settings-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title d-flex justify-content-between">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Load Description</label>
                                <!--end::Label-->
                                <textarea name="description" class="min-h-100px mb-2 form-control" id="" cols="30" rows="4"
                                    value="{{ $this->load['description'] }}"></textarea>
                                <!--begin::Description-->
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="text-muted fs-7">Set a description to the category for
                                    better visibility.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Budget</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control mb-2" name="budget" placeholder="eg. 500"
                                    value="{{ $this->load['budget'] }}" />
                                <!--end::Input-->
                                @error('budget')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A budget is required. This amount is
                                    what the sender wants to pay to move the load</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Size & Weight Options</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->

                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                    <div class="mb-10 flex-row-fluid position-relative">
                                        <!--begin::Label-->
                                        <label class="form-label">Quantity</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control mb-2" name="quantity"
                                            placeholder="eg. 1 Container" value="{{ $this->load['quantity'] }}" />
                                        <!--end::Input-->
                                        @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set a quantity</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="mb-10 flex-row-fluid position-relative">
                                        <!--begin::Label-->
                                        <label class="form-label required">Weight (KG)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" min="1" class="form-control mb-2"
                                            name="weight" placeholder="60" value="{{ $this->load['weight'] }}" />
                                        <!--end::Input-->
                                        @error('weight')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set a weight</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                </div>

                            </div>
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                    <div class="mb-10 flex-row-fluid position-relative">
                                        <!--begin::Label-->
                                        <label class="form-label">Length (M)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control mb-2" name="length"
                                            placeholder="eg. 12" value="{{ $this->load['length'] }}" />
                                        <!--end::Input-->
                                        @error('length')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set a length</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="mb-10 flex-row-fluid position-relative">
                                        <!--begin::Label-->
                                        <label class="form-label">Breadth (M)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" min="1" class="form-control mb-2"
                                            name="breadth" placeholder="60" value="{{ $this->load['breadth'] }}" />
                                        <!--end::Input-->
                                        @error('breadth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set a breadth</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--end::Input group-->
                                    <div class="mb-10 flex-row-fluid position-relative">
                                        <!--begin::Label-->
                                        <label class="form-label">Height (M)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control mb-2" name="height"
                                            placeholder="60" value="{{ $this->load['height'] }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set a height</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                </div>

                            </div>

                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Handling Options</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input id="kt_ecommerce_add_category_meta_keywords" name="handling"
                                    class="form-control mb-2" value="{{ $this->load['handling'] }}" />
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a list of keywords that the
                                    category is related to. Separate the keywords by adding a comma
                                    <code>,</code>between each keyword.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Meta options-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Pickup & Dropoff Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="d-flex card-body pt-0 justify-content-between">
                            <!--begin::Input group-->
                            <div class="mb-10 col-lg-5">
                                <!--begin::Label-->
                                <label class="form-label required">Pickup Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="pickup_address" class="form-control basic-select2" id="pickup_address"
                                    required>
                                    <option value="{{ $this->load['pickup_address'] }}" selected>

                                        {{ gettype(json_decode($this->load['pickup_address'])) == 'string' ? null : json_decode($this->load['pickup_address'])->name }}
                                    </option>
                                </select>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a pickup address. This is where
                                    the load will be picked up from</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 col-lg-5">
                                <!--begin::Label-->
                                <label class="form-label required">Drop-off Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="dropoff_address" class="form-control basic-select2" required
                                    id="dropoff_address">
                                    <option value="{{ $this->load['dropoff_address'] }}">
                                        {{ gettype(json_decode($this->load['dropoff_address'])) == 'string' ? null : json_decode($this->load['dropoff_address'])->name }}
                                    </option>
                                </select>
                                {{-- <input type="text" class="form-control mb-2" wire:model="dropoff_address"
                                    placeholder="eg. 1 Container" /> --}}
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a shipping address. This is where
                                    the load will be dropped off</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Meta options-->
                    <!--begin::Automation-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Load Breakdown</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Input group-->
                            <div class="mt-5">
                                <!--begin::Label-->
                                <label class="form-label">Indicate all the items in your load if
                                    they are more than one</label>
                                <!--end::Label-->
                                <!--begin::Conditions-->
                                {{-- <div class="d-flex flex-wrap align-items-center text-gray-600 gap-5 mb-7">
                                    <span>Save items for future use:</span>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" wire:model="future"
                                            value="" id="all_conditions" checked="checked" />
                                        <label class="form-check-label" for="all_conditions">Yes</label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" wire:model="future"
                                            value="" id="any_conditions" />
                                        <label class="form-check-label" for="any_conditions">No</label>
                                    </div>
                                </div> --}}
                                <!--end::Conditions-->
                                <!--begin::Repeater-->
                                <div id="kt_ecommerce_add_category_conditions">
                                    <div class="subs" id="subLoads_group"
                                        data-load-categories="{{ $this->loads() }}"
                                        data-sub-loads="{{ json_encode($this->subload) }}">
                                        @for ($i = 0; $i < count($this->subload); $i++)
                                            <!--begin::Form group-->
                                            <div class="form-group mb-4">
                                                <div data-repeater-list="kt_ecommerce_add_category_conditions"
                                                    class="d-flex flex-column gap-3">
                                                    <div data-repeater-item=""
                                                        class="form-group d-flex flex-wrap align-items-center gap-5">
                                                        <!--begin::Select2-->
                                                        <input type="hidden" name="subload[{{ $i }}][id]"
                                                            value="{{ $this->subload[$i]->id }}">
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control mw-100 w-200px"
                                                            name="subload[{{ $i }}][name]"
                                                            placeholder="Item Name"
                                                            value="{{ $this->subload[$i]->name }}" />
                                                        <!--end::Input-->
                                                        <div class="w-100 w-md-200px">
                                                            <select class="form-select"
                                                                name="subload[{{ $i }}][load_type]"
                                                                data-placeholder="Select an option"
                                                                data-kt-ecommerce-catalog-add-category="condition_type">
                                                                <option value="">--select category--</option>
                                                                @foreach ($this->loads() as $load)
                                                                    <option value="{{ $load->name }}"
                                                                        {{ $this->subload[$i]->load_type == $load->name ? 'selected' : '' }}>
                                                                        {{ $load->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--end::Select2-->
                                                        <!--begin::Input-->
                                                        <input type="number" class="form-control mw-100 w-100px"
                                                            name="subload[{{ $i }}][quantity]"
                                                            placeholder="Quantity"
                                                            value="{{ $this->subload[$i]->quantity }}" />
                                                        <!--end::Input-->
                                                        <!--begin::Input-->
                                                        <input type="number" class="form-control mw-100 w-200px"
                                                            name="subload[{{ $i }}][value]"
                                                            placeholder="Value eg. 120.00"
                                                            value="{{ $this->subload[$i]->value }}" />
                                                        <!--end::Input-->
                                                        <!--begin::Button-->
                                                        <button type="button" data-subload="{{ $i + 1 }}"
                                                            class="btn btn-sm btn-icon btn-light-danger delSubLoad">
                                                            <i class="ki-duotone ki-cross fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </button>
                                                        <!--end::Button-->
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <!--end::Form group-->

                                    <!--end::Form group-->
                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <!--begin::Button-->
                                        <button type="button" id="addSubLoad" class="btn btn-sm btn-light-primary">
                                            <i class="ki-duotone ki-plus fs-2"></i>Add another
                                            condition</button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--begin::Media-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Insurance Documents</h2>
                                @if ($this->load['insurance_docs'])
                                    <a href="{{ $this->load['insurance_docs'] }}"><strong
                                            class="ms-5 text-danger">View</strong></a>
                                @endif
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="fv-row mb-2">
                                <!--begin::Dropzone-->
                                <div class="dropzone" id="kt_ecommerce_add_organization_media">
                                    <!--begin::Message-->
                                    <div class="dz-message needsclick">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <input type="file" name="insurance_docs" id=""
                                            class="form-control">
                                        <div class="ms-4">
                                            <h3 class="fs-7 fw-bold text-gray-900 mb-1">Drop files
                                                here or click
                                                to upload.</h3>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                @error('insurance_docs')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <!--end::Dropzone-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Upload the shipment insurance documents
                                here.</div>
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
                                <h2>Other Relevant Documents</h2>
                                @if ($this->load['insurance_docs'])
                                    <a href="{{ $this->load['insurance_docs'] }}"><strong
                                            class="ms-5 text-danger">View</strong></a>
                                @endif
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="fv-row mb-2">
                                <!--begin::Dropzone-->
                                <div class="dropzone" id="kt_ecommerce_add_organization_media">
                                    <!--begin::Message-->
                                    <div class="dz-message needsclick">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <input type="file" name="other_docs" class="form-control" id="">
                                        <div class="ms-4">
                                            <h3 class="fs-7 fw-bold text-gray-900 mb-1">Drop files
                                                here or click
                                                to upload.</h3>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                @error('other_docs')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <!--end::Dropzone-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Upload the other relevant documents here.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Media-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('sender.loads') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label" wire:loading.remove>Save Changes</span>
                            <span class="indicator-progress" wire:loading>Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <style>
        .select2-container {
            width: 105% !important;
        }
    </style>
</div>
