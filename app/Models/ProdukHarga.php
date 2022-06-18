<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukHarga extends Model
{
    use Sluggable;
    use HasFactory;

    //fungsi eager loading laravel
    protected $with = ['produk_stok'];

    protected $table = 'produk_hargas';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_harga_terkini' => 'date',
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

    public function produk_stok()
    {
        return $this->belongsTo(ProdukStok::class, 'stok_id');
    }
}
