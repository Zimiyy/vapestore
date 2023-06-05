<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'color' => 'array',
        'storage_size' => 'array',
        'extra_image' => 'array',
    ];

    public function getStorageModelAttribute()
    {
        return StorageSize::whereIn('id', $this->storage_size)->orderBy('size')->get();
    }

    public function getColorModelAttribute()
    {
        return Color::whereIn('id', $this->color)->orderBy('code')->get();
    }
}
