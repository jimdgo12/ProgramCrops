<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pesticide extends Model
{
    use HasFactory;

    // Relación varios a varios (Pesticides => Disease)
    public function disease():BelongsToMany{
        return $this->belongsToMany (Disease::class);
    }
}
