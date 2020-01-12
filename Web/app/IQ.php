<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IQ extends Model
{
	protected $table = 'intelligent_test_questions';
   
    protected $primaryKey = 'question_id';
}
