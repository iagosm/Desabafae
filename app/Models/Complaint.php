<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'nome_empresa', 'titulo', 'descricao', 'status', 'anonimo', 'user_id',
    ];

    protected $casts = [
        'anonimo' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'complaint_tag');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
