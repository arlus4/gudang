<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;

class Penjualan extends Model
{
    use Sluggable;
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['agens', 'pelanggans']; //hanya untuk BelongsTo

    protected $table = 'penjualans';

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

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function penjualan_detail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id');
    }

    public function tempos()
    {
        return $this->hasMany(Tempo::class);
    }
}
