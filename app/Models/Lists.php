<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, mixed $filter)
 * @method static whereHas(string $string, \Closure $param)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 * @method static find(int $id)
 */
class Lists extends Model
{
    use HasFactory;
    use Translatable;
    use Sluggable;

    public $useTranslationFallback = true;
    protected $table = 'lists';

    protected $fillable = [
        'category_id',
        'slug',
        'anons_image',
        'body_image',
        'utube_code',
        'video',
        'media_type',
        'link',
        'link_type',
        'main_page',
        'right_menu',
        'date',
        'order',
        'count_view',
        'status',
        'creator_id',
        'modifier_id'
    ];
    public $translatedAttributes = [
        'title',
        'short_description',
        'description',
        'body'
    ];

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
        $slug = SlugService::createSlug(Lists::class, 'slug', $slugable, ['unique' => false]);

        return $slug;
    }

    public function listTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ListsTranslation');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'modifier_id');
    }

    public function listCat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ListCategory::class, 'id', 'category_id');
    }
}
