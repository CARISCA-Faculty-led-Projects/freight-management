@extends('layout.roles.organization')
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
                        Vehicles</h1>
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
                            <a href="/fleet/vehicles" class="text-muted text-hover-primary">Vehicles</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ $vehicle->make }} {{ $vehicle->model }}</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Details</li>
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
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                @if ($vehicle->organization_id)
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-150px symbol-circle mb-7">
                                        <img src="{{asset('storage/logos/'.$vehicle_owner->image)}}" alt="image" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$vehicle_owner->name}}</a>
                                    <!--end::Name-->
                                    <!--begin::Email-->
                                    <a href="#"
                                        class="fs-5 fw-semibold text-muted text-hover-primary mb-6">{{$vehicle_owner->email}}</a>
                                    <!--end::Email-->

                                </div>
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bold">Details</div>
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--begin::Details content-->
                                <div class="pb-5 fs-6">

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Phone number</div>
                                    <div class="text-gray-600">
                                        {{$vehicle_owner->phone}}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Organizational Email</div>
                                    <div class="text-gray-600">
                                        {{$vehicle_owner->email}}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Physical Address</div>
                                    <div class="text-gray-600">{{$vehicle_owner->address}}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Region</div>
                                    <div class="text-gray-600">{{$vehicle_owner->region}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Country</div>
                                    <div class="text-gray-600">{{$vehicle_owner->country}}</div>
                                    <!--begin::Details item-->

                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                @endif
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    {{-- <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_customer_overview">General</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_customer_general">Load & Shipment</a>
                        </li>
                        <!--end:::Tab item-->

                    </ul> --}}
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
                            @if (!$vehicle->driver_id)
                            <!--begin::Notice-->
                            <div
                                class="notice d-flex bg-light-primary rounded border-warning border border-dashed rounded-3 p-6 mb-4">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Unassigned Truck!</h4>
                                        <div class="fs-6 text-gray-700">{{ $vehicle->make . ' ' . $vehicle->model }} has not
                                            been assigned to any
                                            driver
                                            <a class="fw-bold" href="{{route('vehicle.edit',$vehicle->mask)}}">Assign</a>.
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            @endif
                            @if ($driver)
                            <div class="row row-cols-2 row-cols-md-2 mb-6 mb-xl-9 mt-10">
                            <div class="col col-lg-12">
                                <!--begin::Driver Card-->
                                <div class="card bg-white hoverable h-100">
                                    
                                     <!--begin::Card Header-->
                                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                        <h3 class="card-title fw-bold text-dark mb-0">Driver</h3>
                                        <a href="organization/drivers/{{ $driver->mask }}/details" class="btn btn-sm btn-primary">Go to Driver</a>
                                    </div>
                                    <!--end::Card Header-->

                                    <!--begin::Card Body-->
                                    <div class="card-body d-flex p-0">
                                        <!-- Driver Image -->
                                        <div class="d-flex align-items-center justify-content-center bg-white p-3" style="width: 150px;">
                                            <img src="{{ asset('storage/logos/'.$driver->image) }}" alt="{{$driver->name}}" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                        </div>

                                        <!-- Driver Information -->
                                        <div class="flex-grow-1 p-4">
                                            <div class="text-dark fw-bold fs-2 mb-3">{{$driver->name}}</div>

                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-message-text fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Contact Phone
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ $driver->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-notification-2 fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Email
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ $driver->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-parcel-tracking fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Physical Address
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ $driver->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>DOB
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ $driver->dob }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Driver Card-->
                            </div>
                            </div>
                            @endif

                            <!--begin::Order summary-->
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                <!--begin::Order details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Vehicle Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Date Added
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            {{ date('D jS F, Y', strtotime($vehicle->created_at)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-wallet fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>Make
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->make }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Model
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->model }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Category
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->category}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Sub Category
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->subcategory}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Year
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->year }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Color
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->color }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>GPS System
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end"><i
                                                                class="badge badge-success">{{ $vehicle->gps }}</i></td>
                                                    </tr>


                                                </tbody>

                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Order details-->

                                <!--begin::Documents-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Documents</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-devices fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Insurance
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="View the invoice generated by this order.">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            @if ($vehicle->insurance_documents)
                                                            <a href="{{asset('storage/vehicles/'.$vehicle->insurance_documents)}}"
                                                            class=" btn btn-sm btn-primary">Download</a>
                                                            @else
                                                                <span class="text-gray-600 text-hover-primary">Unavailable</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Road Worthy
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="View the shipping manifest generated by this order.">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                             @if ($vehicle->road_worth_documents)
                                                            <a href="{{asset('storage/vehicles/'.$vehicle->road_worth_documents)}}"
                                                            class=" btn btn-sm btn-primary">Download</a>
                                                            @else
                                                                <span class="text-gray-600 text-hover-primary">Unavailable</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-discount fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Vehicle Ownership
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Reward value earned by customer when purchasing this order">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            @if ($vehicle->insurance_documents)
                                                            <a href="{{asset('storage/vehicles/'.$vehicle->owners_documents)}}"
                                                            class=" btn btn-sm btn-primary">Download</a>
                                                            @else
                                                                <span class="text-gray-600 text-hover-primary">Unavailable</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Documents-->
                            </div>
                            <!--end::Order summary-->

                            <!--begin::Order summary-->
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 mt-10">
                                <!--begin::Order details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Engine Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">

                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-wallet fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>Engine Type
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->engine_type }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-wallet fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>Transmission
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->transmission }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Fuel Efficiency
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->fuel_consumption }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Axle Configuration
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->axle_type }}</td>
                                                    </tr>


                                                </tbody>

                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Order details-->

                                <!--begin::Documents-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Owner Information</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Name
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle_owner->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Address
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle_owner->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Phone
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle_owner->phone }}</td>
                                                    </tr>



                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Documents-->
                            </div>
                            <!--end::Order summary-->
                            <!--begin::Order summary-->
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 mt-10">
                                <!--begin::Order details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Load Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">

                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-wallet fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>Preference
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">
                                                            @foreach (json_decode($vehicle->load_type) as $load)
                                                                <i class="badge badge-dark">{{ $load }}</i>
                                                            @endforeach
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ki-duotone ki-truck fs-2 me-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                    <span class="path5"></span>
                                                                </i>Max Weight
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end">{{ $vehicle->max_load_weight }}</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Order details-->

                                <!--begin::Order details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Route Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">
                                                    @foreach ($vehicle_routes as $route)
                                                        <tr>
                                                            <td class="text-muted">
                                                                <div class="d-flex align-items-center">
                                                                    {{ $route->origin }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <=>
                                                            </td>
                                                            <td class="fw-bold text-end">{{ $route->destination }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Order details-->
                            </div>
                            <!--end::Order summary-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_customer_general" role="tabpanel">

                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9 mt-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Load & Shipment History</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5"
                                        id="kt_table_customers_payment">
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">order No.</th>
                                                <th>Date</th>
                                                <th>Pickup / Delivery Location</th>
                                                <th class="min-w-100px">Cargo Type</th>
                                                <th class="min-w-100px">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                            <tr>
                                                <td>
                                                    <a href="/apps/ecommerce/sales/details"
                                                        class="text-gray-600 text-hover-primary mb-1">#15433</a>
                                                </td>
                                                <td>12/01/2020, 8:43 pm</td>
                                                <td>Kumasi <=> Tema</td>
                                                <td>Automobile</td>
                                                <td>
                                                    <span class="badge badge-light-success">Successful</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <a href="/apps/ecommerce/sales/details"
                                                        class="text-gray-600 text-hover-primary mb-1">#14385</a>
                                                </td>
                                                <td>03/09/2020, 1:08 am</td>
                                                <td>Edum <=> Edugo, Nigeria</td>
                                                <td>Seafood</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Transfered</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="/apps/ecommerce/sales/details"
                                                        class="text-gray-600 text-hover-primary mb-1">#14733</a>
                                                </td>
                                                <td>09/01/2020, 4:58 pm</td>
                                                <td>Bolgatanga <=> Bolivad, Indonesia</td>
                                                <td>Heavy Cargo</td>
                                                <td>
                                                    <span class="badge badge-light-warning">On route</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->

                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Content container-->
    </div>
@endsection
