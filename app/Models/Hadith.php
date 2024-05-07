<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadith extends Model
{
    use HasFactory;

    public $table = 'hadiths';


    protected $fillable=['title','details','category_id','chapter_id','number','narrated_by'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
