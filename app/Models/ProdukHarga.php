<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHarga extends Model
{
    use HasFactory;

    //fungsi eager loading laravel
    protected $with = ['produk_stok', 'produk_jasa'];

    protected $table = 'produk_hargas';

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

    public function produk_jasa()
    {
        return $this->belongsTo(ProdukJasa::class, 'jasa_id');
    }
}
