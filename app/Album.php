<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    public $incrementing = false;
    
    protected $fillable = [
        'userId', 'title'
    ];


    
    public function photos()
    {
       return $this->hasMany(Photo::class);
    }
}
