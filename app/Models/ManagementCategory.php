<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $id_filter)
 * @method static whereHas(string $string, \Closure $param)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 * @method static orderBy(string $string, string $string1)
 * @method static find(int $id)
 */
class ManagementCategory extends Model
{
    use HasFactory;
    use Translatable;

    public $useTranslationFallback = true;
    protected $table = 'manage_cats';

    protected $fillable = ['image', 'color', 'status', 'slug', 'creator_id', 'modifier_id'];
    public $translatedAttributes = ['title'];


    public function managementCatTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ManagementCategoryTranslation', 'id', 'manage_cat_id');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'modifier_id');
    }

}
