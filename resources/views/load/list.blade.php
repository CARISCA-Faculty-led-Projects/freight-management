@extends('layout.app')
@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Load Board</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/fleet/drivers" class="text-muted text-hover-primary">Loads</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">List</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                <a href="/apps/customers/list"
                    class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Load Board</a>
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="/organization/add" class="btn btn-sm fw-bold btn-primary">Fleet Mangement</a>
                <!--end::Primary button-->
                <!--begin::Secondary button-->
                <a href="/organization/list"
                    class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Browse
                    Organizations</a>
                <!--end::Secondary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--begin::Content container-->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-ecommerce-order-filter="search"
                            class="form-control form-control-solid w-250px ps-12" placeholder="Search Load" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <!--begin::Flatpickr-->
                    <div class="input-group w-250px">
                        <input class="form-control form-control-solid rounded rounded-end-0"
                            placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                        <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                            <i class="ki-duotone ki-cross fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </button>
                    </div>
                    <!--end::Flatpickr-->
                    <div class="w-100 mw-150px">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                            <option></option>
                            <option value="all">All</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Completed">Completed</option>
                            <option value="Denied">Denied</option>
                            <option value="Expired">Expired</option>
                            <option value="Failed">Failed</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Refunded">Refunded</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Delivering">Delivering</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--begin::Add product-->
                    <a href="/load/add" class="btn btn-primary">Add Load</a>
                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-105px">Category</th>
                            <th class="text-end min-w-70px">Status</th>
                            <th class="text-end min-w-70px">Shipment Status</th>
                            <th class="text-end min-w-100px">Size</th>
                            <th class="text-end min-w-100px">Pickup</th>
                            <th class="text-end min-w-100px">Dropoff</th>
                            <th class="text-end min-w-100px">Handling</th>
                            <th class="text-end min-w-100px">Documentation</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        <tr>

                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" />
                                </div>
                            </td>
                            <td>Refrigerated Goods</td>
                            <td class="text-end pe-0" data-order="Delivering">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Approved</div>|
                                <div class="badge badge-light-success">Paid</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0" data-order="Delivering">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Assigned</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">1 unit, 30 Tons, 30*50*40</span>
                            </td>
                            <td class="text-end">Edum, Kumasi</td>
                            <td class="text-end">Tema, Accra</td>
                            <td data-kt-ecommerce-order-filter="order_id" class="text-end">
                                <span 
                                    class="badge badge-dark">Hazardous</span>
                                <span 
                                    class="badge badge-dark">Fragile</span>
                            </td>
                            <td data-kt-ecommerce-order-filter="order_id" class="text-end">
                                <a href="/apps/ecommerce/sales/details"
                                    class="text-gray-800 text-hover-primary fw-bold">documentation.pdf</a>
                            </td>

                           
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/details" class="menu-link px-3">View</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <!-- <div class="menu-item px-3">
                                        <a href="/load/edit" class="menu-link px-3">Edit</a>
                                    </div> -->
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/locate" class="menu-link px-3">Locate</a>
                                    </div>
                                    <!--end::Menu item-->
                                   
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/invoices/view" class="menu-link px-3">Invoice</a>
                                    </div>
                                    <!--end::Menu item-->
                                    

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"
                                            data-kt-ecommerce-order-filter="delete_row">Cancel</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <!-- Row 2 -->
						<!-- Row 4 -->
						<tr>
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="4" />
								</div>
							</td>
							<td>Chemicals</td>
							<td class="text-end pe-0" data-order="Delivered">
								<!--begin::Badges-->
								<div class="badge badge-light-success">Approved</div>|
								<div class="badge badge-light-danger">Unpaid</div>
								<!--end::Badges-->
							</td>
							<td class="text-end pe-0" data-order="Delivering">
                                <!--begin::Badges-->
                                <div class="badge badge-light-warning">On route</div>
                                <!--end::Badges-->
                            </td>
							<td class="text-end pe-0">
								<span class="fw-bold">10 units, 5 Tons, 15*30*25</span>
							</td>
							<td class="text-end">Takoradi, Western Region</td>
							<td class="text-end">Edum, Kumasi</td>

							<td data-kt-ecommerce-order-filter="order_id" class="text-end">
                               
                                <span 
                                    class="badge badge-dark">Fragile</span>
                            </td>
							<td data-kt-ecommerce-order-filter="order_id" class="text-end">
								<a href="/apps/ecommerce/sales/details"
									class="text-gray-800 text-hover-primary fw-bold">document.pdf</a>
							</td>
							
							<td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/details" class="menu-link px-3">View</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <!-- <div class="menu-item px-3">
                                        <a href="/load/edit" class="menu-link px-3">Edit</a>
                                    </div> -->
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/locate" class="menu-link px-3">Locate</a>
                                    </div>
                                    <!--end::Menu item-->
                                    
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/create-invoice" class="menu-link px-3">Invoice</a>
                                    </div>
                                    <!--end::Menu item-->
                                   

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"
                                            data-kt-ecommerce-order-filter="delete_row">Cancel</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
						</tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" />
                                </div>
                            </td>

                            <td>Electronics</td>
                            <td class="text-end pe-0" data-order="Pending">
                                <!--begin::Badges-->
                                <div class="badge badge-light-warning">Pending</div>|
                                <div class="badge badge-light-danger">Unpaid</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0" data-order="Pending">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Unassigned</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">5 units, 10 Tons, 20*40*30</span>
                            </td>
                            <td class="text-end">Tema Port, Accra</td>
                            <td class="text-end">Victoria Avenue, Nigeria</td>

                            <td data-kt-ecommerce-order-filter="order_id" class="text-end">
                               
                                <span 
                                    class="badge badge-dark">Fragile</span>
                            </td>
                            <td data-kt-ecommerce-order-filter="order_id" class="text-end">
                                <a href="/apps/ecommerce/sales/details"
                                    class="text-gray-800 text-hover-primary fw-bold">drtee.pdf</a>
                            </td>
                            
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/details" class="menu-link px-3">View</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/edit" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                   
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/offer-a-deal" class="menu-link px-3">Bid</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/invoices/create" class="menu-link px-3">Invoice</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/bid" class="menu-link px-3">Assign</a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"
                                            data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="3" />
                                </div>
                            </td>

                            <td>Furniture</td>
                            <td class="text-end pe-0" data-order="In Transit">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Rejected</div>|
                                <div class="badge badge-light-danger">Unpaid</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0" data-order="In Transit">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Unassigned</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">3 units, 15 Tons, 25*45*35</span>
                            </td>
                            <td class="text-end">Koforidua, Eastern Region</td>
                            <td class="text-end">Tema, Community 5, Accra</td>
							<td data-kt-ecommerce-order-filter="order_id" class="text-end">
                               
							   <span 
								   class="badge badge-dark">Hazardous</span>
						   </td>
						   <td data-kt-ecommerce-order-filter="order_id" class="text-end">
							   <a href="/apps/ecommerce/sales/details"
								   class="text-gray-800 text-hover-primary fw-bold">instructions.pdf</a>
						   </td>
						   <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/load/details" class="menu-link px-3">View</a>
                                    </div>
                                    <!--end::Menu item-->
                                
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"
                                            data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        </tr>

                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
</div>
</div>

</div>
<!--end:::Main-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::App-->
<!--begin::Drawers-->
</div>
<!--end::Modal - Invite Friend-->
<!--end::Modals-->
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";

</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/apps/ecommerce/sales/listing.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
@endsection
