@foreach ($posts as $post)
    <div class="col-lg-6 col-md-6 col-sm-12 px-5 pb-5">
        <a href="/blog/{{ $post->slug }}">
            <img src="{{ asset('blog-images/' . $post->image_path) }}" class="img-fluid">
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 px-lg-5 pb-5">
        <h2 class="index-manage">{{ $post->title }}</h2>
        <p class="card-p">Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</p>
        <div class="row">
            <div class="col-lg col-12 d-flex align-items-center">
                <div class="userinfo">
                    <p class="span-manage">{!! Str::limit($post->description, 400, '...') !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="/blog/{{ $post->slug }}">
                <button class="btn btn-outline-dark">Keep Reading</button>
            </a>
        </div>

        @auth
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 ps-3 pt-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="/blog/{{ $post->slug }}/edit">
                                <button type="button" class="btn btn-info">Edit</button>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <form action="/blog/{{ $post->slug }}" method="POST" id="deleteForm">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endforeach
