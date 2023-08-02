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

            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Album" />
            </div>
            <div class="pb-5 pt-2 ">
                <a class="mx-auto pb-3 d-flex justify-content-end" href="{{ route('addAlbum') }}"
                    style="text-decoration: none; color: inherit;">
                    <button class="btn btn-primary rounded-0" style="width: 156px; height: 45px;">Add Album</button>
                </a>
            </div>
            <div id="Result" class="row">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        fetch_album();

        function fetch_album(query = '') {
            $.ajax({
                url: "{{ route('searchAlbum') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    var output = '';
                    var total_row = data.data.length;

                    if (total_row > 0) {
                        data.data.forEach(function(album) {
                            output += '<div class="col-lg-4 col-md-6 col-sm-12 pb-4">';
                            output += '<div class="album-card">';
                            output += '<a href="{{ url('AlbumImages') }}/' + album.id +
                                '" style="text-decoration: none; color: inherit;">';
                            output += '<img src="{{ asset('album-images') }}/' + album
                                .image_path + '" class="img-fluid" alt="Album Image">';
                            output += '<h4 class="text-center pt-3">' + album.title +
                                '</h4>';
                            output += '</a>';
                            output += '<div class="row justify-content-start mt-2">';
                            output += '<div class="col-12 text-center">';
                            output += '<form action="{{ url('album') }}/' + album.id +
                                '" method="POST" class="deleteForm">';
                            output += '@csrf';
                            output += '@method('delete')';
                            output +=
                                '<button type="submit" class="btn btn-danger" onclick="return confirmDelete(event)">Delete</button>';
                            output += '</form>';
                            output += '</div>';
                            output += '</div>';
                            output += '</div>';
                            output += '</div>';
                        });
                    } else {
                        output = '<div class="alert alert-primary">No Data Found</div>'
                    }

                    $('#Result').html(output);
                }
            })
        }

        // $(document).on('keyup', '#blogsearch', $.debounce(1500, function() {
        $(document).on('keyup', '#search', $.debounce(1500, function() {
            var query = $(this).val();
            fetch_album(query);
        }));
    })
</script>
