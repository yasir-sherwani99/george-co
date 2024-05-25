<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    /*
    |---------------------------------------------------------------
    | Relations
    |---------------------------------------------------------------
    */
    public function project()
    {
        return $this->hasOne(Project::class, 'category_id');
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

    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = $this->createSlug($value);
    }

    private function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereName($title)->latest('id')->value('slug');
            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;

                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }
}
