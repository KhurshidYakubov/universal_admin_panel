<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @method static paginate(int $int)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 * @method static find(int $id)
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, mixed $status_filter)
 * @method static whereHas(string $string, \Closure $param)
 */
class ListType extends Model
{
    use HasFactory;
    use Translatable;
    use Sluggable;
    public $useTranslationFallback = true;

    protected $table = 'list_types';

    protected $fillable = ['status', 'slug', 'creator_id', 'modifier_id'];
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
        $slug = SlugService::createSlug(ListType::class, 'slug', $slugable, ['unique' => false]);

        return $slug;
    }

    public function listTypeTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ListTypeTranslation');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'modifier_id');
    }

    public function testRelation(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
    {
        return $this->hasOneThrough(
            Lists::class,
            ListCategory::class,
            'type_id',
            'category_id',
            'id',
            'id'
        );
    }

}
