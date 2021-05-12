<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereHas(string $string, \Closure $param)
 * @method static where(string $string, mixed $status_filter)
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $data)
 * @method static find(int $id)
 * @method static findOrFail(int $id)
 */
class ListCategory extends Model
{
    use HasFactory;
    use Translatable;
    use Sluggable;

    public $useTranslationFallback = true;
    protected $table = 'list_categories';

    protected $fillable = ['parent_id', 'type_id', 'image', 'color', 'status', 'slug', 'creator_id', 'modifier_id'];
    public $translatedAttributes = ['title'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function makeSlug($slugable)
    {
        $slug = SlugService::createSlug(ListCategory::class, 'slug', $slugable, ['unique' => false]);

        return $slug;
    }

    public function listTypeTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ListCategoryTranslation');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'modifier_id');
    }

    public function listCatType(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ListType::class, 'id', 'type_id');
    }
}
