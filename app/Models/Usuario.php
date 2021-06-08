<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * @package App\Models
 *
 * @property int id
 * @property string $nome
 * @property string $documento
 * @property string $email
 * @property Conta $conta
 */
class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'documento', 'email', 'senha'];

    public function conta()
    {
        return $this->hasOne(Conta::class);
    }

    public function isComum(): bool
    {
        return strlen($this->documento) === 11;
    }
}
