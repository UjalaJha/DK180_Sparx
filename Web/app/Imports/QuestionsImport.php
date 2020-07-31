<?php

namespace App\Imports;

use App\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            //
//            'question_id' => $row[0],
            'tq_category_details_id' => $row[0],
            'tq_concept_details_id' => $row[1],
            'is_level_2' => $row[2],
            'is_options_available' => $row[3],
            'question_statement' => $row[4],
            'option_1' => $row[5],
            'option_2' => $row[6],
            'option_3' => $row[7],
            'option_4' => $row[8],
            'correct_opton' => $row[9],

        ]);
    }
}
