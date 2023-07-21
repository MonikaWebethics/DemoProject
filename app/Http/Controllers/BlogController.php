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

    public function blog(){
        // $post = Post::all();
        // dd($post);
        return view('blog.blog')
        ->with('posts',Post::orderBy('updated_at','DESC')->get());
       }  

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
       
        $newImageName= uniqid() . '-' . $request->title . '-' . $request->image->extension();
        $request->image->move(public_path('blog-images'),$newImageName);
        Post::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'slug'=> SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path'=>  $newImageName,
            'published' => $request->has('published')
        ]);
       return redirect(route('blog'))
       ->with('message','Your Post has been added!');
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

    /**
     * Show the form for editing the specified resource.
     * @param  string $slug
     * @return  Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
        ->with('post', Post::where('slug',$slug)->first());;
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    

public function update( UpdateBlogRequest $request, $slug)
{

    $post = Post::where('slug', $slug)->first();

    if (!$post) {
        return redirect(route('blog'))->with('error', 'Post not found!');
    }

    $oldImageName = $post->image_path;

    if ($request->hasFile('image')) {
        $destination = public_path('blog-images') . '/' . $oldImageName;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $newImageName = uniqid() . '-' . $request->title . '-' . $request->image->extension();
        $request->image->move(public_path('blog-images'), $newImageName);

        $post->update([
            'image_path' => $newImageName,
        ]);
    }

    $post->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        'published' => $request->has('published')
    ]);

    return redirect(route('blog'))->with('message', 'Your Post has been updated!');
}


    /**
     * Remove the specified resource from storage.
     * @param  string $slug
     * @return  Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $oldImageName = $post->image_path;
    
        if ($oldImageName) {
            $destination = public_path('blog-images') . '/' . $oldImageName;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
    
        $post->delete();
    
        return redirect(route('blog'))->with('message', 'Your post has been deleted!');
    }
    
}
