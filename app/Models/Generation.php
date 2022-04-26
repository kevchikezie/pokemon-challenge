<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier',
        'region_id',
    ];

    /**
     * Table relationships
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function species()
    {
        return $this->hasMany(Species::class);
    }

}
