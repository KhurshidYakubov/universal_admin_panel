<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereHas(string $string, \Closure $param)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 */
class Menu extends Model
{
    use HasFactory;
    use Translatable;

    public $useTranslationFallback = true;
    protected $table = 'menus';

    protected $fillable = ['category_id', 'parent_id', 'image', 'link', 'link_type', 'order', 'status', 'creator_id', 'modifier_id'];
    public $translatedAttributes = ['title'];


    public function menuTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\MenuTranslation');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'modifier_id');
    }

    public function menuCategory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ListType::class, 'id', 'category_id');
    }

    public function submenus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Menu', 'parent_id', 'id');
    }

    public static function buildTree(array $elements, $parentId = null)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}
