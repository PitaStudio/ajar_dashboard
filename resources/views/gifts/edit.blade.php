<!-- Modal Edit -->
<div class="modal fade text-left" id="modal_Edit{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">تعديل هديه</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('gifts.update',$info->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <select class="form-control" aria-invalid="false" name="user_id">
                                        <option value="" disabled selected>-- اختر المستخدم --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id',$info->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('message')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="number" step="0.001" class="form-control" placeholder="الرصيد" name="palance" value="{{ old('palance',$info->palance) }}">
                                    <label for="first-name-floating">الرصيد</label>
                                    @error('palance')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control" placeholder="الرساله" name="message">{{ old('message',$info->message) }}</textarea>
                                    <label for="first-name-floating">الرساله</label>
                                    @error('message')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="number" class="form-control" placeholder="الهاتف" name="phone" value="{{ old('phone',$info->phone) }}">
                                    <label for="first-name-floating">الهاتف </label>
                                    @error('phone')
                                    <span class="text-danger" id="basic-default-name-error" class="error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="كود" name="code" value="{{ old('code',$info->code) }}">
                                    <label for="first-name-floating">كود</label>
                                    @error('code')
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
