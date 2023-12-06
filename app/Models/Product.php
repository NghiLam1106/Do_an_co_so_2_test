<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameproduct',
        'menu_id',
        'content',
        'soluong',
        'hinhanhproduct',
        'price',
        'mausac',
        'size'
    ];

    public function menu() {
        return $this->hasOne(Menu::class, 'id', 'menu_id')->withDefault(['name' => '']);
    }
}
