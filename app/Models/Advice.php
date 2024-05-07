<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;

    public $table = 'advice';


    protected $fillable=['title','details'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }
}
