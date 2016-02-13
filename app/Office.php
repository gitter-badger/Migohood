<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'offices';

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

    'stars',
    'recommends',
    'votes',
    'comments',

    //Basic
    'type',
    'accomodance',
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
    'currency',

    //Extras
    /* Amenities */
    'bathroom',
    'tv_cable',
    'air_conditioning',
    'heating',
    'wifi',

    /* Other */
    'parking',
    'elevator',
    'room_meeting',

    /* Special */
    'smoking_allowed'
  ];

  /**
  * Get the User that owns the office.
  */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
