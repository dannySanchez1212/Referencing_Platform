<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $fillable = [
        "id", 
        "contact_by_email", 
        "contact_by_phone",
        "prequal_link",
        "source_id",
        "source_display_name",
        "source_key_name",
    ];
}
