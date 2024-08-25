$("document").ready(function () {
    $(".js-example-basic-single").select2();
    $(".js-example-basic-multiple").select2();

    $(".basic-select2").select2();


    // Add load pickup and drop off address select2
    $("#pickup_address").select2({
        ajax: {
            url: "api/v1/location/search",
            data: function (params) {
                var query = {
                    search: params.term,
                };
                return query;
            },
            processResults: function (data) {
                var results = [];
                data.forEach((element) => {
                    results.push({
                        id: element.place_id,
                        text: element.description,
                    });
                });
                return {
                    results: results,
                };
            },
        },
    });

    $("#dropoff_address").select2({
        ajax: {
            url: "api/v1/location/search",
            data: function (params) {
                var query = {
                    search: params.term,
                };
                return query;
            },
            processResults: function (data) {
                var results = [];
                data.forEach((element) => {
                    results.push({
                        id: element.place_id,
                        text: element.description,
                    });
                });
                return {
                    results: results,
                };
            },
        },
    });

    //    Load board datatable
    // let loadTable = new DataTable("#loads_table");

    // $("#loadSearch").on("keyup", function () {
    //     loadTable.search(this.value).draw();
    // });

    // Load
    function setupDataTable(identifier,data) {
        $(identifier).DataTable({
            ajax: '/loads'
        })
        let loadTable = new DataTable(identifier);

        $("#loadSearch").on("keyup", function () {
            loadTable.search(this.value).draw();
        });
    }

    // Table search
    let dataTable = new DataTable("#data_table");

    $("#itemSearch").on("keyup", function () {
        dataTable.search(this.value).draw();
    });

    //Shipments table datatable
    let shipmentsTable = new DataTable("#shipments_table");

    $("#shipmentSearch").on("keyup", function () {
        shipmentsTable.search(this.value).draw();
    });

    $("#orgAssigned").on("change", function () {
        // console.log($('#orgStat').text());
        table.columns(4).search(this.value).draw();
    });

    // Chat search for contact
    $("#search_users_chat").select2({
        placeholder: "Search name or email...",
        ajax: {
            url: "api/location/search",
            data: function (params) {
                var query = {
                    search: params.term,
                };
                return query;
            },
            processResults: function (data) {
                var results = [];
                data.forEach((element) => {
                    results.push({
                        id: element.place_id,
                        text: element.description,
                    });
                });
                return {
                    results: results,
                };
            },
        },
    });

    // Shipment route setup
    // $.each($('.stops'), function (key, element) {
    //     element.on('change', (event) => {
    //         console.log(event.target.value);
    // })

    // });
    $('.stops').on('change', (even) => {
        console.log(even.target.value);
    });

    $('#addSubLoad').on('click', function () {
        var total = $('#subLoads_group').children().length + 1;
        console.log($('#subLoads_group').children().length);
        addSubload(total);
    })

    function addSubload(curr, data = null) {

        var subloads = $('#subLoads_group');
        var categories = subloads.data('load-categories');
        // console.log();

        const child = `<div class="form-group mb-4">
        <div data-repeater-list="kt_ecommerce_add_category_conditions"
            class="d-flex flex-column gap-3">
            <div data-repeater-item=""
                class="form-group d-flex flex-wrap align-items-center gap-5">
                <!--begin::Select2-->
                <!--begin::Input-->
                <input type="text" class="form-control mw-100 w-200px"
                    name="subload[${curr}][name]"
                    value="${data != null ? data.name : ''}"
                    placeholder="Item Name" />
                <!--end::Input-->
                <div class="w-100 w-md-200px">
                    <select class="form-select load_types"
                        name="subload[${curr}][load_type]">
                        <option value="">--select category--</option>
                        ${categories.map((m) => {
            return `<option value="${m.name}">${m.name}</option>`
        })}
                    </select>
                </div>
                <!--end::Select2-->
                <!--begin::Input-->
                <input type="number" class="form-control mw-100 w-100px"
                    name="subload[${curr}][quantity]"
                    placeholder="Quantity" />
                <!--end::Input-->
                <!--begin::Input-->
                <input type="number" class="form-control mw-100 w-200px"
                    name="subload[${curr}][value]"
                    placeholder="Value eg. 120.00" />
                <!--end::Input-->
                <!--begin::Button-->
                <button type="button" data-subload="${curr}"
                    class="btn btn-sm btn-icon btn-light-danger delSubLoad">
                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <!--end::Button-->
            </div>
        </div>
    </div>`;
        subloads.append(child);

    }

    $('.subs').on('click', '.delSubLoad', function () {
        var subloads = $('#subLoads_group');
        const sub = $(this).data('subload') - 1;
        subloads.children()[sub].remove();
    });



});


