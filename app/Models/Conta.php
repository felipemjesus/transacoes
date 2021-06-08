<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Conta
 * @package App\Models
 *
 * @property int $id
 * @property float $saldo
 * @property Usuario $usuario
 */
class Conta extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
