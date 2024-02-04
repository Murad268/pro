<?php

// app/Models/Query.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = ['api_address', 'is_registered'];

    public function scopeApiAddress($query, $apiAddress)
    {
        return $query->where('api_address', $apiAddress);
    }

    public function scopeIsRegistered($query, $isRegistered)
    {
        return $query->where('is_registered', $isRegistered);
    }
}
