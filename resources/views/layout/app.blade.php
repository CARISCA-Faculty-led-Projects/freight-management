<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
    @include('layout.head')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
        @include('layout.theme_mode._init')
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
                @include('layout.header')
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
                    {{--@include('layout.leftmenu')--}}
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
                            {{--@include('layout.toolbar')--}}
							<!--end::Toolbar-->
							<!--begin::Content-->
                            @yield("content")
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
                        @include('layout.footer')
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
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
        @include('partials.activities')
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
        @include('partials.chat')
		<!--end::Chat drawer-->
		<!--begin::Cart drawer-->
        @include('partials.cart')
		<!--end::Cart drawer-->
		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->

		<!--begin::Modal - View Users-->
        @include('partials.modals.view_users')
		<!--end::Modal - View Users-->
		<!--begin::Modal - Create Campaign-->
        @include('partials.modals.create_campaign')
		<!--end::Modal - Create Campaign-->
		<!--begin::Modal - New Target-->
        @include('partials.modals.new_target')
		<!--end::Modal - New Target-->
		<!--begin::Modal - Users Search-->
        @include('partials.modals.search_users')
		<!--end::Modal - Users Search-->
		<!--begin::Modal - Invite Friends-->
        @include('partials.modals.invite_friends')
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
		<!--begin::Javascript-->
        @include('layout.scripts')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
