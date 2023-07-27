@extends('layouts.masterlayout')

@section('content')
    <div class="container py-5">
        <div class="row d-flex align-items-center">
            <div class="col text-center">
                <h2 class="index-h2">Blog Posts</h2>
            </div>
            @auth
                <div class="col-auto ml-auto">
                    <a href="{{ route('create') }}" style="text-decoration: none; color: inherit;">
                        <button class="btn btn-primary rounded-0" style="width: 156px; height: 45px;">Create Post</button>
                    </a>
                </div>
            @endauth
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif
    </div>

    <div class="container px-5 py-4">
        <div id="data-wrapper">
            <div class="row pt-5">
                @include('blog.posts')
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
