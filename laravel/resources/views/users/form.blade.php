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
<style>
    .nav-pills, .nav-tabs {
        margin-bottom: 0;
        border-bottom: none;
    }

    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
        border-color: transparent;
    }
</style>
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
                            @if (isset($user))
                                <h3 class="kt-subheader__title">{{$user->name}}</h3>
                            @else
                                <h3 class="kt-subheader__title">Новый сотрудник </h3>
                            @endif
                            <span class="kt-subheader__separator kt-subheader__separator--v kt-hidden"></span>
                            <div class="kt-subheader__breadcrumbs">
                                <a href="{{URL::to('/')}}/dashboard" class="kt-subheader__breadcrumbs-home"><i
                                        class="flaticon2-shelter"></i></a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    LigaService </a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="{{URL::to('/')}}/users" class="kt-subheader__breadcrumbs-link">Сотрудники</a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                @if (isset($user))
                                    <span
                                        class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Редактирование сотрудника</span>
                                @else
                                    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Новый сотрудник</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end:: Subheader -->
                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#" data-target="#kt_tabs_1_1">Основная
                                информация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">Документы</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__body">

                                    <form action="" id="user__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">ФИО:</label>
                                                    <input
                                                        type="text"
                                                        name="user__name" id="user__name" class="form-control"
                                                        placeholder=""
                                                    @if (isset($user))
                                                        value="{{$user->name}}"
                                                    @endif
                                                    >
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="">Должность</label>
                                                        <input
                                                            type="text"
                                                            name="user__position" id="user__position" class="form-control"
                                                            placeholder=""
                                                            @if (isset($user) && $user->position != null)
                                                            value="{{$user->position}}"
                                                            @endif
                                                        >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Оклад</label>
                                                        <input
                                                            type="text"
                                                            name="user__salary" id="user__salary" class="form-control"
                                                            placeholder=""
                                                            @if (isset($user) && $user->salary != null)
                                                            value="{{$user->salary}}"
                                                            @endif
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Прописка</label>
                                                    <input
                                                        type="text"
                                                        name="user__address_registration"
                                                        id="user__address_registration" class="form-control"
                                                        placeholder=""
                                                        @if (isset($user) && $user->address_registration != null)
                                                        value="{{$user->address_registration}}"
                                                        @endif
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Фактический адрес</label>
                                                    <input
                                                        type="text"
                                                        name="user__address_fact" id="user__address_fact"
                                                        class="form-control" placeholder=""
                                                        @if (isset($user) && $user->address_fact != null)
                                                        value="{{$user->address_fact}}"
                                                        @endif
                                                        @if (isset($user) && $user->is_address_fact_as_reg == 1)
                                                        disabled
                                                        @endif
                                                    >
                                                </div>
                                                <div class="form-group form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="user__is_address_fact_as_reg"
                                                               id="user__is_address_fact_as_reg"
                                                               value="1"
                                                               @if (isset($user) && $user->is_address_fact_as_reg == 1)
                                                               checked
                                                            @endif
                                                        >
                                                        Соответствует адресу в прописке
                                                    </label>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6"><label for="">Дата рождения</label>
                                                        <input
                                                            type="text"
                                                            name="user__birthday" id="user__birthday"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->birthday != null)
                                                            value="{{\Carbon\Carbon::parse($user->birthday)->format('d.m.Y')}}"
                                                            @endif
                                                        >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Уведомление</label>
                                                        <select class="form-control"
                                                                name="user__birthday_notification"
                                                                id="user__birthday_notification">
                                                            <option value="1" @if (isset($user) && $user->birthday_notification == 1) selected @endif>Уведомить за день</option>
                                                            <option value="2" @if (isset($user) && $user->birthday_notification == 2) selected @endif>Уведомить за 2 дня</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="">Дата оформления</label>
                                                        <input
                                                            type="text"
                                                            name="user__date_of_registration_for_work" id="user__date_of_registration_for_work"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->date_of_registration_for_work != null)
                                                            value="{{\Carbon\Carbon::parse($user->date_of_registration_for_work)->format('d.m.Y')}}"
                                                            @endif
                                                        >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Дата увольнения</label>
                                                        <input
                                                            type="text"
                                                            name="user__date_of_dismissal" id="user__date_of_dismissal"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->date_of_dismissal != null)
                                                            value="{{\Carbon\Carbon::parse($user->date_of_dismissal)->format('d.m.Y')}}"
                                                            @endif
                                                        >
                                                    </div>

                                                </div>
                                                <div class="form-group form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="user__is_working" id="user__is_working"
                                                               value="1"
                                                               @if (isset($user) && $user->is_working == 1)
                                                               checked
                                                            @endif
                                                        >
                                                        Работает по настоящее время
                                                    </label>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="">№ трудового договора</label>
                                                        <input
                                                            type="text"
                                                            name="user__contract_number" id="user__contract_number"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->contract_number != null)
                                                            value="{{$user->contract_number}}"
                                                            @endif
                                                        >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Дата договра</label>
                                                        <input
                                                            type="text"
                                                            name="user__contract_date" id="user__contract_date"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->contract_date != null)
                                                            value="{{\Carbon\Carbon::parse($user->contract_date)->format('d.m.Y')}}"
                                                            @endif
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="">Email</label>
                                                        <input
                                                            type="text"
                                                            name="user__email" id="user__email"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->email != null)
                                                            value="{{$user->email}}"
                                                            @endif
                                                        >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Password</label>
                                                        <input
                                                            type="text"  id="user__password"
                                                            class="form-control" placeholder=""
                                                            @if (isset($user) && $user->password != null)
                                                            value=""
                                                            @endif
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Фирма по трудовой</label>
                                                    <select class="form-control" name="user__firm_id"
                                                            id="user__firm_id">
                                                        @foreach($firms as $row)
                                                            <option value="{{$row->id}}" @if (isset($user) && $user->firm_id == $row->id) selected @endif>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Филиал Лига-сервис</label>
                                                    <select class="form-control" name="user__branch_id"
                                                            id="user__branch_id">
                                                        @foreach($branches as $row)
                                                            <option value="{{$row->id}}" @if (isset($user) && $user->branch_id == $row->id) selected @endif>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 offset-md-1 col-md-5">
                                                <label for="">Права:</label>
                                                {{--                                                <pre>{{var_dump($groups)}}</pre>--}}
                                                @foreach($groups as $key=>$value)
                                                    @if ($key != 'admin')
                                                       <div class="kt-margin-b-5 kt-margin-t-15 font-weight-bold">{{$key}}</div>
                                                    @endif

                                                    @foreach ($value as $row)
                                                        <div class="form-check kt-margin-b-10" >
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input user__group_id"
                                                                       name="user__group_id"
                                                                       value="{{$row->id}}"
                                                                @if (isset($user) && $user->group_id == $row->id)
                                                                    checked
                                                                @endif
                                                                >
                                                                {{$row->name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                                <style>
                                                    input[type='file']{
                                                        display: none;
                                                    }
                                                    .user__photo_wrap{
                                                        width: 80px;
                                                        height: 80px;
                                                        -webkit-border-radius: 50%;
                                                        -moz-border-radius: 50%;
                                                        border-radius: 50%;
                                                        background-size: cover;
                                                        background-position: 50% 50%;
                                                        background-repeat: no-repeat;
                                                        background-color: #bebcbc;
                                                    }

                                                </style>
                                                <div class="form-group kt-margin-t-80">
                                                    <label class="">Фото:</label>
                                                    <input type="file" id="user__photo" name="user__photo">
                                                    <div class="user__photo_container kt-margin-t-10 d-flex align-items-center">
                                                        <div class="user__photo_wrap" id="user__photo_wrap"
                                                        @if (isset($user) && $user->photo != null)
                                                            style="background-image: url({{URL::to('/laravel/public')}}{{$user->photo}});"
                                                        @endif
                                                        ></div>
                                                        <div class="user__photo_text d-flex flex-column kt-margin-l-25">
                                                            <a href="javascript:;" class="kt-margin-b-10" id="user__choose_photo">Выбрать фото</a>
                                                            <a href="javascript:;" class="" id="user__delete_photo">Удалить фото</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="id"
                                               @if (isset($user) && $user->id != null)
                                               value="{{$user->id}}"
                                            @endif
                                        >
                                    </form>

                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <a href="{{URL::to('/')}}/users" class="btn btn-secondary btn-widest kt-margin-r-10">Отмена</a>
                                                <button type="button" class="btn btn-brand btn-wide  user__save">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                            software like Aldus PageMaker including versions of Lorem Ipsum.
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

@include('includes.global_scripts')
<!--begin::Page Vendors(used by this page) -->
{{--<script src="{{URL::to('/')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>--}}
{{--<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>--}}
{{--<script src="{{URL::to('/')}}/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/locales/bootstrap-datepicker.ru.min.js"
        type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script>
    var KTBootstrapDatepicker = function () {

        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }

        // Private functions
        var demos = function () {
            // minimum setup
            $('#user__birthday, #user__contract_date, #user__date_of_registration_for_work, #user__date_of_dismissal').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                language:'ru',
                format: 'dd.mm.yyyy',
            });
        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    $(function (){
        let isdeletephoto  = 0;

        KTBootstrapDatepicker.init();

       $('#user__choose_photo').on('click',function (){
           $('#user__photo').trigger('click');
       });
        $('#user__photo').change(function () {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    $('.user__photo_wrap').css('background-image', 'url(' + e.target.result + ')');
                }
                reader.readAsDataURL(input.files[0]);
                isdeletephoto = 0;
            } else {
                $('.user__photo_wrap').css('background-image', 'none');
                isdeletephoto = 1;
            }
        });
        $('#user__delete_photo').on('click',function (){
            isdeletephoto = 1;
            $('.user__photo_wrap').css('background-image', 'none');
            $('#user__photo').val('');
        });

        $('#user__is_address_fact_as_reg').on('change',function (){
            let address_registration = $('#user__address_registration');
            let address_fact = $('#user__address_fact');
            if  ($(this).is(':checked')){
                address_fact.val(address_registration.val()).attr('disabled',true);
            } else {
                address_fact.attr('disabled',false);
            }
        });

        $('.user__save').on('click',function (){
            var btn = $(this);
            KTApp.progress(btn);
            KTApp.block('body');

            var data = {
                name: $('#user__name').val(),
                position: $('#user__position').val(),
                salary: $('#user__salary').val(),
                address_registration: $('#user__address_registration').val(),
                address_fact: $('#user__address_fact').val(),
                is_address_fact_as_reg: ($('#user__is_address_fact_as_reg').is(':checked')) ? '1' : '0',
                birthday: $('#user__birthday').val(),
                birthday_notification: $('#user__birthday_notification').val(),
                date_of_registration_for_work: $('#user__date_of_registration_for_work').val(),
                date_of_dismissal: $('#user__date_of_dismissal').val(),
                is_working: $('#user__is_working').val(),
                contract_number: $('#user__contract_number').val(),
                contract_date: $('#user__contract_date').val(),
                password: $('#user__password').val(),
                email: $('#user__email').val(),
                firm_id: $('#user__firm_id').val(),
                branch_id: $('#user__branch_id').val(),
                isdeletephoto: isdeletephoto,
                group_id: $('.user__group_id:checked').val(),

                _token: $('input[name=_token]').val(),
            };
            let id =$('#id').val();
            if (id != ''){
                data['id'] = id;
            }

            var formData = new FormData();
            var photo_input = document.querySelector('input[name="user__photo"]');
            if (photo_input != undefined && photo_input.files[0] != undefined) {
                formData.append('photo', photo_input.files[0], photo_input.files[0].name);
            } else {
                formData.append('photo', '');
            }

            $.each(data, function (key, value) {
                formData.append(key, value);
            });

            var form = $('#user__form');

            form.validate({
                rules: {
                    user__name: {
                        required: true,
                    },
                    user__email: {
                        required: true,
                    },

                },
                messages: {
                    user__name: {
                        required: "Обязательное поле",
                    },

                }
            });

            if (!form.valid()) {
                toastr.error('Заполните обязательные поля');
                KTApp.unprogress(btn);
                KTApp.unblock('body');
                return;
            }
            if ($('.user__group_id:checked').length == 0) {
                toastr.error('Выберите право доступа');
                KTApp.unprogress(btn);
                KTApp.unblock('body');
                return;
            }

            $.ajax({
                url: '{{URL::to('/')}}/users/store',
                method: 'post',
                data: formData,
                contentType: false, // важно - убираем форматирование данных по умолчанию
                processData: false, // важно - убираем преобразование строк по умолчанию
                success: function (res) {
                    if (res.error) {
                        KTApp.unprogress(btn);
                        KTApp.unblock('body');
                        toastr.error(res.error);
                    } else {
                        KTApp.unprogress(btn);
                        KTApp.unblock('body');
                        toastr.success('Данные сохранены!');
                        setTimeout(function () {
                            location.href = '{{URL::to('/')}}/users/';
                        }, 500);
                    }
                },
                error: function error() {
                    KTApp.unprogress(btn);
                    KTApp.unblock('body');
                    toastr.error('Server error');
                }
            });
        });

        $('.user__group_id').on('change',function (){
           let el = $(this);
            $('.user__group_id').prop('checked',false)
            el.prop('checked',true);
        });
    });
</script>
<!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
