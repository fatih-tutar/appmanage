<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable=['title','description','image','started_at','finished_at','status'];

    protected $dates = ['finished_at','started_at'];

    public function getTimeAtAttiribute($date){
        return $date ? Carbon::parse($date) : null;
    }
}
