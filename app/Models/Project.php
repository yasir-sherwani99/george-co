<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'unit',
        'town',
        'city',
        'is_active',
    ];

    /*
    |---------------------------------------------------------------
    | Relations
    |---------------------------------------------------------------
    */
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }

    /*
    |---------------------------------------------------------------
    | Scopes
    |---------------------------------------------------------------
    */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /*
    |---------------------------------------------------------------
    | Mutators
    |---------------------------------------------------------------
    */
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucfirst($value);
    }

    public function setTownAttribute($value)
    {
        return $this->attributes['town'] = ucfirst($value);
    }

    public function setCityAttribute($value)
    {
        return $this->attributes['city'] = ucfirst($value);
    }
}
