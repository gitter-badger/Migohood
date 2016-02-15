<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'reservations';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable =
  [
    'hash',
    'who_request',
    'who_rents',
    'announce_hash',
    'announce_type',

    'when_stars',
    'when_ends',
    'capacity',

    'ammount',
    'status'
  ];
}
