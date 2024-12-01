<?php

namespace Jeff\LaraLogger\App\Models;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
  protected $table = 'logs';
  protected $fillable = [
    'level',
    'message',
    'context',
  ];
}
