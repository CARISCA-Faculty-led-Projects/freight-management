"use strict";

// Class definition
var KTCardsWidget1 = function () {
    // Private methods
    var initChart = function() {
        var element = document.getElementById("kt_card_widget_1_chart");

        if (!element) {
            return;
        }

        var color = element.getAttribute('data-kt-chart-color');

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var baseColor = KTUtil.isHexColor(color) ? color : KTUtil.getCssVariableValue('--bs-' + color);
        var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');

        var options = {
            series: [{
                name: 'Sales',
                data: [30, 75, 55, 45, 30, 60, 75, 50],
                margin: {
					left: 5,
					right: 5
				}
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                height: height,
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['35%'],
                    borderRadius: 6
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 4,
                colors: ['transparent']
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            fill: {
                type: 'solid'
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb: " + val
                    }
                },
                y: {
                    formatter: function (val) {
                        return val + "%"
                    }
                }
            },
            colors: [baseColor, secondaryColor],
            grid: {
                borderColor: false,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: 10,
					left: 25,
					right: 25
				}
            }
        };

        // Set timeout to properly get the parent elements width
        var chart = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.render();
        }, 300);
    }

    // Public methods
    return {
        init: function () {
            initChart();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardsWidget1;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardsWidget1.init();
});





"use strict";

// Class definition
var KTCardsWidget10 = function () {
    // Private methods
    var initChart = function() {
        var el = document.getElementById('kt_card_widget_10_chart');

        if (!el) {
            return;
        }

        var options = {
            size: el.getAttribute('data-kt-size') ? parseInt(el.getAttribute('data-kt-size')) : 70,
            lineWidth: el.getAttribute('data-kt-line') ? parseInt(el.getAttribute('data-kt-line')) : 11,
            rotate: el.getAttribute('data-kt-rotate') ? parseInt(el.getAttribute('data-kt-rotate')) : 145,
            //percent:  el.getAttribute('data-kt-percent') ,
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');

        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
            percent = Math.min(Math.max(0, percent || 1), 1);
            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
            ctx.strokeStyle = color;
            ctx.lineCap = 'round'; // butt, round or square
            ctx.lineWidth = lineWidth
            ctx.stroke();
        };

        // Init
        drawCircle('#E4E6EF', options.lineWidth, 100 / 100);
        drawCircle(KTUtil.getCssVariableValue('--bs-primary'), options.lineWidth, 100 / 150);
        drawCircle(KTUtil.getCssVariableValue('--bs-success'), options.lineWidth, 100 / 250);
    }

    // Public methods
    return {
        init: function () {
            initChart();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardsWidget10;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardsWidget10.init();
});





"use strict";

// Class definition
var KTCardWidget12 = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("kt_card_widget_12_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Sales',
                data: [3.5, 5.7, 2.8, 5.9, 4.2, 5.6, 4.3, 4.5, 5.9, 4.5, 5.7, 4.8, 5.7]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val * "10" + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardWidget12;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardWidget12.init();
});

// total brokers for org start

"use strict";

// Class definition
var TotalBrokersChart = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("brokers_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Shipments',
                data: [1.5, 4.5, 2, 3, 2, 4, 2.5, 2, 2.5, 4, 3.5, 4.5, 2.5]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val * "10" + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = TotalBrokersChart;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    TotalBrokersChart.init();
});

// total brokers for org end

// total drivers for org start
"use strict";

// Class definition
var TotalDriversChart = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("drivers_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Shipments',
                data: [1.5, 4.5, 2, 3, 2, 4, 2.5, 2, 2.5, 4, 3.5, 4.5, 2.5]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val * "10" + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = TotalBrokersChart;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    TotalDriversChart.init();
});

// total drivers for org end

// total vehicles for org start
"use strict";

// Class definition
var TotalVehiclesChart = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("vehicles_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        console.log('vehicle chart height: ' + height);

        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Shipments',
                data: [1.5, 4.5, 2, 3, 2, 4, 2.5, 2, 2.5, 4, 3.5, 4.5, 2.5]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val * "10" + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = TotalVehiclesChart;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    TotalVehiclesChart.init();
});

// total Vehicles for org end

// total earnings for org start
"use strict";

// Class definition
var TotalEarningsChart = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("earnings_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        console.log('earnings chart height: ' + height);
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Earnings',
                data: [1.5, 4.5, 2, 3, 2, 4, 2.5, 2, 2.5, 4, 3.5, 4.5, 2.5]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val * "10" + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = TotalEarningsChart;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    TotalEarningsChart.init();
});

// total earnings for org end

// active drivers per month start

"use strict";

