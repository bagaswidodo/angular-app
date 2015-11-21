<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model {

    protected $fillable = ['name', 'address'];
    protected $table = 'cafe';

    // public function getCompletedAttribute($value)
    // {
    //     return (boolean) $value;
    // }

}