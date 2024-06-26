<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanksoalQuestion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'options' => 'json',
    ];

    public function banksoal()
    {
        return $this->belongsTo(Banksoal::class);
    }

    public function userExamBanksoals()
    {
        return $this->hasMany(UserExamBanksoal::class, 'question_id');
    }

    public function banksoalQuestions()
    {
        return $this->hasMany(BanksoalQuestion::class, '');
    }
}
