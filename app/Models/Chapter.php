<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public $table = 'chapters';


    protected $fillable=['title','cat_id'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

}
