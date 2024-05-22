<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plead extends Model
{
    use HasFactory;

    public $table = 'pleads';


    protected $fillable=['title','details'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }
}
