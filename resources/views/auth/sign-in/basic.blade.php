@extends('layout.auth')
@section('content')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
   <!--begin::Content-->
   <div class="d-flex flex-center flex-column flex-column-fluid">
       <!--begin::Wrapper-->
       <div class="w-lg-500px p-10 p-lg-15 mx-auto">

           <!--begin::Form-->
           <form class="form w-100" action="{{route('login')}}" novalidate="novalidate" method="POST" id="kt_sign_in_form" >
               <!--begin::Heading-->
               <div class="text-center mb-10">
                   <!--begin::Title-->
                   <h1 class="text-gray-900 mb-3">
                       Sign In </h1>
                   <!--end::Title-->

                   <!--begin::Link-->
                   <div class="text-gray-500 fw-semibold fs-4">
                       New Here?

                       <a href="../sign-up/basic.html" class="link-primary fw-bold">
                           Create an Account
                       </a>
                   </div>
                   <!--end::Link-->
               </div>
               <!--begin::Heading-->

               <!--begin::Input group-->
               <div class="fv-row mb-10">
                   <!--begin::Label-->
                   <label class="form-label fs-6 fw-bold text-gray-900">Email</label>
                   <!--end::Label-->

                   <!--begin::Input-->
                   <input class="form-control form-control-lg form-control-solid" type="text"
                       name="email" autocomplete="off" />
                   <!--end::Input-->
               </div>
               <!--end::Input group-->

               <!--begin::Input group-->
               <div class="fv-row mb-10">
                   <!--begin::Wrapper-->
                   <div class="d-flex flex-stack mb-2">
                       <!--begin::Label-->
                       <label class="form-label fw-bold text-gray-900 fs-6 mb-0">Password</label>
                       <!--end::Label-->

                       <!--begin::Link-->
                       <a href="password-reset.html" class="link-primary fs-6 fw-bold">
                           Forgot Password ?
                       </a>
                       <!--end::Link-->
                   </div>
                   <!--end::Wrapper-->

                   <!--begin::Input-->
                   <input class="form-control form-control-lg form-control-solid" type="password"
                       name="password" autocomplete="off" />
                   <!--end::Input-->
               </div>
               <!--end::Input group-->

               <!--begin::Actions-->
               <div class="text-center">
                   <!--begin::Submit button-->
                   <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                       <span class="indicator-label">
                           Continue
                       </span>

                       <span class="indicator-progress">
                           Please wait... <span
                               class="spinner-border spinner-border-sm align-middle ms-2"></span>
                       </span>
                   </button>
                   <!--end::Submit button-->
               </div>
               <!--end::Actions-->
           </form>
           <!--end::Form-->
       </div>
       <!--end::Wrapper-->
   </div>
   <!--end::Content-->

   <!--begin::Footer-->
   <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
       <!--begin::Links-->
       <div class="d-flex flex-center fw-semibold fs-6">
           <a href="#" class="text-muted text-hover-primary px-2" target="_blank">About</a>

           <a href="#" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
       </div>
       <!--end::Links-->
   </div>
   <!--end::Footer-->
</div>
<!--end::Body-->
@endsection
