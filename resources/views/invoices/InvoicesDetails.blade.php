@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمه الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتوره</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>{{ session('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row bg-white">
        <div class="col-md-12">
            <div class="panel panel-primary tabs-style-2">
                <div class="tab-menu-heading">
                    <div class="tabs-menu1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs main-nav-line">
                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات الفاتوره</a></li>
                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body main-content-body-right border">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped" style="text-align:center;">
                                                <tr>
                                                    <th scope="row">رقم الفاتوره</th>
                                                    <td>{{ $invoices->invoice_number }}</td>
                                                    <th scope="row">تاريخ الاصدار</th>
                                                    <td>{{ $invoices->invoice_Date }}</td>
                                                    <th scope="row">تاريخ الاستحقاق</th>
                                                    <td>{{ $invoices->Due_date }}</td>
                                                    <th scope="row">القسم</th>
                                                    <td>{{ $invoices->section->section_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">المنتج</th>
                                                    <td>{{ $invoices->product }}</td>
                                                    <th scope="row">مبلغ العموله</th>
                                                    <td>{{ $invoices->Amount_collection }}</td>
                                                    <th scope="row">مبلغ التحصيل</th>
                                                    <td>{{ $invoices->Amount_Commission }}</td>
                                                    <th scope="row">الخصم</th>
                                                    <td>{{ $invoices->Discount }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">نسبه الضريبه</th>
                                                    <td>{{ $invoices->Rate_VAT }}</td>
                                                    <th scope="row">قيمه الضريبه</th>
                                                    <td>{{ $invoices->Value_VAT }}</td>
                                                    <th scope="row">الاجمالي مع الضريبه</th>
                                                    <td>{{ $invoices->Total }}</td>
                                                    <th scope="row">الحالة الحالية</th>
                                                    @if ($invoices->Value_Status === 1)
                                                        <td> <span
                                                                class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                        </td>
                                                    @elseif ($invoices->Value_Status === 2)
                                                        <td> <span
                                                                class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                        </td>
                                                    @else
                                                        <td> <span
                                                                class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped" style="text-align:center;">
                                                <tr>
                                                    <th scope="row">#</th>
                                                    <th scope="row">رقم الفاتوره</th>
                                                    <th scope="row">نوع المنتوج</th>
                                                    <th scope="row">القسم</th>
                                                    <th scope="row">حاله الدفع</th>
                                                    <th scope="row">تاريخ الدفع</th>
                                                    <th scope="row">ملاحظات</th>
                                                    <th scope="row">تاريخ الاضافه</th>
                                                    <th scope="row">المستخدم</th>
                                                </tr>
                                                {{ $id = 1 }}
                                                @foreach ($details as $x)
                                                    <tr>
                                                        <td>{{ $id++ }}</td>
                                                        <td>{{ $x->invoice_number }}</td>
                                                        <td>{{ $x->product }}</td>
                                                        <td>{{ $invoices->section->section_name }}</td>
                                                        @if ($x->Value_Status === 1)
                                                            <td> <span
                                                                    class="badge badge-pill badge-success">{{ $x->Status }}</span>
                                                            </td>
                                                        @elseif ($x->Value_Status === 2)
                                                            <td> <span
                                                                    class="badge badge-pill badge-danger">{{ $x->Status }}</span>
                                                            </td>
                                                        @else
                                                            <td> <span
                                                                    class="badge badge-pill badge-warning">{{ $x->Status }}</span>
                                                            </td>
                                                        @endif
                                                        <td>{{ $x->Payment_Date }}</td>
                                                        <td>{{ $x->note }}</td>
                                                        <td>{{ $x->created_at }}</td>
                                                        <td>{{ $x->user }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab6">

                                    <div class="card">
                                        <div class="card-body">
                                            @can('اضافة مرفق')
                                                <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                <h5 class="card-title">اضافة المرفق</h5>
                                                <form action="{{ url('/InvoiceAttachments') }}" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="file_name"
                                                                id="file_name">
                                                            <input type="hidden" name="invoice_id" id="invoice_id"
                                                                value="{{ $invoices->id }}">
                                                            <input type="hidden" name="invoice_number" id="invoice_number"
                                                                value="{{ $invoices->invoice_number }}">
                                                            <label class="custom-file-label" for="pic"
                                                                data-browse="حدد المرفق">اختر الملف</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="fas fa-check-circle"></i> تأكيد
                                                        </button>
                                                    </div>

                                                </form>
                                            @endcan


                                            <hr>
                                            <table class="table table-striped" style="text-align:center;">
                                                <thead>
                                                    <tr>
                                                        <th scope="row">#</th>
                                                        <th scope="row">اسم الملف</th>
                                                        <th scope="row">قام بالاضافة</th>
                                                        <th scope="row">تاريخ الاضافة</th>
                                                        <th scope="row">العمليات</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{ $id = 1 }}
                                                    @foreach ($attachement as $y)
                                                        <tr>
                                                            <td>{{ $id++ }}</td>
                                                            <td>{{ $y->file_name }}</td>
                                                            <td>{{ $y->Created_by }}</td>
                                                            <td>{{ $y->created_at }}</td>
                                                            <td>
                                                                <a href="{{ url('View_file') }}/{{ $y->invoice_number }}/{{ $y->file_name }}"
                                                                    class="btn btn-outline-primary btn-sm" role="button">
                                                                    <i class="fas fa-eye"></i>&nbsp;
                                                                    عرض
                                                                </a>
                                                                <a href="{{ url('download') }}/{{ $y->invoice_number }}/{{ $y->file_name }}"
                                                                    class="btn btn-outline-success btn-sm" role="button">
                                                                    <i class="fas fa-download"></i>&nbsp;
                                                                    تحميل
                                                                </a>
                                                                @can('حذف المرفق')
                                                                    <a class="btn btn-sm btn-outline-danger"
                                                                        data-effect="effect-scale"
                                                                        data-id="{{ $y->id }}"
                                                                        data-file_name="{{ $y->file_name }}"
                                                                        data-invoice_number="{{ $y->invoice_number }}"
                                                                        data-toggle="modal" href="#delete" title="حذف"><i
                                                                            class="fas fa-trash"></i>حذف</a>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- delete -->
                                    <div class="modal" id="delete">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">حذف المرفق</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ url('delete_file') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <p>هل انت متاكد من عملية حذف المرفق ؟</p><br>
                                                        <input type="hidden" name="id" id="id">
                                                        <input class="form-control" name="file_name" id="file_name"
                                                            type="text" readonly>
                                                        <input class="form-control" name="invoice_number"
                                                            id="invoice_number" type="hidden" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">الغاء</button>
                                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- end delete --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
            var id = button.data('id');
            var file_name = button.data('file_name'); // Utilisez section_name au lieu de file_name
            var invoice_number = button.data('invoice_number');
            var modal = $(this); // Ajoutez cette ligne pour obtenir une référence au modal

            modal.find('#id').val(id);
            modal.find('#file_name').val(file_name); // Utilisez section_name au lieu de file_name
            modal.find('#invoice_number').val(invoice_number);
        })
    </script>
@endsection
