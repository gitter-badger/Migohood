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
    protected $fillable = [
      'user_id',
      'hash',
      'thumbnail',
      'status',

      'stars',
      'likes',
      'reviews',

      'type',
      'room',
      'capacity',
      'bedrooms',
      'beds',
      'bathrooms',

      'title',
      'description',
      'pets_allowed',
      'events_allowed',
      'production_allowed',
      'family_friendly',
      'business_guest',
      'smoke_free',
      'gym',
      'parking',

      'country',
      'city',
      'location_references'
      'latitude',
      'longitude'


    ];

}
