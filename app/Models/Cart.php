<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::Class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::Class, 'color_id');
    }

    public function storage()
    {
        return $this->belongsTo(StorageSize::Class, 'storage_id');
    }
}
