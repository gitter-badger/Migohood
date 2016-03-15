<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'times';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['time'];
}
