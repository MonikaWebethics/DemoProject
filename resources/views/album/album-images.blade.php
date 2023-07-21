@extends('layouts.masterlayout')

@section('content')
    @include('include.userprofile-nav')
    <div class="container py-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif
        <div class="row">
            <a href="/AlbumImages/{{ $id }}/create" class="mx-auto pb-3 d-flex justify-content-end"
                style="text-decoration: none; color: inherit;">
                <button class="btn btn-primary rounded-0" style="width: 156px; height: 45px;">Add Images</button>
            </a>
            <div class="row">
                @foreach ($Images as $Image)
                    @if ($Image->albumid == $id)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                            <div class="image-container">
                                <img src="{{ asset('album-images/' . $Image->image_path) }}" class="img-fluid"
                                    alt="Image">
                                <form action="/AlbumImages/{{ $Image->id }}" method="POST" id="deleteForm"
                                    class="deleteForm mt-2">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete(event)">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

<script>
    function confirmDelete(event) {
        if (!confirm('Are you sure you want to delete this image?')) {
            event.preventDefault();
        }
    }
</script>
