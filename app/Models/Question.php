<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title','correct_answer','answers','quiz_id','questiontype_id'];


    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function questiontype(){
        return $this->belongsTo(Questiontype::class);
    }

    public function getView($quiz_id,$questiontype_id){
        if ($questiontype_id == 1) {
            return 'admin/question/multiple-choice/create';
        }
        if ($questiontype_id == 2) {
            return 'admin/question/multiple-response/create';
        }
        if ($questiontype_id == 3) {
            return 'admin/question/true-false/create';
        }
        if ($questiontype_id == 4) {
            return 'admin/question/short-text/create';
        }
    }
}
