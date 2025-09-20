<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videolar extends Model
{
   protected $table = 'videolar';

    // الأعمدة القابلة للتعبئة
    protected $fillable = ['title', 'url', 'thumbnail'];
}
