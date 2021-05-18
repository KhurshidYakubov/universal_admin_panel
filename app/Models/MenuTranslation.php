<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    use HasFactory;
    protected $table = 'menu_translations';

    protected $fillable = ['title'];
    public $timestamps = false;
}
