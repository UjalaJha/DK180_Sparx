<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TQCategoryDetails extends Model
{
    //
    protected $table = 'tq_category_details';

    protected $primaryKey = 'tq_category_details_id';
    public $timestamps = false;

    public static function fetchSubCategory($category_name){
        $value = DB::table('tq_category_details')->where('category',$category_name)->get();
        return $value;
    }

}
