<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Albumimages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreAlbumRequest;

class AlbumController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     */
    public function album()
    {
        return view('album.album')->with('albums', Album::get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.add-album');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        $newImageName= uniqid() . '-' . $request->title . '-' . $request->image->extension();
        $request->image->move(public_path('album-images'),$newImageName);
        Album::create([
            'title'=> $request->input('title'),
            'image_path'=>  $newImageName,
        ]);
       return redirect(route('album'))
       ->with('message','Album has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  string $id
     * @return  Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        try {
            $Album = Album::findOrFail($id);
            $images = Albumimages::where('albumid', $id)->get();
    

            foreach ($images as $image) {
                $oldImageName = $image->image_path;
                if ($oldImageName) {
                    $destination = public_path('album-images') . '/' . $oldImageName;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                }
            }
            // Delete the image file from the storage
            $oldImageName = $Album->image_path;
            if ($oldImageName) {
                $destination = public_path('album-images') . '/' . $oldImageName;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
    
            $Album->delete();
    
            return redirect()->route('album', ['id' => $id])->with('message', 'Album has been deleted!');
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('album', ['id' => $id])->with('message', 'Album not found or already deleted.');
        }
    }
}
