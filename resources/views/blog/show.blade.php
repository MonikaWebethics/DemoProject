@extends('layouts.masterlayout')

@section('content')

<div class="container pb-5 pt-5">
     <div class="text-center">
        <h2 class="index-h2">Blog Post</h2>
     </div>
     <div class="container px-5 py-4">
          <hr>
          <div class="row pt-5">
           <div class="col-lg-6 col-md-6 col-sm-12 px-5 pb-5">
              <div class="">
                  <img src="{{ asset('blog-images/' . $post->image_path) }}" class="img-fluid" >
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 px-lg-5  pb-5">
              <h2 class="index-manage">{{$post->title}}</h2>
              <p class="card-p">Created on {{date('jS M Y', strtotime($post->updated_at))}}</p>
              <div class="row pt-lg-4">
                <div class="col-lg col-12 d-flex align-items-center">
                  <div class="userinfo">
                    <span class="span-manage">{!! $post->description !!}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>      
</div>
@endsection

