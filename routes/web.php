<?php

use App\Http\Controllers\DriversController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\VehiclesController;
use App\Http\Livewire\Driver\AddDriver;
use App\Http\Livewire\Driver\UpdateDriver;
use App\Http\Livewire\Organization\AddOrganization;
use App\Http\Livewire\Vehicle\AddVehicle;
use App\Http\Livewire\Organisation;
use App\Http\Livewire\Organization\UpdateOrganization;
use App\Http\Livewire\Vehicle\UpdateVehicle;
use App\Http\Livewire\ViewOrganisations;
use Illuminate\Support\Facades\Route;
use Laravel\Sail\SailServiceProvider;

// ACTUAL ROUTES
Route::get('/', function () {
    return view('dashboards.index');
    // return view('livewire.organisation');
});


Route::get('/shipments/schedule', function () {
    return view('shipments.schedule');
});

Route::prefix('organization')->group(function () {
    Route::get('overview', ViewOrganisations::class);
    Route::get('add', AddOrganization::class);
    Route::controller(OrganizationsController::class)->group(function () {
        Route::get('list', 'index')->name('organizations');
        Route::get('{organization}/details', 'details')->name('org.details');
        Route::get('{organization}/delete', 'destroy')->name('org.delete');
    });
    Route::get('edit/{mask}', UpdateOrganization::class)->name('org.edit');
    Route::get('invoices/add', function () {
        return view('organization.invoices.add');
    });
    Route::get('invoices/view', function () {
        return view('organization.invoices.view');
    });
});



Route::prefix('fleet')->group(function () {
    Route::prefix('vehicles')->group(function () {
        Route::controller(VehiclesController::class)->group(function () {
            Route::get('/', 'index')->name('vehicles');
            Route::get('{vehicle}/delete', 'delete')->name('vehicles.delete');
            Route::get('{vehicles}/details', 'details')->name('vehicles.view');
            Route::get('locate', function () {
                return view('fleet.vehicles.locate');
            });
            Route::prefix('maintenance')->group(function () {
                Route::get('{vehicle}/list', 'maintenance_logs')->name('vehicle.maintenance_list');
                Route::get('{vehicle}/add', 'add_maintenance')->name('vehicle.maintenance.add');
                Route::post('{vehicle}/store', 'store_maintenance')->name('vehicle.maintenance.save');
                Route::get('{vehicle}/delete', 'delete_maintenance')->name('vehicle.maintenance.delete');
            });
        });
        Route::get('add', AddVehicle::class);
        Route::get('{mask}/edit', UpdateVehicle::class)->name('vehicles.edit');
    });
    Route::get('overview', function () {
        return view('fleet.overview');
    });
    Route::get('locate', function () {
        return view('fleet.locate');
    });

    Route::prefix('drivers')->group(function () {
        Route::controller(DriversController::class)->group(function () {
            Route::get('/', 'index')->name('drivers');
            Route::get('{driver}/delete', 'delete')->name('driver.delete');
            Route::get('{driver}/details', 'details')->name('drivers.view');
        });
        Route::get('add', AddDriver::class);
        Route::get('{mask}/edit', UpdateDriver::class)->name('driver.edit');

        Route::get('locate', function () {
            return view('fleet.drivers.locate');
        });
        Route::get('shipment_history', function () {
            return view('fleet.drivers.shipment_history');
        });
        Route::get('driving_info', function () {
            return view('fleet.drivers.driving_info');
        });
        Route::get('payment_info', function () {
            return view('fleet.drivers.payment_info');
        });
        Route::get('payment_history', function () {
            return view('fleet.drivers.payment_history');
        });
    });
    Route::get('maintenance', function () {
        return view('fleet.maintenance');
    });
});

Route::prefix('load')->group(function () {
    Route::get('overview', function () {
        return view('load.overview');
    });
    Route::get('list', function () {
        return view('load.list');
    });
    Route::get('add', function () {
        return view('load.add');
    });
    Route::get('edit', function () {
        return view('load.edit');
    });
    Route::get('details', function () {
        return view('load.details');
    });
    Route::get('bids', function () {
        return view('load.bids');
    });
    Route::get('locate', function () {
        return view('load.locate');
    });
    Route::get('documents', function () {
        return view('load.documents');
    });
    Route::get('offer-a-deal', function () {
        return view('load.offer-a-deal');
    });
    Route::get('add-deal', function () {
        return view('load.add-deal');
    });
    Route::get('invoices/create', function () {
        return view('load.invoices.create');
    });
    Route::get('invoices/edit', function () {
        return view('load.invoices.edit');
    });
    Route::get('invoices/view', function () {
        return view('load.invoices.view');
    });
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
Route::get('/senders/add', function () {
    return view('senders.add');
});
Route::get('/senders/edit', function () {
    return view('senders.edit');
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
Route::get('/shipments/add', function () {
    return view('shipments.add');
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
