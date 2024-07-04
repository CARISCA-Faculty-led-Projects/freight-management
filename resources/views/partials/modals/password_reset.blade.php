<!--begin::Modal - New Target-->
<div class="modal fade" id="password_reset_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"
                    data-bs-target="#password_reset_modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
            <form action="{{route('reset_pass',$mask)}}" method="post" class="form">
                @csrf
                <input type="hidden" name="type" value="{{$type}}">
                <input type="hidden" name="user" value="{{$mask}}">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Reset Password</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <span class="text-muted mb-5">New Account password will be sent to user</span>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
