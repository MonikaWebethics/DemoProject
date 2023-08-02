@extends('layouts.masterlayout')

@section('content')
    <div class="container pb-5 pt-5">
        <div class="text-center">
            <h2 class="index-h2">Create Post</h2>
        </div>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row pb-5 pt-3">
                <div class="col py-5 border rounded-3">
                    <div class="ps-3" style="width:50%">
                        <div class="form-group">
                            <div class="pb-4">
                                <input type="text" name="title" class="form-control " style="height: 52px;"
                                    placeholder="Title...">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pb-4">
                                <textarea id="description" name="description" placeholder="Description..." class="form-control"></textarea>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex border border-1 rounded-3" style="height: 52px;">
                                <span class="input-style d-flex align-items-center justify-content-center">
                                    <input type="file" name="image" class="form-control border border-0">
                                </span>
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-check pt-4 ">
                            <input class="form-check-input" name="published" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Publish
                            </label>
                        </div>

                        <div class="d-grid pt-4 pb-3 gap-6 mx-auto pt-2">
                            <button type="submit" class="btn btn-primary rounded-0" style="width: 156px; height: 44px;">
                                Upload Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
