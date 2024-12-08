<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belong extends Model
{
    protected $table = 'belong'; // テーブル名を指定
    use HasFactory;
}
