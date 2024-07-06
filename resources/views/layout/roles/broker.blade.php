@extends('layout.app')
@section('role-name')
    Broker
@endsection

@section('profile-link')
    {{ route('broker.profile', whichUser()->mask) }}
@endsection

@section('profile-image')
    {{ asset('storage/logos/' . whichUser()->image) }}
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
                        <a class="menu-link" href="{{ route('broker.overview') }}">
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
                            <span class="menu-title">Dashboard</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                    <!--end:Menu item-->
                    <div class="menu-item">
                        <a href="{{ route('load.board') }}" class="menu-link mb-3 mt-3"><span class="menu-icon"><i
                                    class="ki-duotone ki-truck fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Load Board</span></a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('broker.shipments.list') }}" class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-ship fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Shipments</span></a>
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
        </div>


    </div>
@endsection
