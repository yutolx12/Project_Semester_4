<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energy extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'ampere', 'voltage', 'watt', 'ruangan', 'update_time'];
}
