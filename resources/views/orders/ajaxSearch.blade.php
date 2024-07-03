@if (@isset($data) && !@empty($data) && count($data) > 0)

<div class="row">
    <div class="col-4">
        <h5 style="color: #626262; font-weight: bold;"> عدد الطلبات الكلي : <span style="color: #7367F0;;">{{ $count }}</span></h5>
    </div>
    <div class="col-4">
        <h5 style="color: #626262; font-weight: bold;">عدد الطلبات بالواتساب : <span style="color: #7367F0;;">{{ $whatsapp }}</span></h5>
    </div>
    <div class="col-4">
        <h5 style="color: #626262; font-weight: bold;">عدد الطلبات بالاتصال : <span style="color: #7367F0;;">{{ $call }}</span></h5>
    </div>
    {{-- <div class="col-3">
        <h5 style="color: #626262; font-weight: bold;">مجموع الفواتير الكلي : <span style="color: #7367F0;">{{ $total }}</span></h5>
    </div> --}}
</div>
<br>

<table class="table zero-configuration" id="datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>العميل</th>
            <th>الاعلان</th>
            <th>ايام الايجار</th>
            <th>قيمه الطلب</th>
            <th>تواصل عبر</th>
            {{-- <th>الحاله</th> --}}
            <th>ملاحظات</th>
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
            {{-- <td>
                @if($info->status == 0)
                    <div class="badge badge-pill badge badge-secondary">جديد</div>
                @elseif($info->status == 1)
                    <div class="badge badge-pill badge badge-info">مقبول</div>
                @elseif($info->status == 2)
                    <div class="badge badge-pill badge badge-success">مكتمل</div>
                @elseif($info->status == 2)
                    <div class="badge badge-pill badge badge-danger">مرفوض</div>
                @else
                    <div class="badge badge-pill badge badge-danger">ملغي</div>
                @endif
            </td> --}}
            <td>{{ $info->user_review }}</td>
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
