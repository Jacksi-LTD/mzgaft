<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Plead extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $table = 'pleads';

    protected $appends = [
        'audio_file',
    ];

    protected $fillable=['title','details','category_id'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }

    public function getAudioFileAttribute()
    {
        return $this->getMedia('audio_file');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // No conversions needed for audio files, but method is required
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
