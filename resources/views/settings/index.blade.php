@extends('layout.roles.all')

@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="container mt-5">
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin:::Tabs-->
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_settings_general">
                            <i class="ki-duotone ki-home fs-2 me-2"></i> General
                        </a>
                    </li>
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    {{-- <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                            href="#kt_ecommerce_settings_store">
                            <i class="ki-duotone ki-shop fs-2 me-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                    class="path5"></span></i> Store
                        </a>
                    </li> --}}
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    {{-- <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                            href="#kt_ecommerce_settings_localization">
                            <i class="ki-duotone ki-compass fs-2 me-2"><span class="path1"></span><span
                                    class="path2"></span></i> Localization
                        </a>
                    </li> --}}
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    {{-- <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                            href="#kt_ecommerce_settings_products">
                            <i class="ki-duotone ki-package fs-2 me-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span></i> Products
                        </a>
                    </li> --}}
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    {{-- <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                            href="#kt_ecommerce_settings_customers">
                            <i class="ki-duotone ki-people fs-2 me-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                    class="path5"></span></i> Customers
                        </a>
                    </li> --}}
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->

                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
                        <!--begin::Form-->
                        <form id="kt_ecommerce_settings_general_form" class="form" action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>General Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Price per KM</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the price per kilometre driven by driver.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" name="price_per_km"
                                        value="{{ $settings->price_per_km }}" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Brokers percentage per load</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the percentage each broker gets on a brokered load">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid"
                                        name="brokers_percentage_pl" value="{{ $settings->brokers_percentage_pl}}" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Organizations Percentage per load</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the percentage each organization gets on a brokered load">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid"
                                        name="organizations_percentage_pl" value="{{ $settings->organizations_percentage_pl}}" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Systems percentage per load</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the percentage the system takes per load">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid"
                                        name="system_percentage_pl" value="{{ $settings->system_percentage_pl}}" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Action buttons-->
                            <div class="row py-5">
                                <div class="col-md-9 offset-md-3">
                                    <div class="d-flex">
                                        <!--begin::Button-->
                                        <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                            class="btn btn-light me-3">
                                            Cancel
                                        </button>
                                        <!--end::Button-->

                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">
                                                Save
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_settings_store" role="tabpanel">
                        <!--begin::Form-->
                        <form id="kt_ecommerce_settings_general_store" class="form" action="#">
                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Store Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Store Name</span>


                                        <span class="ms-1" data-bs-toggle="tooltip" title="Set the name of the store">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="store_name"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Store Owner</span>


                                        <span class="ms-1" data-bs-toggle="tooltip" title="Set the store owner's name">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="store_owner"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Address</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the store's full address.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid" name="store_address"></textarea>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Geocode</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enter the store geocode manually (optional)">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="store_geocode"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" name="store_email"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Phone</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="store_phone"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Fax</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="store_fax"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Action buttons-->
                            <div class="row py-5">
                                <div class="col-md-9 offset-md-3">
                                    <div class="d-flex">
                                        <!--begin::Button-->
                                        <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                            class="btn btn-light me-3">
                                            Cancel
                                        </button>
                                        <!--end::Button-->

                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">
                                                Save
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_settings_localization" role="tabpanel">
                        <!--begin::Form-->
                        <form id="kt_ecommerce_settings_general_localization" class="form" action="#">
                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Localization Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Country</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Select2-->
                                    <select id="kt_ecommerce_localization_country" class="form-select form-select-solid"
                                        name="localization_country" data-kt-ecommerce-settings-type="select2_flags"
                                        data-placeholder="Select a country">
                                        <option></option>
                                        <option value="AF"
                                            data-kt-select2-country="assets/media/flags/afghanistan.svg">
                                            Afghanistan</option>
                                        <option value="AX"
                                            data-kt-select2-country="assets/media/flags/aland-islands.svg">
                                            Aland Islands</option>
                                        <option value="AL" data-kt-select2-country="assets/media/flags/albania.svg">
                                            Albania</option>
                                        <option value="DZ" data-kt-select2-country="assets/media/flags/algeria.svg">
                                            Algeria</option>
                                        <option value="AS"
                                            data-kt-select2-country="assets/media/flags/american-samoa.svg">
                                            American Samoa</option>
                                        <option value="AD" data-kt-select2-country="assets/media/flags/andorra.svg">
                                            Andorra</option>
                                        <option value="AO" data-kt-select2-country="assets/media/flags/angola.svg">
                                            Angola
                                        </option>
                                        <option value="AI" data-kt-select2-country="assets/media/flags/anguilla.svg">
                                            Anguilla</option>
                                        <option value="AG"
                                            data-kt-select2-country="assets/media/flags/antigua-and-barbuda.svg">
                                            Antigua and Barbuda</option>
                                        <option value="AR" data-kt-select2-country="assets/media/flags/argentina.svg">
                                            Argentina</option>
                                        <option value="AM" data-kt-select2-country="assets/media/flags/armenia.svg">
                                            Armenia</option>
                                        <option value="AW" data-kt-select2-country="assets/media/flags/aruba.svg">
                                            Aruba
                                        </option>
                                        <option value="AU" data-kt-select2-country="assets/media/flags/australia.svg">
                                            Australia</option>
                                        <option value="AT" data-kt-select2-country="assets/media/flags/austria.svg">
                                            Austria</option>
                                        <option value="AZ"
                                            data-kt-select2-country="assets/media/flags/azerbaijan.svg">
                                            Azerbaijan</option>
                                        <option value="BS" data-kt-select2-country="assets/media/flags/bahamas.svg">
                                            Bahamas</option>
                                        <option value="BH" data-kt-select2-country="assets/media/flags/bahrain.svg">
                                            Bahrain</option>
                                        <option value="BD"
                                            data-kt-select2-country="assets/media/flags/bangladesh.svg">
                                            Bangladesh</option>
                                        <option value="BB" data-kt-select2-country="assets/media/flags/barbados.svg">
                                            Barbados</option>
                                        <option value="BY" data-kt-select2-country="assets/media/flags/belarus.svg">
                                            Belarus</option>
                                        <option value="BE" data-kt-select2-country="assets/media/flags/belgium.svg">
                                            Belgium</option>
                                        <option value="BZ" data-kt-select2-country="assets/media/flags/belize.svg">
                                            Belize
                                        </option>
                                        <option value="BJ" data-kt-select2-country="assets/media/flags/benin.svg">
                                            Benin
                                        </option>
                                        <option value="BM" data-kt-select2-country="assets/media/flags/bermuda.svg">
                                            Bermuda</option>
                                        <option value="BT" data-kt-select2-country="assets/media/flags/bhutan.svg">
                                            Bhutan
                                        </option>
                                        <option value="BO" data-kt-select2-country="assets/media/flags/bolivia.svg">
                                            Bolivia, Plurinational State of</option>
                                        <option value="BQ" data-kt-select2-country="assets/media/flags/bonaire.svg">
                                            Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA"
                                            data-kt-select2-country="assets/media/flags/bosnia-and-herzegovina.svg">
                                            Bosnia and Herzegovina</option>
                                        <option value="BW" data-kt-select2-country="assets/media/flags/botswana.svg">
                                            Botswana</option>
                                        <option value="BR" data-kt-select2-country="assets/media/flags/brazil.svg">
                                            Brazil
                                        </option>

                                        <option value="VI"
                                            data-kt-select2-country="assets/media/flags/virgin-islands.svg">
                                            Virgin Islands</option>
                                        <option value="YE" data-kt-select2-country="assets/media/flags/yemen.svg">
                                            Yemen
                                        </option>
                                        <option value="ZM" data-kt-select2-country="assets/media/flags/zambia.svg">
                                            Zambia
                                        </option>
                                        <option value="ZW" data-kt-select2-country="assets/media/flags/zimbabwe.svg">
                                            Zimbabwe</option>
                                    </select>
                                    <!--end::Select2-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Language</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="w-100">
                                        <!--begin::Select2-->
                                        <select class="form-select form-select-solid" name="localization_language"
                                            data-control="select2" data-placeholder="Select a language">
                                            <option></option>
                                            <option value="id">Bahasa Indonesia - Indonesian</option>
                                            <option value="msa">Bahasa Melayu - Malay</option>
                                            <option value="ca">Català - Catalan</option>
                                            <option value="cs">Čeština - Czech</option>
                                            <option value="da">Dansk - Danish</option>
                                            <option value="de">Deutsch - German</option>
                                            <option value="en">English</option>
                                            <option value="en-gb">English UK - British English</option>
                                            <option value="es">Español - Spanish</option>

                                            <option value="zh-tw">繁體中文 - Traditional Chinese</option>
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Currency</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="w-100">
                                        <!--begin::Select2-->
                                        <select class="form-select form-select-solid" name="localization_currency"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select a currency">
                                            <option></option>
                                            <option value="USD">US Dollar</option>
                                            <option value="Euro">Euro</option>
                                            <option value="Pound">Pound</option>
                                            <option value="AUD">Australian Dollar</option>
                                            <option value="JPY">Japanese Yen</option>
                                            <option value="KRW">Korean Won</option>
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Length Class</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the unit measurement for length.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="w-100">
                                        <!--begin::Select2-->
                                        <select class="form-select form-select-solid" name="localization_currency"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select a length class">
                                            <option></option>
                                            <option value="cm" selected>Centimeter</option>
                                            <option value="mm">Milimeter</option>
                                            <option value="in">Inch</option>
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Weight Class</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the unit measurement for weight.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="w-100">
                                        <!--begin::Select2-->
                                        <select class="form-select form-select-solid" name="localization_currency"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select a weight class">
                                            <option></option>
                                            <option value="kg" selected>Kilogram</option>
                                            <option value="g">Gram</option>
                                            <option value="lb">Pound</option>
                                            <option value="oz">Ounce</option>
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Action buttons-->
                            <div class="row py-5">
                                <div class="col-md-9 offset-md-3">
                                    <div class="d-flex">
                                        <!--begin::Button-->
                                        <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                            class="btn btn-light me-3">
                                            Cancel
                                        </button>
                                        <!--end::Button-->

                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">
                                                Save
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
                        <!--begin::Form-->
                        <form id="kt_ecommerce_settings_general_products" class="form" action="#">
                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Cateogries Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Category Product Count</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Show the number of products inside the subcategories in the storefront header category menu. Be warned, this will cause an extreme performance hit for stores with a lot of subcategories!">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="category_product_count" id="category_product_count_yes" checked />
                                            <label class="form-check-label" for="category_product_count_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="category_product_count" id="category_product_count_no" />
                                            <label class="form-check-label" for="category_product_count_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-16">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Default Items Per Page</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Determines how many items are shown per page.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        name="products_items_per_page" value="10" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Reviews Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Allow Reviews</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enable/disable review entries for registered customers.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="allow_reviews" id="allow_reviews_yes" checked />
                                            <label class="form-check-label" for="allow_reviews_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="allow_reviews" id="allow_reviews_no" />
                                            <label class="form-check-label" for="allow_reviews_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-16">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Allow Guest Reviews</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enable/disable review entries for public guest customers">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="allow_guest_reviews" id="allow_guest_reviews_yes" />
                                            <label class="form-check-label" for="allow_guest_reviews_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="allow_guest_reviews" id="allow_guest_reviews_no" checked />
                                            <label class="form-check-label" for="allow_guest_reviews_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Vouchers Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Minimum Vouchers</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Minimum number of vouchers customers can attach to an order">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        name="products_min_voucher" value="1" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-16">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Maximum Vouchers</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Maximum number of vouchers customers can attach to an order">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        name="products_max_voucher" value="10" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Tax Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Display Prices with Tax</span>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="product_tax" id="product_tax_yes" checked />
                                            <label class="form-check-label" for="product_tax_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="product_tax" id="product_tax_no" />
                                            <label class="form-check-label" for="product_tax_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Default Tax Rate</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Determines the tax percentage (%) applied to orders">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        name="products_tax_rate" value="15%" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Action buttons-->
                            <div class="row py-5">
                                <div class="col-md-9 offset-md-3">
                                    <div class="d-flex">
                                        <!--begin::Button-->
                                        <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                            class="btn btn-light me-3">
                                            Cancel
                                        </button>
                                        <!--end::Button-->

                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">
                                                Save
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_settings_customers" role="tabpanel">

                        <!--begin::Form-->
                        <form id="kt_ecommerce_settings_general_customers" class="form" action="#">
                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>Customers Settings</h2>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Customers Online</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enable/disable tracking customers online status.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_online" id="customers_online_yes" checked />
                                            <label class="form-check-label" for="customers_online_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_online" id="customers_online_no" />
                                            <label class="form-check-label" for="customers_online_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Customers Activity</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enable/disable tracking customers activity.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_activity" id="customers_activity_yes" checked />
                                            <label class="form-check-label" for="customers_activity_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_activity" id="customers_activity_no" />
                                            <label class="form-check-label" for="customers_activity_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Customer Searches</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enable/disable logging customers search keywords.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_searches" id="customers_searches_yes" checked />
                                            <label class="form-check-label" for="customers_searches_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_searches" id="customers_searches_no" />
                                            <label class="form-check-label" for="customers_searches_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Allow Guest Checkout</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Enable/disable guest customers to checkout.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_guest_checkout" id="customers_guest_checkout_yes" />
                                            <label class="form-check-label" for="customers_guest_checkout_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_guest_checkout" id="customers_guest_checkout_no"
                                                checked />
                                            <label class="form-check-label" for="customers_guest_checkout_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Login Display Prices</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Only show prices when customers log in.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex mt-3">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_login_prices" id="customers_login_prices_yes" />
                                            <label class="form-check-label" for="customers_login_prices_yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value=""
                                                name="customers_login_prices" id="customers_login_prices_no" checked />
                                            <label class="form-check-label" for="customers_login_prices_no">
                                                No
                                            </label>
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Max Login Attempts</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Set the max number of login attempts before the customer account is locked for 1 hour.">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->
                                </div>

                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        name="customer_login_attempts" value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Action buttons-->
                            <div class="row py-5">
                                <div class="col-md-9 offset-md-3">
                                    <div class="d-flex">
                                        <!--begin::Button-->
                                        <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                            class="btn btn-light me-3">
                                            Cancel
                                        </button>
                                        <!--end::Button-->

                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">
                                                Save
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->
@endsection
