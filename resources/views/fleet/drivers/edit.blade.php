<div class="">
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Driver</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/index" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/fleet/drivers/drivers" class="text-muted text-hover-primary">Driver</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Add</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Primary button-->
                <a href="{{route('drivers')}}" class="btn btn-sm fw-bold btn-primary">Browse Drivers</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Form-->
        <div id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="/apps/ecommerce/catalog/products">
            <!--begin::Aside column-->
            <form action="" method="post">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
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
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                @if ($image)
                                <div class="">
                                    <img class="w-150px h-150px" src="{{ $image->temporaryUrl() }}">
                                </div>
                                @else
                                <img class="w-150px h-150px" src="{{asset('storage/logos/'.$this->driver['image'])}}" alt="image" />
                                @endif
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
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
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
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
                            <div class="text-muted fs-7">Set the image of the Driver. Only *.png, *.jpg and *.jpeg image
                                files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                     <!--begin::Status-->
                     <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Location</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_broker_status">
                                </div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <label class="required form-label">Country</label>

                            <select class="form-select mb-2" wire:model="driver.country" data-hide-search="true"
                                data-placeholder="Select an option" id="kt_ecommerce_add_broker_status_select">
                                <option></option>
                                <option value="Ghana" selected="selected">Ghana</option>

                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the country of operation</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_broker_status_datepicker" class="form-label">Select
                                    publishing
                                    date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_broker_status_datepicker"
                                    placeholder="Pick date & time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <label class="required form-label">Region</label>

                            <select class="form-select mb-2" wire:model="driver.region" data-hide-search="true"
                                data-placeholder="Select an option" id="kt_ecommerce_add_broker_status_select">
                                <option></option>
                                <option value="Greater Accra" selected="selected">Greater Accra</option>
                                <option value="Ashanti Region">Ashanti Region</option>

                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the region in Ghana of operation</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_broker_status_datepicker" class="form-label">Select
                                    publishing
                                    date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_broker_status_datepicker"
                                    placeholder="Pick date & time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--end::Status-->

                </div>
            </form>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin:::Tabs-->
                {{-- <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 {{ $general ? 'active' : '' }}"
                        wire:click="activate('general')" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_general">General</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 {{ $payment ? 'active' : '' }}"
                        wire:click="activate('payment')" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_advanced">Re-embursement Account</a>
                    </li>
                    <!--end:::Tab item-->
                </ul> --}}
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <form wire:submit.prevent="general" method="post" class="{{ $general ? '' : 'd-none' }}">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade {{ $general ? 'show active' : '' }}" id="kt_ecommerce_add_product_general" role="tab-panel">
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
                                        <!-- <div class="mb-10 fv-row">
                                            <label class="required form-label">Organization</label>

                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option"
                                                id="kt_ecommerce_add_product_status_select">
                                                <option></option>
                                                <option value="published" selected="selected">Individual
                                                <option value="published">Jess Fleet Mangement Inc
                                                </option>
                                                <option value="draft"> TopTier Trucks Co</option>
                                            </select>
                                            <div class="text-muted fs-7">Set the organization the Driver is affiliated to.
                                            </div>
                                            <div class="d-none mt-10">
                                                <label for="kt_ecommerce_add_product_status_datepicker"
                                                    class="form-label">Select publishing
                                                    date and time</label>
                                                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker"
                                                    placeholder="Pick date & time" />
                                            </div>
                                        </div> -->
                                        <!--end::Card body-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">Driver Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" wire:model="driver.name" class="form-control mb-2"
                                                placeholder="Driver name" value="" required/>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">A product name is required and recommended to be
                                                unique.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Tax-->
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">Driver Phone</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" wire:model="driver.phone" class="form-control mb-2"
                                                    placeholder="Driver name" value="" required />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A product name is required and recommended to
                                                    be
                                                    unique.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">Driver Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" wire:model="driver.email" class="form-control mb-2"
                                                    placeholder="Driver name" value="" required/>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A product name is required and recommended to
                                                    be
                                                    unique.</div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end:Tax-->
                                        <!--end::Card body-->
                                        <div class="d-flex flex-wrap gap-5 mb-10 mt-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">Physical Address</label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control"
                                                    wire:model="driver.address" min="1990" max="2024"
                                                    id="">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Set the address of the driver.</div>
                                                <!--end::Description-->
                                            </div>
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">Date of Birth</label>
                                                <!--end::Label-->
                                                <input type="date" class="form-control"
                                                    wire:model="driver.dob" id="">
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Set the address of the driver.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">License number</label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control"
                                                    wire:model="driver.license_number">
                                                <!--begin::Description-->
                                                @error('license_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <div class="text-muted fs-7">Set the model of the vehicle.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mt-10">
                                            <!--begin::Label-->
                                            <label class="form-label">About</label>
                                            <!--end::Label-->
                                            <!--begin::Editor-->
                                            <textarea id="kt_ecommerce_add_product_description"
                                                wire:model="driver.description" class="min-h-200px mb-2 form-control"></textarea>
                                            <!--end::Editor-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Write something small about the Driver.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                                <!--begin::Media-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Drivers Licence <small>{{$this->driver['license_image'] ? "Uploaded" : "Unavailable"}}</small></h2>
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
                                                    <input type="file" wire:model="driver.license_image" id="" class="form-control">
                                                    <div class="ms-4">
                                                        <h3 class="fs-7 fw-bold text-gray-900 mb-1">Drop files here or click
                                                            to upload.</h3>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Upload a national ID to help us verify the identity of
                                            the Driver</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Media-->
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Account Details</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed gy-5"
                                                id="kt_table_users_login_session">
                                                <!--begin::Table body-->
                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="email" wire:model="driver.email" class="form-control" disabled id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password</td>
                                                        <td><button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#password_reset_modal"
                                                                class="btn btn-icon btn-warning w-150px h-30px ms-auto">
                                                                Reset Password
                                                            </button></td>
                                                        <td class="text-end">
                                                            <button type="button"
                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_update_password">
                                                                <i class="ki-duotone ki-eye fs-3">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <div class="{{ $general ? 'd-flex' : 'd-none' }} justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('drivers')}}" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label" wire:loading.remove>Save Changes</span>
                                <span class="indicator-progress" wire:loading>Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </form>
                    <form wire:submit.prevent="payment" method="post" class="{{ $payment ? '' : 'd-none' }}">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade {{ $payment ? 'show active' : '' }}" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bold mb-0">Re-embursement Accounts</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_new_card">
                                            <i class="ki-duotone ki-plus-square fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>Add new account</a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_1">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <i class="ki-duotone ki-right fs-3"></i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/mastercard.svg"
                                                    class="w-40px me-3" alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bold">Mastercard</div>
                                                        <div class="badge badge-light-primary ms-5">Primary</div>
                                                    </div>
                                                    <div class="text-muted">Expires Dec 2024</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="More Options"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                                            <td class="text-gray-800">Emma Smith</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Number</td>
                                                            <td class="text-gray-800">**** 8322</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Expires</td>
                                                            <td class="text-gray-800">12/2024</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Type</td>
                                                            <td class="text-gray-800">Mastercard credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                            <td class="text-gray-800">VICBANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">ID</td>
                                                            <td class="text-gray-800">id_4325df90sdf8</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Billing address
                                                            </td>
                                                            <td class="text-gray-800">AU</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Phone</td>
                                                            <td class="text-gray-800">No phone provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Origin</td>
                                                            <td class="text-gray-800">Australia
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/australia.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                            <td class="text-gray-800">Passed
                                                                <i class="ki-duotone ki-check-circle fs-2 text-success">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                    <div class="separator separator-dashed"></div>
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible collapsed rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_2"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_2">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <i class="ki-duotone ki-right fs-3"></i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3"
                                                    alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bold">Visa</div>
                                                    </div>
                                                    <div class="text-muted">Expires Feb 2022</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="More Options"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                                            <td class="text-gray-800">Melody Macy</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Number</td>
                                                            <td class="text-gray-800">**** 5359</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Expires</td>
                                                            <td class="text-gray-800">02/2022</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Type</td>
                                                            <td class="text-gray-800">Visa credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                            <td class="text-gray-800">ENBANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">ID</td>
                                                            <td class="text-gray-800">id_w2r84jdy723</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Billing address
                                                            </td>
                                                            <td class="text-gray-800">UK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Phone</td>
                                                            <td class="text-gray-800">No phone provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Origin</td>
                                                            <td class="text-gray-800">United Kingdom
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/united-kingdom.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                            <td class="text-gray-800">Passed
                                                                <i class="ki-duotone ki-check fs-2 text-success"></i>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                    <div class="separator separator-dashed"></div>
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible collapsed rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_3"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_3">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <i class="ki-duotone ki-right fs-3"></i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/american-express.svg"
                                                    class="w-40px me-3" alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bold">American Express</div>
                                                        <div class="badge badge-light-danger ms-5">Expired</div>
                                                    </div>
                                                    <div class="text-muted">Expires Aug 2021</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    data-kt-customer-payment-method="delete">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="More Options"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                                            <td class="text-gray-800">Max Smith</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Number</td>
                                                            <td class="text-gray-800">**** 4437</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Expires</td>
                                                            <td class="text-gray-800">08/2021</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Type</td>
                                                            <td class="text-gray-800">American express credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                            <td class="text-gray-800">USABANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">ID</td>
                                                            <td class="text-gray-800">id_89457jcje63</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Billing address
                                                            </td>
                                                            <td class="text-gray-800">US</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Phone</td>
                                                            <td class="text-gray-800">No phone provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Origin</td>
                                                            <td class="text-gray-800">United States of America
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/united-states.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                            <td class="text-gray-800">Failed
                                                                <i class="ki-duotone ki-cross fs-2 text-danger">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                        </div>
                    </div>
                    <!--end::Tab pane-->
                    <div class="{{ $payment ? 'd-flex' : 'd-none' }} justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('drivers')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
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
        </div>
        <!--end::Form-->
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
@include('partials.modals.password_reset',['type'=>"drivers",'mask'=>$this->driver['mask']])
</div>
