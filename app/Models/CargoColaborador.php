<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Cargo;
use App\Models\Colaboradores;

class CargoColaborador extends Model
{
    use HasFactory;

    protected $table = 'cargo_colaborador';

    protected $fillable = [
        'id',
        'cargo_id',
        'colaborador_id',
        'nota_desempenho',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot() {

        parent::boot();

        static::creating(function ($model) {

            $model->id = (string) Str::uuid();
        });
    }

    public function cargo() {

        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }

    public function colaborador() {

        return $this->belongsTo(Colaboradores::class, 'colaborador_id', 'id');
    }
}
