<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $fillable =
     [
       'hash',
       'thumbnail',
       'notpublic',
       'public',

       'stars',
       'recommends',
       'votes',
       'comments',

       //Basic
       'type',
       'capacity',

       //Description
       'title',
       'description',

       //Location
       'country',
       'city',
       'address',
       'location_references',
       'zip',

       //Pricing
       'price',
       'per',
       'currency'
     ];

     /**
     * Get the User that owns the service.
     */
     public function user()
     {
         return $this->belongsTo('App\User');
     }
}
