<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListsTranslation extends Model
{
    use HasFactory;

    protected $table = 'list_translations';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'body'
    ];
    public $timestamps = false;
}
