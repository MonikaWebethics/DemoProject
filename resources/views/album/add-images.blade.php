@extends('layouts.masterlayout')

@section('content')
    @include('include.userprofile-nav')
    <div class="container pb-5 pt-2">
        <div class="row">
        </div>

        <form enctype="multipart/form-data" method="post">
            @csrf
            <div class="row py-5">
                <div class="col py-5 border rounded-3">
                    <div class="ps-3" style="width:50%">
                        <div class="form-group">
                            <div class="d-flex border border-1 rounded-3" style="height: 52px;">
                                <span class="input-style d-flex align-items-center justify-content-center">
                                    <input type="file" name="image[]" class="form-control border border-0" multiple>
                                </span>
                            </div>
                        </div>
                        @error('image.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="d-grid pt-4 pb-3 gap-6 mx-auto pt-2">
                            <button type="submit" name="upload_album" class="btn btn-primary rounded-0"
                                style="width: 156px; height: 44px;">
                                Upload
                            </button>
                        </div>
                        <span>Uploaded images will be resized to fit within:</span><br>
                        <span>Width of 500 pixels and Height of 500 Pixels</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
