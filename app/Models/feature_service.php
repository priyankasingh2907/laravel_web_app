<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feature_service extends Model
{
    use HasFactory;
    protected $table = "featured_services";
    protected $fillable = [
        'service_id',
        'sort_order',
       
        

    ];
}
