<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submodule extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($submodule) {
            $submodule->slug = Str::slug($submodule->title);
        });

        static::updating(function ($submodule) {
            $submodule->slug = Str::slug($submodule->title);
        });
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }
}
