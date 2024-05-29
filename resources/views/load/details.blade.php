{{-- @if ($user != 'organization') --}}
    @extends($user != 'organization'? 'layout.roles.driver' :'layout.roles.organization')

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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Load Details</h1>
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
                        <li class="breadcrumb-item text-muted"> <a href="/index"
                                class="text-muted text-hover-primary">Load</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"> <a href="/index"
                                class="text-muted text-hover-primary">{{$load->mask}}</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Details</li>
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
                        <a href="#"
                            class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Filter</a>
                        <!--end::Menu toggle-->
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_641ac4114177f">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator bLoad-gray-200"></div>
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
                                            data-placeholder="Select option" data-dropdown-parent="#kt_menu_641ac4114177f"
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
                                            <input class="form-check-input" type="checkbox" value="2"
                                                checked="checked" />
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
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_app">Create</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Load details page-->
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul
                        class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x bLoad-0 fs-4 fw-semibold mb-lg-n2 me-auto">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_sales_Load_summary">Load Summary</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_sales_Load_history">Load Breakdown</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <!-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_payment_information">Payment Information</a>
                        </li> -->
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Button-->
                    <a href="/apps/ecommerce/sales/listing" class="btn btn-icon btn-light btn-sm ms-auto me-lg-n7">
                        <i class="ki-duotone ki-left fs-2"></i>
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <a href="/load/edit" class="btn btn-success btn-sm me-lg-n7">Edit Load</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <!--begin::Button-->
                    <a href="/load/add" class="btn btn-primary btn-sm me-lg-n7">Add New Load</a>
                    <!--end::Button-->
                    <a class="btn btn-dark btn-sm" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_adjust_balance">Initiate
                        Payment</a>
                    <!--end::Button-->
                </div>
                <!--begin::Load summary-->
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#"
                            class="card {{ $load->status == 'Pending' ? 'bg-primary' : 'bg-success' }} hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <i class="ki-duotone ki-basket text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ $load->status }}</div>
                                <div class="fw-semibold text-white">This order
                                    {{ $load->status == 'Pending' ? 'is pending' : 'has been approved' }}
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
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
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Assigned</div>
                                <div class="fw-semibold text-white">This order has been assigned to
                                    #4554</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
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
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">On route</div>
                                <div class="fw-semibold text-white">This order has been assigned to
                                    #4554</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <i class="ki-duotone ki-chart-simple-3 text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Paid</div>
                                <div class="fw-semibold text-white">This order has been paid</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>
                <!--end::Row-->
                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">

                </div>
                <!--end::Load summary-->

                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_sales_Load_summary" role="tab-panel">
                        <!--begin::Loads-->

                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                <!--begin::Load details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Load Details (#{{$load->mask}})</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bLoaded mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Date Added
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ date('D, d/m/Y', strtotime($load->created_at)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Category
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $load->load_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Quantity
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $load->quantity }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Weight (KG)
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $load->weight }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Dimensions (l*b*h)
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ $load->length }}*{{ $load->breadth }}*{{ $load->height }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Handling
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            @php
                                                                $handling = explode(',', $load->handling);
                                                            @endphp
                                                            @foreach ($handling as $item)
                                                                <span class="badge badge-dark">{{ $item }}</span>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-wallet fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>Payment Method
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">Online
                                                            <img src="assets/media/svg/card-logos/visa.svg"
                                                                class="w-50px ms-2" />
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Load details-->
                                <!--begin::Customer details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Sender Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bLoaded mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-profile-circle fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>Name
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <!--begin:: Avatar -->
                                                                <div
                                                                    class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                                                    <a href="/apps/ecommerce/customers/details">
                                                                        <div class="symbol-label">
                                                                            <img src="assets/media/avatars/300-23.jpg"
                                                                                alt="Dan Wilson" class="w-100" />
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <!--end::Avatar-->
                                                                <!--begin::Name-->
                                                                <a href="/apps/ecommerce/customers/details"
                                                                    class="text-gray-600 text-hover-primary">{{$sender->name}}</a>
                                                                <!--end::Name-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-sms fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Email
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href=""
                                                                class="text-gray-600 text-hover-primary">{{$sender->email}}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-phone fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Phone
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{$sender->phone}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-phone fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Address
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{$sender->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-phone fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Region
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">Greater Accra
                                                            Region</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-phone fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Country
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">Ghana</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Customer details-->
                            </div>
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">

                                <!--begin::Payment address-->
                                <div class="card card-flush py-4 flex-row-fluid position-relative">
                                    <!--begin::Background-->
                                    <div
                                        class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                        <i class="ki-solid ki-two-credit-cart" style="font-size: 14em"></i>
                                    </div>
                                    <!--end::Background-->
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Billing Address (Pickup)</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        {{ $load->pickup_address }}</div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Payment address-->

                                <!--begin::Shipping address-->
                                <div class="card card-flush py-4 flex-row-fluid position-relative">
                                    <!--begin::Background-->
                                    <div
                                        class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                        <i class="ki-solid ki-delivery" style="font-size: 13em"></i>
                                    </div>
                                    <!--end::Background-->
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Shipping Address (Dropoff)</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        {{ $load->dropoff_address }}</div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Shipping address-->
                            </div>
                            <!--begin::Product List-->
                            <!--begin::Referral program-->
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Body-->
                                <div class="card-body py-10">
                                    <h2 class="mb-9">Prizing</h2>

                                    <!--begin::Stats-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                                <span class="fs-4 fw-semibold text-info pb-1 px-2">Prize / Mile</span>
                                                <span class="fs-lg-2tx fw-bold d-flex justify-content-center">GHS
                                                    <span data-kt-countup="true"
                                                        data-kt-countup-value="70.00">0</span></span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                                <span class="fs-4 fw-semibold text-success pb-1 px-2">Shipment Prize</span>
                                                <span class="fs-lg-2tx fw-bold d-flex justify-content-center">GHS
                                                    <span data-kt-countup="true"
                                                        data-kt-countup-value="8,530.00">0</span></span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                                <span class="fs-4 fw-semibold text-success pb-1 px-2">Distance</span>
                                                <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                                    <span data-kt-countup="true">250KM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Info-->
                                    <p class="fs-5 fw-semibold text-gray-600 py-6">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nemo commodi, impedit
                                        possimus eos repellendus ipsam accusantium, sed, dolores amet accusamus quis aut
                                        numquam veritatis quo a est tempore labore.
                                    </p>
                                    <!--end::Info-->
                                    <!--begin::Notice-->
                                    <!-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                <i class="ki-duotone ki-bank fs-2tx text-primary me-4">
                 <span class="path1"></span>
                 <span class="path2"></span>
                </i>
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                 <div class="mb-3 mb-md-0 fw-semibold">
                  <h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>
                  <div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank account. Commision is $25 per transaction under $50,000</div>
                 </div>
                 <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Withdraw Money</a>
                </div>
               </div> -->
                                    <!--end::Notice-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Referral program-->
                            <!--begin::Documents-->
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">

                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Documents</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bLoaded mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-devices fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Handling instructions
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="View the invoice generated by this Load.">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="/apps/invoices/view/invoice-3"
                                                                class="text-gray-600 text-hover-primary">handling.pdf</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Shipping authorization
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="View the shipping manifest generated by this Load.">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="#"
                                                                class="text-gray-600 text-hover-primary">#SHP-0025410</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-discount fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Insurance documentation
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Reward value earned by customer when purchasing this Load">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">insurance.pdf
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Documents-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Organization & Driver Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bLoaded mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>

                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-devices fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Organization Name
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="View the invoice generated by this Load.">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="/apps/invoices/view/invoice-3"
                                                                class="text-gray-600 text-hover-primary">Jess
                                                                Fleet Mangement Inc</a>
                                                        </td>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Licence #
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="View the shipping manifest generated by this Load.">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="#"
                                                                class="text-gray-600 text-hover-primary">#ORG-454543</a>
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-discount fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Driver #
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Reward value earned by customer when purchasing this Load">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="#"
                                                                class="text-gray-600 text-hover-primary">#4454</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-discount fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Driver Name
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Reward value earned by customer when purchasing this Load">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">Jesse Anim</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Documents-->
                            </div>
                        </div>
                        <!--end::Loads-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_sales_Load_history" role="tab-panel">
                        <!--begin::Loads-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Load #14534</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-175px">Product</th>
                                                    <th class="min-w-100px text-end">SKU</th>
                                                    <th class="min-w-70px text-end">Qty</th>
                                                    <th class="min-w-100px text-end">Value Price
                                                    </th>
                                                    <th class="min-w-100px text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach ($subload as $load)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Thumbnail-->
                                                                <a href="/apps/ecommerce/catalog/edit-product"
                                                                    class="symbol symbol-50px">
                                                                    <span class="symbol-label"
                                                                        style="background-image:url(assets/media//stock/ecommerce/1.png);"></span>
                                                                </a>
                                                                <!--end::Thumbnail-->
                                                                <!--begin::Title-->
                                                                <div class="ms-5">
                                                                    <a href="/apps/ecommerce/catalog/edit-product"
                                                                        class="fw-bold text-gray-600 text-hover-primary">{{ $load->name }}</a>
                                                                    <div class="fs-7 text-muted">
                                                                        Category: {{ $load->load_type }}</div>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                        </td>
                                                        <td class="text-end">04726008</td>
                                                        <td class="text-end">{{ $load->quantity }}</td>
                                                        <td class="text-end">GHS {{ $load->value }}</td>
                                                        <td class="text-end">GHS {{ $load->quantity * $load->value }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" class="text-end">Subtotal</td>
                                                    <td class="text-end">GHS 264,000.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-end">VAT (0%)</td>
                                                    <td class="text-end">GHS 0.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-end">Shipping Rate
                                                    </td>
                                                    <td class="text-end">GHS 5.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="fs-3 text-dark text-end">
                                                        Grand Total</td>
                                                    <td class="text-dark fs-3 fw-bolder text-end">
                                                        GHS 264,000.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Product List-->


                        </div>
                        <!--end::Loads-->
                    </div>
                    <!--end::Tab pane-->

                    <div class="tab-pane fade" id="kt_ecommerce_payment_information" role="tab-panel">
                        <!--begin::Load data-->
                        <!--begin::Payment method-->
                        <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bold">Payment Method</h2>
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_new_card">New Method</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Options-->
                                <div id="kt_create_new_payment_method">
                                    <!--begin::Option-->
                                    <div class="py-1">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible toggle"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_create_new_payment_method_1">
                                                <!--begin::Arrow-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                    <i class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/mastercard.svg" class="w-40px me-3"
                                                    alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center fw-bold">
                                                        Mastercard
                                                        <div class="badge badge-light-primary ms-5">
                                                            Primary</div>
                                                    </div>
                                                    <div class="text-muted">Expires Dec 2024</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Input-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Radio-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" name="payment_method"
                                                        checked="checked" />
                                                </label>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_create_new_payment_method_1" class="collapse show fs-6 ps-10">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Name</td>
                                                            <td class="text-gray-800">Emma Smith
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Number</td>
                                                            <td class="text-gray-800">**** 8056</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Expires</td>
                                                            <td class="text-gray-800">12/2024</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Type</td>
                                                            <td class="text-gray-800">Mastercard
                                                                credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Issuer</td>
                                                            <td class="text-gray-800">VICBANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                ID</td>
                                                            <td class="text-gray-800">
                                                                id_4325df90sdf8</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Billing address</td>
                                                            <td class="text-gray-800">AU</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Phone</td>
                                                            <td class="text-gray-800">No phone
                                                                provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Origin</td>
                                                            <td class="text-gray-800">Australia
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/australia.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                CVC check</td>
                                                            <td class="text-gray-800">Passed
                                                                <i class="ki-duotone ki-check-circle fs-2 text-success">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
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
                                    <div class="py-1">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible toggle collapsed"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_create_new_payment_method_2">
                                                <!--begin::Arrow-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                    <i class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3"
                                                    alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center fw-bold">
                                                        Visa</div>
                                                    <div class="text-muted">Expires Feb 2022</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Input-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Radio-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="payment_method" />
                                                </label>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_create_new_payment_method_2" class="collapse fs-6 ps-10">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Name</td>
                                                            <td class="text-gray-800">Melody Macy
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Number</td>
                                                            <td class="text-gray-800">**** 3597</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Expires</td>
                                                            <td class="text-gray-800">02/2022</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Type</td>
                                                            <td class="text-gray-800">Visa credit
                                                                card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Issuer</td>
                                                            <td class="text-gray-800">ENBANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                ID</td>
                                                            <td class="text-gray-800">id_w2r84jdy723
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Billing address</td>
                                                            <td class="text-gray-800">UK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Phone</td>
                                                            <td class="text-gray-800">No phone
                                                                provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Origin</td>
                                                            <td class="text-gray-800">United Kingdom
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/united-kingdom.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                CVC check</td>
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
                                    <div class="py-1">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible toggle collapsed"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_create_new_payment_method_3">
                                                <!--begin::Arrow-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                    <i class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="assets/media/svg/card-logos/american-express.svg"
                                                    class="w-40px me-3" alt="" />
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center fw-bold">
                                                        American Express
                                                        <div class="badge badge-light-danger ms-5">
                                                            Expired</div>
                                                    </div>
                                                    <div class="text-muted">Expires Aug 2021</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Input-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Radio-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="payment_method" />
                                                </label>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_create_new_payment_method_3" class="collapse fs-6 ps-10">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Name</td>
                                                            <td class="text-gray-800">Max Smith</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Number</td>
                                                            <td class="text-gray-800">**** 9826</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Expires</td>
                                                            <td class="text-gray-800">08/2021</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Type</td>
                                                            <td class="text-gray-800">American
                                                                express credit card</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Issuer</td>
                                                            <td class="text-gray-800">USABANK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                ID</td>
                                                            <td class="text-gray-800">id_89457jcje63
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-semibold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Billing address</td>
                                                            <td class="text-gray-800">US</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Phone</td>
                                                            <td class="text-gray-800">No phone
                                                                provided</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Email</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                Origin</td>
                                                            <td class="text-gray-800">United States
                                                                of America
                                                                <div class="symbol symbol-20px symbol-circle ms-2">
                                                                    <img src="assets/media/flags/united-states.svg" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                CVC check</td>
                                                            <td class="text-gray-800">Failed
                                                                <i class="ki-duotone ki-cross fs-2 text-danger">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
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
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Payment method-->

                    </div>
                </div>
                <!--end::Tab content-->

            </div>
            <!--end::Load details page-->
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
@endsection
