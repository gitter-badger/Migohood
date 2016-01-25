<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'places';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable =
  [
    'hash',
    'type',
    'other',
    'accomodance',
    'capacity',
    'bedrooms',
    'beds',
    'bathrooms',

    'def_title',
    'thumbnail',

    'public',
    'where',

    'title',
    'description'
  ];

  /**
  * Get the User that owns the places.
  */
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
