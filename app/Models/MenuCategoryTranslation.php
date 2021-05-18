<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategoryTranslation extends Model
{
    use HasFactory;
    protected $table = 'menu_category_translations';

    protected $fillable = ['title'];
    public $timestamps = false;
}
