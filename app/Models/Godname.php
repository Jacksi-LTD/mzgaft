<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godname extends Model
{
    use HasFactory;


    public $table = 'godnames';


    protected $fillable=['name','details'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }
}
