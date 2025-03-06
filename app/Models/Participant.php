<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;
    protected $fillable = ['event_id', 'name', 'email', 'contact','payment_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
