<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novage extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number', 'message', 'mobile_network','ref_code'];
}
