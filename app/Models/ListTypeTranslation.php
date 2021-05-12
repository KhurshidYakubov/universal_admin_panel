<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTypeTranslation extends Model
{
    use HasFactory;
    protected $table = 'list_type_translations';

    protected $fillable = ['title'];
    public $timestamps = false;
}
