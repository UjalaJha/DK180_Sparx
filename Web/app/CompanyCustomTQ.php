<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCustomTQ extends Model
{
    protected $table = 'company_custom_tq_questions';

    protected $primaryKey = 'company_custom_tq_questions_id';

    protected $fillable = ['tq_category_details_id',
        'tq_concept_details_id',
        'is_level_2',
        'is_options_available',
        'question_statement',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_opton'];
}
