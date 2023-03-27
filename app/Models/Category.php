<?php
namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        'blogs' => 'مقالات',
        'audios' => 'صوتيات',
        'books' => 'كتب',
        'audio_books' => 'كتب صوتية',
        'questions' => 'پرسیار',
    ];

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'category_id',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
