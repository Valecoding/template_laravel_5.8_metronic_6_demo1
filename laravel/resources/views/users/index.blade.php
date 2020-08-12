<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head><!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../"><!--end::Base Path -->
    <meta charset="utf-8"/>

    <title>Сотрудники</title>
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

                                Сотрудники </h3>

                            <span class="kt-subheader__separator kt-subheader__separator--v "></span>
                            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
                                           Всего {{$count}}                                     </span>

                                <form class="kt-margin-l-20" id="kt_subheader_search_form">
                                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                        <input type="text" class="form-control" placeholder="Поиск по ФИО..."
                                               id="generalSearch"
                                               @if (request()->has('f_search'))
                                               value="{{request('f_search')}}"
                                            @endif
                                        >
                                        <a class="kt-input-icon__icon kt-input-icon__icon--right "
                                           id="users__search_btn" style="cursor:pointer;">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
        <path
            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
            id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path
            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
            id="Path" fill="#000000" fill-rule="nonzero"></path>
    </g>
</svg>                                    <!--<i class="flaticon2-search-1"></i>-->
                                </span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="kt-subheader__toolbar">
                            <a href="{{URL::to('/')}}/users/add" class="btn btn-label-brand btn-bold">

                                Новый сотрудник </a>
                        </div>
                    </div>
                </div>
                <!-- end:: Subheader -->
                <style>
                    .table .cell-middle {
                        vertical-align: middle;
                    }

                    .table .table_tr_second_row td {
                        border-top: none;
                    }
                </style>
                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Фио</th>
                                        <th>Должность</th>
                                        <th>Дата рождения</th>
                                        <th>Трудовой договор</th>
                                        <th>Оформлен</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $row)
                                        <tr>
                                            <td scope="row cell-middle" width="75">
                                                <a href="#" class="kt-media kt-media--circle">
                                                    @if ($row->photo != null)
                                                        <img src="{{URL::to('/laravel/public')}}{{$row->photo}}"
                                                             alt="image">
                                                    @else
                                                        <img src="{{URL::to('/')}}/assets/media/users/default.jpg"
                                                             alt="image">
                                                    @endif

                                                </a>
                                            </td>
                                            <td colspan="2" class="cell-middle">
                                                <span class="font-weight-bold">{{$row->name}}</span>
                                                <br>
                                                {{$row->getGroup()}}
                                            </td>
                                            <td class="font-weight-bold cell-middle">
                                                @if ($row->birthday != null)
                                                    {{\Carbon\Carbon::parse($row->birthday)->format('d.m.Y')}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="cell-middle font-weight-bold">
                                                @if ($row->contract_number != null)
                                                    {{$row->contract_number}}
                                                    от @if ($row->contract_date != null) {{\Carbon\Carbon::parse($row->contract_date)->format('d.m.Y')}} @else
                                                        - @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="cell-middle">
                                                <span
                                                    class="kt-badge kt-badge--unified-brand kt-badge--inline kt-badge--bold">официально</span>
                                            </td>
                                            <td class="cell-middle font-weight-bold">
                                                @if ($row->firm != null)
                                                    {{$row->firm->name}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td width="75" class="cell-middle">
                                                <a class="kt-nav__link" href="{{URL::to('/')}}/users/edit/{{$row->id}}"
                                                   title="Редактирование"
                                                   style="font-size: 1.25rem; margin-right: 10px;">
                                                    <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                </a>
                                                <a class="kt-nav__link users__delete_btn"
                                                   href="{{URL::to('/')}}/users/delete/{{$row->id}}"
                                                   title="Удалить(деактивация)"
                                                   style="font-size: 1.25rem;">
                                                    <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                </a>

                                            </td>
                                        </tr>
                                        @if ($row->address_registration != null && $row->address_fact != null && $row->date_of_registration_for_work != null && $row->date_of_dismissal != null)
                                            <tr class="table_tr_second_row">
                                                <td></td>
                                                <td colspan="7" class="cell-middle">
                                                    <div class="d-flex align-content-between justify-content-between">
                                                        <div style="width: 35%">
                                                            <span class="font-weight-bold">Прописка:</span>
                                                            <br>
                                                            @if ($row->address_registration != null)
                                                                {{$row->address_registration}}
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                        <div style="width: 35%">
                                                            <span class="font-weight-bold">Факт. адрес:</span>
                                                            <br>
                                                            @if ($row->address_fact != null && $row->is_address_fact_as_reg == 0)
                                                                {{$row->address_fact}}
                                                            @elseif($row->address_registration != null && $row->is_address_fact_as_reg == 1)
                                                                {{$row->address_registration}}
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                        <div style="width: 15%">
                                                            <span class="font-weight-bold">Дата оформления:</span>
                                                            <br>
                                                            @if ($row->date_of_registration_for_work != null)
                                                                {{\Carbon\Carbon::parse($row->date_of_registration_for_work)->format('d.m.Y')}}
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                        <div style="width: 15%">
                                                            <span class="font-weight-bold">Дата уволнения:</span>
                                                            <br>
                                                            @if ($row->date_of_dismissal != null)
                                                                {{\Carbon\Carbon::parse($row->date_of_dismissal)->format('d.m.Y')}}
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!--Begin::Pagination-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin:: Components/Pagination/Default-->
                                    <!--begin: Pagination-->
                                    <div class="kt-pagination  kt-pagination--brand m-3">
                                        {{ $users->appends(request()->input())->links() }}
                                    </div>
                                    <!--end: Pagination-->
                                    <!--end:: Components/Pagination/Default-->    </div>
                            </div>
                            <!--End::Pagination-->
                        </div>
                    </div>
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

<!-- Start:: modal for deleting -->
<!-- Modal -->
<div class="modal fade" id="users__modal_delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">Удалить сотрудника?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" id="users__delete_btn_yes">Удалить</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: modal for deleting -->

@include('includes.global_scripts')
<!--begin::Page Vendors(used by this page) -->
{{--<script src="{{URL::to('/')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>--}}
{{--<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>--}}
{{--<script src="{{URL::to('/')}}/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>--}}
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script>
    $(function () {
        $('.users__delete_btn').on('click', function (e) {
            e.preventDefault();
            let el = $(this);
            let href = el.attr('href');
            $('#users__delete_btn_yes').attr('data-href', href);
            $('#users__modal_delete').modal();
        });

        $('#users__delete_btn_yes').on('click', function () {
            $('#users__modal_delete').modal('hide');
            var data = {
                _token: $('input[name=_token]').val(),
            };
            $.ajax({
                url: $(this).attr('data-href'),
                method: 'post',
                data: data,
                success: function (res) {
                    if (res.error) {
                        toastr.error(res.error);
                    } else {
                        toastr.success('Сотрудник удален!');
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    }
                },
                error: function error() {
                    toastr.error('Server error');
                }
            })
        });
        $('#users__search_btn').on('click', function (e) {
            e.preventDefault();
            var fls = [];
            if ($('#generalSearch').val() != '') {
                fls.push('f_search=' + $('#generalSearch').val());
            }


            if (fls.length > 0) {
                var link;
                link = "?" + fls.join("&");

                location.href = "{{URL::to('/users')}}" + link;
            } else {
                location.href = "{{URL::to('/users')}}";
            }
        });
    });
</script>
<!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
