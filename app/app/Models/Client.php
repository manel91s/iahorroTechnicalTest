<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'type_id',
        'score'
    ];

    public function clientTypes(): HasMany
    {
        return $this->hasMany(ClientType::class);
    }
}
