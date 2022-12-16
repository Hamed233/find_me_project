<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class SubSection extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public $translatable = ['section_name'];
    protected $fillable=['section_name','status', 'section_parent'];

    protected $table = 'sub_sections';
    public $timestamps = true;

    public function getParentsSection() {
        return $this->belongsTo('App\Models\Section', 'parent_section');
    }
}
