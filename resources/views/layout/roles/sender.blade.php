@extends('layout.app')
@section('role-name')
    Senders
@endsection

@section('profile-link')
{{route('sender.profile',whichUser()->mask)}}
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
                        <a class="menu-link" href="{{route('sender.overview')}}">
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
                    <!--end:Menu item-->
                    <div  class="menu-item">
                        <!--begin:Menu link--><a class="menu-link" href="{{route('sender.loads')}}"><span class="menu-icon"><i
                                    class="ki-duotone ki-colors-square fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Loads</span></a><!--end:Menu link-->
                        </div><!--end:Menu sub-->
                    </div><!--end:Menu item-->

                    <!--begin:Menu item-->
                    {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-colors-square fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Shipments</span><span
                                class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="/shipments/overview"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Overview</span></a><!--end:Menu link--></div>
                            <!--end:Menu item--><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/shipments/add"><span
                                        class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Add</span></a><!--end:Menu link--></div>
                            <!--end:Menu item--><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="/shipments/list"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">List</span></a><!--end:Menu link--></div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="/shipments/tracking"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Tracking</span></a><!--end:Menu link--></div>
                            <!--end:Menu item-->
                        </div><!--end:Menu sub-->
                    </div><!--end:Menu item--> --}}
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
@endsection
