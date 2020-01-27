<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'title' => 'required',
        'user_id' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
