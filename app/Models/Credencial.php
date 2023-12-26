<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Credencial extends Model
{
    use HasFactory;
    
    protected $fillable = ["login", "senha", "confirmacao"];

    public function setConfirmacaoAttribute(string $confirmacao): void
    {
        $senha = $this->attributes["senha"];
        if ($senha === $confirmacao) {
            $this->attributes["senha"] = Hash::make($senha);
        } else {
            throw new Exception("Senhas não coincidem.");
        }
    }
}
