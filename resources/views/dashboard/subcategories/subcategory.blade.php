@extends('dashboard.layouts.app')

@section('styles')
    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- INTERNAL File Uploads css -->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!-- INTERNAL File Uploads css-->
    <link href="{{ asset('assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!-- INTERNAL Mutipleselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!-- INTERNAL Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sumoselect/sumoselect.css') }}">

    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/telephoneinput/telephoneinput.css') }}">

    <!-- INTERNAL Jquerytransfer css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jQuerytransfer/jquery.transfer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jQuerytransfer/icon_font/icon_font.css') }}">

    <!-- INTERNAL multi css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multi/multi.min.css') }}">
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <div class="btn-list" style="margin-inline: 10px">
                <a href="{{ route('index.category') }}" class="btn btn-primary"><i
                    class="fas fa-arrow-left"></i>
                  الرجوع الى الفئات</a>
                  
                <a href="{{ route('addSubCategory', ['id' => $category->id]) }}" class="btn btn-outline-primary" style="margin-inline: 10px"><i
                        class="fas fa-plus"></i>
                    إضافة فئة فرعية</a>
            </div>
           
        </div>
    </div>
    <!--End Page header-->

    <!--Row-->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الفئات الفرعية التى تنتمى لهذة الفئة الرئيسية</h3>
                </div>
                <div class="card-body">

                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">اسم الفئة الرئيسة</label>
                        <input type="text" name="country_name" class="form-control" value="{{ $category->category_name }}"
                            readonly>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الفئات الفرعية</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>اسم الفئة الفرعية</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($subCategory as $subcateg)
                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>{{ $subcateg->subcategory_name }}
                                            </td>
                                            <td>
                                                <div class="btn-group mt-2 mb-2">
                                                    <button type="button" class="btn btn-primary btn-pill dropdown-toggle"
                                                        data-bs-toggle="dropdown">
                                                        العمليات <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li class="dropdown-plus-title">
                                                            Dropdown
                                                            <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                        </li>
                                                        <li><a href="{{ route('editSubCategory', ['id' => $subcateg->id]) }}">تعديل
                                                                الفئة الفرعية &nbsp;<i class="fas fa-edit" style="color: green"></i></a></li>
                                                        <li><a data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                                data-id_subcategory="{{ $subcateg->id }}">حذف الفئة الفرعية &nbsp;<i class="fas fa-trash" style="color: red"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--/Row-->
    <!-- Row -->
    <div class="row ">
        <div class="col-md-12">

        </div>
    </div>
    <!-- /Row -->

    <!-- Modal -->
    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">حذف الفئة الفرعية</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('deleteSubCategory') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="id_subcategory" id="id_subcategory" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-warning">تأكيد</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_subcategory = button.data('id_subcategory');
            var modal = $(this);

            modal.find('.modal-body #id_subcategory').val(id_subcategory);
        })
    </script>


    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- INTERNAL Timepicker js -->
    <script src="{{ asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/time-picker/toggles.min.js') }}"></script>

    <!-- INTERNAL Datepicker js -->
    <script src="{{ asset('assets/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- INTERNAL File uploads js -->
    <script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/filupload.js') }}"></script>

    <!-- INTERNAL Multipleselect js -->
    <script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

    <!--INTERNAL Sumoselect js-->
    <script src="{{ asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!--INTERNAL telephoneinput js-->
    <script src="{{ asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>

    <!--INTERNAL jquery transfer js-->
    <script src="{{ asset('assets/plugins/jQuerytransfer/jquery.transfer.js') }}"></script>

    <!--INTERNAL multi js-->
    <script src="{{ asset('assets/plugins/multi/multi.min.js') }}"></script>

    <!--Form Validations js-->
    <script src="{{ asset('assets/js/form-vallidations.js') }}"></script>
@endsection
