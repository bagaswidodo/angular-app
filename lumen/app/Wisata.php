<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Wisata extends Model
{
	protected $table = 'wisata';

	/**
     * The belongsTo relation.
     * 
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Added attribute
     *
     * @var array
     */
    protected $appends = ['is_owner'];


     /**
     * is_owner mutator.
     * 
     */
    public function getIsOwnerAttribute()
    {
        if(Auth::check())
        {
            return $this->attributes['user_id'] === Auth::id() || Auth::user()->admin;
        }
        
        return false;
    }
}