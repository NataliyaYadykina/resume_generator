<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo',
        'first_name',
        'last_name',
        'position',
        'phone',
        'email',
        'address',
        'social_links',
        'objective',
        'work_experience',
        'education',
        'template_id'
    ];

    protected $casts = [
        'social_links' => 'array',
        'work_experience' => 'array',
        'education' => 'array',
    ];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь с шаблоном
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
