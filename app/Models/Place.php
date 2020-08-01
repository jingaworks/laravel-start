<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Place extends Model
{
    use SoftDeletes;

    public $table = 'places';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'denloc',
        'codp',
        'sirsup',
        'tip',
        'zona',
        'niv',
        'med',
        'regiune',
        'fsj',
        'fs_2',
        'fs_3',
        'fsl',
        'rang',
        'fictiv',
        'region_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function placeProducts()
    {
        return $this->hasMany(Product::class, 'place_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}