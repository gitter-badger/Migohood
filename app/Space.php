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

      'city_id',
      'address',
      'latitude',
      'longitude',
      'location_references',

      'thumbnail',
      'price',
      'per',
      'currency',
      'check_in',
      'check_out',

      'towels',
      'bed_sheets',
      'soap',
      'shampoo',
      'toilet_paper',
      'cleaning_kit',
      'iron',
      'hair_dryer',
      'elevator',
      'hot_tub',
      'washer',
      'dishwasher',
      'wheelchair_access',
      'AC',
      'heat',
      'B&B',
      'workspace',
      'pool',
      'sauna',
      'terrace',
      'chef',
      'translator',
      'chef',
      'flexible_check_in',
      'flexible_check_out'  

    ];

}
