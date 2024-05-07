<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class YoutubeVideo extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $table = 'youtube_videos';


    protected $fillable=['title','url','approved','category_id'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
