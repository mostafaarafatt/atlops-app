@extends('dashboard.layouts.app')

@section('styles')
    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />

    <!-- Slect2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">طلبات الأفراد</h4>
        </div>

    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">فلترة حالة الطلبات</div>

                    <div class="btn-group mt-2 mb-2" style="margin: 3%">
                        <button type="button" class="btn btn-primary btn-pill dropdown-toggle" data-bs-toggle="dropdown">
                            اختر حالة الطلب <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('newOrders') }}">
                                    جديدة &nbsp;<i class="fas fa-check" style="color: green"></i></a>
                            </li>
                            <li><a href="{{ route('expireOrders') }}">
                                    منتهية &nbsp;<i class="fas fa-close" style="color: red"></i></a>
                            </li>
                            <li><a href="{{ route('index.orders') }}">
                                كل الطلبات &nbsp;<i class="fas fa-eye" style="color: green"></i></a>
                        </li>
                        </ul>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example2">
                            <thead>

                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                    <th class="wd-20p border-bottom-0">رقم الجوال</th>
                                    <th class="wd-15p border-bottom-0">العنوان</th>
                                    <th class="wd-10p border-bottom-0">اسم الطلب</th>
                                    <th class="wd-25p border-bottom-0">وصف الطلب</th>
                                    <th class="wd-15p border-bottom-0">حالة الطلب</th>
                                    <th class="wd-15p border-bottom-0">القسم الرئيسى</th>
                                    <th class="wd-20p border-bottom-0">القسم الفرعى</th>
                                    <th class="wd-15p border-bottom-0">الخدمات الإضافية</th>
                                    <th class="wd-15p border-bottom-0">الكمية</th>
                                    <th class="wd-10p border-bottom-0">السعر المتوقع</th>
                                    <th class="wd-15p border-bottom-0">التحكم</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($user_orders as $index => $order)
                                    <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td>{{ $order->getUserInfo($order->user_id)->firstName }}</td>
                                        <td>{{ $order->getUserInfo($order->user_id)->phone }}</td>
                                        <td>address</td>
                                        <td>{{ $order->orderName }}</td>
                                        <td>{{ $order->orderDescription }}</td>
                                        <td>
                                            @if ($order->ended_order == '0')
                                                <p class="bg-success text-white rounded">جديد</p>
                                            @else
                                                <p class="bg-danger text-white rounded">منتهى</p>
                                            @endif
                                        </td>
                                        <td>{{ $order->getCateg($order->category_id) }}</td>
                                        <td>{{ $order->subCategory }}</td>
                                        <td>{{ $order->additionalService }}</td>
                                        <td>-------</td>
                                        <td>من: {{ $order->startPrice }} إلى: {{ $order->endPrice }}</td>
                                        <td>
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-primary btn-pill dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    العمليات <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li class="dropdown-plus-title">
                                                        اختار العملية
                                                        <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                    </li>
                                                    <li><a href="">عرض
                                                            صور الطلب &nbsp;<i class="fas fa-edit"
                                                                style="color: green"></i></a>
                                                    </li>
                                                    <li><a data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                            data-order_id="{{ $order->id }}">حذف الطلب &nbsp;<i
                                                                class="fas fa-trash" style="color: red"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
    <!-- /Row -->
    <!-- Modal -->
    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">حذف الطلب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('deleteOrder') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="order_id" id="order_id" value="">
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
            var order_id = button.data('order_id');
            var modal = $(this);

            modal.find('.modal-body #order_id').val(order_id);
        })
    </script>
    <!-- INTERNAL Data tables -->
    <script src="{{ asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/JSZip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endsection
