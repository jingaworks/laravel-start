<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \DateTimeInterface;

class Category extends Model
{
    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'added_by_id',
        'approved',
        'approved_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopeWithFilters($query)
    {
        return $query->when(request()->input('region'), function ($query) {
            $query->with(['products' => function ($query) {
                $query->where('region_id', request()->input('region'));
            }]);
        })
        ->when(request()->input('place'), function ($query) {
            $query->with(['products' => function ($query) {
                $query->where('place_id', request()->input('place'));
            }]);
        });
    } 
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title(Str::lower($value));
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function added_by()
    {
        return $this->belongsTo(User::class, 'added_by_id');
    }

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }
}