
@extends('master')

@section('title')
الشكاوى
@stop

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">قائمة الشكاوى</h2>
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
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <div class="search_ajax_div" id="search_ajax_div">
                                    @if (@isset($data) && !@empty($data) && count($data) > 0)
                                        <table class="table zero-configuration" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>المقترح</th>
                                                    <th>الهاتف</th>
                                                    <th>النص</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $index=>$info)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $info->inquiry->name }}</td>
                                                    <td>{{ $info->mobile }}</td>
                                                    <td>{{ $info->note }}</td>
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
        </section>
        <!--/ Zero configuration table -->
    </div>

@endsection

@section('script')

@endsection

