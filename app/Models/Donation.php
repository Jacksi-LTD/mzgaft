<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Donation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    public $table = 'donations';


    protected $fillable=['amount','bank','trans_number'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected $appends = [
        'image',
    ];
}
