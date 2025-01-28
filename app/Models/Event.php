<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','title','description','banner_image','logo_image','created_by','event_date','start_at'];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}
