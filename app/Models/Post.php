<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\country;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['title','slug','user_id','description','image_path','published'];
    public function sluggable(): array{
       return [
        'slug' =>[
            'source' => 'title'
        ]
       ];
    }
    
    
    

    
    
}
