@extends('layouts.master')
@section('title')
    قائمة الفواتير
@endsection
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    الفواتير</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ session()->get('delete') }}",
                    type: "success",
                })
            }
        </script>
    @endif

    @if (session()->has('pay'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ session()->get('pay') }}",
                    type: "success",
                })
            }
        </script>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('restore'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ session()->get('restore') }}",
                    type: "success",
                })
            }
        </script>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    @can('اضافة فاتورة')
                        <a class="btn btn-primary" href="invoices/create">
                            <i class="fas fa-file-invoice"></i> إضافة فاتورة
                        </a>
                    @endcan
                    @can('تصدير EXCEL')
                        <a class="btn btn-success" href="invoices/show">
                            <i class="fas fa-file-excel"></i> تصدير إكسيل
                        </a>
                    @endcan

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">تاريخ الإستحقاق</th>
                                    <th class="border-bottom-0">المنتج</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">الخصم</th>
                                    <th class="border-bottom-0">نسبة الضريبة</th>
                                    <th class="border-bottom-0">قيمة الضريبة</th>
                                    <th class="border-bottom-0">الإجمالي</th>
                                    <th class="border-bottom-0">الحالة</th>
                                    <th class="border-bottom-0">ملاحظات</th>
                                    <th class="border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            {{ $id = 1 }}
                            @foreach ($invoices as $invoices)
                                <tbody>
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $invoices->invoice_number }}</td>
                                        <td>{{ $invoices->Due_date }}</td>
                                        <td>{{ $invoices->product }}</td>
                                        <td><a
                                                href="{{ url('InvoicesDetails', $invoices->id) }}">{{ $invoices->section->section_name }}</a>
                                        </td>
                                        <td>{{ $invoices->Discount }}</td>
                                        <td>{{ $invoices->Amount_collection }}</td>
                                        <td>{{ $invoices->Amount_Commission }}</td>
                                        <td>{{ $invoices->Total }}</td>
                                        @if ($invoices->Value_Status === 1)
                                            <td> <span
                                                    class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                            </td>
                                        @elseif ($invoices->Value_Status === 2)
                                            <td> <span class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                            </td>
                                        @else
                                            <td> <span
                                                    class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                            </td>
                                        @endif
                                        <td>{{ $invoices->note }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn ripple btn-outline-primary btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    العمليات <i class="fas fa-caret-down ml-1"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    @can('تعديل الفاتورة')
                                                        <a class="dropdown-item"
                                                            href="{{ url('edit_invoices', $invoices->id) }}"><i
                                                                class="text-success fas fa-edit mr-2"></i>
                                                            تعديل الفاتورة </a>
                                                    @endcan
                                                    @can('حذف الفاتورة')
                                                        <a class="dropdown-item" data-effect="effect-scale"
                                                            data-id="{{ $invoices->id }}" data-toggle="modal"
                                                            href="#delete_invoices" title="حذف"><i
                                                                class="text-danger fas fa-trash-alt mr-2"></i>
                                                            حذف </a>
                                                    @endcan
                                                    @can('ارشفة الفاتورة')
                                                        <a class="dropdown-item" data-effect="effect-scale"
                                                            data-id="{{ $invoices->id }}" data-toggle="modal"
                                                            href="#delete1_invoices" title="أرشيف"><i
                                                                class="text-warning fas fa-archive mr-2"></i>نقل إلى الأرشيف</a>
                                                    @endcan
                                                    @can('تغير حالة الدفع')
                                                        <a class="dropdown-item"
                                                            href="{{ url('status_update', $invoices->id) }}" title="دفع"><i
                                                                class="text-primary fas fa-money-bill-wave mr-2"></i>
                                                            تغير حالة الدفع
                                                        </a>
                                                    @endcan
                                                    @can('طباعةالفاتورة')
                                                        <a class="dropdown-item" href="print_invoices/{{ $invoices->id }}"
                                                            title="طبع"><i class="text-info fas fa-print mr-2"></i>
                                                            طبع الفاتورة
                                                        </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- delete -->
    <div class="modal" id="delete_invoices">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الفاتورة</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="invoices/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    {{-- end delete --}}

    <!-- أرشيف -->
    <div class="modal" id="delete1_invoices">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">أرشفة الفاتورة</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="/archives" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الأرشفة ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-success">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    {{-- end أرشيف --}}

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script>
        $('#delete_invoices').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
            var id = button.data('id');
            var modal = $(this);
            modal.find('#id').val(id);
        });
    </script>
    <script>
        $('#delete1_invoices').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
            var id = button.data('id');
            var modal = $(this);
            modal.find('#id').val(id);
        });
    </script>
@endsection
