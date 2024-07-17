{{-- @if ($user != 'organization') --}}
@extends('layout.roles.all')

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
                            <span class="text-muted text-hover-primary">Home</span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"> <span class="text-muted text-hover-primary">Load</span></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"> <span
                                class="text-muted text-hover-primary">{{ $load->mask }}</span></li>
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
                </div>
                <!--begin::Load summary-->
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-6">
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
                                    {{ $load->status == 'Pending' ? 'is pending' : 'has been marked as completed' }}
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Statistics Widget 5-->
                        <span
                            class="card {{ $load->shipment_status == 'Unassigned' ? 'bg-danger' : 'bg-success' }} hoverable card-xl-stretch mb-xl-8">
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
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ $load->shipment_status }}</div>
                                <div class="fw-semibold text-white">This order has
                                    {{ $load->shipment_status == 'Unassigned' ? ' not been assigned' : 'has been assigned' }}
                                </div>
                            </div>
                            <!--end::Body-->
                        </span>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>


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
                                            <h2>Load Details (#{{ $load->mask }})</h2>
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
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Budget
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                          GHc {{ $load->budget }}                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Insurance documents
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="{{ 'storage/loads/' . $load->insurance_docs }}"
                                                                class="text-gray-600 text-hover-primary"
                                                                download>{{ $load->insurance_docs }} </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Other documents
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            <a href="{{ 'storage/loads/' . $load->other_docs }}"
                                                                class="text-gray-600 text-hover-primary"
                                                                download>{{ $load->other_docs }}</a>
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
                                                                <!--begin::Name-->
                                                                <span
                                                                    class="text-gray-600 text-hover-primary">{{ $sender->name }}</span>
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
                                                                class="text-gray-600 text-hover-primary">{{ $sender->email }}</a>
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
                                                        <td class="fw-bold text-end">{{ $sender->phone }}
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
                                                        <td class="fw-bold text-end">{{ $sender->address }}</td>
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
                                                        <td class="fw-bold text-end">{{ $sender->region }}</td>
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
                                                        <td class="fw-bold text-end">{{ $sender->country }}</td>
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
                                            <h2>Pickup Address</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        {{ json_decode($load->pickup_address)->name }}</div>
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
                                            <h2>Dropoff Address</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        {{ json_decode($load->dropoff_address)->name }}</div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Shipping address-->
                            </div>
                            <!--begin::Product List-->
                            <!--begin::Referral program-->

                            {{-- <div class="card mb-5 mb-xl-10">
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

                                </div>
                                <!--end::Body-->
                            </div> --}}

                            <!--end::Referral program-->

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
                                        <h2>Load #{{ $load->mask }}</h2>
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
