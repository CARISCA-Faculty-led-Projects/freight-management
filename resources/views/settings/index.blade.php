@extends('layout.roles.all')
@section('content')
    <div>
        <!--begin::Content-->
        <div id="" class="container">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-12 d-flex justify-content-center">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class=" container d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            System Settings</h1>
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
                                <a href="/organization/overview" class="text-muted text-hover-primary">Settings</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container">
                <!--begin::Form-->
                <div id="kt_ecommerce_add_organization_form" class="form d-flex flex-column flex-lg-row"
                    data-kt-redirect="/apps/ecommerce/catalog/organizations">

                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 ">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">

                       <a class="nav-link text-active-primary pb-4 active" wire:click="activate('general')"
                                    data-bs-toggle="tab" href="#kt_ecommerce_add_organization_general">General</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 " wire:click="activate('routes')"
                                    data-bs-toggle="tab" href="#kt_ecommerce_add_organization_advanced">Routes & Fleet</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $subscription ? 'active' : '' }}"
                                wire:click="activate('subscription')" data-bs-toggle="tab"
                                href="#kt_ecommerce_biling_and_shipping_info">Subscription Account</a>
                        </li> --}}
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $payin ? 'active' : '' }}"
                                wire:click="activate('payin')" data-bs-toggle="tab"
                                href="#kt_ecommerce_payIn_account">Pay-In Account</a>
                        </li> --}}
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <form wire:submit.prevent="general" method="post" class="">

                                <div class="tab-pane fade show active" id="kt_ecommerce_add_organization_general"
                                    role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::General options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>General Settings</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Brokers percentage per load</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="brokers_percentage_p;" class="form-control mb-2"
                                                        placeholder="Enter brokers percentage" value="" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">The percentage of money every broker gets on his/her brokered amount.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div>
                                                    <!--begin::Label-->
                                                    <label class="form-label">Organizations percentage per load</label>
                                                    <!--end::Label-->
                                                    <!--begin::Editor-->
                                                    <textarea class="form-control" cols="50" wire:model="org.description" class="min-h-200px mb-2">
                                                </textarea>
                                                    <!--end::Editor-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a description to the organization for
                                                        better
                                                        visibility.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Tax Number</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" wire:model="org.tax_id" class="form-control mb-2"
                                                        placeholder="Enter organization tax number" value=""
                                                        required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">A organization tax number is required.
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::General options-->
                                        <!--begin::Tab pane-->

                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Contact Information</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="email" wire:model="org.email" class="form-control mb-2"
                                                        placeholder="Organization Email" value="" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter the business Email.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Phone number</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="tel" wire:model="org.phone" class="form-control mb-2"
                                                        placeholder="Organization Phone number" value="" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter the business phone number.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Physical Address</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" wire:model="org.address" class="form-control mb-2"
                                                        placeholder="Organization Address" value="" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Enter the business address.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Inventory-->

                                        <!--begin::Media-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Business Registration Documents</h2>
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
                                                            <input type="file" wire:model="org.registration_docs"
                                                                id="" class="form-control" required>
                                                            <div class="ms-4">
                                                                <h5 class="fs-7 fw-bold text-gray-900 mb-1">Drop files here
                                                                    or
                                                                    click
                                                                    to upload.</h5>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                </div>
                                                <!--end::Input group-->
                                                @error('registration_docs')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Upload the business registration documents
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
                                                    <h2>Insurance Documents</h2>
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
                                                            <input type="file" wire:model="org.insurance_docs"
                                                                id="" class="form-control" required>
                                                            <div class="ms-4">
                                                                <h5 class="fs-7 fw-bold text-gray-900 mb-1">Drop files here
                                                                    or
                                                                    click
                                                                    to upload.</h5>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                </div>
                                                <!--end::Input group-->
                                                @error('insurance_docs')
                                                    <span class="text-danger">#</span>
                                                @enderror
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Uploads documents about insurance coverage on
                                                    cargo
                                                    and
                                                    vehicles</div>
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
                                                                <td><input type="email" wire:model="org.email"
                                                                        id="" class="form-control" required></td>
                                                                <td class="text-end">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#kt_modal_update_phone">
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td><input type="password" wire:model="org.password"
                                                                        id="" class="form-control" required></td>
                                                                <td class="text-end">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#kt_modal_update_password">
                                                                        {{-- <i class="ki-duotone ki-pencil fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i> --}}
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
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{ route('organizations') }}" id="kt_ecommerce_add_organization_cancel"
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
                            <!--end::Tab pane-->

                            <!--begin::Tab pane-->
                            <form wire:submit.prevent="routes" method="post" class="d-none">
                                <div class="tab-pane fade mb-4" id="kt_ecommerce_add_organization_advanced"
                                    role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10 mt-10">
                                        <!--begin::Variations-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Preferred Route</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class=""
                                                    data-kt-ecommerce-catalog-add-organization="auto-options">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Add Your Preferred Route(s)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Repeater-->

                                                    <!--end::Repeater-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Variations-->
                                        <!--begin::Inventory-->
                                        {{-- <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Fleet</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Notice-->
                                            <div
                                                class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-semibold">
                                                        <h4 class="text-gray-900 fw-bold">This is a very important
                                                            privacy
                                                            notice!</h4>
                                                        <div class="fs-6 text-gray-700">Writing headlines for blog
                                                            posts is
                                                            much
                                                            science and probably cool audience.
                                                            <a href="#" class="fw-bold">Learn more</a>.
                                                        </div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                            <!--begin::Input group-->
                                            <!--begin::Pricing-->
                                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2 class="fw-bold">Vehicles</h2>
                                                    </div>
                                                    <!--begin::Card title-->
                                                    <!--begin::Card toolbar-->
                                                    <div class="card-toolbar">
                                                        <button type="button" class="btn btn-light-primary">Add
                                                            Vehicle</button>
                                                    </div>
                                                    <!--end::Card toolbar-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table
                                                            class="table align-middle table-row-dashed fs-6 fw-semibold gy-4"
                                                            id="kt_subscription_products_table">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                    <th class="min-w-200px">Type</th>
                                                                    <th class="min-w-200px">Number Plate</th>
                                                                    <th class="min-w-150px">Driver Assigned</th>
                                                                    <th class="min-w-70px text-end">Remove</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600">
                                                                <tr>
                                                                    <td>Box Truck</td>
                                                                    <td>GR 590 A</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-light-success">Yes</span>
                                                                    </td>
                                                                    <td class="text-end row">
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Edit"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-pencil fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Delete"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-trash fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>FlatBed Truck</td>
                                                                    <td>GR 484 C</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-light-danger">No</span>
                                                                    </td>
                                                                    <td class="text-end row">
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Edit"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-pencil fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Delete"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-trash fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerated Truck</td>
                                                                    <td>GR 0909 A</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-light-success">Yes</span>
                                                                    </td>
                                                                    <td class="text-end row">
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Edit"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-pencil fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Delete"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-trash fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Card body-->
                                            </div>
                                            <!--end::Pricing-->




                                        </div>
                                        <!--end::Card header-->
                                    </div> --}}
                                        <!--end::Inventory-->

                                    </div>
                                </div>
                                <div class="d-none justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{ route('organizations') }}" id="kt_ecommerce_add_organization_cancel"
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
                </div>
                <!--end::Form-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
        @include('partials.modals.add_payment_method')
        @include('partials.modals.add_org_preference')
        @include('partials.modals.add_vehicle')
    </div>
@endsection
