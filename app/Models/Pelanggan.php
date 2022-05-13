<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;

class Pelanggan extends Model
{
    use Sluggable;
    use HasFactory;
    use Notifiable;

    //fungsi eager loading laravel
    protected $with = ['kasirs', 'agens'];

    protected $table = 'pelanggans';

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
                'source' => 'kode'
            ]
        ];
    }

    public function kasirs()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
    }

    public function agens()
    {
        return $this->belongsTo(Agen::class, 'agen_id');
    }
}
