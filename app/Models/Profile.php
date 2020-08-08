<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Profile extends Model implements HasMedia
{
    use MultiTenantModelTrait, HasMediaTrait;

    public $table = 'profiles';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address',
        'serie_id',
        'number',
        'valid_year',
        'region_id',
        'place_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function serie()
    {
        return $this->belongsTo(Region::class, 'serie_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
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

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select(['id', 'name', 'phone', 'email']);
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            User::class,
            'id', // Foreign key on Users table...
            'created_by_id', // Foreign key on Products table...
            'created_by_id', // Local key on Atestats table...
            'id' // Local key on Users table...
        )->with(['category', 'subcategory','region', 'place']);
    }

    public function apiAtestatProducts()
    {
        return $this->hasManyThrough(
                Product::class,
                User::class,
                'id', // Foreign key on Users table...
                'created_by_id', // Foreign key on Products table...
                'created_by_id', // Local key on Atestats table...
                'id' // Local key on Users table...
                )
                // ->select(['products.id', 
                //         'products.title', 
                //         'products.slug', 
                //         'products.description', 
                //         'products.category_id', 
                //         'products.subcategory_id',
                //         'products.region_id',
                //         'products.place_id'])
                ->with(['category', 'subcategory']);
    }
}