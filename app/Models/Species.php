<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier',
        'generation_id',
        'color_id',
        'shape_id',
        'habitat_id',
        'gender_rate',
        'capture_rate',
        'base_happiness',
    ];

    /**
     * Table relationships
     */
    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function shape()
    {
        return $this->belongsTo(Shape::class);
    }

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }

}
