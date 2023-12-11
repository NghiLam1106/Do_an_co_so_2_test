<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_user_name',
        'user_id',
        'comment_product_id',
        'commet',
        'hinhanh'
    ];

    // public function users() {
    //     return $this->hasOne(User::class, 'id', 'menu_id')->withDefault(['name' => '']);
    // }
}
