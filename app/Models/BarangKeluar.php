<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangKeluar extends Model
{
    use Sluggable;
    use HasFactory;

    //fungsi eager loading laravel
    protected $with = ['kasirs', 'produk_stoks'];

    protected $table = 'barang_keluars';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_keluar' => 'date',
    ];

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
                'source' => 'nama'
            ]
        ];
    }

    public function kasirs()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
    }

    public function produk_stoks()
    {
        return $this->belongsTo(ProdukStok::class, 'stok_id');
    }
}
