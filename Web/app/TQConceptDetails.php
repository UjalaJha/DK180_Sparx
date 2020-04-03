<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TQConceptDetails extends Model
{
    //
    protected $table = 'tq_concept_details';

    protected $primaryKey = 'tq_concept_details_id';
    public $timestamps = false;

    public static function fetchSubConcept($id, $concept){
        $value = DB::table('tq_concept_details')->where('tq_category_details_id',$id)->where('level',$concept)->get();
        return $value;

    }

}
