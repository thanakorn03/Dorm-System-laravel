<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['tenant_id', 'amount', 'status', 'due_date'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

