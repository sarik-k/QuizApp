<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','correct_answer','answers','quiz_id','questiontype_id'];


    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function questiontype(){
        return $this->belongsTo(Questiontype::class);
    }

    public function getView($quiz_id,$questiontype_id){
        if ($questiontype_id == 1) {
            return 'admin/quiz/question/multiple-choice/create';
        }
        if ($questiontype_id == 2) {
            return 'admin/quiz/question/multiple-response/create';
        }
        if ($questiontype_id == 3) {
            return 'admin/quiz/question/true-false/create';
        }
        if ($questiontype_id == 4) {
            return 'admin/quiz/question/short-text/create';
        }
    }
}
