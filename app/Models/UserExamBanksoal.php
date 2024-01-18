<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExamBanksoal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'response_data' => 'json',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function banksoalQuestions()
    {
        return $this->hasMany(BanksoalQuestion::class, 'question_id');
    }

    public function banksoal()
    {
        return $this->belongsTo(Banksoal::class);
    }
}
