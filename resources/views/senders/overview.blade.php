@extends('layout.roles.sender')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Dashboard</h1>
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
                        <li class="breadcrumb-item text-muted">
                            <a href="/index" class="text-muted text-hover-primary">Senders</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Overview</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--begin::Content container-->
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Row-->
                <div class="row g-lg-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-4 col-xl-3 mb-5 mb-xl-10">
                        <!--begin::Card widget 12-->
                        <div class="card overflow-hidden mb-5 mb-xl-10">
                            <!--begin::Card body-->
                            <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                <!--begin::Statistics-->
                                <div class="mb-4 px-9">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Value-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">47,769,700</span>
                                        <!--end::Value-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Total Loads added</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 12-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 col-xl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 13-->
                        <div class="card overflow-hidden  mb-5 mb-xl-10">
                            <!--begin::Card body-->
                            <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                <!--begin::Statistics-->
                                <div class="mb-4 px-9">
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Value-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">259,786</span>
                                        <!--end::Value-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Loads delivered</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 13-->

                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 col-xl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 13-->
                        <div class="card overflow-hidden mb-5 mb-xl-10">
                            <!--begin::Card body-->
                            <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                <!--begin::Statistics-->
                                <div class="mb-4 px-9">
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Value-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">259,786</span>
                                        <!--end::Value-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Loads Cancelled</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 13-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 col-xl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 13-->
                        <div class="card overflow-hidden  mb-5 mb-xl-10">
                            <!--begin::Card body-->
                            <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                <!--begin::Statistics-->
                                <div class="mb-4 px-9">
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Value-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">259,786</span>
                                        <!--end::Value-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Loads pending shipment</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 13-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Chart widget 17-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Loads created per month</span>
                                <span class="text-gray-400 pt-2 fw-semibold fs-6">All loads added to the system</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button
                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-kt-menu-overflow="true">
                                    <i class="ki-duotone ki-dots-square fs-1 text-gray-300 me-n1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Remove</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Mute</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Chart container-->
                            <div id="sender_loads_created" class="w-100 h-350px"></div>
                            <!--end::Chart container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 17-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <script>
        var SenderLoadsCreated = (function () {
    // Private methods
    var initChart = function () {
        // Check if amchart library is included
        if (typeof am5 === "undefined") {
            return;
        }

        var element = document.getElementById("sender_loads_created");

        if (!element) {
            return;
        }

        var root;

        var init = function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root = am5.Root.new(element);

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([am5themes_Animated.new(root)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    layout: root.verticalLayout,
                })
            );

            var colors = chart.get("colors");

            var data = [
                {
                    month: "Jan",
                    qty: 725,
                },
                {
                    month: "Feb",
                    qty: 625,
                },
                {
                    month: "Mar",
                    qty: 602,
                },
                {
                    month: "Apr",
                    qty: 509,
                },
                {
                    month: "May",
                    qty: 322,
                },
                {
                    month: "Jun",
                    qty: 214,
                },
                {
                    month: "Jul",
                    qty: 204,
                },
                {
                    month: "Aug",
                    qty: 198,
                },
                {
                    month: "Sep",
                    qty: 165,
                },
                {
                    month: "Oct",
                    qty: 130,
                },
                {
                    month: "Nov",
                    qty: 93,
                },
                {
                    month: "Dec",
                    qty: 418,
                },
            ];

            prepareParetoData();

            function prepareParetoData() {
                var total = 0;

                for (var i = 0; i < data.length; i++) {
                    var value = data[i].qty;
                    total += value;
                }

                var sum = 0;
                for (var i = 0; i < data.length; i++) {
                    var value = data[i].qty;
                    sum += value;
                    data[i].pareto = (sum / total) * 100;
                }
            }

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.CategoryAxis.new(root, {
                    categoryField: "month",
                    renderer: am5xy.AxisRendererX.new(root, {
                        minGridDistance: 30,
                    }),
                })
            );

            xAxis.get("renderer").labels.template.setAll({
                paddingTop: 10,
                fontWeight: "400",
                fontSize: 13,
                fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
            });

            xAxis.get("renderer").grid.template.setAll({
                disabled: true,
                strokeOpacity: 0
            });

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {}),
                })
            );

            yAxis.get("renderer").labels.template.setAll({
                paddingLeft: 10,
                fontWeight: "400",
                fontSize: 13,
                fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
            });

            yAxis.get("renderer").grid.template.setAll({
                stroke: am5.color(KTUtil.getCssVariableValue('--bs-gray-300')),
                strokeWidth: 1,
                strokeOpacity: 1,
                strokeDasharray: [3]
            });

            var paretoAxisRenderer = am5xy.AxisRendererY.new(root, {
                opposite: true,
            });

            var paretoAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: paretoAxisRenderer,
                    min: 0,
                    max: 100,
                    strictMinMax: true,
                })
            );

            paretoAxis.get("renderer").labels.template.setAll({
                fontWeight: "400",
                fontSize: 13,
                fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
            });

            paretoAxisRenderer.grid.template.set("forceHidden", true);
            paretoAxis.set("numberFormat", "#'%");

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "qty",
                    categoryXField: "month",
                })
            );

            series.columns.template.setAll({
                tooltipText: "{categoryX}: {valueY}",
                tooltipY: 0,
                strokeOpacity: 0,
                cornerRadiusTL: 6,
                cornerRadiusTR: 6,
            });

            series.columns.template.adapters.add(
                "fill",
                function (fill, target) {
                    return chart
                        .get("colors")
                        .getIndex(series.dataItems.indexOf(target.dataItem));
                }
            );

            // pareto series
            var paretoSeries = chart.series.push(
                am5xy.LineSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: paretoAxis,
                    valueYField: "pareto",
                    categoryXField: "month",
                    stroke: am5.color(KTUtil.getCssVariableValue('--bs-dark')),
                    maskBullets: false,
                })
            );

            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();
            chart.appear(1000, 100);
        }

        am5.ready(function () {
            init();
        });

        // Update chart on theme mode change
		KTThemeMode.on("kt.thememode.change", function() {
			// Destroy chart
			root.dispose();

			// Reinit chart
			init();
		});
    };

    // Public methods
    return {
        init: function () {
            initChart();
        },
    };
})();

    </script>
@endsection
