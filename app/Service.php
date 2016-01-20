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
  protected $table = 'places';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'type', 'other', 'accomodance', 'capacity', 'country'];

  /**
  * Get the User that owns the places.
  */
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
