
@extends('master')

@section('title')
الهدايا
@stop

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">قائمة الهدايا</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسيه</a>
                            </li>
                            <li class="breadcrumb-item active">عرض
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary round mr-1 mb-1 waves-effect waves-light" href="#"  data-toggle="modal" data-target="#default">اضافة هديه</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                @include('layouts.alerts.error')
                                @include('layouts.alerts.success')

                                <div class="table-responsive">
                                    <div class="search_ajax_div" id="search_ajax_div">
                                        @if (@isset($data) && !@empty($data) && count($data) > 0)
                                            <table class="table zero-configuration" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم المستخدم</th>
                                                        <th>الرصيد</th>
                                                        <th>الرساله</th>
                                                        <th>الهاتف</th>
                                                        <th>كود</th>
                                                        <th>الحاله</th>
                                                        <th>التاريخ</th>
                                                        <th>اجراء</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $index=>$info)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $info->user->name }}</td>
                                                        <td>{{ $info->palance }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_MESSAGE{{ $info->id }}">
                                                                عرض <i class="feather icon-eye"></i>
                                                            </button>
                                                        </td>
                                                        <td>{{ $info->phone }}</td>
                                                        <td>{{ $info->code }}</td>
                                                        <td>
                                                            @if ($info->status == 0) جديد @else تم التحصيل @endif
                                                        </td>
                                                        <td>{{ $info->created_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal_Edit{{ $info->id }}">
                                                                تعديل <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_DELETE{{ $info->id }}">
                                                                حذف <i class="feather icon-delete"></i>
                                                            </button>
                                                        </td>

                                                        <!-- Modal delete -->
                                                        <div class="modal fade text-left" id="modal_DELETE{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #EA5455 !important;">
                                                                        <h4 class="modal-title" id="myModalLabel1" style="color: #FFFFFF">حذف هديه</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true" style="color: #DC3545">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <strong>
                                                                            هل انت متاكد من انك تريد الحذف ؟
                                                                        </strong>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">الغاء</button>
                                                                        <a href="{{ route('gifts.delete',$info->id) }}" type="submit" class="btn btn-danger waves-effect waves-light">تأكيد</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end delete-->

                                                        @include('gifts.edit')

                                                        <!-- Modal MESSAGE -->
                                                        <div class="modal fade text-left" id="modal_MESSAGE{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel1">نص الرساله</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{ $info->message }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light waves-effect waves-light btn-sm" data-dismiss="modal">اغلاق</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Model-->

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-danger" role="alert">
                                                <p class="mb-0">
                                                    لا توجد بيانات
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>

    @include('gifts.create')

@endsection

@section('script')

@endsection

