<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\Colaboradores;

class Unidades extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'unidades';

    protected $fillable = [
        'id',
        'nome_fantasia',
        'razao_social',
        'cnpj'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot() {

        parent::boot();

        static::creating(function ($model) {

            $model->id = (string) Str::uuid();
        });
    }

    public function colaboradores() {
        return $this->hasMany(Colaboradores::class, 'unidade_id', 'id');
    }
}
