<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Image;

class Announce extends Model
{
    use Searchable; 

    protected $fillable =["title","description", "price", "user_id","category_id"];

    protected function casts(): array
    {
        return [
            "is_accepted" => "boolean",
        ];
    }

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

    public function scopeAccepted(Builder $query): Builder
    {
        return $query->where("is_accepted", true);
    }

    public function isVisibleTo(?User $user): bool
    {
        if ($this->is_accepted) {
            return true;
        }

        if (!$user) {
            return false;
        }

        return $user->is_revisor || $user->id === $this->user_id;
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
