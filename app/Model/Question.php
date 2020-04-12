<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected static function boot(){
        parent::boot();
        static:: creating(function ($question){
            $question->slug = str_slug($question->title);

        });

    }

    public function getRouteKeyName(){
        return 'slug';
    }

    //protected $guarded = [];

    protected $fillable = ['title','slug','body','user_id','category_id'];

    protected $with = ['replies'];
    
    public function user(){
         return $this->belongsTo(user::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class)->latest();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){
        return ("/question/$this->slug");
    }

}
