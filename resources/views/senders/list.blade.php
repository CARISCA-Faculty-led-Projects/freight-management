@extends('layout.app')
@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Senders
                </h1>
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
                    <li class="breadcrumb-item text-muted">Senders</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Filter</a>
                    <!--end::Menu toggle-->
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                        id="kt_menu_641ac423cc7bd">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select option" data-dropdown-parent="#kt_menu_641ac423cc7bd"
                                        data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">Author</span>
                                    </label>
                                    <!--end::Options-->
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications"
                                        checked="checked" />
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary"
                                    data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                </div>
                <!--end::Filter menu-->
                <!--begin::Secondary button-->
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="/senders/add" class="btn btn-sm fw-bold btn-primary">Add new Sender</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Contacts App- Senders-->
        <div class="row g-7">
            <!--begin::Contact groups-->
            <div class="col-lg-6 col-xl-3">
                <!--begin::Contact group wrapper-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Groups</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Contact groups-->
                        <div class="d-flex flex-column gap-5">
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="/apps/contacts/getting-started"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">All
                                    Senders</a>
                                <div class="badge badge-light-primary">9</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="/apps/contacts/getting-started"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary">Subscribed</a>
                                <div class="badge badge-light-primary">3</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="/apps/contacts/getting-started"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary">Tier 1 Member</a>
                                <div class="badge badge-light-primary">1</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="/apps/contacts/getting-started"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary">Premium Member</a>
                                <div class="badge badge-light-primary">1</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="/apps/contacts/getting-started"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary">Pending Approval</a>
                                <div class="badge badge-light-primary">3</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="/apps/contacts/getting-started"
                                    class="fs-6 fw-bold text-danger text-hover-primary">Declined</a>
                                <div class="badge badge-light-danger">2</div>
                            </div>
                            <!--begin::Contact group-->
                        </div>
                        <!--end::Contact groups-->
                        <!--begin::Separator-->
                        <!-- <div class="separator my-7"></div> -->
                        <!--begin::Separator-->
                        <!--begin::Add contact group-->
                        <!-- <label class="fs-6 fw-semibold form-label">Add new group</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-solid" placeholder="Group name" />
                            <button type="button" class="btn btn-icon btn-light">
                                <i class="ki-duotone ki-plus-square fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </button>
                        </div> -->
                        <!--end::Add contact group-->
                        <!--begin::Separator-->
                        <div class="separator my-7"></div>
                        <!--begin::Separator-->
                        <!--begin::Add new contact-->
                        <a href="/senders/add" class="btn btn-primary w-100">
                            <i class="ki-duotone ki-badge fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>Add new sender</a>
                        <!--end::Add new contact-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contact group wrapper-->
            </div>
            <!--end::Contact groups-->
            <!--begin::Search-->
            <div class="col-lg-6 col-xl-3">
                <!--begin::Contacts-->
                <div class="card card-flush" id="kt_contacts_list">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_contacts_list_header">
                        <!--begin::Form-->
                        <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                            <!--begin::Icon-->
                            <i
                                class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid ps-13" name="search" value=""
                                placeholder="Search contacts" />
                            <!--end::Input-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5" id="kt_contacts_list_body">
                        <!--begin::List-->
                        <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                            data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                            data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                        <div class="fw-semibold fs-7 text-muted">smith@kpmg.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                                        <div class="fw-semibold fs-7 text-muted">melody@altbox.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                        <div class="fw-semibold fs-7 text-muted">max@kt.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                        <div class="fw-semibold fs-7 text-muted">sean@dellito.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                        <div class="fw-semibold fs-7 text-muted">brian@exchange.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fs-6 fw-bolder">C</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-semibold fs-7 text-muted">mik@pex.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Francis
                                            Mitcham</a>
                                        <div class="fw-semibold fs-7 text-muted">f.mit@kpmg.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">O</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                                        <div class="fw-semibold fs-7 text-muted">olivia@corpmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-primary text-primary fs-6 fw-bolder">N</span>
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                        <div class="fw-semibold fs-7 text-muted">owen.neil@gmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                        <div class="fw-semibold fs-7 text-muted">dam@consilting.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">E</span>
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                        <div class="fw-semibold fs-7 text-muted">emma@intenso.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                        <div class="fw-semibold fs-7 text-muted">ana.cf@limtel.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-info text-info fs-6 fw-bolder">A</span>
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                                        <div class="fw-semibold fs-7 text-muted">robert@benko.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
                                        <div class="fw-semibold fs-7 text-muted">miller@mapple.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <span class="symbol-label bg-light-success text-success fs-6 fw-bolder">L</span>
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                        <div class="fw-semibold fs-7 text-muted">lucy.m@fentech.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                            <!--end::Separator-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="/apps/contacts/view-contact"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
                                        <div class="fw-semibold fs-7 text-muted">ethan@loop.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Search-->
            <!--begin::Content-->
            <div class="col-xl-6">
                <!--begin::Contacts-->
                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <i class="ki-duotone ki-badge fs-1 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <h2>Contact Details</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar gap-3">
                            <!--begin::Chat-->
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-kt-drawer-show="true"
                                data-kt-drawer-target="#kt_drawer_chat">
                                <i class="ki-duotone ki-message-text-2 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>Chat</button>
                            <!--end::Chat-->
                            <!--begin::Chat-->
                            <a href="/apps/inbox/reply" class="btn btn-sm btn-light btn-active-light-primary">
                                <i class="ki-duotone ki-messages fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>Message</a>
                            <!--end::Chat-->
                            <!--begin::Action menu-->
                            <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-dots-square fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/senders/edit" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/senders/billing" class="menu-link px-3">Billing</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" id="kt_contact_delete"
                                        data-kt-redirect="/apps/contacts/getting-started">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Action menu-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Profile-->
                        <div class="d-flex gap-7 align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-100px">
                                <img src="assets/media/avatars/300-6.jpg" alt="image" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Contact details-->
                            <div class="d-flex flex-column gap-2">
                                <!--begin::Name-->
                                <h3 class="mb-0">Emma Smith</h3>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ki-duotone ki-sms fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <a href="#" class="text-muted text-hover-primary">smith@kpmg.com</a>
                                </div>
                                <!--end::Email-->
                                <!--begin::Phone-->
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ki-duotone ki-phone fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <a href="#" class="text-muted text-hover-primary">+6141 234 567</a>
                                </div>
                                <!--end::Phone-->
                            </div>
                            <!--end::Contact details-->
                        </div>
                        <!--end::Profile-->
                        <!--begin:::Tabs-->
                        <ul
                            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8 gap-2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary d-flex align-items-center pb-4 active"
                                    data-bs-toggle="tab" href="#kt_contact_view_general">
                                    <i class="ki-duotone ki-home fs-4 me-1"></i>General</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary d-flex align-items-center pb-4"
                                    data-bs-toggle="tab" href="#kt_contact_view_meetings">
                                    <i class="ki-duotone ki-calendar-8 fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                    </i>Shipments Schedule</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary d-flex align-items-center pb-4"
                                    data-bs-toggle="tab" href="#kt_contact_view_activity">
                                    <i class="ki-duotone ki-save-2 fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Activity</a>
                            </li>
                            <!--end:::Tab item-->
                           
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content" id="">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                                <!--begin::Additional details-->
                                <div class="d-flex flex-column gap-5 mt-7">
                                    <!--begin::Company name-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">Company Name</div>
                                        <div class="fw-bold fs-5">Keenthemes Inc</div>
                                    </div>
                                    <!--end::Company name-->
                                    <!--begin::City-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">City</div>
                                        <div class="fw-bold fs-5">Melbourne</div>
                                    </div>
                                    <!--end::City-->
                                    <!--begin::Country-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">Country</div>
                                        <div class="fw-bold fs-5">Australia</div>
                                    </div>
                                    <!--end::Country-->
                                    <!--begin::Notes-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">Notes</div>
                                        <p>Emma Smith joined the team on September 2019 as a junior associate. She soon
                                            showcased her expertise and experience in knowledge and skill in the field,
                                            which was very valuable to the company. She was promptly promoted to senior
                                            associate on July 2020.
                                            <br />
                                            <br />Emma Smith now heads a team of 5 associates and leads the company's
                                            sales growth by 7%.</p>
                                    </div>
                                    <!--end::Notes-->
                                </div>
                                <!--end::Additional details-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_contact_view_meetings" role="tabpanel">
                                <!--begin::Dates-->
                                <ul class="nav nav-pills d-flex flex-stack flex-nowrap hover-scroll-x">
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_0">
                                            <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">22</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary active"
                                            data-bs-toggle="tab" href="#kt_schedule_day_1">
                                            <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 fw-bold">23</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_2">
                                            <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">24</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_3">
                                            <span class="opacity-50 fs-7 fw-semibold">We</span>
                                            <span class="fs-6 fw-bold">25</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_4">
                                            <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                            <span class="fs-6 fw-bold">26</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_5">
                                            <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 fw-bold">27</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_6">
                                            <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 fw-bold">28</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_7">
                                            <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">29</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_8">
                                            <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 fw-bold">30</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary"
                                            data-bs-toggle="tab" href="#kt_schedule_day_9">
                                            <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">31</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                </ul>
                                <!--end::Dates-->
                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_0" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">14:30 - 15:30
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Creative
                                                    Content Initiative</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Creative
                                                    Content Initiative</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">David Stevenson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Marketing
                                                    Campaign Discussion</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Walter White</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_1" class="tab-pane fade show active">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly
                                                    Team Stand-Up</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">12:00 - 13:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9
                                                    Degree Project Estimation Meeting</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Sean Bean</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">12:00 - 13:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9
                                                    Degree Project Estimation Meeting</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_2" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">10:00 - 11:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Creative
                                                    Content Initiative</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Sean Bean</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">10:00 - 11:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Lunch &
                                                    Learn Catch Up</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Marketing
                                                    Campaign Discussion</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Yannis Gloverson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_3" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">11:00 - 11:45
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Team
                                                    Backlog Grooming Session</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Naomi Hayabusa</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">16:30 - 17:30
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly
                                                    Team Stand-Up</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales
                                                    Pitch Proposal</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Mark Randall</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_4" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Team
                                                    Backlog Grooming Session</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales
                                                    Pitch Proposal</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Mark Randall</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">10:00 - 11:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales
                                                    Pitch Proposal</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Sean Bean</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_5" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">16:30 - 17:30
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Lunch &
                                                    Learn Catch Up</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Bob Harris</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Dashboard
                                                    UI/UX Design Review</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Naomi Hayabusa</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Development
                                                    Team Capacity Review</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Sean Bean</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_6" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">12:00 - 13:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Development
                                                    Team Capacity Review</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Michael Walters</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">11:00 - 11:45
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project
                                                    Review & Testing</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Walter White</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">12:00 - 13:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Team
                                                    Backlog Grooming Session</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_7" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly
                                                    Team Stand-Up</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Yannis Gloverson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">11:00 - 11:45
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales
                                                    Pitch Proposal</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Walter White</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project
                                                    Review & Testing</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_8" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">10:00 - 11:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Marketing
                                                    Campaign Discussion</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Yannis Gloverson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project
                                                    Review & Testing</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Bob Harris</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">11:00 - 11:45
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Team
                                                    Backlog Grooming Session</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Sean Bean</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_9" class="tab-pane fade show">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project
                                                    Review & Testing</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Karina Clarke</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">16:30 - 17:30
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Marketing
                                                    Campaign Discussion</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Team
                                                    Backlog Grooming Session</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">
                                <!--begin::Timeline-->
                                <div class="timeline-label">
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-warning fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you
                                            honest. And keep structure</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">10:00</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-success fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Content-->
                                        <div class="timeline-content d-flex">
                                            <span class="fw-bold text-gray-800 ps-3">AEOL meeting</span>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">14:37</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-danger fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        <div class="timeline-content fw-bold text-gray-800 ps-3">Make deposit
                                            <a href="#" class="text-primary">USD 700</a>. to ESL</div>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">16:50</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-primary fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly
                                            driving and keep structure keep great</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">21:03</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-danger fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        <div class="timeline-content fw-semibold text-gray-800 ps-3">New order placed
                                            <a href="#" class="text-primary">#XF-2356</a>.</div>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">16:50</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-primary fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly
                                            driving and keep structure keep great</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">21:03</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-danger fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        <div class="timeline-content fw-semibold text-gray-800 ps-3">New order placed
                                            <a href="#" class="text-primary">#XF-2356</a>.</div>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">10:30</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="ki-duotone ki-abstract-8 text-success fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI Mobile app
                                            launch preparion meeting</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end:::Tab pane-->
                           
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts App- Senders-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
</div>
<!--end::Content wrapper-->
<!--begin::Footer-->
<div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2023&copy;</span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Footer container-->
</div>
<!--end::Footer-->
</div>
<!--end:::Main-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::App-->
<!--begin::Drawers-->
<!--begin::Activities drawer-->
<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
    data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}"
    data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle"
    data-kt-drawer-close="#kt_activities_close">
    <div class="card shadow-none border-0 rounded-0">
        <!--begin::Header-->
        <div class="card-header" id="kt_activities_header">
            <h3 class="card-title fw-bold text-dark">Activity Logs</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                    id="kt_activities_close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body position-relative" id="kt_activities_body">
            <!--begin::Content-->
            <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true"
                data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body"
                data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
                <!--begin::Timeline items-->
                <div class="timeline">
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-message-text-2 fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">There are 2 new tasks for you in “AirPlus Mobile App”
                                    project:</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                        data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                        <img src="assets/media/avatars/300-14.jpg" alt="img" />
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                            <!--begin::Timeline details-->
                            <div class="overflow-auto pb-5">
                                <!--begin::Record-->
                                <div
                                    class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                    <!--begin::Title-->
                                    <a href="/apps/projects/project"
                                        class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Meeting
                                        with customer</a>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="min-w-175px pe-2">
                                        <span class="badge badge-light text-muted">Application Design</span>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-2.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-14.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label fs-8 fw-semibold bg-primary text-inverse-primary">A
                                            </div>
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Progress-->
                                    <div class="min-w-125px pe-2">
                                        <span class="badge badge-light-primary">In Progress</span>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Action-->
                                    <a href="/apps/projects/project"
                                        class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Record-->
                                <!--begin::Record-->
                                <div
                                    class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
                                    <!--begin::Title-->
                                    <a href="/apps/projects/project"
                                        class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Project
                                        Delivery Preparation</a>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="min-w-175px">
                                        <span class="badge badge-light text-muted">CRM System Development</span>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-20.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label fs-8 fw-semibold bg-success text-inverse-primary">B
                                            </div>
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Progress-->
                                    <div class="min-w-125px">
                                        <span class="badge badge-light-success">Completed</span>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Action-->
                                    <a href="/apps/projects/project"
                                        class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Record-->
                            </div>
                            <!--end::Timeline details-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-flag fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n2">
                            <!--begin::Timeline heading-->
                            <div class="overflow-auto pe-3">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">Invitation for crafting engaging designs that speak
                                    human workshop</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                        data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
                                        <img src="assets/media/avatars/300-1.jpg" alt="img" />
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-disconnect fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="mb-5 pe-3">
                                <!--begin::Title-->
                                <a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3 New
                                    Incoming Project Files:</a>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                        data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
                                        <img src="assets/media/avatars/300-23.jpg" alt="img" />
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                            <!--begin::Timeline details-->
                            <div class="overflow-auto pb-5">
                                <div
                                    class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                        <!--begin::Icon-->
                                        <img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="ms-1 fw-semibold">
                                            <!--begin::Desc-->
                                            <a href="/apps/projects/project"
                                                class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>
                                            <!--end::Desc-->
                                            <!--begin::Number-->
                                            <div class="text-gray-400">1.9mb</div>
                                            <!--end::Number-->
                                        </div>
                                        <!--begin::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                        <!--begin::Icon-->
                                        <img alt="/apps/projects/project" class="w-30px me-3"
                                            src="assets/media/svg/files/doc.svg" />
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="ms-1 fw-semibold">
                                            <!--begin::Desc-->
                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Client UAT Testing
                                                Results</a>
                                            <!--end::Desc-->
                                            <!--begin::Number-->
                                            <div class="text-gray-400">18kb</div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-aligns-center">
                                        <!--begin::Icon-->
                                        <img alt="/apps/projects/project" class="w-30px me-3"
                                            src="assets/media/svg/files/css.svg" />
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="ms-1 fw-semibold">
                                            <!--begin::Desc-->
                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Finance Reports</a>
                                            <!--end::Desc-->
                                            <!--begin::Number-->
                                            <div class="text-gray-400">20mb</div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Icon-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                            </div>
                            <!--end::Timeline details-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-abstract-26 fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">Task
                                    <a href="#" class="text-primary fw-bold me-1">#45890</a>merged with
                                    <a href="#" class="text-primary fw-bold me-1">#45890</a>in “Ads Pro Admin Dashboard
                                    project:</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                        data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                        <img src="assets/media/avatars/300-14.jpg" alt="img" />
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-pencil fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">3 new application design concepts added:</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                        data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
                                        <img src="assets/media/avatars/300-2.jpg" alt="img" />
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                            <!--begin::Timeline details-->
                            <div class="overflow-auto pb-5">
                                <div
                                    class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                    <!--begin::Item-->
                                    <div class="overlay me-10">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper">
                                            <img alt="img" class="rounded w-150px"
                                                src="assets/media/stock/600x400/img-29.jpg" />
                                        </div>
                                        <!--end::Image-->
                                        <!--begin::Link-->
                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                        </div>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="overlay me-10">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper">
                                            <img alt="img" class="rounded w-150px"
                                                src="assets/media/stock/600x400/img-31.jpg" />
                                        </div>
                                        <!--end::Image-->
                                        <!--begin::Link-->
                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                        </div>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="overlay">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper">
                                            <img alt="img" class="rounded w-150px"
                                                src="assets/media/stock/600x400/img-40.jpg" />
                                        </div>
                                        <!--end::Image-->
                                        <!--begin::Link-->
                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                        </div>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                            </div>
                            <!--end::Timeline details-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-sms fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">New case
                                    <a href="#" class="text-primary fw-bold me-1">#67890</a>is assigned to you in
                                    Multi-platform Database Design project</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="overflow-auto pb-5">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <a href="#" class="text-primary fw-bold me-1">Alice Tan</a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-pencil fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">You have received a new order:</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                        data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
                                        <img src="assets/media/avatars/300-4.jpg" alt="img" />
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                            <!--begin::Timeline details-->
                            <div class="overflow-auto pb-5">
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-devices-2 fs-2tx text-primary me-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                        <!--begin::Content-->
                                        <div class="mb-3 mb-md-0 fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Database Backup Process Completed!</h4>
                                            <div class="fs-6 text-gray-700 pe-7">Login into Admin Dashboard to make sure
                                                the data integrity is OK</div>
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Action-->
                                        <a href="#"
                                            class="btn btn-primary px-6 align-self-center text-nowrap">Proceed</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Timeline details-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                            <div class="symbol-label bg-light">
                                <i class="ki-duotone ki-basket fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->
                        <div class="timeline-content mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-semibold mb-2">New order
                                    <a href="#" class="text-primary fw-bold me-1">#67890</a>is placed for Workshow
                                    Planning & Budget Estimation</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <a href="#" class="text-primary fw-bold me-1">Jimmy Bold</a>
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Timeline heading-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                </div>
                <!--end::Timeline items-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer py-5 text-center" id="kt_activities_footer">
            <a href="/pages/user-profile/activity" class="btn btn-bg-body text-primary">View All Activities
                <i class="ki-duotone ki-arrow-right fs-3 text-primary">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i></a>
        </div>
        <!--end::Footer-->
    </div>
</div>
<!--end::Activities drawer-->

<!--end::Drawers-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
        <span class="path1"></span>
        <span class="path2"></span>
    </i>
</div>
<!--end::Scrolltop-->

<!--end::Modals-->
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";

</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/apps/contacts/view-contact.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
@endsection