<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class History extends Model
{
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['agens'];

    protected $table = 'histories';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    public function agens()
    {
        return $this->belongsTo(Agen::class, 'agen_id');
    }
}
