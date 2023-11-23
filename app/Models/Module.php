<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    protected $guarded = ['id'];

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
        return $this->hasMany(Submodule::class);
    }

    public function exercises(){
        return $this->hasMany(Exercise::class);
    }
}

