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
        $posts = Post::where('published', true)
            ->orderBy('updated_at', 'DESC')
            ->paginate(2);
            // $latestUpdatedTimestamp = $posts->first()->updated_at;
            // dd(changeDateFormate($latestUpdatedTimestamp, 'd m y'));
            
        if ($request->ajax()) {
            $view = view('blog.posts', compact('posts'))->render();
    
            return response()->json(['html' => $view]);
        }
        return view('blog.blog', compact('posts'));
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


   public function search(Request $request)
{
    $search = $request->input('search');
    $posts = Post::where('title', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%')
        ->get(); 

    return view('blog.posts')->with('posts', $posts);
}
    
}
