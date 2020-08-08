<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Str;
use \DateTimeInterface;

class Product extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'products';

    protected $appends = [
        'images',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price_starts',
        'price_ends',
        'category_id',
        'subcategory_id',
        'region_id',
        'place_id',
        'created_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopeWithFilters($query)
    {
        return $query->when(request()->input('region'), function ($query) {
            $query->where('region_id', request()->input('region'));
        })
        ->when(request()->input('place'), function ($query) {
            $query->where('place_id', request()->input('place'));
        })
        ->when(request()->input('category'), function ($query) {
            $query->where('category_id', request()->input('category'));
        })
        ->when(request()->input('subcategory'), function ($query) {
            $query->where('subcategory_id', request()->input('subcategory'));
        });
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::title(Str::lower($value));
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function profile()
    {
        return $this->hasManyThrough(
            Profile::class,
            User::class,
            'id', // Foreign key on Users table...
            'created_by_id', // Foreign key on Profile table...
            'created_by_id', // Local key on Profiles table...
            'id' // Local key on Users table...
        )->take(1)->with(['region', 'place']);
    }
}