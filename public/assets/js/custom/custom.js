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
    let table = new DataTable("#loads_table");

    $("#dtaSearch").on("keyup", function () {
        table.search(this.value).draw();
    });

    $("#orgAssigned").on("change", function () {
        console.log(this.value);
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


});
