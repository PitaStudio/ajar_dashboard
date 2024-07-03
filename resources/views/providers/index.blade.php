
@extends('master')

@section('title')
المراكز
@stop

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">قائمة المراكز</h2>
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
                            <a class="btn btn-primary round mr-1 mb-1 waves-effect waves-light" href="#"  data-toggle="modal" data-target="#large">اضافة مركز</a>
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
                                                        <th>صوره</th>
                                                        <th>الاسم</th>
                                                        <th>الهاتف</th>
                                                        <th>المنطقه</th>
                                                        <th>المدينه</th>
                                                        <th>الخدمه</th>
                                                        <th>العنوان</th>
                                                        <th>اضافة بوابة</th>
                                                        <th>التاريخ</th>
                                                        <th>اجراء</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $index=>$info)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td class="product-img sorting_1">
                                                            @if ($info->image)
                                                            <img src="{{ asset('assets/image/providers/'.$info->image) }}" style="width: 80px;" class="img-thumbnail" alt="">
                                                            @else
                                                                <img src="{{ asset('assets/image/no_image.jpg') }}" style="width: 80px;" class="img-thumbnail" alt="">
                                                            @endif
                                                        </td>
                                                        <td>{{ $info->name }}</td>
                                                        <td>{{ $info->phone }}</td>
                                                        <td>{{ $info->region->name }}</td>
                                                        <td>{{ $info->city->name }}</td>
                                                        <td>{{ $info->service->name }}</td>
                                                        <td>{{ $info->address }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal_AddDoor{{ $info->id }}">
                                                                <i class="fa fa-car"></i>
                                                            </button>
                                                        </td>
                                                        <td>{{ $info->created_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal_Edit{{ $info->id }}">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_DELETE{{ $info->id }}">
                                                                <i class="feather icon-delete"></i>
                                                            </button>
                                                        </td>
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
                                                                        <a href="{{ route('providers.delete',$info->id) }}" type="submit" class="btn btn-danger waves-effect waves-light">تأكيد</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end delete-->
                                                        @include('providers.edit')

                                                        <!-- Modal MESSAGE -->
                                                        <div class="modal fade text-left" id="modal_MESSAGE{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel1">التفاصيل</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{ $info->details }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light waves-effect waves-light btn-sm" data-dismiss="modal">اغلاق</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Model-->

                                                        <!-- Modal AddDoor -->
                                                        <div class="modal fade text-left" id="modal_AddDoor{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel1">اضافة بوابة</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form" action="{{ route('providers.add_door',$info->id) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-body">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-label-group">
                                                                                            <input type="text" class="form-control" placeholder="رقم البوابة" name="name" value="{{ old('name') }}">
                                                                                            <label for="first-name-floating">رقم البوابة</label>
                                                                                            @error('name')
                                                                                            <span class="text-danger" id="basic-default-name-error" class="error">
                                                                                                {{ $message }}
                                                                                            </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-outline-primary btn-sm round mr-1 mb-1 waves-effect waves-light">اضافه</button>
                                                                            <button type="button" class="btn btn-outline-danger btn-sm round mr-1 mb-1 waves-effect waves-light" data-dismiss="modal">اغلاق</button>
                                                                        </div>
                                                                    </form>
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

    @include('providers.create')

@endsection

@section('script')

@endsection

