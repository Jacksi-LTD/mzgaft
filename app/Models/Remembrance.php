<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remembrance extends Model
{
    use HasFactory;

    //remembrances
    public $table = 'remembrances';


    protected $fillable=['title','repet','content','sort','category_id'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('sort', 'desc')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
