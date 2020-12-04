<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public function adLanguage()
    {
        return $this->belongsTo('App\Models\Language', 'language_id', 'id');
    }
 
}
