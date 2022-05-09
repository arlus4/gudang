<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PenjualanDetail extends Model
{
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['penjualans', 'produk_stok', 'produk_harga'];

    protected $table = 'penjualan_details';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    public function penjualans()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    public function produk_stok()
    {
        return $this->hasMany(ProdukStok::class, 'stok_id');
    }

    public function produk_harga()
    {
        return $this->hasMany(ProdukHarga::class, 'harga_id');
    }
}
