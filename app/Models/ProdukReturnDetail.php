<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;

class ProdukReturnDetail extends Model
{
    use Sluggable;
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['details', 'returns']; //hanya untuk BelongsTo

    protected $table = 'produk_return_details';

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

    public function details()
    {
        return $this->belongsTo(PenjualanDetail::class, 'detail_id');
    }

    public function returns()
    {
        return $this->belongsTo(ProdukReturn::class, 'return-id');
    }
}
