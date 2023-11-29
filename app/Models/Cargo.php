<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Cargo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cargos';

    protected $fillable = [
        'id',
        'cargo',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot() {

        parent::boot();

        static::creating(function ($model) {

            $model->id = (string) Str::uuid();
        });
    }

    public function colaboradores()
    {
        return $this->belongsToMany(
                Colaboradores::class,
                'cargo_colaborador',
                'cargo_id',
                'colaborador_id'
            )
            ->withPivot('nota_desempenho');
    }
}
