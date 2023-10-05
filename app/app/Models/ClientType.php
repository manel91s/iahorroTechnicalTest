<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientType extends Model
{
    use HasFactory;

    protected $table = 'client_types';
    protected $fillable = [
        'name'
    ];

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
