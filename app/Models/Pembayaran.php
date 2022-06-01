<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;

class Pembayaran extends Model
{
    use Sluggable;
    use HasFactory;
    use Notifiable;

    protected $table = 'pembayarans';

    //fungsi eager loading laravel
    protected $with = ['penjualans', 'agens']; //hanya untuk BelongsTo

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

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

    public function agens()
    {
        return $this->belongsTo(Agen::class, 'agen_id');
    }

    public function penjualans()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }
}
