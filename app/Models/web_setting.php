<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class web_setting extends Model
{
    use HasFactory;

    protected $table = "web_setting";
    protected $fillable = [
        'web_title',
        'email',
        'phone',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'contact_card_one',
        'contact_card_two',
        'contact_card_three',

    ];
}
