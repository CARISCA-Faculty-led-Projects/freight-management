<?php

use App\Http\Livewire\Load\AddLoad;
use App\Http\Livewire\Load\LoadBoard;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Load\UpdateLoad;
use App\Http\Livewire\Broker\AddBroker;
use App\Http\Livewire\Driver\AddDriver;
use App\Http\Livewire\Sender\AddSender;
use App\Http\Livewire\ViewOrganisations;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoadsController;
use App\Http\Livewire\Load\SenderAddLoad;
use App\Http\Livewire\Vehicle\AddVehicle;
use App\Http\Livewire\Broker\EditShipment;
use App\Http\Livewire\Broker\UpdateBroker;
use App\Http\Livewire\Driver\UpdateDriver;
use App\Http\Livewire\Sender\UpdateSender;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\SendersController;
use App\Http\Controllers\VehiclesController;
use App\Http\Livewire\Broker\CreateShipment;
use App\Http\Livewire\Broker\RegisterBroker;
use App\Http\Livewire\Driver\RegisterDriver;
use App\Http\Livewire\Sender\RegisterSender;
use App\Http\Livewire\Vehicle\UpdateVehicle;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ShipmentsController;
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

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::get('admin', 'adminLogin');
        Route::post('admin', 'adminAuthenticate')->name('admin.login');
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
    Route::post('change_pass', [AuthController::class, 'changePass'])->name('change_pass');


    Route::get('logout', [AuthController::class, 'destroy'])
        ->name('signout');
});

// ACTUAL ROUTES
// Route::get('/', function () {
//     return view('dashboards.index');
//     // return view('livewire.organisation');
// });

Route::middleware('auth')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admin.overview');
    });
    // // Shipments start
    // Route::controller(ShipmentsController::class)->group(function () {
    //     Route::get('/shipments/schedule', "schedule");
    //     Route::get('shipments/list', 'list')->name('shipments.list');
    //     Route::post('shipments/save', 'store')->name('shipments.save');
    //     Route::get('shipments/add', 'add')->name('shipments.add');
    //     Route::post('shipments/create', 'create')->name('shipment.create');
    // });

    // Brokers
    Route::get('/brokers/list', [BrokersController::class, 'list'])->name('broker.list');
});

