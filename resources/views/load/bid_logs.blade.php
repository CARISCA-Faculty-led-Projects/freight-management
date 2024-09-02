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
                    <div class="d-flex">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Load #{{ $bid->load_id }}
                            Bid Logs</h1>
                    </div>
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
                            <span class="text-muted text-hover-primary">Load</span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Bid Logs</li>
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
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 12-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-center flex-row">
                                <span class="card-label fw-bold text-gray-800">Bid Negotiations History</span>
                                @if (whichUser()->getTable() == 'brokers')
                                <span class="btn btn-sm btn-primary" data-bs-target="#viewLoad_modal" data-bs-toggle="modal">View load</span>
                                <span class="btn btn-sm btn-primary ms-3" data-bs-target="#calculator_modal" data-bs-toggle="modal">Calculate</span>
                                @endif
                            </h3>
                            <!--end::Title-->
                            @if ($bid->status != 'Completed')
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" data-bs-target="#kt_modal_bid" data-bs-toggle="modal"
                                        class="btn btn-bg-primary text-white btn-active-color-primary h-40px">
                                        <i class="ki-duotone ki-black-chart fs-2"></i>Negotiate
                                    </a>
                                </div>
                                <!--end::Toolbar-->
                            @endif
                        </div>
                        <!--end::Header-->

                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Body-->
                        <div class="d-flex flex-column flex-start ps-5 ms-5">
                            <!--begin::Chart-->
                            <div class="d-flex me-7">
                                <div id="" class="">
                                    <h2 class="fs-2">
                                        Last offer
                                    </h2>
                                    <h3 class="text-dark-400 mt-1 fw-bold" style="font-size: 4rem">
                                        GHc {{ $recent->offer }}
                                    </h3>
                                    @if ($bid->status != 'Completed' && whichUser()->getTable() != $recent->offer_from)
                                        <a href="{{ route(whichUser()->getTable() == 'senders' ? 'sender.bid.agree' : 'broker.bid.agree', $bid->load_id) }}"
                                            onclick="return confirm('You are agreeing to the amount for this load')"
                                            class="text-white btn-sm mt-1 fw-semibold fs-6 btn btn-success">Agree</a>
                                    @elseif ($bid->status == 'Completed')
                                        @if (whichUser()->getTable() == 'brokers')
                                            @if ($load->payment_status == 'Unpaid')
                                                <span class="badge badge-warning">Awaiting payment</span>
                                            @else
                                                <span class="badge badge-success">Paid</span>

                                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target=""
                                                    class="text-white btn-sm mt-1 fw-semibold fs-6 btn btn-success"
                                                    disabled>Finalize load</a> --}}
                                            @endif
                                            {{-- {{ route(whichUser()->getTable() == 'senders' ? 'sender.bid.agree' : 'broker.bid.agree', $bid->load_id) }} --}}
                                        @else
                                            @if ($load->payment_status == 'Unpaid')
                                                <span id="makePayment" data-load-id="{{ $load->id }}"
                                                    class="text-white btn-sm mt-1 fw-semibold fs-6 btn btn-success"
                                                    disabled>Make Payment</span>
                                            @else
                                                <span class="badge badge-success">Paid</span>
                                            @endif

                                        @endif
                                    @endif
                                </div>
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-5 fw-bold text-dark border-bottom-0">
                                            <th class="p-0 pb-3 text-start">#</th>
                                            <th class="p-0 pb-3 w-250px text-center">Offer from</th>
                                            <th class="p-0 pb-3 text-center">Offer</th>
                                            <th class="p-0 pb-3 w-250px text-center">Message</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($bid_history as $log)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-end pe-0">
                                                    <div class="d-flex w-250px justify-content-start flex-column">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <span
                                                                class="text-gray-600 fw-bold d-block fs-6">{{ ucwords(rtrim($log->offer_from, 's')) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-0">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span class="text-gray-600 fw-bold d-block fs-6">GHS
                                                            {{ $log->offer }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-0">
                                                    <p name="" id="">{{ $log->message }}</->
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
                    <form class="form" method="POST"
                        action="{{ route(whichUser()->getTable() == 'senders' ? 'sender.make-offer' : 'broker.make-offer') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <input type="hidden" name="bid_id" value="{{ $bid->id }}">
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
                                <span class="required">Message</span>
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
    @include('partials.modals.initiate_payment')
    @include('partials.modals.calculator',['load'=> $load])
    @include('partials.modals.view_load',['load'=>$load])
    <script>
        $('document').ready(function() {
            $('.bid_list').on('click', '#negotiate', function() {
                const bid = $(this).data('bid-id')
                $('#bid_id').val(bid);
                $('#kt_modal_bid').modal('show');
            })

            $('#makePayment').on('click', function() {
                console.log('pressed');
                $.ajax({
                    url: "/senders/load/" + {{ $bid->load_id }} + "/make-payment",
                    success: function(response) {
                        window.open(response);
                    }
                })

            });

            $('#viewLoad').on("click",function(){

            });

        });
    </script>
    <!--end::Modal - New Target-->
@endsection