// Class definition
var OrgDriversPm = (function () {
    // Private methods
    var initChart = function () {
        // Check if amchart library is included
        if (typeof am5 === "undefined") {
            return;
        }

        var element = document.getElementById("org_drivers_pm_chart");

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
                    months: "US",
                    qty: 725,
                },
                {
                    months: "UK",
                    qty: 625,
                },
                {
                    months: "China",
                    qty: 602,
                },
                {
                    months: "Japan",
                    qty: 509,
                },
                {
                    months: "Germany",
                    qty: 322,
                },
                {
                    months: "France",
                    qty: 214,
                },
                {
                    months: "India",
                    qty: 204,
                },
                {
                    months: "Spain",
                    qty: 198,
                },
                {
                    months: "Italy",
                    qty: 165,
                },
                {
                    months: "Russia",
                    qty: 130,
                },
                {
                    months: "Norway",
                    qty: 93,
                },
                {
                    months: "Canada",
                    qty: 41,
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
                    categoryField: "months",
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


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "qty",
                    categoryXField: "months",
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



// Webpack support
if (typeof module !== "undefined") {
    module.exports = OrgDriversPm;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    OrgDriversPm.init();
});

// active drivers per month end

// active brokers per month start

"use strict";

// Class definition
var OrgBrokersPm = (function () {
    // Private methods
    var initChart = function () {
        // Check if amchart library is included
        if (typeof am5 === "undefined") {
            return;
        }

        var element = document.getElementById("org_brokers_pm_chart");

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
                    months: "US",
                    qty: 725,
                },
                {
                    months: "UK",
                    qty: 625,
                },
                {
                    months: "China",
                    qty: 602,
                },
                {
                    months: "Japan",
                    qty: 509,
                },
                {
                    months: "Germany",
                    qty: 322,
                },
                {
                    months: "France",
                    qty: 214,
                },
                {
                    months: "India",
                    qty: 204,
                },
                {
                    months: "Spain",
                    qty: 198,
                },
                {
                    months: "Italy",
                    qty: 165,
                },
                {
                    months: "Russia",
                    qty: 130,
                },
                {
                    months: "Norway",
                    qty: 93,
                },
                {
                    months: "Canada",
                    qty: 41,
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
                    categoryField: "months",
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


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "qty",
                    categoryXField: "months",
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



// Webpack support
if (typeof module !== "undefined") {
    module.exports = OrgBrokersPm;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    OrgBrokersPm.init();
});
// active brokers per month end

// Driver assigned shipments start

"use strict";

// Class definition
var DriverAssignedShipmentspm = (function () {
    // Private methods
    var initChart = function () {
        // Check if amchart library is included
        if (typeof am5 === "undefined") {
            return;
        }

        var element = document.getElementById("driver_shipments_assigned");

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
                    months: "US",
                    qty: 725,
                },
                {
                    months: "UK",
                    qty: 625,
                },
                {
                    months: "China",
                    qty: 602,
                },
                {
                    months: "Japan",
                    qty: 509,
                },
                {
                    months: "Germany",
                    qty: 322,
                },
                {
                    months: "France",
                    qty: 214,
                },
                {
                    months: "India",
                    qty: 204,
                },
                {
                    months: "Spain",
                    qty: 198,
                },
                {
                    months: "Italy",
                    qty: 165,
                },
                {
                    months: "Russia",
                    qty: 130,
                },
                {
                    months: "Norway",
                    qty: 93,
                },
                {
                    months: "Canada",
                    qty: 41,
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
                    categoryField: "Months",
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
                    categoryXField: "months",
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



// Webpack support
if (typeof module !== "undefined") {
    module.exports = DriverAssignedShipmentspm;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    DriverAssignedShipmentspm.init();
});
// Driver assigned shipments end

// broker shipments created start

// Class definition
var BrokerShipmentsPm = (function () {
    // Private methods
    var initChart = function () {
        // Check if amchart library is included
        if (typeof am5 === "undefined") {
            return;
        }

        var element = document.getElementById("broker_shipments_created_pm_chart");

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
                    months: "US",
                    qty: 725,
                },
                {
                    months: "UK",
                    qty: 625,
                },
                {
                    months: "China",
                    qty: 602,
                },
                {
                    months: "Japan",
                    qty: 509,
                },
                {
                    months: "Germany",
                    qty: 322,
                },
                {
                    months: "France",
                    qty: 214,
                },
                {
                    months: "India",
                    qty: 204,
                },
                {
                    months: "Spain",
                    qty: 198,
                },
                {
                    months: "Italy",
                    qty: 165,
                },
                {
                    months: "Russia",
                    qty: 130,
                },
                {
                    months: "Norway",
                    qty: 93,
                },
                {
                    months: "Canada",
                    qty: 41,
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
                    categoryField: "months",
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


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "qty",
                    categoryXField: "months",
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



// Webpack support
if (typeof module !== "undefined") {
    module.exports = BrokerShipmentsPm;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    BrokerShipmentsPm.init();
});
// Broker shipments created end
"use strict";

// Class definition
var KTCardsWidget17 = function () {
    // Private methods
    var initChart = function() {
        var el = document.getElementById('kt_card_widget_17_chart');

        if (!el) {
            return;
        }

        var options = {
            size: el.getAttribute('data-kt-size') ? parseInt(el.getAttribute('data-kt-size')) : 70,
            lineWidth: el.getAttribute('data-kt-line') ? parseInt(el.getAttribute('data-kt-line')) : 11,
            rotate: el.getAttribute('data-kt-rotate') ? parseInt(el.getAttribute('data-kt-rotate')) : 145,
            //percent:  el.getAttribute('data-kt-percent') ,
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');

        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
            percent = Math.min(Math.max(0, percent || 1), 1);
            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
            ctx.strokeStyle = color;
            ctx.lineCap = 'round'; // butt, round or square
            ctx.lineWidth = lineWidth
            ctx.stroke();
        };

        // Init
        drawCircle('#E4E6EF', options.lineWidth, 100 / 100);
        drawCircle(KTUtil.getCssVariableValue('--bs-primary'), options.lineWidth, 100 / 150);
        drawCircle(KTUtil.getCssVariableValue('--bs-success'), options.lineWidth, 100 / 250);
    }

    // Public methods
    return {
        init: function () {
            initChart();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardsWidget17;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardsWidget17.init();
});





"use strict";

// Class definition
var KTCardsWidget19 = function () {
    // Private methods
    var initChart = function() {
        var el = document.getElementById('kt_card_widget_19_chart');

        if (!el) {
            return;
        }

        var options = {
            size: el.getAttribute('data-kt-size') ? parseInt(el.getAttribute('data-kt-size')) : 70,
            lineWidth: el.getAttribute('data-kt-line') ? parseInt(el.getAttribute('data-kt-line')) : 11,
            rotate: el.getAttribute('data-kt-rotate') ? parseInt(el.getAttribute('data-kt-rotate')) : 145,
            //percent:  el.getAttribute('data-kt-percent') ,
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');

        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
            percent = Math.min(Math.max(0, percent || 1), 1);
            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
            ctx.strokeStyle = color;
            ctx.lineCap = 'round'; // butt, round or square
            ctx.lineWidth = lineWidth
            ctx.stroke();
        };

        // Init
        drawCircle('#E4E6EF', options.lineWidth, 100 / 100);
        drawCircle(KTUtil.getCssVariableValue('--bs-primary'), options.lineWidth, 100 / 150);
        drawCircle(KTUtil.getCssVariableValue('--bs-success'), options.lineWidth, 100 / 250);
    }

    // Public methods
    return {
        init: function () {
            initChart();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardsWidget19;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardsWidget19.init();
});





"use strict";

// Class definition
var KTCardsWidget4 = function () {
    // Private methods
    var initChart = function() {
        var el = document.getElementById('kt_card_widget_4_chart');

        if (!el) {
            return;
        }

        var options = {
            size: el.getAttribute('data-kt-size') ? parseInt(el.getAttribute('data-kt-size')) : 70,
            lineWidth: el.getAttribute('data-kt-line') ? parseInt(el.getAttribute('data-kt-line')) : 11,
            rotate: el.getAttribute('data-kt-rotate') ? parseInt(el.getAttribute('data-kt-rotate')) : 145,
            //percent:  el.getAttribute('data-kt-percent') ,
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');

        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
            percent = Math.min(Math.max(0, percent || 1), 1);
            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
            ctx.strokeStyle = color;
            ctx.lineCap = 'round'; // butt, round or square
            ctx.lineWidth = lineWidth
            ctx.stroke();
        };

        // Init
        drawCircle('#E4E6EF', options.lineWidth, 100 / 100);
        drawCircle(KTUtil.getCssVariableValue('--bs-danger'), options.lineWidth, 100 / 150);
        drawCircle(KTUtil.getCssVariableValue('--bs-primary'), options.lineWidth, 100 / 250);
    }

    // Public methods
    return {
        init: function () {
            initChart();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardsWidget4;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardsWidget4.init();
});





"use strict";

// Class definition
var KTCardsWidget6 = function () {
    // Private methods
    var initChart = function() {
        var element = document.getElementById("kt_card_widget_6_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-primary');
        var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');

        var options = {
            series: [{
                name: 'Sales',
                data: [30, 60, 53, 45, 60, 75, 53]
            }, ],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                height: height,
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['55%'],
                    borderRadius: 6
                }
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 9,
                colors: ['transparent']
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                    tickPlacement: 'between'
                },
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            fill: {
                type: 'solid'
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return 'Feb: ' + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val + "%"
                    }
                }
            },
            colors: [baseColor, secondaryColor],
            grid: {
                padding: {
                    left: 10,
                    right: 10
                },
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        };

        var chart = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.render();
        }, 300);
    }

    // Public methods
    return {
        init: function () {
            initChart();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardsWidget6;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardsWidget6.init();
});





"use strict";

// Class definition
var KTCardWidget8 = function () {
    var chart = {
        self: null,
        rendered: false
    };


    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("kt_card_widget_8_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Sales',
                data: [4.5, 5.7, 2.8, 5.9, 4.2, 5.6, 5.2, 4.5, 5.9, 4.5, 5.7, 4.8, 5.7]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return "$" + val + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardWidget8;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardWidget8.init();
});

"use strict";

// Class definition
var KTCardWidget9 = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart) {
        var element = document.getElementById("kt_card_widget_9_chart");

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
        var baseColor = KTUtil.getCssVariableValue('--bs-gray-800');
        var lightColor = KTUtil.getCssVariableValue('--bs-success');

        var options = {
            series: [{
                name: 'Visitors',
                data: [1.5, 2.5, 2, 3, 2, 4, 2.5, 2, 2.5, 4, 2.5, 4.5, 2.5]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 2,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                x: {
                    formatter: function (val) {
                        return "Feb " + val;
                    }
                },
                y: {
                    formatter: function (val) {
                        return val + "K"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: -20,
                    bottom: -20,
                    left: -20
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 2
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    }

    // Public methods
    return {
        init: function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart.rendered) {
                    chart.self.destroy();
                }

                initChart(chart);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTCardWidget9;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCardWidget9.init();
});
"use strict";

// Class definition
var KTFormsWidget1 = (function () {
    // Private methods
    var initForm1 = function () {
        var element = document.querySelector('#kt_forms_widget_1_select_1');

        if ( !element ) {
            return;
        }

        var optionFormat = function(item) {
            if ( !item.id ) {
                return item.text;
            }

            var span = document.createElement('span');
            var template = '';

            template += '<img src="' + item.element.getAttribute('data-kt-select2-icon') + '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $(element).select2({
            placeholder: "Select coin",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    };

    var initForm2 = function () {
        var element = document.querySelector('#kt_forms_widget_1_select_2');

        if ( !element ) {
            return;
        }

        var optionFormat = function(item) {
            if ( !item.id ) {
                return item.text;
            }

            var span = document.createElement('span');
            var template = '';

            template += '<img src="' + item.element.getAttribute('data-kt-select2-icon') + '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $(element).select2({
            placeholder: "Select coin",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    };

    // Public methods
    return {
        init: function () {
            initForm1();
            initForm2();
        },
    };
})();

// Webpack support
if (typeof module !== "undefined") {
    module.exports = KTFormsWidget1;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormsWidget1.init();
});

"use strict";

// Class definition
var KTTimelineWidget24 = function () {
    // Private methods
    var handleActions = function() {
        var card = document.querySelector('#kt_list_widget_24');

        if ( !card ) {
            return;
        }

        // Checkbox Handler
        KTUtil.on(card, '[data-kt-element="follow"]', 'click', function (e) {
            if ( this.innerText === 'Following' ) {
                this.innerText = 'Follow';
                this.classList.add('btn-light-primary');
                this.classList.remove('btn-primary');
                this.blur();
            } else {
                this.innerText = 'Following';
                this.classList.add('btn-primary');
                this.classList.remove('btn-light-primary');
                this.blur();
            }
        });
    }

    // Public methods
    return {
        init: function () {
            handleActions();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTTimelineWidget24;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTTimelineWidget24.init();
});

"use strict";

// Class definition
var KTTimelineWidget1 = function () {
    // Private methods
    // Day timeline
    const initTimelineDay = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_1_1');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-1-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: "research",
                content: "Research",
                order: 1
            },
            {
                id: "qa",
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: "ui",
                content: "UI Design",
                order: 3
            },
            {
                id: "dev",
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 'research',
                start: now,
                end: moment(now).add(1.5, 'hours'),
                content: 'Meeting',
                progress: "60%",
                color: 'primary',
                users: [
                    'avatars/300-6.jpg',
                    'avatars/300-1.jpg'
                ]
            },
            {
                id: 2,
                group: 'qa',
                start: moment(now).add(1, 'hours'),
                end: moment(now).add(2, 'hours'),
                content: 'Testing',
                progress: "47%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 'ui',
                start: moment(now).add(30, 'minutes'),
                end: moment(now).add(2.5, 'hours'),
                content: 'Landing page',
                progress: "55%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-20.jpg'
                ]
            },
            {
                id: 4,
                group: 'dev',
                start: moment(now).add(1.5, 'hours'),
                end: moment(now).add(3, 'hours'),
                content: 'Products module',
                progress: "75%",
                color: 'info',
                users: [
                    'avatars/300-23.jpg',
                    'avatars/300-12.jpg',
                    'avatars/300-9.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,
            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-1-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }

    // Week timeline
    const initTimelineWeek = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_1_2');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-1-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: 1,
                content: "Research",
                order: 1
            },
            {
                id: 2,
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: 3,
                content: "UI Design",
                order: 3
            },
            {
                id: 4,
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 1,
                start: now,
                end: moment(now).add(7, 'days'),
                content: 'Framework',
                progress: "71%",
                color: 'primary',
                users: [
                    'avatars/300-6.jpg',
                    'avatars/300-1.jpg'
                ]
            },
            {
                id: 2,
                group: 2,
                start: moment(now).add(7, 'days'),
                end: moment(now).add(14, 'days'),
                content: 'Accessibility',
                progress: "84%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 3,
                start: moment(now).add(3, 'days'),
                end: moment(now).add(20, 'days'),
                content: 'Microsites',
                progress: "69%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-20.jpg'
                ]
            },
            {
                id: 4,
                group: 4,
                start: moment(now).add(10, 'days'),
                end: moment(now).add(21, 'days'),
                content: 'Deployment',
                progress: "74%",
                color: 'info',
                users: [
                    'avatars/300-23.jpg',
                    'avatars/300-12.jpg',
                    'avatars/300-9.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,

            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-1-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }

    // Month timeline
    const initTimelineMonth = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_1_3');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-1-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: "research",
                content: "Research",
                order: 1
            },
            {
                id: "qa",
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: "ui",
                content: "UI Design",
                order: 3
            },
            {
                id: "dev",
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 'research',
                start: now,
                end: moment(now).add(2, 'months'),
                content: 'Tags',
                progress: "79%",
                color: 'primary',
                users: [
                    'avatars/300-6.jpg',
                    'avatars/300-1.jpg'
                ]
            },
            {
                id: 2,
                group: 'qa',
                start: moment(now).add(0.5, 'months'),
                end: moment(now).add(5, 'months'),
                content: 'Testing',
                progress: "64%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 'ui',
                start: moment(now).add(2, 'months'),
                end: moment(now).add(6.5, 'months'),
                content: 'Media',
                progress: "82%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-20.jpg'
                ]
            },
            {
                id: 4,
                group: 'dev',
                start: moment(now).add(4, 'months'),
                end: moment(now).add(7, 'months'),
                content: 'Plugins',
                progress: "58%",
                color: 'info',
                users: [
                    'avatars/300-23.jpg',
                    'avatars/300-12.jpg',
                    'avatars/300-9.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,

            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-1-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }

    // Handle BlockUI
    const handleBlockUI = () => {
        // Select block ui elements
        const elements = document.querySelectorAll('[data-kt-timeline-widget-1-blockui="true"]');

        // Init block ui
        elements.forEach(element => {
            const blockUI = new KTBlockUI(element, {
                overlayClass: "bg-body",
            });

            blockUI.block();
        });
    }

    // Handle tabs visibility
    const tabsVisibility = () => {
        const tabs = document.querySelectorAll('[data-kt-timeline-widget-1="tab"]');

        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', e => {
                // Week tab
                if(tab.getAttribute('href') === '#kt_timeline_widget_1_tab_week'){
                    initTimelineWeek();
                }

                // Month tab
                if(tab.getAttribute('href') === '#kt_timeline_widget_1_tab_month'){
                    initTimelineMonth();
                }
            });
        });
    }

    // Handle avatar path conflict
    const handleAvatarPath = () => {
        const avatars = document.querySelectorAll('[data-kt-timeline-avatar-src]');

        if(!avatars){
            return;
        }

        avatars.forEach(avatar => {
            avatar.setAttribute('src', avatar.getAttribute('data-kt-timeline-avatar-src'));
            avatar.removeAttribute('data-kt-timeline-avatar-src');
        });
    }

    // Public methods
    return {
        init: function () {
            initTimelineDay();
            handleBlockUI();
            tabsVisibility();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTTimelineWidget1;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTTimelineWidget1.init();
});

"use strict";

// Class definition
var KTTimelineWidget2 = function () {
    // Private methods
    var handleCheckbox = function() {
        var card = document.querySelector('#kt_timeline_widget_2_card');

        if (!card) {
            return;
        }

        // Checkbox Handler
        KTUtil.on(card, '[data-kt-element="checkbox"]', 'change', function (e) {
            var check = this.closest('.form-check');
            var tr = this.closest('tr');
            var bullet = tr.querySelector('[data-kt-element="bullet"]');
            var status = tr.querySelector('[data-kt-element="status"]');

            if ( this.checked === true ) {
                check.classList.add('form-check-success');

                bullet.classList.remove('bg-primary');
                bullet.classList.add('bg-success');

                status.innerText = 'Done';
                status.classList.remove('badge-light-primary');
                status.classList.add('badge-light-success');
            } else {
                check.classList.remove('form-check-success');

                bullet.classList.remove('bg-success');
                bullet.classList.add('bg-primary');

                status.innerText = 'In Process';
                status.classList.remove('badge-light-success');
                status.classList.add('badge-light-primary');
            }
        });
    }

    // Public methods
    return {
        init: function () {
            handleCheckbox();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTTimelineWidget2;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTTimelineWidget2.init();
});



"use strict";

// Class definition
var KTTimelineWidget4 = function () {
    // Private methods
    // Day timeline
    const initTimelineDay = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_4_1');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-4-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: "research",
                content: "Research",
                order: 1
            },
            {
                id: "qa",
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: "ui",
                content: "UI Design",
                order: 3
            },
            {
                id: "dev",
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 'research',
                start: now,
                end: moment(now).add(1.5, 'hours'),
                content: 'Meeting',
                progress: "60%",
                color: 'primary',
                users: [
                    'avatars/300-6.jpg',
                    'avatars/300-1.jpg'
                ]
            },
            {
                id: 2,
                group: 'qa',
                start: moment(now).add(1, 'hours'),
                end: moment(now).add(2, 'hours'),
                content: 'Testing',
                progress: "47%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 'ui',
                start: moment(now).add(30, 'minutes'),
                end: moment(now).add(2.5, 'hours'),
                content: 'Landing page',
                progress: "55%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-20.jpg'
                ]
            },
            {
                id: 4,
                group: 'dev',
                start: moment(now).add(1.5, 'hours'),
                end: moment(now).add(3, 'hours'),
                content: 'Products module',
                progress: "75%",
                color: 'info',
                users: [
                    'avatars/300-23.jpg',
                    'avatars/300-12.jpg',
                    'avatars/300-9.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,
            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-4-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }

    // Week timeline
    const initTimelineWeek = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_4_2');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-4-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: 1,
                content: "Research",
                order: 1
            },
            {
                id: 2,
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: 3,
                content: "UI Design",
                order: 3
            },
            {
                id: 4,
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 1,
                start: now,
                end: moment(now).add(7, 'days'),
                content: 'Framework',
                progress: "71%",
                color: 'primary',
                users: [
                    'avatars/300-6.jpg',
                    'avatars/300-1.jpg'
                ]
            },
            {
                id: 2,
                group: 2,
                start: moment(now).add(7, 'days'),
                end: moment(now).add(14, 'days'),
                content: 'Accessibility',
                progress: "84%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 3,
                start: moment(now).add(3, 'days'),
                end: moment(now).add(20, 'days'),
                content: 'Microsites',
                progress: "69%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-20.jpg'
                ]
            },
            {
                id: 4,
                group: 4,
                start: moment(now).add(10, 'days'),
                end: moment(now).add(21, 'days'),
                content: 'Deployment',
                progress: "74%",
                color: 'info',
                users: [
                    'avatars/300-23.jpg',
                    'avatars/300-12.jpg',
                    'avatars/300-9.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,

            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-4-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }

    // Month timeline
    const initTimelineMonth = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_4_3');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-4-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: "research",
                content: "Research",
                order: 1
            },
            {
                id: "qa",
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: "ui",
                content: "UI Design",
                order: 3
            },
            {
                id: "dev",
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 'research',
                start: now,
                end: moment(now).add(2, 'months'),
                content: 'Tags',
                progress: "79%",
                color: 'primary',
                users: [
                    'avatars/300-6.jpg',
                    'avatars/300-1.jpg'
                ]
            },
            {
                id: 2,
                group: 'qa',
                start: moment(now).add(0.5, 'months'),
                end: moment(now).add(5, 'months'),
                content: 'Testing',
                progress: "64%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 'ui',
                start: moment(now).add(2, 'months'),
                end: moment(now).add(6.5, 'months'),
                content: 'Media',
                progress: "82%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-20.jpg'
                ]
            },
            {
                id: 4,
                group: 'dev',
                start: moment(now).add(4, 'months'),
                end: moment(now).add(7, 'months'),
                content: 'Plugins',
                progress: "58%",
                color: 'info',
                users: [
                    'avatars/300-23.jpg',
                    'avatars/300-12.jpg',
                    'avatars/300-9.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,

            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-4-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }

    // 2022 timeline
    const initTimeline2022 = () => {
        // Detect element
        const element = document.querySelector('#kt_timeline_widget_4_4');
        if (!element) {
            return;
        }

        if(element.innerHTML){
            return;
        }

        // Set variables
        var now = Date.now();
        var rootImagePath = element.getAttribute('data-kt-timeline-widget-4-image-root');

        // Build vis-timeline datasets
        var groups = new vis.DataSet([
            {
                id: "research",
                content: "Research",
                order: 1
            },
            {
                id: "qa",
                content: "Phase 2.6 QA",
                order: 2
            },
            {
                id: "ui",
                content: "UI Design",
                order: 3
            },
            {
                id: "dev",
                content: "Development",
                order: 4
            }
        ]);


        var items = new vis.DataSet([
            {
                id: 1,
                group: 'research',
                start: now,
                end: moment(now).add(2, 'months'),
                content: 'Tags',
                progress: "51%",
                color: 'primary',
                users: [
                    'avatars/300-7.jpg',
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 2,
                group: 'qa',
                start: moment(now).add(0.5, 'months'),
                end: moment(now).add(5, 'months'),
                content: 'Testing',
                progress: "64%",
                color: 'success',
                users: [
                    'avatars/300-2.jpg'
                ]
            },
            {
                id: 3,
                group: 'ui',
                start: moment(now).add(2, 'months'),
                end: moment(now).add(6.5, 'months'),
                content: 'Media',
                progress: "54%",
                color: 'danger',
                users: [
                    'avatars/300-5.jpg',
                    'avatars/300-21.jpg'
                ]
            },
            {
                id: 4,
                group: 'dev',
                start: moment(now).add(4, 'months'),
                end: moment(now).add(7, 'months'),
                content: 'Plugins',
                progress: "348%",
                color: 'info',
                users: [
                    'avatars/300-3.jpg',
                    'avatars/300-11.jpg',
                    'avatars/300-13.jpg'
                ]
            },
        ]);

        // Set vis-timeline options
        var options = {
            zoomable: false,
            moveable: false,
            selectable: false,

            // More options https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            margin: {
                item: {
                    horizontal: 10,
                    vertical: 35
                }
            },

            // Remove current time line --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            showCurrentTime: false,

            // Whitelist specified tags and attributes from template --- more info: https://visjs.github.io/vis-timeline/docs/timeline/#Configuration_Options
            xss: {
                disabled: false,
                filterOptions: {
                    whiteList: {
                        div: ['class', 'style'],
                        img: ['data-kt-timeline-avatar-src', 'alt'],
                        a: ['href', 'class']
                    },
                },
            },
            // specify a template for the items
            template: function (item) {
                // Build users group
                const users = item.users;
                let userTemplate = '';
                users.forEach(user => {
                    userTemplate += `<div class="symbol symbol-circle symbol-25px"><img data-kt-timeline-avatar-src="${rootImagePath + user}" alt="" /></div>`;
                });

                return `<div class="rounded-pill bg-light-${item.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                    <div class="position-absolute rounded-pill d-block bg-${item.color} start-0 top-0 h-100 z-index-1" style="width: ${item.progress};"></div>

                    <div class="d-flex align-items-center position-relative z-index-2">
                        <div class="symbol-group symbol-hover flex-nowrap me-3">
                            ${userTemplate}
                        </div>

                        <a href="#" class="fw-bold text-white text-hover-dark">${item.content}</a>
                    </div>

                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                        ${item.progress}
                    </div>
                </div>
                `;
            },

            // Remove block ui on initial draw
            onInitialDrawComplete: function () {
                handleAvatarPath();

                const target = element.closest('[data-kt-timeline-widget-4-blockui="true"]');
                const blockUI = KTBlockUI.getInstance(target);

                if (blockUI.isBlocked()) {
                    setTimeout(() => {
                        blockUI.release();
                    }, 1000);
                }
            }
        };

        // Init vis-timeline
        const timeline = new vis.Timeline(element, items, groups, options);

        // Prevent infinite loop draws
        timeline.on("currentTimeTick", () => {
            // After fired the first time we un-subscribed
            timeline.off("currentTimeTick");
        });
    }
    // Handle BlockUI
    const handleBlockUI = () => {
        // Select block ui elements
        const elements = document.querySelectorAll('[data-kt-timeline-widget-4-blockui="true"]');

        // Init block ui
        elements.forEach(element => {
            const blockUI = new KTBlockUI(element, {
                overlayClass: "bg-body",
            });

            blockUI.block();
        });
    }

    // Handle tabs visibility
    const tabsVisibility = () => {
        const tabs = document.querySelectorAll('[data-kt-timeline-widget-4="tab"]');

        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', e => {
                // Week tab
                if(tab.getAttribute('href') === '#kt_timeline_widget_4_tab_week'){
                    initTimelineWeek();
                }

                // Month tab
                if(tab.getAttribute('href') === '#kt_timeline_widget_4_tab_month'){
                    initTimelineMonth();
                }

                // 2022 tab
                if(tab.getAttribute('href') === '#kt_timeline_widget_4_tab_2022'){
                    initTimeline2022();
                }
            });
        });
    }

    // Handle avatar path conflict
    const handleAvatarPath = () => {
        const avatars = document.querySelectorAll('[data-kt-timeline-avatar-src]');

        if(!avatars){
            return;
        }

        avatars.forEach(avatar => {
            avatar.setAttribute('src', avatar.getAttribute('data-kt-timeline-avatar-src'));
            avatar.removeAttribute('data-kt-timeline-avatar-src');
        });
    }

    // Public methods
    return {
        init: function () {
            initTimelineDay();
            handleBlockUI();
            tabsVisibility();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTTimelineWidget4;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTTimelineWidget4.init();
});

"use strict";

// Class definition
var KTMapsWidget1 = (function () {
    // Private methods
    var initMap = function () {
        // Check if amchart library is included
        if (typeof am5 === 'undefined') {
            return;
        }

        var element = document.getElementById("kt_maps_widget_1_map");

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

            // Create the map chart
            // https://www.amcharts.com/docs/v5/charts/map-chart/
            var chart = root.container.children.push(
                am5map.MapChart.new(root, {
                    panX: "translateX",
                    panY: "translateY",
                    projection: am5map.geoMercator(),
					paddingLeft: 0,
					paddingrIGHT: 0,
					paddingBottom: 0
                })
            );

            // Create main polygon series for countries
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
            var polygonSeries = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    geoJSON: am5geodata_worldLow,
                    exclude: ["AQ"],
                })
            );

            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
				fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-300')),
            });

            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: am5.color(KTUtil.getCssVariableValue('--bs-success')),
            });

            polygonSeries.mapPolygons.template.states.create("active", {
                fill: am5.color(KTUtil.getCssVariableValue('--bs-success')),
            });

            // Highlighted Series
            // Create main polygon series for countries
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
            var polygonSeriesHighlighted = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    //geoJSON: am5geodata_usaLow,
					geoJSON: am5geodata_worldLow,
					include: ['US', 'BR', 'DE', 'AU', 'JP']
                })
            );

            polygonSeriesHighlighted.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
            });

            var colors = am5.ColorSet.new(root, {});

            polygonSeriesHighlighted.mapPolygons.template.set(
                "fill",
				am5.color(KTUtil.getCssVariableValue('--bs-primary')),
            );

            polygonSeriesHighlighted.mapPolygons.template.states.create("hover", {
                fill: root.interfaceColors.get("primaryButtonHover"),
            });

            polygonSeriesHighlighted.mapPolygons.template.states.create("active", {
                fill: root.interfaceColors.get("primaryButtonHover"),
            });

            // Add zoom control
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-pan-zoom/#Zoom_control
            //chart.set("zoomControl", am5map.ZoomControl.new(root, {}));

            // Set clicking on "water" to zoom out
            chart.chartContainer
                .get("background")
                .events.on("click", function () {
                    chart.goHome();
                });

            // Make stuff animate on load
            chart.appear(1000, 100);
        }

        // On amchart ready
        am5.ready(function () {
            init();
        }); // end am5.ready()

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
            initMap();
        },
    };
})();

