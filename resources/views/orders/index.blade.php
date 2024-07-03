
@extends('master')

@section('title')
الطلبات
@stop

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">قائمة الطلبات</h2>
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
                            {{-- <a class="btn btn-primary round mr-1 mb-1 waves-effect waves-light" href="#"  data-toggle="modal" data-target="#large">اضافة عرض</a> --}}
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                @include('layouts.alerts.error')
                                @include('layouts.alerts.success')

                                <form action="" class="form" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="form-body">
                                        <input id="ajax_search_url" type="hidden" value="{{ route('search_ajax') }}">
                                        <input id="ajax_search_token" type="hidden" value="{{ csrf_token() }}">

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-label-group position-relative has-icon-left">
                                                    <fieldset class="form-label-group">
                                                        <input type="date" id="begin_date" class="form-control" name="begin_date" placeholder="ادخل تاريخ البدايه">
                                                        <label for="floating-label1">ادخل تاريخ البدايه</label>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-label-group position-relative has-icon-left">
                                                    <fieldset class="form-label-group">
                                                        <input type="date" id="last_date" class="form-control" name="last_date" placeholder="ادخل تاريخ النهايه">
                                                        <label for="floating-label1">ادخل تاريخ النهايه</label>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <button class="btn btn-primary" id="search_by_text_button" type="submit">عرض</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <div id="ajax_responce_serarchDiv">
                                        @if (@isset($data) && !@empty($data) && count($data) > 0)
                                            <table class="table zero-configuration" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>العميل</th>
                                                        <th>الاعلان</th>
                                                        <th>ايام الايجار</th>
                                                        <th>قيمه الطلب</th>
                                                        <th>تواصل عبر</th>
                                                        <th>الحاله</th>
                                                        <th>تقييم الخدمه</th>
                                                        <th>التاريخ</th>
                                                        {{-- <th>اجراء</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $index=>$info)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $info->user->name }}</td>
                                                        <td>{{ $info->add->title }}</td>
                                                        <td>{{ $info->booking_days }}</td>
                                                        <td>{{ $info->add->price }}</td>
                                                        <td>@if ($info->contact_with == 2) <div class="badge badge-pill badge badge-success">واتساب</div> @else <div class="badge badge-pill badge badge-info">اتصال</div> @endif</td>
                                                        <td>
                                                            @if($info->status == 0)
                                                                <div class="badge badge-pill badge badge-info">جديد</div>
                                                            @elseif($info->status == 1)
                                                                <div class="badge badge-pill badge badge-success">تمت الخدمة</div>
                                                            @else
                                                                <div class="badge badge-pill badge badge-danger">لم تتم الخدمة</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($info->user_review == 1)
                                                            ممتازة
                                                            @elseif ($info->user_review == 2)
                                                            جيدة
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                        <td>{{ $info->created_at->format('Y-m-d') }}</td>

                                                        <!-- Modal delete -->
                                                        <div class="modal fade text-left" id="modal_DELETE{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #EA5455 !important;">
                                                                        <h4 class="modal-title" id="myModalLabel1" style="color: #FFFFFF">حذف بنر</h4>
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
                                                                        <a href="{{ route('orders.delete',$info->id) }}" type="submit" class="btn btn-danger waves-effect waves-light">تأكيد</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end delete-->
                                                        {{-- @include('orders.edit') --}}

                                                        <!-- Modal MESSAGE -->
                                                        <div class="modal fade text-left" id="modal_MESSAGE{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel1">ملاحظات</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{ $info->note }}
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

    {{-- @include('orders.create') --}}

@endsection

@section('script')

<script>

    $(document).ready(function(){

        $(document).on('click','#search_by_text_button',function(e){
            e.preventDefault();
            var begin_date = $('#begin_date').val();
            var last_date = $('#last_date').val();
            var ajax_search_url = $("#ajax_search_url").val();
            var ajax_search_token= $("#ajax_search_token").val();

            jQuery.ajax({
                url:ajax_search_url,
                type:'post',
                dataType:'html',
                cache:false,
                data:{ begin_date:begin_date, last_date:last_date , "_token":ajax_search_token},
                success:function(data){
                    $("#ajax_responce_serarchDiv").html(data);
                },
                error:function(){

                }
            });//end of ajax

        });//end of input

    });//end of ready

</script>

@endsection

