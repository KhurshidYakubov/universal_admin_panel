<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static whereHas(string $string, \Closure $param)
 * @method static where(string $string, mixed $id_filter)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 * @method static find(int $id)
 */
class MenuCategory extends Model
{
    use HasFactory;
    use Translatable;
//    public $timestamps = false;

    public $useTranslationFallback = true;
    protected $table = 'menu_categories';

    protected $fillable = ['status'];
    public $translatedAttributes = ['title'];


    public function menuCategoryTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\MenuCategoryTranslation');
    }
}
