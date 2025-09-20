<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeforeAfter extends Model
{
    // الحقول المسموح لها بالـ mass assignment
    protected $fillable = [
        'title',
        'before_image',
        'after_image',
    ];  
}
