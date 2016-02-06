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

    'stars',
    'recommends',
    'comments',

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

    //Pricing
    'price',
    'per',
    'currency',

    //Extras
    /* Amenities */
    'towels',
    'bed_sheets',
    'soap',
    'toilet_paper',
    'shampoo',
    'tv',
    'air_conditioning',
    'heating',
    'kitchen',
    'wifi',
    'iron',
    'breakfast',

    /* Other */
    'hot_tub',
    'washer',
    'pool',
    'dryer',
    'parking',
    'gym',
    'elevator',
    'workspace',

    /* Special */
    'family_kid_friendly',
    'smoking_allowed',
    'pets_allowed'

  ];

  /**
  * Get the User that owns the spaces.
  */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
