@extends('layout.app')
@section('role-name')
<div class="row w-10 justify-content-center align-items-center">
<img src="{{ asset('storage/logos/'.whichUser()->image) }}" 
     alt="User Avatar" 
     class="rounded-circle"
     style="width: 100px; height: 80px; object-fit: cover;">  
     <span class="strong mt-3 fs-3">{{ whichUser()->name }}</span>
</div>
@endsection

@section('profile-link')
{{route('org.profile',whichUser()->mask)}}
@endsection

@section('profile-image')
    {{asset('storage/logos/'.whichUser()->image)}}
@endsection

@section('sidebar')
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
                data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('org.overview')}}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-home fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                            </span>
                            <span class="menu-title">Home</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link active" href="{{route('org.shipments.schedule')}}">
                            <a class="menu-link active" href="#">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-calendar-8 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                            </span>
                            <span class="menu-title">Schedule</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-truck fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Fleet</span><span
                                class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                            <!--end:Menu item--><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="{{ route('vehicles') }}"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Vehicles</span></a><!--end:Menu link--></div>
                            <!--end:Menu item--><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="{{ route('drivers') }}"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Drivers</span></a><!--end:Menu link--></div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="/fleet/maintenance"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span class="menu-title">Maintenance
                                        Schedule</span></a><!--end:Menu link--></div>
                            <!--end:Menu item-->
                        </div><!--end:Menu sub-->
                    </div><!--end:Menu item-->

                    <!--end:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-cube-2 fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Loads</span><span
                                class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="{{ route('org.load.overview') }}"><span
                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                class="menu-title">Overview</span></a><!--end:Menu link--></div>
                    <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/load/bids"><span
                                        class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Bid</span></a><!--end:Menu link--></div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="{{route('org.load.board')}}"><span
                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                class="menu-title">Board</span></a><!--end:Menu link--></div>
                    <!--end:Menu item-->

                        </div><!--end:Menu sub-->
                    </div><!--end:Menu item-->

                    <!--begin:Menu item-->
                    <!-- <div class="menu-item">
                        <a class="menu-link" href="/load/offer-a-deal">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Offer a deal</span>
                        </a>
                    </div> -->
                    <!--end:Menu item-->
                    {{-- <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="/load/documents">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Documents</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--begin:Menu item--> --}}
                    <div  class="menu-item">
                        <!--begin:Menu link--><a href="{{route('org.broker.list')}}" class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-general-mouse fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Brokers</span></a><!--end:Menu link-->
                    </div><!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a href="{{route('org.shipments.list')}}" class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-delivery-door fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Shipments</span></a><!--end:Menu link-->
                    </div><!--end:Menu item-->
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
@endsection
