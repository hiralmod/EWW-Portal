<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class department_access extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='department_access';
}
