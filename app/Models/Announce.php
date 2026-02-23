<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Image;

class Announce extends Model
{
    use Searchable; 

    protected $fillable =["title","description", "price", "user_id","category_id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'category'=>$this->category
        ];   
    }

    public function setAccepted($value){
        $this->is_accepted=$value;
        $this->save();
        return true;
    }
    public static function toBeRevisedCount(){
        return Announce::where("is_accepted",null)->count();
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
    }

