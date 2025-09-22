<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'description', 'status'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
