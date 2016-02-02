<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'spaces';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable =
  [
    'hash',
    'thumbnail',
    'notpublic',
    'public',

    //Basic
    'type',
    'accomodance',
    'capacity',
    'bedrooms',
    'beds',
    'bathrooms',

    //Description
    'title',
    'description',

    //Location
    'country',
    'city',
    'address',
    'location_references',
    'zip',

    'price',
    'per',
    'coin'

  ];

  /**
  * Get the User that owns the spaces.
  */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  /**
   * Get the Spaces for the User.
   */
  public function photos()
  {  
     return $this->hasMany('App\Photo');
  }

}
