<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    protected $fillable = ['title', 'description', 'content', 'parent_id', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($module) {
            $module->slug = Str::slug($module->title);
        });

        static::updating(function ($module) {
            $module->slug = Str::slug($module->title);
        });
    }

    public function submodules()
    {
        return $this->hasMany(Module::class, 'parent_id');
    }
}

