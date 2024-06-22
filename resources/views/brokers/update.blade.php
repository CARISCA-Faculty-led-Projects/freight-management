@extends( auth()->guard()->name == 'organizations' ?'layout.roles.organization' : 'layout.roles.broker')
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="card card-body w-lg-600px p-10 p-lg-15 mx-auto">

                <!--begin::Form-->
                <form class="form w-100" action="{{ route('org.broker.update',$broker->mask) }}" method="POST" id="">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center mb-4">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 mb-3">
                            Update a broker Account
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <label class="form-label fw-bold text-gray-900 fs-6">Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                                name="name" autocomplete="off" value="{{$broker->name}}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
                            name="email" autocomplete="off" required value="{{$broker->email}}" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Phone</label>
                        <input class="form-control form-control-lg form-control-solid" type="tel" placeholder=""
                            name="phone" autocomplete="off" required value="{{$broker->phone}}" />

                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">
                               Update
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Body-->
@endsection
