<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model {

    protected $fillable = ['name', 'body', 'completed'];
    protected $table = 'todo';

    public function getCompletedAttribute($value)
    {
        return (boolean) $value;
    }

}