<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.8
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboards, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Header-->
				<div class="bg-body d-flex flex-column-auto justify-content-cenrer align-items-start gap-2 gap-lg-4 py-4 px-10 overflow-auto" id="kt_app_header_nav">
					<a href="/index" class="flex-grow-1 mt-2">
						<i class="ki-duotone ki-arrow-left fs-2x text-gray-400">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
					</a>
					<a href="/authentication/email/welcome-message" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold">
						<i class="ki-duotone ki-like fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
						<span class="fs-8 fw-bold">Welcome
						<br />Message</span>
					</a>
					<a href="/authentication/email/reset-password" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold">
						<i class="ki-duotone ki-lock-2 fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
							<span class="path4"></span>
							<span class="path5"></span>
						</i>
						<span class="fs-8 fw-bold">Reset
						<br />Password</span>
					</a>
					<a href="/authentication/email/subscription-confirmed" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold">
						<i class="ki-duotone ki-notification-on fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
							<span class="path4"></span>
							<span class="path5"></span>
						</i>
						<span class="fs-8 fw-bold">Subscription
						<br />Confirmed</span>
					</a>
					<a href="/authentication/email/card-declined" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold active bg-light border border-2">
						<i class="ki-duotone ki-credit-cart fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
						<span class="fs-8 fw-bold">Card
						<br />Declined</span>
					</a>
					<a href="/authentication/email/promo-1" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold">
						<i class="ki-duotone ki-chart-pie-simple fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
						<span class="fs-8 fw-bold">Promotion
						<br />Email 1</span>
					</a>
					<a href="/authentication/email/promo-2" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold">
						<i class="ki-duotone ki-chart-line-star fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
						</i>
						<span class="fs-8 fw-bold">Promotion
						<br />Email 2</span>
					</a>
					<a href="/authentication/email/promo-3" class="btn btn-icon flex-column btn-text-gray-500 btn-icon-gray-300 btn-active-text-gray-700 btn-active-icon-gray-500 rounded-3 h-60px w-60px h-lg-90px w-lg-90px fw-semibold">
						<i class="ki-duotone ki-rocket fs-1 mb-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
						<span class="fs-8 fw-bold">Promotion
						<br />Email 3</span>
					</a>
					<a href="/authentication/email/card-declined?nav=0" class="flex-grow-1 text-end mt-2">
						<i class="ki-duotone ki-cross-square fs-2x text-gray-400">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
					</a>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
					<!--begin::Email template-->
					<style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
					<div id="#kt_app_body_content" style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
						<div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
								<tbody>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="text-align:center; margin:0 60px 34px 60px">
												<!--begin:Logo-->
												<div style="margin-bottom:10px">
													<a href="https://keenthemes.com" rel="noopener" target="_blank">
														<img alt="Logo" src="assets/media/email/logo-1.svg" style="height: 35px" />
													</a>
												</div>
												<!--end:Logo-->
												<!--begin:Media-->
												<div style="margin-bottom:15px">
													<img alt="Logo" src="assets/media/email/icon-positive-vote-4.svg" />
												</div>
												<!--end:Media-->
												<!--begin:Text-->
												<div style="font-size: 14px; font-weight: 500; margin-bottom: 40px; font-family:Arial,Helvetica,sans-serif;">
													<p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Credit Card Declined</p>
													<p style="margin-bottom:2px; color:#7E8299">Seems something went wrong with your payment</p>
												</div>
												<!--end:Text-->
												<!--begin:Text-->
												<div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
													<p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Dear Jane Cooper,</p>
													<p style="margin-bottom:2px; color:#5E6278">As a courtesy, we would like to notify you that your recent payment,</p>
													<p style="margin-bottom:2px; color:#5E6278">EUR16.93 EUR on 03/10/2022 for Zoom Account Number 500489234, was</p>
													<p style="margin-bottom:2px; color:#5E6278; margin-bottom:13px">unable to process successfully.</p>
													<p style="margin-bottom:2px; color:#5E6278">Feel free to call our customer care number:
													<span style="color:#50cd89; font-weight: 600">+31 6 3344 55 56</span>
													<p style="margin-bottom:2px; color:#5E6278">You may reach us at
													<a href="https://devs.keenthemes.com" target="_blank" style="color:#50cd89; font-weight: 600">devs.keenthemes.com</a></p>
													<!--end:Text-->
													<!--begin:Action-->
													<a href="/pages/contact" target="_blank" style="position: relative; left: 50%; transform: translateX(-50%);background-color:#50cd89; border-radius:6px; display:inline-block; margin-top:27px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;font-family:Arial,Helvetica,sans-serif;">Contact Us Now</a>
													<!--end:Action-->
													<!--end:Email content-->
													<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
														<td align="start" valign="start" style="padding-bottom: 10px;">
															<p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">Possible reasons</p>
															<!--begin::Wrapper-->
															<div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
																<!--begin::Item-->
																<div style="display:flex">
																	<!--begin::Media-->
																	<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
																		<img alt="Logo" src="assets/media/email/icon-polygon.svg" />
																		<span style="position: absolute">
																			<i class="ki-duotone ki-element-11 fs-3 text-success">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																				<span class="path4"></span>
																			</i>
																		</span>
																	</div>
																	<!--end::Media-->
																	<!--begin::Block-->
																	<div>
																		<!--begin::Content-->
																		<div>
																			<!--begin::Title-->
																			<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Complete your account</a>
																			<!--end::Title-->
																			<!--begin::Desc-->
																			<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Lots of people make mistakes while creating paragraphs Some writers just put whitespace in their text</p>
																			<!--end::Desc-->
																		</div>
																		<!--end::Content-->
																		<!--begin::Separator-->
																		<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
																		<!--end::Separator-->
																	</div>
																	<!--end::Block-->
																</div>
																<!--end::Item-->
																<!--begin::Item-->
																<div style="display:flex">
																	<!--begin::Media-->
																	<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
																		<img alt="Logo" src="assets/media/email/icon-polygon.svg" />
																		<span style="position: absolute">
																			<i class="ki-duotone ki-message-text-2 fs-3 text-success">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																			</i>
																		</span>
																	</div>
																	<!--end::Media-->
																	<!--begin::Block-->
																	<div>
																		<!--begin::Content-->
																		<div>
																			<!--begin::Title-->
																			<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Communication Tool</a>
																			<!--end::Title-->
																			<!--begin::Desc-->
																			<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Craft a headline that is both informative and will capture readers’ improtant attentions</p>
																			<!--end::Desc-->
																		</div>
																		<!--end::Content-->
																		<!--begin::Separator-->
																		<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
																		<!--end::Separator-->
																	</div>
																	<!--end::Block-->
																</div>
																<!--end::Item-->
																<!--begin::Item-->
																<div style="display:flex">
																	<!--begin::Media-->
																	<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
																		<img alt="Logo" src="assets/media/email/icon-polygon.svg" />
																		<span style="position: absolute">
																			<i class="ki-duotone ki-calendar-8 fs-3 text-success">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																				<span class="path4"></span>
																				<span class="path5"></span>
																				<span class="path6"></span>
																			</i>
																		</span>
																	</div>
																	<!--end::Media-->
																	<!--begin::Block-->
																	<div>
																		<!--begin::Content-->
																		<div>
																			<!--begin::Title-->
																			<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Task Planner</a>
																			<!--end::Title-->
																			<!--begin::Desc-->
																			<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Use images to enhance your post, improve its flow, add humor, and explain complex topics</p>
																			<!--end::Desc-->
																		</div>
																		<!--end::Content-->
																	</div>
																	<!--end::Block-->
																</div>
																<!--end::Item-->
															</div>
															<!--end::Wrapper-->
														</td>
													</tr>
													<tr>
														<td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
															<p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about customers!</p>
															<p style="margin-bottom:2px">Call our customer care number: +31 6 3344 55 56</p>
															<p style="margin-bottom:4px">You may reach us at
															<a href="https://devs.keenthemes.com" rel="noopener" target="_blank" style="font-weight: 600">devs.keenthemes.com</a>.</p>
															<p>We serve Mon-Fri, 9AM-18AM</p>
														</td>
													</tr>
													<tr>
														<td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
															<a href="#" style="margin-right:10px">
																<img alt="Logo" src="assets/media/email/icon-linkedin.svg" />
															</a>
															<a href="#" style="margin-right:10px">
																<img alt="Logo" src="assets/media/email/icon-dribbble.svg" />
															</a>
															<a href="#" style="margin-right:10px">
																<img alt="Logo" src="assets/media/email/icon-facebook.svg" />
															</a>
															<a href="#">
																<img alt="Logo" src="assets/media/email/icon-twitter.svg" />
															</a>
														</td>
													</tr>
													<tr>
														<td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
															<p>&copy; Copyright KeenThemes.
															<a href="https://keenthemes.com" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.</p>
														</td>
													</tr>
													<!--end::Email template-->
													<!--end::Body-->
													<!--end::Wrapper-->
													<!--end::Root-->
													<!--begin::Javascript-->
													<script>var hostUrl = "assets/";</script>
													<!--begin::Global Javascript Bundle(mandatory for all pages)-->
													<script src="assets/plugins/global/plugins.bundle.js"></script>
													<script src="assets/js/scripts.bundle.js"></script>
													<!--end::Global Javascript Bundle-->
													<!--end::Javascript-->
													<!--end::Body--></p>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>