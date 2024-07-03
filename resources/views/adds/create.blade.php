<!-- Modal create -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">اضافة اعلان</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('adds.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="file" class="form-control" placeholder="صوره" name="image" value="{{ old('image') }}">
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
                                    <input type="text" class="form-control" placeholder="عنوان الاعلان" name="title" value="{{ old('title') }}">
                                    <label for="first-name-floating">عنوان الاعلان</label>
                                    @error('title')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="type">
                                        <option value="" disabled selected>-- اختر نوع الاعلان --</option>
                                        <option value="1" {{ old('type') == 1 ? 'selected' : '' }}> اعلان سياره</option>
                                        <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>اعلان عام</option>
                                    </select>
                                    @error('type')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="user_id">
                                        <option value="" disabled selected>-- اختر العميل --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
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
                                    <select class="form-control" aria-invalid="false" name="region_id">
                                        <option value="" disabled selected>-- اختر المنطقه --</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
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
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
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
                                    <select class="form-control" aria-invalid="false" name="category_id">
                                        <option value="" disabled selected>-- اختر القسم --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="نوع السيارة" name="car_type" value="{{ old('car_type') }}">
                                    <label for="first-name-floating">نوع السيارة</label>
                                    @error('car_type')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="الموديل" name="model" value="{{ old('model') }}">
                                    <label for="first-name-floating">الموديل</label>
                                    @error('model')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="size" name="size" value="{{ old('size') }}">
                                    <label for="first-name-floating">size</label>
                                    @error('size')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="number" step="0.00001" class="form-control" placeholder="السعر" name="price" value="{{ old('price') }}">
                                    <label for="first-name-floating">السعر</label>
                                    @error('price')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="العنوان" name="address" value="{{ old('address') }}">
                                    <label for="first-name-floating">العنوان</label>
                                    @error('address')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control" id="label-textarea" rows="3" placeholder="التفاصيل" name="details">{{ old('details') }}</textarea>
                                    <label for="first-name-floating">التفاصيل</label>
                                    @error('address')
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
                    <button type="reset" class="btn btn-outline-warning btn-sm round mr-1 mb-1 waves-effect waves-light">تفريغ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end Model-->
