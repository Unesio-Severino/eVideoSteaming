<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use SoftDeletes;

    // protected $with = ['videos'];

    protected $fillable = [
        'image',
        'title',
        'description',
        'objectives',
        'price',
        'total_videos',
        'duration',
        'channel_id',
        'user_id',
        'category_id'
    ];

    public function user(){
        return $this->hasOne('App\User');
    }

    public function videos(){
        return $this->hasMany('App\Video');
    }
}
