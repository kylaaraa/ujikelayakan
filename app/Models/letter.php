<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter extends Model
{
    use HasFactory;
    protected $fillable=[
        'letter_type_id',
        'letter_perihal',
        'recipients',
        'content',
        'attachment',
        'notulis'
    ];
    protected $casts=[
        'recipients' => 'array',
    ];

    public function letter_type()
    {
        return $this->belongsTo(letter_type::class);
    }

    public function result()
    {
        return $this->hasMany(result::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

}
