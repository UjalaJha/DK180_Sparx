<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
	protected $table = 'jobs_posted';
   
    protected $primaryKey = 'job_id';
    public $timestamps = false;
   
}
