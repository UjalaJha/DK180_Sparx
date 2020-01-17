<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TQ extends Model
{
	protected $table = 'technical_test_questions';
   
    protected $primaryKey = 'question_id';
}
