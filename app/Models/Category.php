<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =  [
        'room_id',
        'name',
        'description',
        'image'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
