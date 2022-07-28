<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcmJob extends Model
{
    use HasFactory;

    protected $fillable = ['identifier', 'deliver_at'];

}
