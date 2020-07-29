<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $table = 'company_details';

    protected $primaryKey = 'company_id';
    public $timestamps = false;
}
