<?php

namespace App\Models\Admin\Pages\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    // protected $guarded = []; equal to fillable all fields

    protected $fillable = [
        'title',
        'description',
        'image',
        'video',
    ];
}
