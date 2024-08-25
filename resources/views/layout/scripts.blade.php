<script>
    var hostUrl = "{{ asset('assets/') }}";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
{{-- <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.1.3/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/sb-1.7.1/sp-2.3.1/sl-2.0.4/datatables.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.1.3/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/sb-1.7.1/sp-2.3.1/sl-2.0.4/datatables.min.js"></script> --}}
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
{{-- <script src="https://cdn.amcharts.com/lib/5/map.js"></script> --}}
{{-- <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script> --}}
{{-- <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script> --}}
{{-- <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script> --}}
{{-- <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script> --}}
{{-- <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script> --}}
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
{{-- <script src="https://cdn.amcharts.com/lib/5/percent.js"></script> --}}
{{-- <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>/ --}}
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/custom/shipping.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
{{-- <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/custom/utilities/modals/bidding.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/custom/apps/calendar/calendar.js') }}"></script> --}}
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
{{-- <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script> --}}
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
