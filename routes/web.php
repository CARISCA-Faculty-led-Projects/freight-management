<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sail\SailServiceProvider;

// ACTUAL ROUTES
Route::get('/', function () {
    return view('dashboards.index');
});


Route::get('/shipments/schedule', function () {
    return view('shipments.schedule');
});


Route::get('/organization/overview', function () {
    return view('organization.overview');
});
Route::get('/organization/add', function () {
    return view('organization.add-organization');
});
Route::get('/organization/list', function () {
    return view('organization.list');
});
Route::get('/organization/details', function () {
    return view('organization.details');
});
Route::get('/organization/edit', function () {
    return view('organization.edit-organization');
});
Route::get('/organization/invoices/add', function () {
    return view('organization.invoices.add');
});
Route::get('/organization/invoices/view', function () {
    return view('organization.invoices.view');
});


Route::get('/fleet/overview', function () {
    return view('fleet.overview');
});
Route::get('/fleet/locate', function () {
    return view('fleet.locate');
});
Route::get('/fleet/vehicles', function () {
    return view('fleet.vehicles.vehicles');
});
Route::get('/fleet/vehicles/details', function () {
    return view('fleet.vehicles.details');
});
Route::get('/fleet/vehicles/locate', function () {
    return view('fleet.vehicles.locate');
});
Route::get('/fleet/vehicles/add', function () {
    return view('fleet.vehicles.add');
});
Route::get('/fleet/vehicles/edit', function () {
    return view('fleet.vehicles.edit');
});
Route::get('/fleet/drivers', function () {
    return view('fleet.drivers.drivers');
});
Route::get('/fleet/drivers/details', function () {
    return view('fleet.drivers.details');
});
Route::get('/fleet/drivers/locate', function () {
    return view('fleet.drivers.locate');
});
Route::get('/fleet/drivers/edit', function () {
    return view('fleet.drivers.edit');
});
Route::get('/fleet/drivers/shipment_history', function () {
    return view('fleet.drivers.shipment_history');
});
Route::get('/fleet/drivers/driving_info', function () {
    return view('fleet.drivers.driving_info');
});
Route::get('/fleet/drivers/payment_info', function () {
    return view('fleet.drivers.payment_info');
});
Route::get('/fleet/drivers/payment_history', function () {
    return view('fleet.drivers.payment_history');
});
Route::get('/fleet/maintenance', function () {
    return view('fleet.maintenance');
});


Route::get('/load/overview', function () {
    return view('load.overview');
});
Route::get('/load/list', function () {
    return view('load.list');
});
Route::get('/load/add', function () {
    return view('load.add');
});
Route::get('/load/edit', function () {
    return view('load.edit');
});
Route::get('/load/details', function () {
    return view('load.details');
});
Route::get('/load/bids', function () {
    return view('load.bids');
});
Route::get('/load/locate', function () {
    return view('load.locate');
});
Route::get('/load/documents', function () {
    return view('load.documents');
});
Route::get('/load/offer-a-deal', function () {
    return view('load.offer-a-deal');
});
Route::get('/load/add-deal', function () {
    return view('load.add-deal');
});
Route::get('/load/create-invoice', function () {
    return view('load.create-invoice');
});


Route::get('/brokers/overview', function () {
    return view('brokers.overview');
});
Route::get('/brokers/add', function () {
    return view('brokers.add');
});
Route::get('/brokers/list', function () {
    return view('brokers.list');
});
Route::get('/brokers/edit', function () {
    return view('brokers.edit');
});
Route::get('/brokers/details', function () {
    return view('brokers.details');
});


Route::get('/senders/overview', function () {
    return view('senders.overview');
});
Route::get('/senders/list', function () {
    return view('senders.list');
});
Route::get('/senders/billing', function () {
    return view('senders.biling');
});




Route::get('/customers/overview', function () {
    return view('customers.overview');
});
Route::get('/customers/list', function () {
    return view('customers.list');
});
Route::get('/customers/add', function () {
    return view('customers.add');
});
Route::get('/customers/billing', function () {
    return view('customers.biling');
});

Route::get('/shipments/overview', function () {
    return view('shipments.overview');
});
Route::get('/shipments/list', function () {
    return view('shipments.list');
});
Route::get('/shipments/details', function () {
    return view('shipments.details');
});
Route::get('/shipments/tracking', function () {
    return view('shipments.tracking');
});


Route::get('/support/overview', function () {
    return view('support.overview');
});
Route::get('/support/messages', function () {
    return view('support.messages');
});


Route::get('/analytics/overview', function () {
    return view('analytics.overview');
});
Route::get('/analytics/brokers', function () {
    return view('analytics.brokers');
});
Route::get('/analytics/fleet', function () {
    return view('analytics.fleet');
});
Route::get('/analytics/load', function () {
    return view('analytics.load');
});
Route::get('/analytics/sales', function () {
    return view('analytics.sales');
});
Route::get('/analytics/security', function () {
    return view('analytics.security');
});
Route::get('/analytics/shipment', function () {
    return view('analytics.shipment');
});
Route::get('/analytics/users', function () {
    return view('analytics.users');
});

// END ACTUAL ROUTES
// Route::view('anyfolder', 'anyfolder.index')->name('anyfolder.index');
//DASHBOARD ENDS HERE

// LAYOUTS
Route::get('/layouts/light-header', function () {
    return view('layouts.light-header');
}); 
Route::get('/layouts/light-sidebar', function () {
    return view('layouts.light-sidebar');
}); 
Route::get('/layouts/dark-sidebar', function () {
    return view('layouts.dark-sidebar');
}); 
Route::get('/layouts/dark-header', function () {
    return view('layouts.dark-header');
}); 
// LAYOUTS ENDS HERE