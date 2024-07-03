<!-- Modal Edit -->
<div class="modal fade text-left" id="modal_Edit{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">تعديل مزود خدمه</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('providers.update',$info->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $info->id }}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="الاسم" name="name" value="{{ old('name',$info->name) }}">
                                    <label for="first-name-floating">الاسم</label>
                                    @error('name')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="unmber" class="form-control" placeholder="الهاتف" name="phone" value="{{ old('phone',$info->phone) }}">
                                    <label for="first-name-floating">الهاتف</label>
                                    @error('phone')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
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
                                    <select class="form-control" aria-invalid="false" name="region_id">
                                        <option value="" disabled selected>-- اختر المنطقه --</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}" {{ old('region_id',$info->region_id) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="city_id">
                                        <option value="" disabled selected>-- اختر المدينه --</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id',$info->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="service_id">
                                        <option value="" disabled selected>-- اختر الخدمه --</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" {{ old('service_id',$info->service_id) == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control" placeholder="العنوان" name="address">{{ old('address',$info->address) }}</textarea>
                                    <label for="first-name-floating">العنوان</label>
                                    @error('address')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="unmber" step="0.00000000000000001" class="form-control" placeholder="خط الطول" name="lon" value="{{ old('lon',$info->lon) }}">
                                    <label for="first-name-floating">خط الطول</label>
                                    @error('lon')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="unmber" step="0.00000000000000001" class="form-control" placeholder="خط العرض" name="lat" value="{{ old('lat',$info->lat) }}">
                                    <label for="first-name-floating">خط العرض</label>
                                    @error('lat')
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
