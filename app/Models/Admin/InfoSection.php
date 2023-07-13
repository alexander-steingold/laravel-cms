<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoSection extends Model
{
    use HasFactory;

    // protected $guarded = []; equal to fillable all fields

    protected $fillable = [
        'page',
        'title',
        'subtitle',
        'description',
        'image',
        'video',
    ];
}
