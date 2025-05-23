<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id', 'complaint_id', 'comment_id', 'motivo', 'descricao', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
