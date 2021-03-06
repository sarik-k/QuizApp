<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiztype extends Model
{
    use HasFactory;

    public function quiz(){
        return $this->hasMany(Quiztype::class);
    }
}
