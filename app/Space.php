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

    'steps',
    'link',

    'type',
    'other',
    'accomodance',
    'capacity',

    'bedrooms',
    'beds',
    'bathrooms',

    'price',
    'per',
    'coin',

    'title',
    'description',

    'country',
    'city',
    'address',
    'zip'
  ];

  /**
  * Get the User that owns the spaces.
  */
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
