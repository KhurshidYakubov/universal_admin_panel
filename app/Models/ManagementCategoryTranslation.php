<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementCategoryTranslation extends Model
{
    use HasFactory;
    protected $table = 'manage_cat_translations';

    protected $fillable = ['title'];
    public $timestamps = false;
}
