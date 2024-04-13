@extends('layout.auth')

@section('page')
    Enter your login details to login
@endsection

@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-600px p-10 p-lg-15 mx-auto">

                <!--begin::Form-->
                <form class="form w-100"
                    action="{{route('authenticate')}}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center mb-4">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 mb-3">
                            Login to your Account
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="mb-5">
                            <label class="form-label fw-bold text-gray-900 fs-6">Select account type</label>
                            <select name="type" id="" class="form-control" required>
                                <option value="">--select--</option>
                                <option value="organizations">Organization</option>
                                <option value="drivers">Driver</option>
                                <option value="senders">Sender</option>
                                <option value="brokers">Broker</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--begin::Separator-->
                        <div class="d-flex align-items-center mb-10">
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        </div>
                        <!--end::Separator-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
                            name="email" autocomplete="off" />
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bold text-gray-900 fs-6">
                                Password
                            </label>
                            <!--end::Label-->

                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="" name="password" autocomplete="off" />

                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-2"></i> <i
                                        class="ki-duotone ki-eye fs-2 d-none"></i> </span>
                            </div>
                            <!--end::Input wrapper-->
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <!--end::Wrapper-->

                    </div>
                    <!--end::Input group--->
                    <!--begin::Input group-->
                    {{-- <div class="fv-row mb-10">
                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                        <input class="form-check-input" type="checkbox" name="toc" value="1" />
                        <span class="form-check-label fw-semibold text-gray-700 fs-6">
                            I Agree <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                        </span>
                    </label>
                </div> --}}
                    <!--end::Input group-->

                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Link-->
                        <div class="text-gray-500 fw-semibold fs-4">
                            Don't have an account?

                            <a href="{{ route('register') }}" class="link-primary fw-bold">
                                Register
                            </a>
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">
                                Submit
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
