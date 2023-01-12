<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name_project', 'slug', 'description','cover_image', 'dev_lang','category_id'];

    public static function generateSlug($name_project)
    {
        return Str::slug($name_project, '-');
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
