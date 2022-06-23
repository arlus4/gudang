<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;

class ProdukReturn extends Model
{
    use Sluggable;
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['agens', 'pelanggans', 'kasirs', 'penjualans']; //hanya untuk BelongsTo

    protected $table = 'produk_returns';

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

    public function penjualans()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function agens()
    {
        return $this->belongsTo(Agen::class, 'agen_id');
    }

    public function kasirs()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
    }
}
