<?php

namespace App\Models;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Region extends Model
{
    public $table = 'regions';
    public $timestamps = false;

    protected $dates = [];

    protected $fillable = [
        'denj',
        'fsj',
        'mnemonic',
        'zona',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'region_id', 'id');
    }

    public function places()
    {
        return $this->hasMany(Place::class, 'region_id', 'id');
    }
}