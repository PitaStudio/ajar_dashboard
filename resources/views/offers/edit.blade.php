<!-- Modal Edit -->
<div class="modal fade text-left" id="modal_Edit{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">تعديل عرض</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('offers.update',$info->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $info->id }}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="file" class="form-control" placeholder="صوره" name="image" value="{{ old('image',$info->image) }}">
                                    <label for="first-name-floating">صوره</label>
                                    @error('image')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="service_type">
                                        <option value="" disabled selected>-- اختر العرض --</option>
                                        <option value="1" {{ old('service_type',$info->service_type) == 1 ? 'selected' : '' }}>غسيل</option>
                                        <option value="2" {{ old('service_type',$info->service_type) == 2 ? 'selected' : '' }}>مواقف</option>
                                    </select>
                                    @error('service_type')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="اسم العرض" name="title" value="{{ old('title',$info->title) }}">
                                    <label for="first-name-floating">اسم العرض</label>
                                    @error('title')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="file" class="form-control" placeholder="العدد - صوره" name="count_image" value="{{ old('count_image',$info->count_image) }}">
                                    <label for="first-name-floating">العدد - صوره</label>
                                    @error('count_image')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="number" class="form-control" placeholder="عدد مرات الاستخدام" name="count" value="{{ old('count',$info->count) }}">
                                    <label for="first-name-floating">عدد مرات الاستخدام</label>
                                    @error('count')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="number" step="0.001" class="form-control" placeholder="سعر الوحده" name="unit_price" value="{{ old('unit_price',$info->unit_price) }}">
                                    <label for="first-name-floating">سعر الوحده</label>
                                    @error('unit_price')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="number" step="0.001" class="form-control" placeholder="قيمه العرض" name="amount" value="{{ old('amount',$info->amount) }}">
                                    <label for="first-name-floating">قيمه العرض</label>
                                    @error('amount')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <textarea class="form-control" placeholder="التفاصيل" name="details">{{ old('details',$info->details) }}</textarea>
                                    <label for="first-name-floating">التفاصيل</label>
                                    @error('details')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="is_open_for_use">
                                        <option value="" disabled selected>-- اختر حاله الاستخدام --</option>
                                        <option value="0" {{ old('is_open_for_use',$info->is_open_for_use) == 0 ? 'selected' : '' }}>مفتوح</option>
                                        <option value="1" {{ old('is_open_for_use',$info->is_open_for_use) == 1 ? 'selected' : '' }}>مقيد</option>
                                    </select>
                                    @error('is_open_for_use')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="number" class="form-control" placeholder="مده الاستخدام (يوم)" name="duration" value="{{ old('duration',$info->duration) }}">
                                    <label for="first-name-floating">مده الاستخدام (يوم)</label>
                                    @error('duration')
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
                    <button type="submit" class="btn btn-outline-primary btn-sm round mr-1 mb-1 waves-effect waves-light">تحديث</button>
                    <button type="reset" class="btn btn-outline-warning btn-sm round mr-1 mb-1 waves-effect waves-light">تفريغ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end Model-->
