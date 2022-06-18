<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailReward extends Model
{
    use HasFactory;

    protected $with = ['pelanggans'];

    protected $table = 'retail_rewards';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_bayar' => 'date',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}
