<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;

class Tempo extends Model
{
    use Sluggable;
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['pembayarans'];

    protected $table = 'tempos';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_jatuh_tempo' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //pakai third-library EloquentSluggable
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'invoice'
            ]
        ];
    }

    public function pembayarans()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id');
    }
}
