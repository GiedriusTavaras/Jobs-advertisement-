<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function languageAds()
   {
       return $this->hasMany('App\Models\Ad', 'language_id', 'id');
   }

}
