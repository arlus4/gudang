<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Penjualan extends Model
{
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['users', 'kasirs', 'agens', 'pelanggans', 'penjualan_detail'];

    protected $table = 'penjualans';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kasirs()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
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
        return $this->hasMany(PenjualanDetail::class);
    }
}
