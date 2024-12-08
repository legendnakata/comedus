<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user'; // テーブル名を指定
    protected $primaryKey = 'user_id'; // 主キーを指定

    protected $fillable = ['user_name', 'user_pass']; // マスアサインメントを許可するカラムを指定

    public $timestamps = false; // created_at と updated_at タイムスタンプを使用しない
}
