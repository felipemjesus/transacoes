<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transacao
 * @package App\Models
 *
 * @property int $id
 * @property float $valor
 * @property Usuario $pagador
 * @property Usuario $beneficiario
 */
class Transacao extends Model
{
    use HasFactory;

    public function pagador()
    {
        return $this->belongsTo(Conta::class, 'pagador_id', 'id');
    }

    public function beneficiario()
    {
        return $this->belongsTo(Conta::class, 'beneficiario_id', 'id');
    }
}
