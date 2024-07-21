   @extends('layout.roles.all')
   @section('content')
       <!--begin::Content-->
       <div id="kt_app_content" class="app-content flex-column-fluid">
           <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
               <!--begin::Toolbar container-->
               <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
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
                               <span class="text-muted text-hover-primary">Home</span>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item">
                               <span class="bullet bg-gray-400 w-5px h-2px"></span>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item text-muted">
                               <span class="text-muted text-hover-primary">Loads</span>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item">
                               <span class="bullet bg-gray-400 w-5px h-2px"></span>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item text-muted">Board</li>
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
           <div id="kt_app_content_container" class="app-container">
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
                               <input type="text" data-kt-ecommerce-order-filter="search" id="loadSearch"
                                   class="form-control form-control-solid w-250px ps-12" placeholder="Search Load" />
                           </div>
                           <!--end::Search-->
                       </div>
                       <!--end::Card title-->
                       <!--begin::Card toolbar-->
                       <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                           {{-- <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid w-55" id="orgAssigned"
                                data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="Assigned">Assigned</option>
                                <option value="Unassigned">Unassigned</option>
                            </select>
                            <!--end::Select2-->
                        </div> --}}
                           <!--begin::Add product-->
                           @if (whichUser()->getTable() == 'organizations')
                               <a href="{{ route('org.load.add') }}" class="btn btn-primary"> <span
                                       class="indicator-label">Add load</span></a>
                           @endif

                           <!--end::Add product-->
                       </div>
                       <!--end::Card toolbar-->
                   </div>
                   <!--end::Card header-->
                   <!--begin::Card body-->
                   <form
                       action="{{ route(whichUser()->getTable() == 'brokers' ? 'broker.loads.assign' : 'org.loads.assign') }}"
                       method="post">
                       @csrf
                       <div class="card-body pt-0" style="height: 50vh; overflow:auto">
                           <!--begin::Table-->
                           <table class="table align-middle table-row-dashed fs-6 gy-5" id="loads_table">
                               <thead>
                                   <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                                       <th class="w-10px pe-2">
                                           <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                               <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                   data-kt-check-target="#kt_ecommerce_sales_table .form-check-input"
                                                   value="1" />
                                           </div>
                                       </th>
                                       <th class="min-w-150px">#</th>
                                       <th class="min-w-105px">Category</th>
                                       <th class="min-w-105px">Image</th>
                                       <th class="min-w-105px">Sender</th>
                                       <th class="min-w-105px">Organization</th>
                                       <th class="text-center min-w-70px">Payment status</th>
                                       <th class="text-end min-w-70px">Shipment Status</th>
                                       <th class="text-end min-w-100px">Size</th>
                                       <th class="text-end min-w-100px">Pickup</th>
                                       <th class="text-end min-w-100px">Dropoff</th>
                                       <th class="text-end min-w-100px">Handling</th>
                                       <th class="text-end min-w-100px">Actions</th>
                                   </tr>
                               </thead>
                               <tbody class="fw-semibold text-gray-600">
                                   @foreach ($loads as $load)
                                       <tr>
                                           <td>
                                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                   <input class="form-check-input" name="loads[]" type="checkbox"
                                                       value="{{ $load->mask }}" />
                                               </div>
                                           </td>
                                           <td>{{ $load->mask }}</td>
                                           <td>{{ $load->load_type }}</td>
                                           <td><img class="w-20px" src="{{ asset('storage/loads/' . $load->image) }}"
                                                   alt="" srcset=""></td>
                                           <td>{{ $load->name }}</td>
                                           <td id="orgStat" class="text-center pe-0">
                                               <div
                                                   class="@if ($load->organization == 'Unassigned') badge badge-light-warning @endif">
                                                   {{ $load->organization }}</div>
                                           </td>
                                           {{-- <td class="@if ($load->organization == 'Unassigned') badge badge-light-danger @endif badge badge-light-danger">{{ $load->organization }}</td> --}}
                                           <td class="text-center pe-0">
                                               <!--begin::Badges-->
                                               <div
                                                   class="badge @if ($load->payment_status == 'Unpaid') badge-light-danger
                                                    @elseif($load->payment_status == 'Paid')
                                                    badge-light-success @endif">
                                                   {{ $load->payment_status }}</div>
                                               {{-- | <div
                                                class="badge @if ($load->payment_status == 'Unpaid') badge-light-warning text-dark
                                                    @elseif($load->payment_status == 'Paid')
                                                    badge-light-success
                                                    @else
                                                    badge-light-primary @endif">
                                                {{ $load->payment_status }}</div> --}}
                                               <!--end::Badges-->
                                           </td>
                                           {{-- shipment status --}}
                                           <td class="text-end pe-0">
                                               <!--begin::Badges-->
                                               <div
                                                   class="badge @if ($load->shipment_status == 'Unassigned') badge-light-danger
                                                @elseif($load->shipment_status == 'Onroute')
                                                badge-light-warning
                                                @elseif($load->shipment_status == 'Delivered')
                                                badge-light-success
                                                @elseif($load->shipment_status == 'Paid')
                                                badge-light-success
                                                @else
                                                badge-light-primary @endif">
                                                   {{ $load->shipment_status }}</div>
                                               <!--end::Badges-->
                                           </td>
                                           <td class="text-end pe-0">
                                               <span class="fw-bold">{{ $load->quantity }}, {{ $load->weight }} KG,
                                                   {{ $load->length }}*{{ $load->breadth }}*{{ $load->height }}</span>
                                           </td>
                                           <td class="text-end">{{ json_decode($load->pickup_address)->name }}</td>
                                           <td class="text-end">{{ json_decode($load->dropoff_address)->name }}</td>
                                           <td data-kt-ecommerce-order-filter="order_id" class="text-end">
                                               @php
                                                   $handling = explode(',', $load->handling);
                                               @endphp
                                               @foreach ($handling as $item)
                                                   <span class="badge badge-dark">{{ $item }}</span>
                                               @endforeach
                                           </td>
                                           <td class="text-end">
                                               <a href="#"
                                                   class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                   <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                               <!--begin::Menu-->
                                               <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                   data-kt-menu="true">
                                                   <!--begin::Menu item-->
                                                   <div class="menu-item px-3">
                                                       <a href="{{ route(whichUser()->getTable() == "brokers" ? 'broker.load.details' :     'loads.details', $load->mask) }}"
                                                           class="menu-link px-3">View</a>
                                                   </div>
                                                   <!--end::Menu item-->
                                                   <!--begin::Menu item-->
                                                   {{-- <div class="menu-item px-3">
                                                       <a href="{{ route('loads.edit', $load->mask) }}"
                                                           class="menu-link px-3">Edit</a>
                                                   </div> --}}
                                                   <!--end::Menu item-->
                                                   <!--begin::Menu item-->
                                                   {{-- <div class="menu-item px-3">
                                                       <a href="{{ route('loads.delete', $load->mask) }}"
                                                           onclick="return confirm('Confirm you want to delete load and subloads?')"
                                                           class="menu-link px-3">Delete</a>
                                                   </div> --}}
                                                   <!--end::Menu item-->
                                                   <div class="menu-item px-3">
                                                       <a href="{{ route('org.load.locate',$load->mask) }}"
                                                           class="menu-link px-3">Locate</a>
                                                   </div>
                                                   {{-- <div class="menu-item px-3">
                                                    <a href="#" id="locateBtn" data-bs-toggle="modal"
                                                        data-pickup-address="{{ $load->pickup_address }}"
                                                        data-load="{{ json_encode($load) }}"
                                                        data-bs-target="#view_load_location_modal"
                                                        class="menu-link px-3">Locate</a>
                                                </div> --}}
                                                   <!--begin::Menu item-->
                                                   <div class="menu-item px-3">
                                                       <a href="/load/invoices/view" class="menu-link px-3">Invoice</a>
                                                   </div>
                                                   <!--end::Menu item-->
                                               </div>
                                               <!--end::Menu-->
                                           </td>
                                       </tr>
                                   @endforeach

                               </tbody>
                           </table>
                           <!--end::Table-->
                       </div>
                       @error('loads')
                           <span class="text-danger pl-3">{{ $message }}</span>
                       @enderror

                       <!--end::Card body-->
                       <div class="card-footer">
                           <h3 for="">Assign checked loads to organization</h3> <small class="text-danger">Loads
                               will be reassigned if it has been already assigned to an organization</small>
                           <div class="d-flex mt-2 mb-3">
                               <input type="checkbox" name="shipment" id="" class="me-2" value="yes">
                               <label for="shipment">Create shipment after</label>
                           </div>
                           <div class="d-flex w-35">
                               <select name="organization_id" class="form-control basic-select2 w-25" id="">
                                   <option value="">--select--</option>
                                   @foreach ($orgs as $org)
                                       <option value="{{ $org->mask }}">{{ $org->name }}</option>
                                   @endforeach
                               </select>
                               <button type="submit" class="btn btn-warning ">Assign</button>
                           </div>
                       </div>
                   </form>
               </div>
               <!--end::Products-->
           </div>
           @include('partials.modals.view-load-location')
       </div>
   @endsection