// Webpack support
if (typeof module !== "undefined") {
    module.exports = KTMapsWidget1;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTMapsWidget1.init();
});

"use strict";

// Class definition
var KTMapsWidget2 = (function () {
    // Private methods
    var initMap = function () {
        // Check if amchart library is included
        if (typeof am5 === 'undefined') {
            return;
        }

        var element = document.getElementById("kt_maps_widget_2_map");

        if (!element) {
            return;
        }

        // Root
        var root;

        var init = function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root = am5.Root.new(element);

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([am5themes_Animated.new(root)]);

            // Create the map chart
            // https://www.amcharts.com/docs/v5/charts/map-chart/
            var chart = root.container.children.push(
                am5map.MapChart.new(root, {
                    panX: "translateX",
                    panY: "translateY",
                    projection: am5map.geoMercator(),
					paddingLeft: 0,
					paddingrIGHT: 0,
					paddingBottom: 0
                })
            );

            // Create main polygon series for countries
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
            var polygonSeries = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    geoJSON: am5geodata_worldLow,
                    exclude: ["AQ"],
                })
            );

            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
				fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-300')),
            });

            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: am5.color(KTUtil.getCssVariableValue('--bs-success')),
            });

            polygonSeries.mapPolygons.template.states.create("active", {
                fill: am5.color(KTUtil.getCssVariableValue('--bs-success')),
            });

            // Highlighted Series
            // Create main polygon series for countries
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
            var polygonSeriesHighlighted = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    //geoJSON: am5geodata_usaLow,
					geoJSON: am5geodata_worldLow,
					include: ['US', 'BR', 'DE', 'AU', 'JP']
                })
            );

            polygonSeriesHighlighted.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
            });

            var colors = am5.ColorSet.new(root, {});

            polygonSeriesHighlighted.mapPolygons.template.set(
                "fill",
				am5.color(KTUtil.getCssVariableValue('--bs-primary')),
            );

            polygonSeriesHighlighted.mapPolygons.template.states.create("hover", {
                fill: root.interfaceColors.get("primaryButtonHover"),
            });

            polygonSeriesHighlighted.mapPolygons.template.states.create("active", {
                fill: root.interfaceColors.get("primaryButtonHover"),
            });

            // Add zoom control
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-pan-zoom/#Zoom_control
            //chart.set("zoomControl", am5map.ZoomControl.new(root, {}));

            // Set clicking on "water" to zoom out
            chart.chartContainer
                .get("background")
                .events.on("click", function () {
                    chart.goHome();
                });

            // Make stuff animate on load
            chart.appear(1000, 100);
        }

        // On amchart ready
        am5.ready(function () {
            init();
        }); // end am5.ready()

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
            initMap();
        },
    };
})();

// Webpack support
if (typeof module !== "undefined") {
    module.exports = KTMapsWidget2;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTMapsWidget2.init();
});


// On document ready
KTUtil.onDOMContentLoaded(function () {
    SenderLoadsCreated.init();
});

