<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6 d-flex justify-content-center align-items-center py-3" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/organization/overview">
            <img alt="Logo" src="{{ asset('assets/media/logos/daloadman-logo-no-background.png') }}" class="h-60px app-sidebar-logo-default" style="width:150px;"/>
            <img alt="Logo" src="{{ asset('assets/media/logos/daloadman-logo-no-background.png') }}" class="h-20px app-sidebar-logo-minimize"/>
            </br>
            <!-- <span class="text-white h-25px app-sidebar-logo-default" style="font-size: 19px;">{{ env('APP_NAME') }}</span> -->
            
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
            1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
            2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
            3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
            4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <span class="text-white text-center fs-4 mt-3">@yield('role-name')</span>
    <!--begin::sidebar menu-->
    @yield('sidebar')
    <!--end::sidebar menu-->
</div>
