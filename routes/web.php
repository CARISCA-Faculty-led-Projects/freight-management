<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sail\SailServiceProvider;

// ACTUAL ROUTES
Route::get('/', function () {
    return view('dashboards.index');
});
Route::get('/fleet/overview', function () {
    return view('fleet.overview');
});
Route::get('/fleet/vehicles', function () {
    return view('fleet.vehicles');
});
Route::get('/fleet/drivers', function () {
    return view('fleet.drivers');
});


Route::get('/load/overview', function () {
    return view('load.overview');
});
Route::get('/load/list', function () {
    return view('load.list');
});
Route::get('/load/bids', function () {
    return view('load.bids');
});
Route::get('/load/documents', function () {
    return view('load.documents');
});

Route::get('/customers/overview', function () {
    return view('customers.overview');
});
Route::get('/customers/list', function () {
    return view('customers.list');
});

Route::get('/shipments/overview', function () {
    return view('shipments.overview');
});
Route::get('/shipments/list', function () {
    return view('shipments.list');
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

// END ACTUAL ROUTES

// FOR TEMPLATE
//DASHBOARD
Route::get('/dashboards/eccormece', function () {
    return view('dashboards.eccormece');
});

Route::get('/dashboards/projects', function () {
    return view('dashboards.projects');
});

Route::get('/dashboards/online-courses', function () {
    return view('dashboards.online-courses');
});

Route::get('/dashboards/marketing', function () {
    return view('dashboards.marketing');
});

Route::get('/dashboards/bidding', function () {
    return view('dashboards.bidding');
});

Route::get('/dashboards/pos-system', function () {
    return view('dashboards.pos-system');
});

Route::get('/dashboards/call-center', function () {
    return view('dashboards.call-center');
});

Route::get('/dashboards/logistics', function () {
    return view('dashboards.logistics');
});

Route::get('/dashboards/website-analytics', function () {
    return view('dashboards.website-analytics');
});

Route::get('/dashboards/finance-performance', function () {
    return view('dashboards.finance-performance');
});

Route::get('/dashboards/store-analytics', function () {
    return view('dashboards.store-analytics');
});

Route::get('/dashboards/social', function () {
    return view('dashboards.social');
});

Route::get('/dashboards/delivery', function () {
    return view('dashboards.delivery');
});

Route::get('/dashboards/crypto', function () {
    return view('dashboards.crypto');
});

Route::get('/dashboards/school', function () {
    return view('dashboards.school');
});

Route::get('/dashboards/podcast', function () {
    return view('dashboards.podcast');
});

Route::get('/dashboards/landing', function () {
    return view('dashboards.landing');
});

// Route::view('anyfolder', 'anyfolder.index')->name('anyfolder.index');
//DASHBOARD ENDS HERE


// USER PROFILE STARTS HERE
// OVERVIEW STARTS HERE
Route::get('/pages/user-profile/overview', function () {
    return view('pages.user-profile.overview');
});
Route::get('/pages/user-profile/projects', function () {
    return view('pages.user-profile.projects');
});
Route::get('/pages/user-profile/campaigns', function () {
    return view('pages.user-profile.campaigns');
});
Route::get('/pages/user-profile/documents', function () {
    return view('pages.user-profile.documents');
});
Route::get('/pages/user-profile/followers', function () {
    return view('pages.user-profile.followers');
});
Route::get('/pages/user-profile/activity', function () {
    return view('pages.user-profile.activity');
});

// OVERVIEW ENDS HERE
// USER PROFILE ENDS HERE


// ACCOUNT STARTS HERE
Route::get('/account/overview', function () {
    return view('account.overview');
});
Route::get('/account/settings', function () {
    return view('account.settings');
});
Route::get('/account/security', function () {
    return view('account.security');
});
Route::get('/account/activity', function () {
    return view('account.activity');
});
Route::get('/account/billing', function () {
    return view('account.billing');
});
Route::get('/account/statements', function () {
    return view('account.statements');
});
Route::get('/account/referrals', function () {
    return view('account.referrals');
});
Route::get('/account/api-keys', function () {
    return view('account.api-keys');
});
Route::get('/account/logs', function () {
    return view('account.logs');
});

// ACCOUNT ENDS HERE


// AUTHENTICATION STARTS HERE
Route::get('/autentication/layouts/corporate/sign-in', function () {
    return view('authentication.layouts.corporate.sign-in');
});
Route::get('/autentication/layouts/corporate/sign-up', function () {
    return view('authentication.layouts.corporate.sign-up');
});
Route::get('/autentication/layouts/corporate/two-factor', function () {
    return view('authentication.layouts.corporate.two-factor');
});
Route::get('/autentication/layouts/corporate/reset-password', function () {
    return view('authentication.layouts.corporate.reset-password');
});
Route::get('/autentication/layouts/corporate/new-password', function () {
    return view('authentication.layouts.corporate.new-password');
});


Route::get('/autentication/layouts/overlay/sign-in', function () {
    return view('authentication.layouts.overlay.sign-in');
});
Route::get('/autentication/layouts/overlay/sign-up', function () {
    return view('authentication.layouts.overlay.sign-up');
});
Route::get('/autentication/layouts/overlay/two-factor', function () {
    return view('authentication.layouts.overlay.two-factor');
});
Route::get('/autentication/layouts/overlay/reset-password', function () {
    return view('authentication.layouts.overlay.reset-password');
});
Route::get('/autentication/layouts/overlay/new-password', function () {
    return view('authentication.layouts.overlay.new-password');
});

Route::get('/autentication/layouts/creative/sign-in', function () {
    return view('authentication.layouts.creative.sign-in');
});
Route::get('/autentication/layouts/creative/sign-up', function () {
    return view('authentication.layouts.creative.sign-up');
});
Route::get('/autentication/layouts/creative/two-factor', function () {
    return view('authentication.layouts.creative.two-factor');
});
Route::get('/autentication/layouts/creative/reset-password', function () {
    return view('authentication.layouts.creative.reset-password');
});
Route::get('/autentication/layouts/creative/new-password', function () {
    return view('authentication.layouts.creative.new-password');
});

Route::get('/autentication/layouts/fancy/sign-in', function () {
    return view('authentication.layouts.fancy.sign-in');
});
Route::get('/autentication/layouts/fancy/sign-up', function () {
    return view('authentication.layouts.fancy.sign-up');
});
Route::get('/autentication/layouts/fancy/two-factor', function () {
    return view('authentication.layouts.fancy.two-factor');
});
Route::get('/autentication/layouts/fancy/reset-password', function () {
    return view('authentication.layouts.fancy.reset-password');
});
Route::get('/autentication/layouts/fancy/new-password', function () {
    return view('authentication.layouts.fancy.new-password');
});

Route::get('/autentication/email/card-declined', function () {
    return view('authentication.email.card-declined');
});
Route::get('/autentication/email/invitation', function () {
    return view('authentication.email.invitation');
});
Route::get('/autentication/email/password-change', function () {
    return view('authentication.email.password-change');
});
Route::get('/autentication/email/password-reset', function () {
    return view('authentication.email.password-reset');
});
Route::get('/autentication/email/promo-1', function () {
    return view('authentication.email.promo-1');
});
Route::get('/autentication/email/promo-2', function () {
    return view('authentication.email.promo-2');
});
Route::get('/autentication/email/promo-3', function () {
    return view('authentication.email.promo-3');
});
Route::get('/autentication/email/welcome-message', function () {
    return view('authentication.email.welcome-message');
});
Route::get('/autentication/email/reset-password', function () {
    return view('authentication.email.reset-password');
});
Route::get('/autentication/email/subscription-confirmed', function () {
    return view('authentication.email.subscription-confirmed');
});


Route::get('/autentication/extended/multi-steps-sign-up', function () {
    return view('authentication.extended.multi-steps-sign-up');
});
Route::get('/autentication/general/welcome', function () {
    return view('authentication.general.welcome');
});
Route::get('/autentication/general/verify-email', function () {
    return view('authentication.general.verify-email');
});
Route::get('/autentication/general/coming-soon', function () {
    return view('authentication.general.coming-soon');
});


Route::get('/autentication/general/password-confirmation', function () {
    return view('authentication.general.password-confirmation');
});
Route::get('/autentication/general/account-deactivated', function () {
    return view('authentication.general.account-deactivated');
});
Route::get('/autentication/general/error-404', function () {
    return view('authentication.general.error-404');
});
Route::get('/autentication/general/error-500', function () {
    return view('authentication.general.error-500');
});
// AUTHENTICATION ENDS HERE


// CORPORATE STARTS HERE
Route::get('/pages/about', function () {
    return view('pages.about');
});
Route::get('/pages/team', function () {
    return view('pages.team');
});
Route::get('/pages/contact', function () {
    return view('pages.contact');
});
Route::get('/pages/licenses', function () {
    return view('pages.licenses');
});
Route::get('/pages/sitemap', function () {
    return view('pages.sitemap');
});
// CORPORTATE ENDS HERE


// SOCIAL STARTS HERE 
Route::get('/pages/social/feeds', function () {
    return view('pages.social.feeds');
});
Route::get('/pages/social/activity', function () {
    return view('pages.social.activity');
});
Route::get('/pages/social/followers', function () {
    return view('pages.social.followers');
});
Route::get('/pages/social/settings', function () {
    return view('pages.social.settings');
});
// SOCIAL ENDS ENDS 


// ACTIVITY STARTS HERE 

// ACTIVITY ENDS HERE 

// BLOG STARTS HERE 
Route::get('/pages/blog/home', function () {
    return view('pages.blog.home');
});
Route::get('/pages/blog/post', function () {
    return view('pages.blog.post');
});
// BLOG ENDS HERE 

// FAQ STARTS HERE 
Route::get('/pages/faq/classic', function () {
    return view('pages.faq.classic');
});
Route::get('/pages/faq/extended', function () {
    return view('pages.faq.extended');
});
// FAQ ENDS HERE 

// PRICING STARTS HERE 
Route::get('/pages/pricing/column', function () {
    return view('pages.pricing.column');
});
Route::get('/pages/pricing/table', function () {
    return view('pages.pricing.table');
});
// PRICING ENDS HERE 

// CAREERS STARTS HERE 
Route::get('/pages/careers/list', function () {
    return view('pages.careers.list');
});
Route::get('/pages/careers/apply', function () {
    return view('pages.careers.apply');
});
// CAREERS ENDS HERE 

// UTILITIES STARTS HERE
Route::get('/utilities/modals/general/invite-friends', function () {
    return view('utilities.modals.general.invite-friends');
});
Route::get('/utilities/modals/general/select-users', function () {
    return view('utilities.modals.general.select-users');
});
Route::get('/utilities/modals/general/share-earn', function () {
    return view('utilities.modals.general.share-earn');
});
Route::get('/utilities/modals/general/upgrade-plan', function () {
    return view('utilities.modals.general.upgrade-plan');
});
Route::get('/utilities/modals/general/view-users', function () {
    return view('utilities.modals.general.view-users');
});


Route::get('/utilities/modals/forms/bidding', function () {
    return view('utilities.modals.forms.bidding');
});
Route::get('/utilities/modals/forms/create-api-key', function () {
    return view('utilities.modals.forms.create-api-key');
});
Route::get('/utilities/modals/forms/new-address', function () {
    return view('utilities.modals.forms.new-address');
});
Route::get('/utilities/modals/forms/new-card', function () {
    return view('utilities.modals.forms.new-card');
});
Route::get('/utilities/modals/forms/new-target', function () {
    return view('utilities.modals.forms.new-target');
});


Route::get('/utilities/modals/wizards/create-account', function () {
    return view('utilities.modals.wizards.create-account');
});
Route::get('/utilities/modals/wizards/create-app', function () {
    return view('utilities.modals.wizards.create-app');
});
Route::get('/utilities/modals/wizards/create-campaign', function () {
    return view('utilities.modals.wizards.create-campaign');
});
Route::get('/utilities/modals/wizards/create-project', function () {
    return view('utilities.modals.wizards.create-project');
});
Route::get('/utilities/modals/wizards/offer-a-deal', function () {
    return view('utilities.modals.wizards.offer-a-deal');
});
Route::get('/utilities/modals/wizards/top-up-wallet', function () {
    return view('utilities.modals.wizards.top-up-wallet');
});
Route::get('/utilities/modals/wizards/two-factor-autentication', function () {
    return view('utilities.modals.wizards.two-factor-authentication');
});


Route::get('/utilities/modals/search/select-location', function () {
    return view('utilities.modals.search.select-location');
});
Route::get('/utilities/modals/search/users', function () {
    return view('utilities.modals.search.users');
});


Route::get('/utilities/search/horizontal', function () {
    return view('utilities.search.horizontal');
});
Route::get('/utilities/search/select-location', function () {
    return view('utilities.search.select-location');
});
Route::get('/utilities/search/users', function () {
    return view('utilities.search.users');
});
Route::get('/utilities/search/vertical', function () {
    return view('utilities.search.vertical');
});


Route::get('/utilities/wizards/create-account', function () {
    return view('utilities.wizards.create-account');
});
Route::get('/utilities/wizards/create-app', function () {
    return view('utilities.wizards.create-app');
});
Route::get('/utilities/wizards/create-campaign', function () {
    return view('utilities.wizards.create-campaign');
});
Route::get('/utilities/wizards/create-project', function () {
    return view('utilities.wizards.create-project');
});
Route::get('/utilities/wizards/horizontal', function () {
    return view('utilities.wizards.horizontal');
});
Route::get('/utilities/wizards/offer-a-deal', function () {
    return view('utilities.wizards.offer-a-deal');
});
Route::get('/utilities/wizards/two-factor-autentication', function () {
    return view('utilities.wizards.two-factor-authenticaton');
});
Route::get('/utilities/wizards/vertical', function () {
    return view('utilities.wizards.vertical');
});
// UTTILITIES ENDS HERE

// WIDGETS STARTS HERE 
Route::get('/widgets/charts', function () {
    return view('widgets.charts');
});
Route::get('/widgets/feeds', function () {
    return view('widgets.feeds');
});
Route::get('/widgets/lists', function () {
    return view('widgets.lists');
});
Route::get('/widgets/mixed', function () {
    return view('widgets.mixed');
});
Route::get('/widgets/statistics', function () {
    return view('widgets.statistics');
});
Route::get('/widgets/tables', function () {
    return view('widgets.tables');
});
// WIDGETS ENDS HERE



// PROJECTS START HERE
Route::get('/apps/projects/activity', function () {
    return view('apps.projects.activity');
});
Route::get('/apps/projects/budget', function () {
    return view('apps.projects.budget');
});
Route::get('/apps/projects/files', function () {
    return view('apps.projects.files');
});
Route::get('/apps/projects/list', function () {
    return view('apps.projects.list');
});
Route::get('/apps/projects/project', function () {
    return view('apps.projects.project');
});
Route::get('/apps/projects/settings', function () {
    return view('apps.projects.settings');
});
Route::get('/apps/projects/targets', function () {
    return view('apps.projects.targets');
});
Route::get('/apps/projects/users', function () {
    return view('apps.projects.users');
});
// PROJECTS ENDS HERE


// ECCORMERCE STARTS HERE
// CATALOG
Route::get('/apps/ecommerce/catalog/add-category', function () {
    return view('apps.ecommerce.catalog.add-category');
});
Route::get('/apps/ecommerce/catalog/add-product', function () {
    return view('apps.ecommerce.catalog.add-product');
});
Route::get('/apps/ecommerce/catalog/categories', function () {
    return view('apps.ecommerce.catalog.categories');
});
Route::get('/apps/ecommerce/catalog/edit-category', function () {
    return view('apps.ecommerce.catalog.edit-category');
});
Route::get('/apps/ecommerce/catalog/edit-product', function () {
    return view('apps.ecommerce.catalog.edit-product');
});
Route::get('/apps/ecommerce/catalog/products', function () {
    return view('apps.ecommerce.catalog.products');
});
// CATALOG ENDS HERE

// SALES 
Route::get('/apps/ecommerce/sales/add-order', function () {
    return view('apps.ecommerce.sales.add-order');
});
Route::get('/apps/ecommerce/sales/details', function () {
    return view('apps.ecommerce.sales.details');
});
Route::get('/apps/ecommerce/sales/edit-order', function () {
    return view('apps.ecommerce.sales.edit-order');
});
Route::get('/apps/ecommerce/sales/listing', function () {
    return view('apps.ecommerce.sales.listing');
});
// SALES ENDS HERE

// CUSTOMERS
Route::get('/apps/ecommerce/customers/details', function () {
    return view('apps.ecommerce.customers.details');
});
Route::get('/apps/ecommerce/customers/listing', function () {
    return view('apps.ecommerce.customers.listing');
});
// CUSTOMERS ENDS HERE 

// REPORTS 
Route::get('/apps/ecommerce/reports/customer-orders', function () {
    return view('apps.ecommerce.reports.customer-orders');
});
Route::get('/apps/ecommerce/reports/returns', function () {
    return view('apps.ecommerce.reports.returns');
});
Route::get('/apps/ecommerce/reports/sales', function () {
    return view('apps.ecommerce.reports.sales');
});
Route::get('/apps/ecommerce/reports/shipping', function () {
    return view('apps.ecommerce.reports.shipping');
});
Route::get('/apps/ecommerce/reports/view', function () {
    return view('apps.ecommerce.reports.view');
});
// REPORTS ENDS HERE 

// SETTINGS 
Route::get('/apps/ecommerce/settings', function () {
    return view('apps.ecommerce.settings');
});
// SETTINGS ENDS HERE
// ECCORMERCE ENDS HERE



// CONTACTS STARTS HERE 
Route::get('/apps/contacts/add-contact', function () {
    return view('apps.contacts.add-contact');
});
Route::get('/apps/contacts/edit-contact', function () {
    return view('apps.contacts.edit-contact');
});
Route::get('/apps/contacts/getting-started', function () {
    return view('apps.contacts.getting-started');
});
Route::get('/apps/contacts/view-contact', function () {
    return view('apps.contacts.view-contact');
});
// CONTACTS END HERE 

// SUPPORT CENTER STARTS HERE 
Route::get('/apps/support-center/contact', function () {
    return view('apps.support-center.contact');
});

// TICKETS
Route::get('/apps/support-center/tickets/view', function () {
    return view('apps.support-center.tickets/view');
});
Route::get('/apps/support-center/tickets/list', function () {
    return view('apps.support-center.tickets/list');
});

// TUTORIALS
Route::get('/apps/support-center/tutorials/list', function () {
    return view('apps.support-center.tutorials/list');
});
Route::get('/apps/support-center/tutorials/post', function () {
    return view('apps.support-center.tutorials/post');
});

Route::get('/apps/support-center/faq', function () {
    return view('apps.support-center.faq');
});
Route::get('/apps/support-center/licenses', function () {
    return view('apps.support-center.licenses');
});
Route::get('/apps/support-center/overview', function () {
    return view('apps.support-center.overview');
});
// SUPPORT CENTER ENDS HERE 

// USER MANAGEMENT STARTS HERE
Route::get('/apps/user-management/users/list', function () {
    return view('apps.user-management.users/list');
});
Route::get('/apps/user-management/users/view', function () {
    return view('apps.user-management.users/view');
});

Route::get('/apps/user-management/roles/list', function () {
    return view('apps.user-management.roles.list');
});
Route::get('/apps/user-management/roles/view', function () {
    return view('apps.user-management.roles.view');
});
Route::get('/apps/user-management/permissions', function () {
    return view('apps.user-management.permissions');
});
// USER MANAGEMENT ENDS HERE 

// CUSTOMERS STARTS HERE 
Route::get('/apps/customers/getting-started', function () {
    return view('apps.customers.getting-started');
});
Route::get('/apps/customers/list', function () {
    return view('apps.customers.list');
});
Route::get('/apps/customers/view', function () {
    return view('apps.customers.view');
});
// CUSTOMERS ENDS HERE 

// SUBSCRIPTION STARTS HERE
Route::get('/apps/subscriptions/getting-started', function () {
    return view('apps.subscriptions.getting-started');
});
Route::get('/apps/subscriptions/list', function () {
    return view('apps.subscriptions.list');
});
Route::get('/apps/subscriptions/add', function () {
    return view('apps.subscriptions.add');
});
Route::get('/apps/subscriptions/view', function () {
    return view('apps.subscriptions.view');
});
// SUBSCRIPTION ENDS HERE 

// INVOICE STARTS HERE 
Route::get('/apps/invoices/view/invoice-1', function () {
    return view('apps.invoices.view.invoice-1');
});
Route::get('/apps/invoices/view/invoice-2', function () {
    return view('apps.invoices.view.invoice-2');
});
Route::get('/apps/invoices/view/invoice-3', function () {
    return view('apps.invoices.view.invoice-3');
});
Route::get('/apps/invoices/create', function () {
    return view('apps.invoices.create');
});
// INVOICE ENDS HERE 

// FILE MANAGER STARTS HERE
Route::get('/apps/file-manager/blank', function () {
    return view('apps.file-manager.blank');
}); 
Route::get('/apps/file-manager/files', function () {
    return view('apps.file-manager.files');
}); 
Route::get('/apps/file-manager/folders', function () {
    return view('apps.file-manager.folders');
}); 
Route::get('/apps/file-manager/settings', function () {
    return view('apps.file-manager.settings');
}); 
// FILE MANAGER ENDS HERE 

// INBOX STARTS HERE
Route::get('/apps/inbox/compose', function () {
    return view('apps.inbox.compose');
}); 
Route::get('/apps/inbox/listing', function () {
    return view('apps.inbox.listing');
}); 
Route::get('/apps/inbox/reply', function () {
    return view('apps.inbox.reply');
}); 
// INBOX ENDS HERE 

// CHAT STARTS HERE 
Route::get('/apps/chat/drawer', function () {
    return view('apps.chat.drawer');
}); 
Route::get('/apps/chat/group', function () {
    return view('apps.chat.group');
}); 
Route::get('/apps/chat/private', function () {
    return view('apps.chat.private');
}); 
// CHAT ENDS HERE 

// CALENDER
Route::get('/apps/calendar', function () {
    return view('apps.calendar');
}); 

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

// TOOLBARS
Route::get('/toolbars/accounting', function () {
    return view('toolbars.accounting');
}); 
Route::get('/toolbars/classic', function () {
    return view('toolbars.classic');
}); 
Route::get('/toolbars/extended', function () {
    return view('toolbars.extended');
}); 
Route::get('/toolbars/reports', function () {
    return view('toolbars.reports');
}); 
Route::get('/toolbars/saas', function () {
    return view('toolbars.saas');
}); 
// TOOLBARS ENDS HERE