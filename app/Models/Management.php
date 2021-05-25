<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, mixed $id_filter)
 * @method static whereHas(string $string, \Closure $param)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 * @method static find(int $id)
 */
class Management extends Model
{
    use HasFactory;
    use Translatable;

    public $useTranslationFallback = true;
    protected $table = 'managements';

    protected $fillable = [
        'category_id',
        'region_id',
        'leader_image',
        'organization_image',
        'phone',
        'email',
        'fax',
        'status',
        'creator_id',
        'modifier_id'
    ];
    public $translatedAttributes = ['title', 'leader', 'reception', 'content', 'activity', 'biography', 'address'];


    public function managementTranslation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ManagementTranslation');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'modifier_id');
    }

    public function managementCat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ManagementCategory::class, 'id', 'category_id');
    }
}
