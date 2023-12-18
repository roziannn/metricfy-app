<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banksoal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($banksoal) {
            $banksoal->slug = Str::slug($banksoal->title);
        });

        static::updating(function ($banksoal) {
            $banksoal->slug = Str::slug($banksoal->title);
        });
    }

    public function banksoalQuestions(){
        return $this->hasMany(BanksoalQuestion::class);
    }
}
