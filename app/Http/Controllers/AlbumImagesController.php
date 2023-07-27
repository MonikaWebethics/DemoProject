<?php

namespace App\Http\Controllers;
use App\Models\Albumimages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Admin\StoreImageRequest;
use Illuminate\Support\Str;

class AlbumImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  string $id
     * @return  Illuminate\Http\Response
     */
    public function albumImages($id)
    {  
        return view('album.album-images' ,compact('id'))
        ->with('Images',Albumimages::get());
    }

    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     * @param  string $id
     * @return  Illuminate\Http\Response
     */
    public function create($id)
    { 
            return view('album.add-images', compact('id'));   
    }

    /**
     * Store a newly created resource in storage.
     * @param  string $id
     * @return  Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $newImageName = uniqid() . '-' . Str::slug($request->title) . '-' . $file->getClientOriginalExtension();
                $file->move(public_path('album-images'), $newImageName);
    
                Albumimages::create([
                    'image_path' => $newImageName,
                    'albumid' => $id,
                ]);
            }
        }
    
        return redirect()->route('albumImages', ['id' => $id])
       ->with('message','Image has been added!');
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
    public function destroy($id)
    {
        try {
            $image = Albumimages::findOrFail($id);
            $albumId = $image->albumid;
    
            // Delete the image file from the storage
            $oldImageName = $image->image_path;
            if ($oldImageName) {
                $destination = public_path('album-images') . '/' . $oldImageName;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
    
            $image->delete();
    
            return redirect()->route('albumImages', ['id' => $albumId])->with('message', 'Image has been deleted!');
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('albumImages', ['id' => $albumId])->with('message', 'Image not found or already deleted.');
        }
    }
}
