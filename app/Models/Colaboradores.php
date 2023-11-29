<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\Cargo;
use App\Models\CargoColaborador;

class Colaboradores extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colaboradores';

    protected $fillable = [
        'id',
        'unidade_id',
        'nome',
        'cpf',
        'email',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot() {

        parent::boot();

        static::creating(function ($model) {

            $model->id = (string) Str::uuid();
        });
    }

    public function unidade() {

        return $this->belongsTo(Unidades::class, 'unidade_id', 'id');
    }

    public function cargos() {
        return $this->belongsToMany(
            Cargo::class,
                'cargo_colaborador',
                'colaborador_id',
                'cargo_id'
            )
            ->withPivot('nota_desempenho');
    }
}
