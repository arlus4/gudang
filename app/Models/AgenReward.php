<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenReward extends Model
{
    use HasFactory;

    protected $with = ['agens'];

    protected $table = 'agen_rewards';

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

    public function agens()
    {
        return $this->belongsTo(Agen::class, 'agen_id');
    }
}
