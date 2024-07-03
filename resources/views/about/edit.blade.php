<!-- Modal create -->
<div class="modal fade text-left" id="modal_Edit{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">تعديل بيانات التواصل</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('about.update',$info->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <input type="hidden" name="id" value="{{ $info->id }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="الهاتف" name="phone" value="{{ old('phone',$info->phone) }}">
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
                                    <input type="text" class="form-control" placeholder="واتساب" name="whatsapp" value="{{ old('whatsapp',$info->whatsapp) }}">
                                    <label for="first-name-floating">واتساب</label>
                                    @error('whatsapp')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="انستغرام" name="instagram" value="{{ old('instagram',$info->instagram) }}">
                                    <label for="first-name-floating">انستغرام</label>
                                    @error('instagram')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="سناب شات" name="snapchat" value="{{ old('snapchat',$info->snapchat) }}">
                                    <label for="first-name-floating">سناب شات</label>
                                    @error('snapchat')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="تويتر" name="twitter" value="{{ old('twitter',$info->twitter) }}">
                                    <label for="first-name-floating">تويتر</label>
                                    @error('twitter')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="الضريبه" name="tax" value="{{ old('tax',$info->tax) }}">
                                    <label for="first-name-floating">الضريبه</label>
                                    @error('tax')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control" id="label-textarea" rows="3" placeholder="عن التطبيق" name="about">{{ $info->about }}</textarea>
                                    <label for="first-name-floating">عن التطبيق</label>
                                    @error('about')
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
