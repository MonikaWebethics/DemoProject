@extends('layouts.masterlayout')

@section('content')
    @include('include.userprofile-nav')

    <div class="container py-5">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif
            <div class="pb-5 pt-2 ">
                <a class="mx-auto pb-3 d-flex justify-content-end" href="{{ route('addAlbum') }}"
                    style="text-decoration: none; color: inherit;">
                    <button class="btn btn-primary rounded-0" style="width: 156px; height: 45px;">Add Album</button>
                </a>
            </div>
            <div class="row">
                @foreach ($albums as $album)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                        <div class="album-card">
                            <a href="AlbumImages/{{ $album->id }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('album-images/' . $album->image_path) }}" class="img-fluid"
                                    alt="Album Image">
                                <h4 class="text-center pt-3">{{ $album->title }}</h4>
                            </a>
                            <div class="row justify-content-start mt-2">
                                {{-- <div class="col-6 text-end">
                                    <a href="album/{{ $album->id }}/edit" class="btn btn-primary">Edit</a>
                                </div> --}}
                                <div class="col-12 text-center">
                                    <form action="album/{{ $album->id }}" method="POST" class="deleteForm">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirmDelete(event)">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection


<script>
    function confirmDelete(event) {
        if (!confirm('Are you sure you want to delete this album?')) {
            event.preventDefault();
        }
    }
</script>
