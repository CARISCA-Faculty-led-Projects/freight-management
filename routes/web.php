<?php

use App\Http\Livewire\Load\AddLoad;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Load\UpdateLoad;
use App\Http\Livewire\Broker\AddBroker;
use App\Http\Livewire\Driver\AddDriver;
use App\Http\Livewire\Sender\AddSender;
use App\Http\Livewire\ViewOrganisations;
use App\Http\Controllers\LoadsController;
use App\Http\Livewire\Vehicle\AddVehicle;
use App\Http\Livewire\Driver\UpdateDriver;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\SendersController;
use App\Http\Controllers\VehiclesController;
use App\Http\Livewire\Broker\RegisterBroker;
use App\Http\Livewire\Driver\RegisterDriver;
use App\Http\Livewire\Sender\RegisterSender;
use App\Http\Livewire\Vehicle\UpdateVehicle;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Livewire\Organization\AddOrganization;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\Organization\UpdateOrganization;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Livewire\Organization\RegisterOrganization;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\ShipmentsController;
use App\Http\Livewire\Sender\UpdateSender;

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::get('register', 'register')->name('register');

        Route::post('login', 'authenticate')->name('authenticate');
        Route::post('register', 'store');
    });
    // Route::get('register', RegisterOrganization::class)->name('org.register');
    // Route::get('login', RegisterOrganization::class)->name('org.register');
    // Route::get('driver-register', RegisterDriver::class)->name('driver.register');
    // Route::get('sender-register', RegisterSender::class)->name('sender.register');
    // Route::get('broker-register', RegisterBroker::class)->name('broker.register');


    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware(['auth.general'])->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::get('logout', [AuthController::class, 'destroy'])
        ->name('signout');
});

// ACTUAL ROUTES
// Route::get('/', function () {
//     return view('dashboards.index');
//     // return view('livewire.organisation');
// });

Route::middleware(['auth.general'])->group(function(){
    Route::prefix('load')->group(function () {
        Route::get('overview', function () {
            return view('load.overview');
        });

        // Loads
        Route::controller(LoadsController::class)->group(function () {
            Route::get('list', 'index')->name('loads');
            Route::get('{load}/delete', 'delete')->name('loads.delete');
            Route::get('{load}/details', 'details')->name('loads.details');
        });
        Route::get('add', AddLoad::class);
        Route::get('{load_id}/edit', UpdateLoad::class)->name('loads.edit');


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

});

// Auth: organization start
Route::middleware('auth:organizations')->group(function () {
    Route::prefix('organization')->group(function () {
        Route::get('add', AddOrganization::class);
        Route::controller(OrganizationsController::class)->group(function () {
            Route::get('overview', 'overview')->name('org.overview');
            Route::get('list', 'index')->name('organizations');
            Route::get('{organization}/details', 'details')->name('org.details');
            Route::get('{organization}/delete', 'destroy')->name('org.delete');
        });
        Route::get('edit/{mask}', UpdateOrganization::class)->name('org.profile');
        Route::get('invoices/add', function () {
            return view('organization.invoices.add');
        });
        Route::get('invoices/view', function () {
            return view('organization.invoices.view');
        });
    });

    Route::prefix('drivers')->group(function () {
        Route::controller(DriversController::class)->group(function () {
            Route::get('/', 'index')->name('drivers');
            Route::get('{driver}/delete', 'delete')->name('driver.delete');
            Route::get('{driver}/details', 'details')->name('drivers.view');
        });
        Route::get('add', AddDriver::class)->name('driver.add');
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
                    Route::get('{log}/edit', 'edit_maintenance')->name('vehicle.maintenance.edit');
                    Route::post('{log}/update', 'update_maintenance')->name('vehicle.maintenance.update');
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


        Route::get('maintenance', [VehiclesController::class, 'all_schedules'])->name('schedules.list');
    });

    Route::get('/brokers/list', [BrokersController::class, 'list'])->name('broker.list');
    Route::get('/brokers/add', [BrokersController::class, 'add'])->name('broker.add');
    Route::get('/brokers/{broker}/update', [BrokersController::class, 'update'])->name('broker.update');
    Route::post('/brokers/{broker}/update', [BrokersController::class, 'saveUpdate'])->name('broker.update');
    Route::get('/brokers/{broker}/edit', [BrokersController::class, 'edit'])->name('broker.edit');
    Route::get('/brokers/{broker}/view', [BrokersController::class, 'show'])->name('broker.view');
    Route::get('/brokers/{broker}/delete', [BrokersController::class, 'delete'])->name('broker.delete');
    Route::get('/brokers/overview', [BrokersController::class, 'dashboard'])->name('brokers.stats');
    Route::post('/broker/save', [BrokersController::class, 'store'])->name('broker.save');


    // Shipments start
Route::controller(ShipmentsController::class)->group(function(){

    Route::get('/shipments/schedule', "schedule");
    Route::get('/shipments/list','list')->name('shipments.list');
    Route::post('/shipments/save','store')->name('shipments.save');
    Route::get('/shipments/add', 'add')->name('shipments.add');
});
    Route::get('/shipments/overview', function () {
        return view('shipments.overview');
    });
    Route::get('/shipments/details', function () {
        return view('shipments.details');
    });
    Route::get('/shipments/tracking', function () {
        return view('shipments.tracking');
    });

    // shipments end
});
// Auth organization end

Route::middleware('auth:drivers')->group(function () {
    Route::controller(DriversController::class)->group(function () {
        Route::get('driver/overview', 'overview')->name('driver.overview');
    });
});

Route::middleware('auth:senders')->group(function () {
    Route::prefix('senders')->group(function () {
        Route::get('edit/{mask}', UpdateSender::class)->name('sender.profile');

        Route::controller(SendersController::class)->group(function () {
            Route::get('overview', 'overview')->name('sender.overview');
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
        });
    });
});

Route::middleware('auth:brokers')->group(function () {
    Route::controller(BrokersController::class)->group(function () {
        Route::get('brokers/overview', 'overview')->name('broker.overview');
    });

});

// Route::middleware('auth:')->group(function(){

// });



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
