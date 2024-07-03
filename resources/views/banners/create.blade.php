<!-- Modal create -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">اضافة بنر</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
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

                            <div class="col-12">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="region_id">
                                        <option value="" disabled selected>-- اختر المنطقه --</option>
                                        @foreach ($regions as $reion)
                                            <option value="{{ $reion->id }}" {{ old('region_id') == $reion->id ? 'selected' : '' }}>{{ $reion->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <select class="select2 form-control" aria-invalid="false" name="add_id">
                                        <option value="" disabled selected>-- اختر الاعلان --</option>
                                        @foreach ($adds as $add)
                                            <option value="{{ $add->id }}" {{ old('add_id') == $add->id ? 'selected' : '' }}>{{ $add->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_type')
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
