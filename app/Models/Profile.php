<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
protected $fillable = ['client_id', 'biography', 'phone'];

public function client() { return $this->belongsTo(Client::class); }


}
