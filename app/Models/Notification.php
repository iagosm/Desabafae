<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'titulo', 'mensagem', 'lida', 'lida_em',
    ];

    protected $casts = [
        'lida' => 'boolean',
        'lida_em' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
