<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    public $incrementing = false;    
    
    protected $fillable = [
        'albumId', 'title', 'url', 'thumbnailUrl'
    ];
    
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    
}
