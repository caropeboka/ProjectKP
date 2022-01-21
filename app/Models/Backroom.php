<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Backroom extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
