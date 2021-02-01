<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','description','quiztype_id','user_id'];

    public function quiztype(){
        return $this->belongsTo(Quiztype::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function result(){
        return $this->hasmany(Result::class);
    }
}
