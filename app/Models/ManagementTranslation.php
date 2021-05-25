<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementTranslation extends Model
{
    use HasFactory;
    protected $table = 'management_translations';

    protected $fillable = ['title', 'leader', 'reception', 'content', 'activity', 'biography', 'address'];
    public $timestamps = false;
}
