<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seel extends Model
{
    use HasFactory;

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
