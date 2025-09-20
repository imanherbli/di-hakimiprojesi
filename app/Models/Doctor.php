<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctor'; // اسم الجدول صريح
protected $fillable = [
    'name_ar','name_tr','name_en',
    'specialization_ar','specialization_tr','specialization_en',
    'description_ar','description_tr','description_en',
    'image'
];

}
