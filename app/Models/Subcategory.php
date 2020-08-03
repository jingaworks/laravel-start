<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \DateTimeInterface;

class Subcategory extends Model
{
    public $table = 'subcategories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'added_by_id',
        'approved',
        'approved_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select(['id', 'name', 'slug']);
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