Route::middleware(['auth:organizations', 'auth:brokers', 'auth:senders'])->group(function () {
    Route::controller(LoadsController::class)->group(function () {
        Route::get('list', 'index')->name('loads');
        Route::get('{load}/delete', 'delete')->name('loads.delete');
        Route::get('{load}/details', 'details')->name('loads.details');
    });
    Route::get('add', AddLoad::class);
    Route::get('{load_id}/edit', UpdateLoad::class)->name('loads.edit');
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

    Route::prefix('organization')->group(function () {
        Route::prefix('brokers')->group(function () {
            Route::get('list', [BrokersController::class, 'list'])->name('org.broker.list');
            Route::get('add', [BrokersController::class, 'add'])->name('broker.add');
            Route::post('{broker}/update', [BrokersController::class, 'saveUpdate'])->name('org.broker.update');
            Route::get('{broker}/edit', [BrokersController::class, 'edit'])->name('broker.edit');
            Route::get('{mask}/profile',)->name('broker.profile');
            Route::get('{broker}/view', [BrokersController::class, 'show'])->name('broker.view');
            Route::get('{broker}/delete', [BrokersController::class, 'delete'])->name('broker.delete');
            Route::post('save', [BrokersController::class, 'store'])->name('broker.save');
            Route::get('{broker}/login', [BrokersController::class, 'loginAs'])->name('org.broker.login');
        });
        Route::prefix('load')->group(function () {
            Route::get('overview', function () {
                return view('load.overview');
            });

            // Loads
            Route::controller(LoadsController::class)->group(function () {
                Route::get('list', 'index')->name('loads');
                Route::get('{load}/delete', 'delete')->name('loads.delete');
                Route::get('{load}/details', 'details')->name('loads.details');
                Route::post('assign', 'orgLoadAssign')->name('org.loads.assign');
                Route::post('save', 'store')->name('org.load.save');
            });
            Route::get('add', AddLoad::class)->name('org.load.add');
            Route::get('{load_id}/edit', UpdateLoad::class)->name('loads.edit');
            // Route::get('s/board', [LoadsController::class, 'board'])->name('org.load.board');

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
    });

    Route::get('organizations/loads/board', LoadBoard::class)->name('org.load.board');



    // Shipments start
    Route::prefix('organization')->group(function () {
        Route::controller(ShipmentsController::class)->group(function () {
            Route::get('shipments/schedule', "schedule")->name('orga.shipments.schedule');
            Route::get('shipments/list', 'list')->name('org.shipments.list');
            Route::post('shipments/save', 'store')->name('shipments.save');
            Route::get('shipments/add', 'add')->name('shipments.add');
            // Route::post('shipments/create', 'create')->name('shipment.create');
        });
        Route::get('shipment/create', CreateShipment::class)->name('org.shipment.create');
        Route::get('shipment/{mask}/edit', EditShipment::class)->name('org.shipment.edit');
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
    Route::prefix('driver')->group(function () {
        Route::controller(DriversController::class)->group(function () {
            Route::get('overview', 'overview')->name('driver.overview');
            Route::get('shipments', 'shipments')->name('driver.shipments');
        });
        Route::get('{mask}/profile', UpdateDriver::class)->name('driver.profile');
        Route::prefix('shipment')->group(function () {
            Route::controller(ShipmentsController::class)->group(function () {
                Route::get('{shipment}/start-shipment', 'start_delivery')->name('driver.start-delivery');
                Route::get('{shipment}/loads', 'shipment_loads')->name('driver.shipment.loads.view');
            });
            Route::controller(LoadsController::class)->group(function () {
                Route::get('{load}/details', 'details')->name('shipment.load.details');
                Route::get('{load}/delivered', 'mark_delivered')->name('shipment.load.delivered');
            });
        });
    });
});

Route::middleware('auth:senders')->group(function () {
    Route::prefix('senders')->group(function () {
        Route::get('{mask}/profile', UpdateSender::class)->name('sender.profile');

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

        Route::prefix('load')->group(function () {
            Route::get('overview', function () {
                return view('load.overview');
            })->name('sender.loads.overview');

            // Loads
            Route::controller(LoadsController::class)->group(function () {
                Route::get('list', 's_index')->name('sender.loads');
                Route::get('{load}/delete', 'delete')->name('sender.loads.delete');
                Route::get('{load}/details', 'details')->name('sender.loads.details');
                Route::get('{load}/completed', 'completed')->name('sender.loads.complete');
            });
            Route::get('add', SenderAddLoad::class)->name('sender.load.add');
            Route::get('{load_id}/edit', UpdateLoad::class)->name('sender.load.edit');


            Route::get('bids', function () {
                return view('load.bids');
            })->name('sender.load.bid');
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
});

Route::middleware('auth:brokers')->group(function () {
    Route::prefix('brokers')->group(function () {
        Route::controller(BrokersController::class)->group(function () {
            Route::get('overview', 'overview')->name('broker.overview');
            Route::get('{broker}/update', 'update')->name('broker.update');
            Route::post('{broker}/update', 'saveUpdate')->name('broker.update');
            // Route::get('{broker}/edit', 'edit')->name('broker.edit');
            Route::get('{broker}/view', 'show')->name('broker.view');
        });
        Route::get('{mask}/profile', UpdateBroker::class)->name('broker.profile');
        Route::prefix('loads')->group(function () {
            Route::controller(LoadsController::class)->group(function () {
                Route::post('assign', 'brokerLoadAssign')->name('broker.loads.assign');
            });
        });
        Route::get('shipment/{mask}/edit', EditShipment::class)->name('broker.shipment.edit');
        // Shipments start
        Route::controller(ShipmentsController::class)->group(function () {
            Route::get('/shipments/schedule', "schedule");
            Route::get('/shipments/all', 'all_shipments')->name('broker.shipments.list');
            Route::get('shipment/create', CreateShipment::class)->name('broker.shipment.create');
            Route::post('shipment/save', 'create')->name('broker.shipment.save');
            Route::post('/shipments/save', 'store')->name('shipments.save');
            Route::get('/shipments/add', 'add')->name('shipments.add');
            Route::get('/shipments/{shipment}/delete', 'delete')->name('broker.shipment.delete');
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
    Route::get('loads/board', LoadBoard::class)->name('load.board');
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

Route::middleware(['auth:brokers'])->group(function () {
    Route::get('template', function () {
        return view('partials.chat');
    });
});

Route::middleware(['auth:organizations'])->group(function () {
    Route::get('test',function(){
        return view('home');
    });
});

