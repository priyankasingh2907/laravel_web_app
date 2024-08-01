<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactmail extends Model
{
    use HasFactory;

    protected $table = "contactmails";
    protected $fillable = [
        'name',
        'email',
        'message',
        ];
    
}
