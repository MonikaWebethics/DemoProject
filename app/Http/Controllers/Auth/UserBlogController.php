<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\{User, Post};

class UserBlogController extends Controller
{
  
    public function blog(Request $request){
        $user = Auth::user();
        if ($user) {
            $posts = $user->posts()->orderBy('updated_at', 'DESC')->paginate(2);
            ;
        } else {
            return redirect()->route('login');
        }
        if ($request->ajax()) {
            $view = view('blog.user-posts', compact('posts'))->render();

            return response()->json(['html' => $view]);
        }
    
        return view('blog.user-blog', compact('posts'));
    }
//Blog search function
    public function search(Request $request)
    {
        $search = $request->input('search');
        $user = Auth::user();
        $posts = $user->posts()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->get();
    
        return view('blog.user-posts')->with('posts', $posts);
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
        $userId = Auth::id();
        $newImageName = uniqid() . '-' . $request->title . '-' . $request->image->extension();
        $request->image->move(public_path('blog-images'), $newImageName);
    
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'user_id' => $userId,
            'image_path' => $newImageName,
            'published' => $request->has('published'),
        ]);
    
        return redirect(route('user.blog'))
            ->with('message', 'Your Post has been added!');
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

    return redirect(route('user.blog'))->with('message', 'Your Post has been updated!');
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
    
        return redirect(route('user.blog'))->with('message', 'Your post has been deleted!');
    }
}
