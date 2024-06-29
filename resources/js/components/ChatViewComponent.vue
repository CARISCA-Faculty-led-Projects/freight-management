<template>
    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

        <!--begin::Header-->
        <div id="kt_header" class="header " data-kt-sticky="true" data-kt-sticky-name="header"
            data-kt-sticky-offset="{default: '200px', lg: '300px'}">

            <!--begin::Container-->
            <div class=" container d-flex align-items-stretch justify-content-between mt-3 mb-3"
                id="kt_header_container">

                <!--begin::Page title-->
                <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
                    data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

                    <!--begin::Heading-->
                    <h1 class="text-gray-900 fw-bold mt-1 mb-1 fs-2">
                        Chats </h1>
                    <!--end::Heading-->
                </div>
                <!--end::Page title--->

                <!--begin::Logo bar-->
                <div class="d-flex d-lg-none align-items-center flex-grow-1">
                    <!--begin::Aside Toggle-->
                    <div class="btn btn-icon btn-circle btn-active-light-primary ms-n2 me-1" id="kt_aside_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span
                                class="path2"></span></i>
                    </div>
                    <!--end::Aside Toggle-->

                    <!--begin::Logo-->
                    <a href="https://preview.keenthemes.com/rider-html-pro/index.html" class="d-lg-none">
                        <img alt="Logo"
                            src="https://preview.keenthemes.com/rider-html-pro/assets/media/logos/logo-compact.svg"
                            class="max-h-40px" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Logo bar-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                        <!--begin::Contacts-->
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header pt-7 d-flex justify-content-end" id="kt_chat_contacts_header">
                                <!--begin::Form-->
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-magnifier fs-1 text-gray-500" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_users_search"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <!--end::Icon-->

                                <!--end::Form-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-5" id="kt_chat_contacts_body"
                                style="height:50rem;overflow:hidden;">
                                <!--begin::List-->
                                <div class="scroll-y me-n5 pe-5 h-lg-auto" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header"
                                    data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body"
                                    data-kt-scroll-offset="5px">

                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol  symbol-45px symbol-circle "><span
                                                    class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">M</span>
                                            </div><!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody
                                                    Macy</a>
                                                <div class="fw-semibold text-muted">melody@altbox.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Lat seen-->
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">1 week</span>

                                            <span class="badge badge-sm badge-circle badge-light-danger">5</span>
                                        </div>
                                        <!--end::Lat seen-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed d-none"></div>
                                    <!--end::Separator-->

                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol  symbol-45px symbol-circle "><img alt="Pic" src="" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max
                                                    Smith</a>
                                                <div class="fw-semibold text-muted">max@kt.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Lat seen-->
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">20 hrs</span>

                                            <span class="badge badge-sm badge-circle badge-light-warning">9</span>
                                        </div>
                                        <!--end::Lat seen-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed d-none"></div>
                                    <!--end::Separator-->

                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol  symbol-45px symbol-circle "><span
                                                    class="symbol-label  bg-light-primary text-primary fs-6 fw-bolder ">N</span>
                                            </div><!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil
                                                    Owen</a>
                                                <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Lat seen-->
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">1 day</span>

                                        </div>
                                        <!--end::Lat seen-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed d-none"></div>
                                    <!--end::Separator-->

                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol  symbol-45px symbol-circle "><img alt="Pic"
                                                    src="http://localhost:8000/assets/media/avatars/300-23.jpg" /></div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan
                                                    Wilson</a>
                                                <div class="fw-semibold text-muted">dam@consilting.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Lat seen-->
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">2 weeks</span>

                                            <span class="badge badge-sm badge-circle badge-light-warning">9</span>
                                        </div>
                                        <!--end::Lat seen-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed d-none"></div>
                                    <!--end::Separator-->

                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol  symbol-45px symbol-circle "><span
                                                    class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">E</span>
                                            </div><!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                                    Bold</a>
                                                <div class="fw-semibold text-muted">emma@intenso.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Lat seen-->
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">1 day</span>

                                        </div>
                                        <!--end::Lat seen-->
                                    </div>
                                    <!--end::User-->


                                </div>
                                <!--end::List-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--end::Sidebar-->

                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                        <!--begin::Messenger-->
                        <div class="card" id="kt_chat_messenger" style="height:55rem;">
                            <!--begin::Card header-->
                            <div class="card-header" id="kt_chat_messenger_header">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <!--begin::User-->
                                    <div class="d-flex justify-content-center flex-column me-3">
                                        <a href="#"
                                            class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian
                                            Cox</a>

                                        <!--begin::Info-->
                                        <div class="mb-0 lh-1">
                                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                            <span class="fs-7 fw-semibold text-muted">Active</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <div class="me-n3">
                                        <button class="btn btn-sm btn-icon btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-dots-square fs-2"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span></i>
                                        </button>

                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                            data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Contacts
                                                </div>
                                            </div>
                                            <!--end::Heading-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_users_search">
                                                    Add Contact
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_invite_friends">
                                                    Invite Contacts

                                                    <span class="ms-2" data-bs-toggle="tooltip"
                                                        title="Specify a contact email to send an invitation">
                                                        <i class="ki-duotone ki-information fs-7"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span></i> </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Groups</span>
                                                    <span class="menu-arrow"></span>
                                                </a>

                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                            title="Coming soon">
                                                            Create Group
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                            title="Coming soon">
                                                            Invite Members
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                            title="Coming soon">
                                                            Settings
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                                    title="Coming soon">
                                                    Settings
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body" id="kt_chat_messenger_body" style="height:55rem;overflow:hidden;">
                                <!--begin::Messages-->
                                <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                                    data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body"
                                    data-kt-scroll-offset="5px">



                                    <!--begin::Message(in)-->
                                    <div class="d-flex justify-content-start mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="http://localhost:8000/assets/media/avatars/300-25.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-3">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                        Cox</a>
                                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                                </div>
                                                <!--end::Details-->

                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                data-kt-element="message-text">
                                                How likely are you to recommend our company to your friends and
                                                family ? </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(in)-->

                                    <!--begin::Message(out)-->
                                    <div class="d-flex justify-content-end mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-end">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Details-->
                                                <div class="me-3">
                                                    <span class="text-muted fs-7 mb-1">5 mins</span>
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                </div>
                                                <!--end::Details-->

                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="http://localhost:8000/assets/media/avatars/300-1.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                data-kt-element="message-text">
                                                Hey there, we’re just writing to let you know that you’ve been
                                                subscribed to a repository on GitHub. </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(out)-->

                                    <!--begin::Message(in)-->
                                    <div class="d-flex justify-content-start mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-3">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                        Cox</a>
                                                    <span class="text-muted fs-7 mb-1">1 Hour</span>
                                                </div>
                                                <!--end::Details-->

                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                data-kt-element="message-text">
                                                Ok, Understood! </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(in)-->

                                    <!--begin::Message(out)-->
                                    <div class="d-flex justify-content-end mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-end">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Details-->
                                                <div class="me-3">
                                                    <span class="text-muted fs-7 mb-1">2 Hours</span>
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                </div>
                                                <!--end::Details-->

                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                data-kt-element="message-text">
                                                You’ll receive notifications for all issues, pull requests!
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(out)-->

                                    <!--begin::Message(in)-->
                                    <div class="d-flex justify-content-start mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-3">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                        Cox</a>
                                                    <span class="text-muted fs-7 mb-1">3 Hours</span>
                                                </div>
                                                <!--end::Details-->

                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                data-kt-element="message-text">
                                                You can unwatch this repository immediately by clicking here: <a
                                                    href="https://keenthemes.com/">Keenthemes.com</a> </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(in)-->

                                    <!--begin::Message(out)-->
                                    <div class="d-flex justify-content-end mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-end">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Details-->
                                                <div class="me-3">
                                                    <span class="text-muted fs-7 mb-1">4 Hours</span>
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                </div>
                                                <!--end::Details-->

                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                data-kt-element="message-text">
                                                Most purchased Business courses during this sale! </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(out)-->

                                    <!--begin::Message(in)-->
                                    <div class="d-flex justify-content-start mb-10 ">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-3">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                        Cox</a>
                                                    <span class="text-muted fs-7 mb-1">5 Hours</span>
                                                </div>
                                                <!--end::Details-->

                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                data-kt-element="message-text">
                                                Company BBQ to celebrate the last quater achievements and goals.
                                                Food and drinks provided </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(in)-->

                                    <!--begin::Message(template for out)-->
                                    <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-end">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Details-->
                                                <div class="me-3">
                                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                </div>
                                                <!--end::Details-->

                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                data-kt-element="message-text">
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(template for out)-->

                                    <!--begin::Message(template for in)-->
                                    <div class="d-flex justify-content-start mb-10 d-none"
                                        data-kt-element="template-in">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-3">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                        Cox</a>
                                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                                </div>
                                                <!--end::Details-->

                                            </div>
                                            <!--end::User-->

                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                data-kt-element="message-text">
                                                Right before vacation season we have the next Big Deal for you.
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(template for in)-->
                                </div>
                                <!--end::Messages-->
                            </div>
                            <!--end::Card body-->

                            <!--begin::Card footer-->
                            <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                <!--begin::Input-->
                                <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                                    placeholder="Type a message">
                            </textarea>
                                <!--end::Input-->

                                <!--begin:Toolbar-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center me-2">
                                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                            data-bs-toggle="tooltip" title="Coming soon">
                                            <i class="ki-duotone ki-paper-clip fs-3"></i> </button>
                                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                            data-bs-toggle="tooltip" title="Coming soon">
                                            <i class="ki-duotone ki-exit-up fs-3"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </button>
                                    </div>
                                    <!--end::Actions-->

                                    <!--begin::Send-->
                                    <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                                    <!--end::Send-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card footer-->
                        </div>
                        <!--end::Messenger-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
                <!--begin::Modals-->

                <!--begin::Modal - View Users-->
                <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                <!--begin::Heading-->
                                <div class="text-center mb-13">
                                    <!--begin::Title-->
                                    <h1 class="mb-3">Browse Users</h1>
                                    <!--end::Title-->

                                    <!--begin::Description-->
                                    <div class="text-muted fw-semibold fs-5">
                                        If you need more info, please check out our
                                        <a href="#" class="link-primary fw-bold">Users Directory</a>.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Users-->
                                <div class="mb-15">
                                    <!--begin::List-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Emma Smith

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Art Director </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$23,000</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        M </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Melody Macy

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Marketing Analytic </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">melody@altbox.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$50,500</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Max Smith

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Software Enginer </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">max@kt.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$75,900</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Sean Bean

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Web Developer </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">sean@dellito.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$10,500</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Brian Cox

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            UI/UX Designer </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">brian@exchange.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$20,000</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-warning text-warning fw-semibold">
                                                        C </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Mikaela Collins

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Head Of Marketing </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">mik@pex.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$9,300</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Francis Mitcham

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Software Arcitect </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$15,000</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        O </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Olivia Wild

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            System Admin </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">olivia@corpmail.com
                                                    </div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$23,000</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-primary text-primary fw-semibold">
                                                        N </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Neil Owen

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Account Manager </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">owen.neil@gmail.com
                                                    </div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$45,800</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Dan Wilson

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Web Desinger </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">dam@consilting.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$90,500</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        E </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Emma Bold

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Corporate Finance </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">emma@intenso.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$5,000</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Ana Crown

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Customer Relationship </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$70,000</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 ">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-semibold">
                                                        A </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                                        Robert Doe

                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                            Marketing Executive </span>
                                                    </a>
                                                    <!--end::Name-->

                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted">robert@benko.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Sales-->
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-gray-900">$45,500</div>

                                                    <div class="fs-7 text-muted">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::List-->
                                </div>
                                <!--end::Users-->

                                <!--begin::Notice-->
                                <div class="d-flex justify-content-between">
                                    <!--begin::Label-->
                                    <div class="fw-semibold">
                                        <label class="fs-6">Adding Users by Team Members</label>

                                        <div class="fs-7 text-muted">If you need more info, please check budget
                                            planning</div>
                                    </div>
                                    <!--end::Label-->

                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" checked="checked" />

                                        <span class="form-check-label fw-semibold text-muted">
                                            Allowed
                                        </span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - View Users--><!--begin::Modal - Users Search-->
                <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body mx-5 mx-xl-18 pt-0 pb-15">
                                <!--begin::Content-->
                                <div class="text-center mb-13">
                                    <h1 class="mb-3">Search Users</h1>

                                    <!-- <div class="text-muted fw-semibold fs-5">
                                    Search for a contact
                                </div> -->
                                </div>
                                <!--end::Content-->

                                <!--begin::Search-->
                                <div id="kt_modal_users_search_handler" data-kt-search-keypress="true"
                                    data-kt-search-min-length="2" data-kt-search-enter="enter"
                                    data-kt-search-layout="inline">

                                    <!--begin::Form-->
                                    <form data-kt-search-element="form" class="w-100 position-relative mb-5"
                                        autocomplete="off">
                                        <!--begin::Hidden input(Added to disable form autocomplete)-->
                                        <input type="hidden" />
                                        <!--end::Hidden input-->

                                        <!--begin::Icon-->
                                        <i
                                            class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                                class="path1"></span><span class="path2"></span></i>
                                        <!--end::Icon-->

                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid px-15"
                                            @keyup="message_user($event)" placeholder="Search by full name or email..."
                                            data-kt-search-element="input" />
                                        <!--end::Input-->

                                        <!--begin::Spinner-->
                                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 me-5"
                                            ref="spinner" :class="{ 'd-none': !searching }">
                                            <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                                        </span>
                                        <!--end::Spinner-->

                                        <!--begin::Reset-->
                                        <!-- <span
                                        class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                        data-kt-search-element="clear">
                                        <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span
                                                class="path1"></span><span class="path2"></span></i> </span> -->
                                        <!--end::Reset-->
                                        <!-- <button class="btn btn-primary">Search</button> -->
                                    </form>
                                    <!--end::Form-->

                                    <!--begin::Wrapper-->
                                    <div class="py-5">

                                        <!--begin::Results(add d-none to below element to hide the users list by default)-->
                                        <div class="scroll-y"
                                            :class="{ 'd-none': search_results.length != 0 ? false : true }"
                                            style="height:30rem;">
                                            <div v-for="(result, index) in search_results" :key="index">
                                                <!--begin::Users-->
                                                <div class="mh-375px scroll-y me-n7 pe-7">
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4"
                                                        data-user-id="0">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center"
                                                            @click="sendMessage(result)">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic"
                                                                    src="url('https://images.unsplash.com/photo-1718708382517-3e89131709a8?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" />
                                                            </div>
                                                            <!--end::Avatar-->

                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <span
                                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{
                                                                    result.name }}</span>

                                                                <div class="fw-semibold text-muted">{{ result.from }}
                                                                </div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::User-->

                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed">
                                                    </div>
                                                    <!--end::Separator-->

                                                </div>
                                                <!--end::Users-->
                                            </div>



                                        </div>
                                        <!--end::Results-->
                                        <!--begin::Empty-->
                                        <div class="text-center"
                                            :class="{ 'd-none': search_results.length == 0 ? false : true }">
                                            <!--begin::Message-->
                                            <div class="fw-semibold py-10">
                                                <div class="text-gray-600 fs-3 mb-2">No users found</div>

                                                <div class="text-muted fs-6">Try to search by full
                                                    name or email...</div>
                                            </div>
                                            <!--end::Message-->

                                            <!--begin::Illustration-->
                                            <div class="text-center px-5">
                                                <img src="http://localhost:8000/assets/media/illustrations/dozzy-1/1.png"
                                                    alt="" class="w-100 h-200px h-sm-325px" />
                                            </div>
                                            <!--end::Illustration-->
                                        </div>
                                        <!--end::Empty-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Users Search--><!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</template>

<script>
import axiosClient from "@/axios"

export default {
    data() {
        return {
            search: null,
            searching: false,
            loading: false,
            search_results: [],
            chats: [],
        }
    },
    mounted() {

        // console.log(this.$refs);
        this.get_chats();
        // this.req_headers = JSON.parse(this.headers);
        sessionStorage.setItem('guard', this.guard);
        // console.log(this.req_headers);
    },
    props: ['guard'],
    methods: {
        get_chats() {
            axiosClient.get('user-chats').then(({ data }) => {
                this.loading = false;
                this.chats = data.data;
                console.log(this.chats);
            });
        },
        message_user(event) {
            this.searching = true;
            axiosClient.post('search-user', { search: event.target.value }).then(({ data }) => {
                this.searching = false;
                this.search_results = data.data;
            });
        },
        sendMessage(user) {
            console.log(user);
        }
    }
}
</script>

<style lang="scss" scoped></style>
