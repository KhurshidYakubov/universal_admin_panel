<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListCategoryTranslation extends Model
{
    use HasFactory;
    protected $table = 'list_category_translations';

    protected $fillable = ['title'];
    public $timestamps = false;
}
