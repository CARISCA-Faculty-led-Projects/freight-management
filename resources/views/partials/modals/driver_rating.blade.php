<!--begin::Modal - Broker - Add-->
<div class="modal fade" id="kt_modal_rate_driver" tabindex="-1" aria-hidden="true">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 10px;
        }

        body {
            width: 100%;
            min-height: 100vh;
            display: grid;
            place-content: center;
            font-family: Poppins, sans-serif;
            background: rgb(220, 179, 179);
        }

        .container {
            display: grid;
            place-content: center;
            padding: 2rem;
            text-align: center;
            min-height: 200px;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }

        .container::after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: black no-repeat center center / cover;
            filter: blur(7px) brightness(70%);
        }

        .info {
            margin-bottom: 1rem;
        }

        .emoji {
            font-size: 2rem;
            height: 20px;
            margin-bottom: 1rem;
        }

        .status {
            font-size: 2rem;
            color: honeydew;
        }

        .stars {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row-reverse;
        }

        .star {
            height: 40px;
            width: 40px;
            cursor: pointer;
        }

        .star svg {
            fill: none;
            width: 100%;
            height: 100%;
            stroke: none;
            fill: gray;
        }

        .selected svg,
        .selected~.star svg {
            fill: #ffc107;
        }

        .star:hover svg,
        .star:hover~.star svg {
            fill: gold;
        }
    </style>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('broker.save') }}" method="POST" id="kt_modal_add_customer_form">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Rate driver</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->`
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                        <!--end::Input group-->
                        <div class="container">
                            <div class="info">
                                <div class="emoji"></div>
                                <div class="status"></div>
                            </div>
                            <div class="stars">
                                <div class="star" data-rate="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <div class="star" data-rate="4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <div class="star" data-rate="3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <div class="star" data-rate="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <div class="star" data-rate="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">
                                <span class="required">Email</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Email address must be active">
                                    <i class="ki-duotone ki-information fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid"
                                placeholder="Enter your email" name="email" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_customer_cancel"
                        class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    <script>
       
        const stars = document.querySelectorAll(".star");
        const emojiEl = document.querySelector(".emoji");
        const statusEl = document.querySelector(".status");
        const defaultRatingIndex = 0;
        let currentRatingIndex = 0;

        const ratings = [{
                emoji: "",
                name: "Give us rating"
            },
            {
                emoji: "😔",
                name: "Very Poor"
            },
            {
                emoji: "🙁",
                name: "Poor"
            },
            {
                emoji: "🙂",
                name: "Good"
            },
            {
                emoji: "🤩",
                name: "Very Good"
            },
            {
                emoji: "🥰",
                name: "Excellent"
            }
        ];

        const checkSelectedStar = (star) => {
            if (parseInt(star.getAttribute("data-rate")) === currentRatingIndex) {
                return true;
            } else {
                return false;
            }
        };

        const setRating = (index) => {
            stars.forEach((star) => star.classList.remove("selected"));
            if (index > 0 && index <= stars.length) {
                document
                    .querySelector('[data-rate="' + index + '"]')
                    .classList.add("selected");
            }
            emojiEl.innerHTML = ratings[index].emoji;
            statusEl.innerHTML = ratings[index].name;
        };

        const resetRating = () => {
            currentRatingIndex = defaultRatingIndex;
            setRating(defaultRatingIndex);
        };

        stars.forEach((star) => {
            star.addEventListener("click", function() {
                if (checkSelectedStar(star)) {
                    resetRating();
                    return;
                }
                const index = parseInt(star.getAttribute("data-rate"));
                currentRatingIndex = index;
                setRating(index);
            });

            star.addEventListener("mouseover", function() {
                const index = parseInt(star.getAttribute("data-rate"));
                setRating(index);
            });

            star.addEventListener("mouseout", function() {
                setRating(currentRatingIndex);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            setRating(defaultRatingIndex);
        });
    </script>
</div>
<!--end::Modal - Broker - Add-->
