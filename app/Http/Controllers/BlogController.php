<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;



class BlogController extends Controller
{
    public function blog(Request $request)
    {
        // Fetch published posts, order them by 'updated_at' in descending order, and paginate the results (2 posts per page)
        $publishedPosts = Post::where('published', true)
            ->orderBy('updated_at', 'DESC')
            ->paginate(2);

        // If the request is AJAX, return the posts partial view
        if ($request->ajax()) {
            return view('blog.posts')->with('posts', $publishedPosts);
            // ->render();
        }

        // If it's a regular request, return the main blog view
        return view('blog.blog')->with('posts', $publishedPosts);
    }


    public function index()
    {
        //
    }

   
    /**
     * Display the specified resource.
     * @param  string $slug
     * @return  Illuminate\Http\Response
     */
    
    public function show($slug)
    {
      return view('blog.show')
      ->with('post', Post::where('slug',$slug)->first());
    }

    
}
