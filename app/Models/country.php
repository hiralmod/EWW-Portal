<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class country extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'country';

    public function state()
    {
        return $this->hasMany(state::class);
    }
}
