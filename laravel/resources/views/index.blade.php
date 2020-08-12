<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head><!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../"><!--end::Base Path -->
    <meta charset="utf-8"/>

    <title>Dashboard</title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Page Vendors Styles(used by this page) -->
{{--                            <link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />--}}
<!--end::Page Vendors Styles -->

    @include('includes.global_styles')

</head>
<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
{{csrf_field()}}
<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
@include('includes.header_mobile')
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <!-- begin:: Aside -->
    @include('includes.aside')
    <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <!-- begin:: Header -->
        @include('includes.header')
        <!-- end:: Header -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-subheader__main">
                            <h3 class="kt-subheader__title">

                                Empty Page </h3>

                            <span class="kt-subheader__separator kt-hidden"></span>
                            <div class="kt-subheader__breadcrumbs">
                                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    General </a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    Empty Page </a>
                                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                            </div>
                        </div>
                        <div class="kt-subheader__toolbar">
                            <div class="kt-subheader__wrapper">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end:: Subheader -->

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    Content goes here...
                </div>
                <!-- end:: Content -->                </div>

            <!-- begin:: Footer -->
        @include('includes.footer')
        <!-- end:: Footer -->            </div>
    </div>
</div>

<!-- end:: Page -->


<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->

@include('includes.global_scripts')
<!--begin::Page Vendors(used by this page) -->
{{--<script src="{{URL::to('/')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>--}}
{{--<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>--}}
{{--<script src="{{URL::to('/')}}/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>--}}
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
{{--<script src="{{URL::to('/')}}/assets/js/demo1/pages/dashboard.js" type="text/javascript"></script>--}}
<!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
