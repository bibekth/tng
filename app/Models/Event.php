<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','title','slug','description','banner_image','logo_image','created_by','event_date','start_at','fee'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
