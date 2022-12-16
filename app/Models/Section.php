<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Section extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public $translatable = ['section_name'];
    protected $fillable=['section_name','status'];

    protected $table = 'sections';
    public $timestamps = true;

}
