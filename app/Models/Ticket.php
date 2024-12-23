<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenant_id',
        'description',
        'is_resolved',
    ];

    /**
     * Get the tenant that owns the ticket.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}