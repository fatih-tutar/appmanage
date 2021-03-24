<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Abone extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number',];
}
