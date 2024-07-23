@extends('layout.roles.all')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Load
                        Request
                        Negotiations</h1>
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
                        <li class="breadcrumb-item text-muted">Load Negotiation</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                                                                                <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary"
                                                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Manage Bids</a>

                                                                                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_create_campaign">Start Auction</a>
                                                                            </div> -->
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 12-->
                    <div class="card card-flush h-xl-100">

                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">All Load bids</span>
                                    {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span> --}}
                                </h3>
                                <!--end::Title-->

                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                {{-- <div class="w-100 mw-150px">
                         <!--begin::Select2-->
                         <select class="form-select form-select-solid w-55" id="orgAssigned"
                             data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                             <option></option>
                             <option value="all">All</option>
                             <option value="Assigned">Assigned</option>
                             <option value="Unassigned">Unassigned</option>
                         </select>
                         <!--end::Select2-->
                     </div> --}}
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" id="itemSearch"
                                        class="form-control form-control-solid w-250px ps-12" placeholder="Search table" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="data_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-5 fw-bold text-dark border-bottom-0">
                                            <th class="p-0 pb-3 text-start">ID</th>
                                            <th class="p-0 pb-3 w-250px text-end">Sender</th>
                                            <th class="p-0 pb-3 text-end">Status</th>
                                            <th class="p-0 pb-3 text-end">Load #</th>
                                            <th class="p-0 pb-3 text-end">Sender Budget</th>
                                            <th class="p-0 pb-3 min-w-50px text-end">Agreed Prize</th>
                                            <th class="p-0 pb-3 min-w-50px text-end">Load Payment status</th>
                                            <th class="p-0 pb-3 w-250px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="bid_list">
                                        @foreach ($bids as $bid)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-end pe-0">
                                                    <div class="d-flex w-250px justify-content-start flex-column">
                                                        <a href="#"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $bid->sender }}</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold d-block fs-7">{{ $bid->sender_phone }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <div
                                                        class="badge @if ($bid->status == 'Not Started') badge-light-danger
                                                @elseif($bid->status == 'Pending')
                                                badge-light-warning
                                                @elseif($bid->status == 'Completed')
                                                badge-light-success @endif">
                                                        {{ $bid->status }}</div>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">{{ $bid->load_id }}
                                                    </span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">GHS {{ $bid->budget }}</span>
                                                </td>
                                                <td class="pe-0">
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <span class="text-gray-600 fw-bold d-block fs-6">GHS
                                                            {{ $bid->price }}</span>
                                                    </div>
                                                </td>
                                                <td class="pe-0 text-center">
                                                    <div
                                                        class="badge @if ($bid->payment_status == 'Unpaid') badge-light-warning
                                            @elseif($bid->payment_status == 'Paid')
                                            badge-light-success @endif">
                                                        {{ $bid->payment_status }}
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    @if ($bid->broker_id == null)
                                                        <span id="negotiate" data-bid-id="{{ $bid->id }}"
                                                            data-load-id="{{ $bid->load_id }}"
                                                            class="btn btn-primary text-white">
                                                            <i
                                                                class="ki-duotone ki-black-right fs-2 text-white"></i>Negotiate
                                                        </span>
                                                    @else
                                                        @if (whichUser()->getTable() != $bid->last_offer_from && $bid->status != 'Completed')
                                                            <span
                                                                class="bullet bullet-dot bg-success h-10px w-10px top-0 start-50 animation-blink me-3">
                                                            </span>
                                                        @endif
                                                        <a href="{{ route('broker.load.bid-logs', $bid->load_id) }}"
                                                            class="btn btn-bg-primary text-white h-40px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-white"></i>View
                                                            Log
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 12-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    <!--end::App-->
    <!--end::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Modal - New Target-->
    <div class="modal fade" id="kt_modal_bid" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"
                        data-bs-target="#kt_modal_bid">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form class="form" action="{{ route('broker.start-bid') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <input type="hidden" id="bid_id" name="bid_id">
                            <input type="hidden" id="load_id" name="load_id">
                            <h1 class="mb-3">Make an Offer</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            {{-- <div class="text-muted fw-semibold fs-5">If you need more info, please check
                                <a href="#" class="fw-bold link-primary">Bidding Guidelines</a>.
                            </div> --}}
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Your offer</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Enter your offer for the load">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter Offer Amount" name="offer" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Message</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Select the currency type.">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::textarea-->
                            <textarea name="message" class="form-control" id="" cols="30" rows="6"></textarea>
                            <!--end::textara-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Notice-->
                        {{-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-wallet fs-2tx text-primary me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Top up funds</h4>
                                    <div class="fs-6 text-gray-700">Not enough funds in your wallet?
                                        <a href="/utilities/modals/wizards/top-up-wallet" class="text-bolder">Top up
                                            wallet</a>.
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div> --}}
                        <!--end::Notice-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                                data-bs-target="#kt_modal_bid">Cancel</button>
                            <button type="submit" class="btn btn-primary">
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
    <script>
        $('document').ready(function() {
            $('.bid_list').on('click', '#negotiate', function() {
                const bid = $(this).data('bid-id')
                const load = $(this).data('load-id')
                $('#bid_id').val(bid);
                $('#load_id').val(load);
                console.log(load);
                $('#kt_modal_bid').modal('show');
            })
        });
    </script>
@endsection
