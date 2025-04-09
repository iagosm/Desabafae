<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRequest extends Model
{
    protected $fillable = [
        'user_id', 'empresa_nome', 'cnpj', 'motivo', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
